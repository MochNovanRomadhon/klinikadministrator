<?php 

    $conn = new mysqli("localhost","root","","tugaspaa");

    if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
    
        $result = mysqli_query( $conn , 'SELECT resep.*, kunjungan.keluhan, pasien.nama_pasien, obat.nama_obat 
        FROM resep 
        JOIN kunjungan ON kunjungan.id_kunjungan = resep.id_kunjungan
        JOIN pasien ON pasien.id_pasien = resep.id_pasien
        JOIN obat ON obat.id_obat = resep.id_obat' );

        $contoh = [];
        
        while ($data = mysqli_fetch_assoc($result) ) {
            array_push($contoh , $data);
          };   

        header('Content-Type: application/json');
        echo json_encode($contoh);
    }
    else if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

        $data = file_get_contents("php://input");

        $payload = json_decode($data, true);

        $id_kunjungan = $payload['id_kunjungan'];
        $id_obat = $payload['id_obat'];
        $id_pasien = $payload['id_pasien'];
        $jumlah = $payload['jumlah'];
        $instruksi = $payload['instruksi'];

        
        if(  isset($id_obat) && isset($id_kunjungan) && isset($id_pasien) && isset($jumlah) && isset($instruksi)){

            mysqli_query( $conn , "INSERT INTO resep (id_kunjungan, id_obat , id_pasien , jumlah , instruksi ) VALUE('$id_kunjungan','$id_obat','$id_pasien' ,'$jumlah','$instruksi')");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil diproses.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal.'));
        }
    }else if($_SERVER['REQUEST_METHOD'] === 'PUT' ){
        
        $data = file_get_contents("php://input");

        $payload = json_decode($data, true);
        $id_resep = $payload['id_resep'];
        $id_obat = $payload['id_obat'];
        $jumlah = $payload['jumlah'];
        $instruksi = $payload['instruksi'];


        
        if( isset($id_resep) && isset($id_obat) && isset($jumlah)&& isset($instruksi) ){

            mysqli_query( $conn , "UPDATE resep SET id_resep = '$id_resep', id_obat = '$id_obat', jumlah = '$jumlah', instruksi = '$instruksi' WHERE id_resep = '$id_resep' ");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dirubah.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dirubah'));
        }
    }else if($_SERVER['REQUEST_METHOD'] === 'DELETE' ){
        
        $data = file_get_contents("php://input");

        $payload = json_decode($data, true);

        $id_resep = $payload['id_resep'];
      
        if( isset($id_resep)){

            mysqli_query( $conn , "DELETE FROM resep WHERE id_resep = '$id_resep'");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dihapus.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dihapus '));
        }

    }
?>

