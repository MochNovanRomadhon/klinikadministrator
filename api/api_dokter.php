<?php 

    $conn = new mysqli("localhost","root","","tugaspaa");

    if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
    
        $result = mysqli_query( $conn , 'SELECT * FROM dokter' );

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

        $nama_dokter = $payload['nama_dokter'];
        $spesialis = $payload['spesialis'];
        $no_telp = $payload['no_telp'];

        
        if( isset($nama_dokter) && isset($no_telp) && isset($spesialis) ){

            mysqli_query( $conn , "INSERT INTO dokter (nama_dokter, spesialis, no_telp  ) VALUE('$nama_dokter','$spesialis','$no_telp')");

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
        $id_dokter = $payload ['id_dokter'];
        $nama_dokter = $payload['nama_dokter'];
        $spesialis = $payload['spesialis'];
        $no_telp = $payload['no_telp'];

        
        if( isset($nama_dokter) && isset($no_telp) && isset($spesialis) ){

            mysqli_query( $conn , "UPDATE dokter SET nama_dokter = '$nama_dokter',spesialis = '$spesialis', no_telp = '$no_telp' WHERE id_dokter = '$id_dokter' ");

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

        $id_dokter = $payload['id_dokter'];
      
        if( isset($id_dokter)){

            mysqli_query( $conn , "DELETE FROM dokter WHERE id_dokter = '$id_dokter'");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dihapus.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dihapus '));
        }

    }
?>

