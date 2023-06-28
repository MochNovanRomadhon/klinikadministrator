<?php
include 'functions.php';
require('./api/consumeapi_resep.php');

if(isset($_POST['tambah'])){
    createConsume();
    header('Location: read_resep.php');
  }
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Resep</h2>
    
    <form action="" method="post">
    <label for="nama_obat">Nama Obat</label>
        <select name="id_obat" id="nama_obat">
        <option>----</option>
        <?php
        include 'database.php';
        $sql = mysqli_query($conn, "SELECT * FROM obat") or die (mysqli_error($conn));
        while($data = mysqli_fetch_array($sql)){
            echo "<option value=$data[id_obat]> $data[nama_obat] - $data[ket]</option>";
        }
        ?> </select>
        <label for="jumlah">Jumlah</label>
        <input type="text" name="jumlah" id="jumlah">
        <label for="instruksi">Instruksi</label>
        <input type="text" name="instruksi" id="instruksi">
        <input type="submit" name="tambah" >
    </form>
</div>

<?=template_footer()?>