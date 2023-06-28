<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_pasien.php');

// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_POST['put'])) { 
        putConsume($_GET['id_pasien']);  
        header('Location: read_pasien.php');   
}

$sql=mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien ='$_GET[id_pasien]'");
$data=mysqli_fetch_array($sql);
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Pasien</h2>
    <form action="" method="post">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" name="nama_pasien"  id="nama_pasien" value="<?php echo $data['nama_pasien']; ?>">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir"  id="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> <span>Laki-laki</span>
        <input type="radio" name="jenis_kelamin" value="Perempuan"> <span>Perempuan</span>
        </label>
        <input type="submit" name="put" value="Update">
    </form>
</div>

<?=template_footer()?>