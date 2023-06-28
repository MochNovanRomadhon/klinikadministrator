<?php 

    $conn = new mysqli("localhost","root","","tugaspaa");

    if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
    
        $result = mysqli_query( $conn , 'SELECT * FROM obat' );

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

        $nama_obat = $payload['nama_obat'];
        $ket = $payload['ket'];

        
        if( isset($nama_obat) && isset($ket)  ){

            mysqli_query( $conn , "INSERT INTO obat (nama_obat, ket) VALUE('$nama_obat','$ket')");

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
        $id_obat = $payload ['id_obat'];
        $nama_obat = $payload['nama_obat'];
        $ket = $payload['ket'];

        
        if( isset($nama_obat) && isset($ket)  ){

            mysqli_query( $conn , "UPDATE obat SET nama_obat = '$nama_obat',ket = '$ket' WHERE id_obat = '$id_obat' ");

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

        $id_obat = $payload['id_obat'];
      
        if( isset($id_obat)){

            mysqli_query( $conn , "DELETE FROM obat WHERE id_obat = '$id_obat'");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dihapus.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dihapus '));
        }

    }
?>

