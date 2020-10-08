<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tambah Data</title>
  </head>
  <body class="mx-4">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="01_tampildata.php">Data Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link btn btn-primary   mx-1 " href="01_tampildata.php" style="color:white;">Tampil Data <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-success  mx-1" href="02_tambahdata.php" style="color:white;">Tambah Data</a>
      </li>
      <li class="nav-item disable">
        <a class="nav-link disable btn btn-warning    mx-1 active" href="#"  style="color:white;">Edit Data <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<?php if ($_POST['aksi']=="Edit")
{
        echo "<h2>Form Edit</h2>";
        include "koneksi.php";
        if (isset($_POST['submit'])) { //mengecek udah ditekan atau belum

          if (strlen($_POST['nim'])==0) { 
            echo '<br><div class="alert alert-danger" role="alert">Data NIM Tidak Boleh Kosong</div>';
              echo "<br>";
          }
          elseif (strlen($_POST['nama'])==0) {
                          echo '<br><div class="alert alert-danger" role="alert">Data Nama Tidak Boleh Kosong</div>';
              echo "<br>";
              #echo "<a href='01_tampildata.php'>Kembali ke tampil data</a>";
          }
          elseif (!isset($_POST['jeniskelamin'])) {
            echo '<br><div class="alert alert-danger" role="alert">Data Jenis Kelamin Tidak Boleh Kosong</div>';
            echo "<br>";
          }
          elseif (!isset($_POST['agama'])) {
            echo '<br><div class="alert alert-danger" role="alert">Data Agama Tidak Boleh Kosong</div>';
            echo "<br>";
          }
          elseif (!isset($_POST['olahraga'])) {
            echo '<br><div class="alert alert-danger" role="alert">Data Olahraga Tidak Boleh Kosong</div>';
            echo "<br>";
          }
          else { 
              include "koneksi.php";
              $olahragafav = implode(", ", $_POST['olahraga']);
             
              mysqli_query($kon,"UPDATE `mahasiswa` SET `nim` = '".$_POST['nim']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              mysqli_query($kon,"UPDATE `mahasiswa` SET `nama` = '".$_POST['nama']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              mysqli_query($kon,"UPDATE `mahasiswa` SET `jeniskelamin` = '".$_POST['jeniskelamin']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              mysqli_query($kon,"UPDATE `mahasiswa` SET `agama` = '".$_POST['agama']."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              mysqli_query($kon,"UPDATE `mahasiswa` SET `olahraga` = '".$olahragafav."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              if(empty($_FILES['foto']['name'])){
                  $fotonya = $_POST['fotolama'];
              }
              else {
                  move_uploaded_file($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
                  $fotonya = $_FILES['foto']['name'];
              }
              mysqli_query($kon,"UPDATE `mahasiswa` SET `foto` = '".$fotonya."' WHERE `mahasiswa`.`id` = ".$_POST['idupdate']);
              #echo "<br>Data".$_POST['nama']."</b> Telah Disimpan di Database";
              echo "<div class=\"alert alert-success\" role=\"alert\">  <b>".$_POST['nama']."</b> Telah Disimpan di Database</div>";
          }
        }

        #$result = mysql_query("SELECT id, name FROM mytable");
        #echo $r; 
        #print_r($r); 
		?>
<form enctype="multipart/form-data" method="post" action="03_aksi.php">
<input type="hidden" name="idupdate" value="<?php
        if (isset($_POST['idupdate']))
            echo $_POST['idupdate']; 
        else
            echo $_POST['id'];
        ?>" >
<?php 
$all = mysqli_query($kon,"SELECT * FROM mahasiswa WHERE id='".$_POST['idupdate']."'");
$assoc=mysqli_fetch_assoc($all);
#print_r($assoc['nim']);
        $nim=$assoc['nim'];
        $nama=$assoc['nama'];

        $jeniskelamin=$assoc['jeniskelamin'];
        $agama=$assoc['agama'];
        
        $or=$assoc['olahraga'];
        $foto=$assoc['foto'];
                                         # SELECT * FROM pelanggan WHERE id_pelanggan = 'P0001'             
        #print_r($_POST['id']);
        #print_r($nim);
        #echo(mysqli_query($kon, "SELECT nim FROM mahasiswa"));
        #echo($nim);

?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Masukkan NIM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nim" value="<?php echo $nim;?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Masukkan Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nama" value="<?php echo $nama; ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Masukkan Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="exampleRadios1" value="Laki-laki" <?php if($jeniskelamin=="Laki-laki")  {echo "checked";} ?> >
            <label class="form-check-label" for="exampleRadios1">
                Laki-laki
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="exampleRadios2" value="Perempuan" <?php if($jeniskelamin=="Perempuan") { echo "checked"; } ?> >
            <label class="form-check-label" for="exampleRadios2">
                Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Agama</label>
        <select class="form-control" id="exampleFormControlSelect1" name="agama">
        <option value="Islam" <?php if($agama=="Islam") {echo "selected";}?> >Islam</option>
        <option value="Protestan" <?php if ($agama == "Protestan") {echo "selected";}?> >Protestan</option>
        <option value="Katolik" <?php if($agama == "Katolik") {echo "selected";}?>>Katolik</option>
        <option value="Hindu" <?php if($agama == "Hindu") {echo "selected";}?>>Hindu</option>
        <option value="Buddha" <?php if($agama == "Buddha") {echo "selected";}?>>Buddha</option>
        <option value="Konghucu" <?php if($agama == "Konghucu") {echo "selected";}?>>Konghucu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Olahraga Favorit</label>
        <?php $olahragafav = explode(", ", $or); 
        
        ?>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Sepak Bola" id="defaultCheck1" name="olahraga[]" <?php if(in_array("Sepak Bola", $olahragafav)) {echo "checked";} ?> >
    <label class="form-check-label" for="defaultCheck1" >
        Sepak Bola
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Basket" id="defaultCheck2" name="olahraga[]" <?php if(in_array("Basket", $olahragafav)) {echo "checked";} ?> >
    <label class="form-check-label" for="defaultCheck2">
        Basket
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Futsal" id="defaultCheck3" name="olahraga[]" <?php if(in_array("Futsal", $olahragafav)) {echo "checked";} ?> >
    <label class="form-check-label" for="defaultCheck3">
        Futsal
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Renang" id="defaultCheck4" name="olahraga[]" <?php if(in_array("Renang", $olahragafav)) {echo "checked";} ?> >
    <label class="form-check-label" for="defaultCheck4">
        Renang
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="Badminton" id="defaultCheck5" name="olahraga[]" <?php if(in_array("Badminton", $olahragafav)) {echo "checked";} ?> >
    <label class="form-check-label" for="defaultCheck5">
        Badminton
    </label>
    </div>
            
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Masukkan Foto Anda (Upload foto hanya jika ingin mengganti foto)</label>
        <input type="file" name="foto">
       <input type="hidden" name="fotolama" value="<?php  echo $fotolama=$_POST['foto'];
                                                            
                                                            #$result = mysql_query("SELECT id, name FROM mytable");
                                                            #$r=mysqli_query($kon,"SELECT foto FROM mahasiswa WHERE id=".$_POST['id']."'");
                                                            #echo $r; ?>" >
                                     
    </div>

    <a href="01_tampildata.php" class="btn btn-primary">Kembali ke Tampil Data</a>
    <button type="submit" class="btn btn-warning" name="submit">Simpan Perubahan Data</button>
    

    <input type="hidden" name="aksi" value="Edit">
                      

</form>

<?php


}
else {
    echo "<h2>Konfirmasi Penghapusan Data</h2>";
    ?>
    <form>
        Anda yakin akan menghapus data <b><?php echo $_POST['nama']; ?></b>?
        <input type="submit" name="sub" value="iya" class="btn btn-danger">
        <input type="submit" name="sub" value="tidak" class="btn btn-primary">
        <input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
        <input type="hidden" name="aksi" value="<?php echo "Delete"; ?>">
        <input type="hidden" name="nm" value="<?php echo $_POST['nama']; ?>">
    <?php
    if (isset($_GET['sub'])){
      if($_GET['sub']=="tidak"){
        header("location:01_tampildata.php");
        }
      else{
        include "koneksi.php";
        mysqli_query($kon,"DELETE FROM `mahasiswa` WHERE `id` = ".$_GET['id']);
                header("location:01_tampildata.php");
      }
    }
    
 }	
?>
       
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>