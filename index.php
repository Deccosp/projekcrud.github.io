<?php


$host     = "localhost";
$user     = "root";
$pass     = "";
$db       = "coba";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("tidak bisa");
}
$nisn    = "";
// $image   = "";
$nama    = "";
$kelas   = "";
$alamat  = "";
$sukses  = "";
$eror    = "";

if(isset ($_GET['op'])){
  $op = $_GET['op'];

}else{
  $op = "";
}
if($op == 'delete'){
  $id       = $_GET['id'];
  $sql1     = "delete from mahasiswa where id = '$id'";
  $q1       =mysqli_query($koneksi,$sql1);
  if($q1){
    $sukses = "horeee!!!";
  }else{
    $eror   = "hallah!!!";

  }
}

if($op == 'edit'){
  $id         = $_GET['id'];
  $sql1       = "select * from mahasiswa where id = '$id'";
  $q1         = mysqli_query ($koneksi,$sql1);
  $r1         = mysqli_fetch_array($q1);
  $nisn       = $r1['nisn'];
  // $image      = $r1['image'];
  $nama       = $r1['nama'];
  $kelas      = $r1['kelas'];
  $alamat     = $r1['alamat'];
  if($nisn == ''){
    $eror = "Data ora iso di temokne";
  }
}

if(isset($_POST['simpan'])){ //untuk cerate
    $nisn      = $_POST['nisn'];
    // $image     = $_POST['image'];
    $nama      = $_POST['nama'];
    $kelas     = $_POST['kelas'];
    $alamat    = $_POST['alamat'];

    if($nisn && $nama && $kelas && $alamat) {
      if ($op == 'edit'){
        $sql1    = "update mahasiswa set nisn = '$nisn' ,image = '$image', nama = '$nama',kelas = '$kelas',alamat ='$alamat' where id ='$id'";
        $q1      = mysqli_query($koneksi,$sql1);
        if($q1){
          $sukses="Data Diupgraderererer";
        
        }else{
          $eror= "Data Gak Bisah di upgrade";

        }

      }else{
        $sql1 = "insert into mahasiswa (nisn,nama,kelas,alamat) values('$nisn','$nama','$kelas','$alamat')";
        $q1 = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "Berhasil memasukan data baru";
        }
        else {
            $eror = "tidak bisa memasukan data baru";
        }
    
      }
    }else {
        $eror = "supaya mengisi semua data";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .mx-auto{width: 1000px;}
        .card{margin-top: 10px;}
        .card-2 {margin-top: 10px;}
    </style>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="container">
        <div class="bubbles">
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:18;"></span>
            <span style="--i:24;"></span>
            <span style="--i:27;"></span>
            <span style="--i:13;"></span>
            <span style="--i:20;"></span>
            <span style="--i:14;"></span>
            <span style="--i:25;"></span>
            <span style="--i:17;"></span>
            <span style="--i:15;"></span>
            <span style="--i:21;"></span>
            <span style="--i:23;"></span>
            <span style="--i:16;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:22;"></span>
            <span style="--i:19;"></span>
            <span style="--i:28;"></span>
            <span style="--i:30;"></span>
            <span style="--i:35;"></span>
            <span style="--i:38;"></span>
            <span style="--i:36;"></span>
            <span style="--i:39;"></span>
            <span style="--i:37;"></span>
            <span style="--i:34;"></span>
            <span style="--i:33;"></span>
            <span style="--i:32;"></span>
            <span style="--i:31;"></span>
            <span style="--i:42;"></span>
            <span style="--i:40;"></span>

        </div>
    </div>  
  <div class="mx-auto">
        <!-- untuk masukkan data -->
    <div class="card">

    <div class="card-header">
    Create 
  </div>
  <div class="card-body">
    <?php 
    if ($eror){
    ?>
     <div class="alert alert-danger" role="alert">
        <?php echo $eror ?>
    </div>
    <?php
    }
    ?>
    <?php 
      //  header("refresh:5;url=index.php");// 5=detik
    if ($sukses){
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php
      // header("refresh:5;url=index.php");
    }
    ?>
    <form action="" method="POST">
  <div class="mb-3 row">
      <label for="nisn" class="col-sm-2 col-form-label">nisn</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn ?>">
      </div>
  </div>
  <!-- <div class="mb-3 row">
      <label for="image" class="col-sm-2 col-form-label">image</label>
      <div class="col-sm-10">
      <input type="file"  class="form-control" id="image" name="image" accept="image/png, image/jpg, image/jpeg" value="">
  </div> -->
  <div class="mb-3 row">
      <label for="nama" class="col-sm-2 col-form-label">nama</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama?>">
      </div>
  </div>
    <div class="mb-3 row">
    <label for="kelas" class="col-sm-2 col-form-label">kelas</label>
    <div class="col-sm-10">
        <select class="form-control" name="kelas" id="kelas">
            <option value="">==>PIlih kelas<==</option>
            <option value="XRA"<?php if($kelas == "XRA")echo "selected"?>>XRA</option>
            <option value="XRB"<?php if($kelas == "XRB")echo "selected"?>>XRB</option>
            <option value="XRC"<?php if($kelas == "XRC")echo "selected"?>>XRC</option>
            <option value="XOA"<?php if($kelas == "XOA")echo "selected"?>>XOA</option>
            <option value="XRB"<?php if($kelas == "XRB")echo "selected"?>>XOB</option>
            <option value="XRC"<?php if($kelas == "XRC")echo "selected"?>>XOC</option>
            <option value="XRA"<?php if($kelas == "XRA")echo "selected"?>>XMA</option>
            <option value="XRB"<?php if($kelas == "XRB")echo "selected"?>>XMB</option>
            <option value="XRC"<?php if($kelas == "XRC")echo "selected"?>>XMC</option>
            <option value="XRA"<?php if($kelas == "XRA")echo "selected"?>>XTA</option>
            <option value="XRB"<?php if($kelas == "XRB")echo "selected"?>>XTB</option>
            <option value="XRC"<?php if($kelas == "XRC")echo "selected"?>>XTC</option>
        </select>
    </div>
  </div>
    <div class="mb-3 row">
       <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>">
          </div>
    </div>
          <div class="col-12">
              <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
          </div>
    </form>
  </div>
  <br></br>
<!-- untuk mengeluarkan data -->
  <div class="card-2">
  <div class="card-header text-white bg-secondary">
    Data Mahasiswa
  </div>
  <div class="card-body">
  <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nisn</th>
                <!-- <th scope="col">Pict</th> -->
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">AKSI</th>
            </tr>
            <tbody>
                <?php 
                $sql2 = "select * from mahasiswa order by id desc";
                $q2 = mysqli_query($koneksi,$sql2);
                $urut = 1;
                while($r2 = mysqli_fetch_array($q2)){
                
                $id     = $r2['id'];
                $nisn   = $r2['nisn'];
                // $image  = $r2['image'];
                $nama   = $r2['nama'];
                $kelas  = $r2['kelas'];
                $alamat = $r2['alamat'];
                 ?>
                 <tr>
                 <th scope="row"><?php echo $urut++ ?></th>
                 <td scope="row"><?php echo $nisn   ?></td>
                 <!-- <td><img src="<?php echo $image ?>" alt=""> </td> -->
                 <td scope="row"><?php echo $nama   ?></td>
                 <td scope="row"><?php echo $kelas  ?></td>
                 <td scope="row"><?php echo $alamat ?></td>
                 <td scope="row">
                     <a href="index.php?op=edit&id=<?php echo $id ?>"> <button type="button" class="btn btn-warning">Edit</button></a>
                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm ('yakin deck?') "><button type="button" class="btn btn-danger">Delete</button></a>
                    
                 </td>
                 </tr> 
                 <?php
                }
                ?>
            </tbody>
        </thead>
    </table>
  </div>
  </div>
</div>


 </body>
</html>
