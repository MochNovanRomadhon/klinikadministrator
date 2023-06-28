<?php 

function putConsume($id_obat){
    $url = 'http://localhost/projek_paa/api/api_obat.php';

    $idkey = $id_obat;
    $nama_obat = $_POST['nama_obat'];
    $ket = $_POST['ket'];
// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_obat' => $idkey,
        'nama_obat' => $nama_obat,
        'ket' => $ket,
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
    $url = 'http://localhost/projek_paa/api/api_obat.php';

    $nama_obat = $_POST['nama_obat'];
    $ket = $_POST['ket'];
// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'nama_obat' => $nama_obat,
        'ket' => $ket,
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
    $url = 'http://localhost/projek_paa/api/api_obat.php'; // URL dari API

    $ch = curl_init(); // Inisialisasi curl
    curl_setopt($ch, CURLOPT_URL, $url); // Set URL untuk request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Set return transfer sebagai true
    $data = curl_exec($ch); // Melakukan request dan mengambil data
    curl_close($ch); // Menutup koneksi curl

    $json_data = json_decode($data, true); 

    return $json_data;
}


function delConsume($idkey){
    $url = 'http://localhost/projek_paa/api/api_obat.php';

    $id_obat = $idkey;

// Data yang akan dikirim ke API dalam bentuk JSON
    $data = array(
        'id_obat' => $id_obat,
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