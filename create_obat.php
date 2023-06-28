<?php
include 'functions.php';
require('./api/consumeapi_obat.php');

if(isset($_POST['tambah'])){
    createConsume();
    header('Location: read_obat.php');
  }
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Tambah Obat</h2>
    <form action="" method="post">
        <label for="nama_obat">Nama Obat</label>
        <input type="text" name="nama_obat" id="nama_obat">
        <label for="ket">ket</label>
        <input type="text" name="ket" id="ket">
        <input type="submit" name="tambah" >
    </form>
</div>

<?=template_footer()?>