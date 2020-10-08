<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tampil Data</title>
  </head>
  <body class="mx-4">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="01_tampildata.php">Data Mahasiswa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link btn btn-primary active mx-1 " href="#" style="color:white;">Tampil Data <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-success  mx-1 " href="02_tambahdata.php" style="color:white;">Tambah Data</a>
      </li>
    </ul>
  </div>
</nav>
<table class="table">
  <thead>
    <tr align="center">
      <th scope="col"></th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Agama</th>
      <th scope="col">Olahraga Favorit</th>
      <th scope="col">Foto</th>
      <th scope="col" colspan=2></th>
    </tr>
  </thead>
<?php
  
    include "koneksi.php";
    $r=mysqli_query($kon,"SELECT * FROM mahasiswa");
    $i = 1;
    while($brs=mysqli_fetch_assoc($r)) { 
        echo "<form action=\"03_aksi.php\" method=\"post\">"; ?>

  <tbody>
    <tr >
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $brs["nim"]; ?></td>
      <td><?php echo $brs["nama"]; ?></td>
      <td><?php echo $brs["jeniskelamin"]; ?></td>
      <td><?php echo $brs["agama"]; ?></td>
      <td><?php echo $brs["olahraga"]; ?></td>
      <td><?php echo "<img src='".$brs["foto"]."' width='100' height='100'>"; ?></td>
      <td><?php echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-primary\" name=\"aksi\" value=\"Edit\">"; ?></td>
      <td><?php echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-danger\" name=\"aksi\" value=\"Delete\">"; ?></td>
      <td><?php echo "<p>";
        echo "<input type=\"hidden\" name=\"id\" value=\"".$brs["id"]."\">";
        echo "<input type=\"hidden\" name=\"idupdate\" value=\"".$brs["id"]."\">";
        echo "<input type=\"hidden\" name=\"nim\" value=\"".$brs["nim"]."\">";
        echo "<input type=\"hidden\" name=\"nama\" value=\"".$brs["nama"]."\">";
        echo "<input type=\"hidden\" name=\"jeniskelamin\" value=\"".$brs["jeniskelamin"]."\">";
        echo "<input type=\"hidden\" name=\"agama\" value=\"".$brs["agama"]."\">";
        echo "<input type=\"hidden\" name=\"olahraga\" value=\"".$brs["olahraga"]."\">";
        echo "<input type=\"hidden\" name=\"foto\" value=\"".$brs["foto"]."\">";?>
        </td>
    </tr>
    <?php echo "</form>";
        }
        
?>
  </tbody>
</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>



