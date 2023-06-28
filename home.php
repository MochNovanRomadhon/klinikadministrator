<?php

include 'functions.php';
require 'database.php';


?>


<?=template_header('Home')?>

<title>$title</title>
		<link href="tmp.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content">
<div class="box">
<a href="read_obat.php">  
<i class="fas fa-capsules"></i>
  <?php
      $box_pasien = "SELECT * from obat";
      $box_pasien_run = mysqli_query($conn, $box_pasien);

      if($pasien_total = mysqli_num_rows($box_pasien_run))
      {echo '<h2 class="dash"> '.$pasien_total. '  </h2>' ;
      } else
      { echo '<h2> no data  </h2>';}
    ?>
    <span class="box-description">Obat</span>
  </a>
</div>

<div class="box">
<a href="read_kunjungan.php">  
<i class='fas fa-hospital-alt'></i>
  <?php
      $box_pasien = "SELECT * from kunjungan";
      $box_pasien_run = mysqli_query($conn, $box_pasien);

      if($pasien_total = mysqli_num_rows($box_pasien_run))
      {echo '<h2 class="dash"> '.$pasien_total. '  </h2>' ;
      } else
      { echo '<h2> no data  </h2>';}
    ?>
    <span class="box-description">Kunjungan</span>
  </a>
</div>

<div class="box">
<a href="read_pasien.php">  
<i class='fas fa-user-alt'></i>
  <?php
      $box_pasien = "SELECT * from pasien";
      $box_pasien_run = mysqli_query($conn, $box_pasien);

      if($pasien_total = mysqli_num_rows($box_pasien_run))
      {echo '<h2 class="dash"> '.$pasien_total. '  </h2>' ;
      } else
      { echo '<h2> no data  </h2>';}
    ?>
    <span class="box-description">Pasien</span>
  </a>
</div>

<div class="box">
<a href="read_dokter.php">  
<i class='fas fa-user-md'></i>
  <?php
      $box_dokter = "SELECT * from dokter";
      $box_dokter_run = mysqli_query($conn, $box_dokter);

      if($dokter_total = mysqli_num_rows($box_dokter_run))
      {echo '<h2 class="dash"> '.$dokter_total. '  </h2>' ;
      } else
      { echo '<h2> no data  </h2>';}
    ?>
    <span class="box-description">Dokter</span>
  </a>
</div>
</div>
<?=template_footer()?>