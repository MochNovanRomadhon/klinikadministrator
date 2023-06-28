<?php
include 'functions.php';
require('./api/consumeapi_dokter.php');

if(isset($_POST['tambah'])){
    createConsume();
    header('Location: read_dokter.php');
  }
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Dokter</h2>
    <form action="" method="post">
        <label for="nama_dokter">Nama Dokter</label>
        <input type="text" name="nama_dokter" id="nama_dokter">
        <label for="spesialis">Spesialis</label>
        <input type="text" name="spesialis" id="spesialis">
        <label for="no_telp">No. Telpon</label>
        <input type="text" name="no_telp" id="no_telp">
        <input type="submit" name="tambah" >
    </form>
</div>

<?=template_footer()?>