<?php
include 'functions.php';
require('./api/consumeapi_pasien.php');

if(isset($_POST['tambah'])){
    createConsume();
    header('Location: read_pasien.php');
  }

?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Pasien</h2>
    <form action="" method="post">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" name="nama_pasien" id="nama_pasien">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> <span>Laki-laki</span>
        <input type="radio" name="jenis_kelamin" value="Perempuan"> <span>Perempuan</span>
        </label>
        <input type="submit" name="tambah" >
    </form>
</div>

<?=template_footer()?>