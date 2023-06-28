<?php 

function putConsume($id_dokter){
    $url = 'http://localhost/projek_paa/api/api_dokter.php';

    $idkey = $id_dokter;
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];
    $no_telp = $_POST['no_telp'];

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_dokter' => $idkey,
        'nama_dokter' => $nama_dokter,
        'spesialis' => $spesialis,
        'no_telp' => $no_telp,
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
    $url = 'http://localhost/projek_paa/api/api_dokter.php';

    $nama_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];
    $no_telp = $_POST['no_telp'];

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'nama_dokter' => $nama_dokter,
        'spesialis' => $spesialis,
        'no_telp' => $no_telp,
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
    $url = 'http://localhost/projek_paa/api/api_dokter.php'; // URL dari API

    $ch = curl_init(); // Inisialisasi curl
    curl_setopt($ch, CURLOPT_URL, $url); // Set URL untuk request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Set return transfer sebagai true
    $data = curl_exec($ch); // Melakukan request dan mengambil data
    curl_close($ch); // Menutup koneksi curl

    $json_data = json_decode($data, true); 

    return $json_data;
}


function delConsume($idkey){
    $url = 'http://localhost/projek_paa/api/api_dokter.php';

    $id_dokter = $idkey;

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_dokter' => $id_dokter,
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