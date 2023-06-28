<?php

function createConsume(){
    $url = 'http://localhost/projek_paa/api/api_registration.php';

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'full_name' => $full_name,
        'email' => $email,
        'password' => $password,
    );
    $data_json = json_encode($data);

    // Inisialisasi CURL
// Inisialisasi cURL
    $ch = curl_init($url);

    // Set header untuk request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        )
    );

    // Set data yang akan dikirim
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    // Set opsi lainnya
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eksekusi request dan ambil responsenya
    $response = curl_exec($ch);

    // Close CURL
    curl_close($ch);

    // Tampilkan response dari API
    echo "<script>alert('$response');</script>";
    
  }

?>