<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_dokter.php');

// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_POST['put'])) { 
        putConsume($_GET['id_dokter']);  
        header('Location: read_dokter.php');   
}

$sql=mysqli_query($conn,"SELECT * FROM dokter WHERE id_dokter ='$_GET[id_dokter]'");
$data=mysqli_fetch_array($sql);
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Dokter</h2>
    <form action="" method="post">
        <label for="nama_dokter">Nama Dokter</label>
        <input type="text" name="nama_dokter"  id="nama_dokter" value="<?php echo $data['nama_dokter']; ?>">
        <label for="spesialis">spesialis</label>
        <input type="text" name="spesialis"  id="spesialis" value=" <?php echo $data['spesialis']; ?>">
        <label for="no_telp">No. Telpon</label>
        <input type="text" name="no_telp" id="no_telp" value="<?php echo $data['no_telp']; ?>">
        <input type="submit" name="put" value="Update">
    </form>
</div>

<?=template_footer()?>