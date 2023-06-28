<?php 

    $conn = new mysqli("localhost","root","","tugaspaa");

    if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
    
        $result = mysqli_query( $conn , 'SELECT kunjungan.*,pasien.id_pasien, dokter.nama_dokter, pasien.nama_pasien 
        FROM kunjungan 
        JOIN dokter ON dokter.id_dokter = kunjungan.id_dokter 
        JOIN pasien ON pasien.id_pasien = kunjungan.id_pasien' );

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

        $id_dokter = $payload['id_dokter'];
        $id_pasien = $payload['id_pasien'];
        $tanggal_kunjungan = $payload['tanggal_kunjungan'];
        $keluhan = $payload['keluhan'];

        
        if( isset($id_dokter) && isset($tanggal_kunjungan) && isset($id_pasien) && isset($keluhan) ){

            mysqli_query( $conn , "INSERT INTO kunjungan (id_dokter, id_pasien, tanggal_kunjungan , keluhan ) VALUE('$id_dokter','$id_pasien','$tanggal_kunjungan','$keluhan')");

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
        $id_kunjungan = $payload ['id_kunjungan'];
        $id_dokter = $payload['id_dokter'];
        $tanggal_kunjungan = $payload['tanggal_kunjungan'];
        $keluhan = $payload['keluhan'];

        
        if( isset($id_dokter) && isset($tanggal_kunjungan) && isset($keluhan) ){

            mysqli_query( $conn , "UPDATE kunjungan SET id_dokter = '$id_dokter', tanggal_kunjungan = '$tanggal_kunjungan', keluhan = '$keluhan' WHERE id_kunjungan = '$id_kunjungan' ");

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

        $id_kunjungan = $payload['id_kunjungan'];
      
        if( isset($id_kunjungan)){

            mysqli_query( $conn , "DELETE FROM kunjungan WHERE id_kunjungan = '$id_kunjungan'");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dihapus.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dihapus '));
        }

    }
?>

