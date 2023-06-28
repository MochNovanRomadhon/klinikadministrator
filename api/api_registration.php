<?php

    $conn = new mysqli("localhost","root","","tugaspaa");
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

    $data = file_get_contents("php://input");

    $payload = json_decode($data, true);

    $full_name = $payload['full_name'];
    $email = $payload['email'];
    $password = $payload['password']; 
    
    // // Membuat query untuk memeriksa apakah email sudah terdaftar
    $query_cek_email = "SELECT * FROM users WHERE email = '$email'";
    $result_cek_email = mysqli_query($conn, $query_cek_email);
    
    // // Memeriksa apakah query berhasil dijalankan dan email sudah terdaftar
    if (mysqli_num_rows($result_cek_email) > 0) {
        $response = array(
            'status' => 'error',
            'message' => 'Email sudah terdaftar'
        );
    } else{
        $query_register = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$password')";
        $result_register = mysqli_query($conn, $query_register);

        if ($result_register) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'Registrasi berhasil'
                    );
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Registrasi gagal'
                    );
                }
    }
    // Mengubah response menjadi format JSON
    echo json_encode($response);
    
    

}

?>