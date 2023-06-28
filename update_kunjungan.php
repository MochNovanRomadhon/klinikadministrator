<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_kunjungan.php');

// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_POST['put'])) { 
        putConsume($_GET['id_kunjungan']);  
        header('Location: read_kunjungan.php');   
}

$db=mysqli_query($conn,"SELECT * FROM kunjungan WHERE id_kunjungan ='$_GET[id_kunjungan]'");
$tmp=mysqli_fetch_array($db);
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update kunjungan</h2>
    <form action="" method="post">
    <label for="nama_dokter">Nama Dokter</label>
        <select name="id_dokter" id="nama_dokter">
        <option>----</option>
        <?php
        include 'database.php';
        $sql = mysqli_query($conn, "SELECT * FROM dokter") or die (mysqli_error($conn));
        while($data = mysqli_fetch_array($sql)){
            echo "<option value=$data[id_dokter]> $data[nama_dokter] - $data[spesialis] </option> ";
        }
        ?> </select>
    
        <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="<?php echo $tmp['tanggal_kunjungan']; ?>">
        <label for="keluhan">Keluhan</label>
        <input type="text" name="keluhan" id="keluhan" value="<?php echo $tmp['keluhan']; ?>">
        <input type="submit" name="put" value="Update">
    </form>
</div>

<?=template_footer()?>