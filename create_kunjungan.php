<?php
include 'functions.php';
require('./api/consumeapi_kunjungan.php');

if(isset($_POST['tambah'])){
    createConsume();
    // header('Location: read_kunjungan.php');
  }
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah kunjungan</h2>
    <form action="" method="post">
        <label for="nama_dokter">Nama Dokter</label>
        <select name="id_dokter" id="nama_dokter">
        <option>----</option>
        <?php
        include 'database.php';
        $sql = mysqli_query($conn, "SELECT * FROM dokter") or die (mysqli_error($conn));
        while($data = mysqli_fetch_array($sql)){
            echo "<option value=$data[id_dokter]> $data[nama_dokter] - $data[spesialis]</option>";
        }
        ?> </select>
    
        <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan">
        <label for="keluhan">Keluhan</label>
        <input type="text" name="keluhan" id="keluhan">
        <input type="submit" name="tambah" >
    </form>
</div>

<?=template_footer()?>