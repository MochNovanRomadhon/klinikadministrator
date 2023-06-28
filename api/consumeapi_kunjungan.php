<?php 

function putConsume($id_kunjungan){
    $url = 'http://localhost/projek_paa/api/api_kunjungan.php';

    $idkey = $id_kunjungan;
    $id_dokter = $_POST['id_dokter'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $keluhan = $_POST['keluhan'];

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_kunjungan' => $idkey,
        'id_dokter' => $id_dokter,
        'tanggal_kunjungan' => $tanggal_kunjungan,
        'keluhan' => $keluhan
    );
    $data_json = json_encode($data);

    // Inisialisasi CURL
// Inisialisasi cURL
    $ch = curl_init($url);

    // Set header untuk request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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

function createConsume(){
    $url = 'http://localhost/projek_paa/api/api_kunjungan.php';

    $id_pasien = $_GET['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $keluhan = $_POST['keluhan'];

    
// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_pasien' => $id_pasien,
        'id_dokter' => $id_dokter,
        'tanggal_kunjungan' => $tanggal_kunjungan,
        'keluhan' => $keluhan
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


function getConsume(){
    $url = 'http://localhost/projek_paa/api/api_kunjungan.php'; // URL dari API

    $ch = curl_init(); // Inisialisasi curl
    curl_setopt($ch, CURLOPT_URL, $url); // Set URL untuk request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Set return transfer sebagai true
    $data = curl_exec($ch); // Melakukan request dan mengambil data
    curl_close($ch); // Menutup koneksi curl

    $json_data = json_decode($data, true); 

    return $json_data;
}


function delConsume($idkey){
    $url = 'http://localhost/projek_paa/api/api_kunjungan.php';

    $id_kunjungan = $idkey;

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_kunjungan' => $id_kunjungan,
    );
    $data_json = json_encode($data);

    // Inisialisasi CURL
// Inisialisasi cURL
    $ch = curl_init($url);

    // Set header untuk request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
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

    header("refresh: 3");
    // Tampilkan response dari API
    echo "<script>alert('$response');</script>";


  
}



?>