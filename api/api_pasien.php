<?php 

    $conn = new mysqli("localhost","root","","tugaspaa");

    if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
    
        $result = mysqli_query( $conn , 'SELECT * FROM pasien' );

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

        $nama_pasien = $payload['nama_pasien'];
        $tanggal_lahir = $payload['tanggal_lahir'];
        $jenis_kelamin = $payload['jenis_kelamin'];

        
        if( isset($nama_pasien) && isset($jenis_kelamin) && isset($tanggal_lahir) ){

            mysqli_query( $conn , "INSERT INTO pasien (nama_pasien, tanggal_lahir, jenis_kelamin ) VALUE('$nama_pasien','$tanggal_lahir','$jenis_kelamin')");

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
        $id_pasien = $payload ['id_pasien'];
        $nama_pasien = $payload['nama_pasien'];
        $tanggal_lahir = $payload['tanggal_lahir'];
        $jenis_kelamin = $payload['jenis_kelamin'];

        
        if( isset($nama_pasien) && isset($jenis_kelamin) && isset($tanggal_lahir) ){

            mysqli_query( $conn , "UPDATE pasien SET nama_pasien = '$nama_pasien',tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin' WHERE id_pasien = '$id_pasien' ");

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

        $id_pasien = $payload['id_pasien'];
      
        if( isset($id_pasien)){

            mysqli_query( $conn , "DELETE FROM pasien WHERE id_pasien = '$id_pasien'");

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Data berhasil dihapus.'));
        }
        else{
            http_response_code(404);
            echo json_encode(array('message' => 'data gagal dihapus '));
        }

    }
?>

