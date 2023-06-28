<?php
include 'functions.php';
include 'database.php';
require('./api/consumeapi_resep.php');

// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_POST['put'])) { 
        putConsume($_GET['id_resep']);  
        header('Location: read_resep.php');   
}

$db=mysqli_query($conn,"SELECT * FROM resep WHERE id_resep ='$_GET[id_resep]'");
$tmp=mysqli_fetch_array($db);
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Resep</h2>
    <form action="" method="post">
    <label for="nama_obat">Nama Obat</label>
    <form action="" method="post">
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
        <input type="text" name="jumlah" id="jumlah" value="<?php echo $tmp['jumlah']; ?>">
        <label for="instruksi">Instruksi</label>
        <input type="text" name="instruksi" id="instruksi" value="<?php echo $tmp['instruksi']; ?>" >
        <input type="submit" name="put" value="Update">
    </form>
</div>

<?=template_footer()?>