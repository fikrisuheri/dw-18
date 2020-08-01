<?php require 'header.php';

$sql = 'SELECT heroes.*,type.name as name_type from heroes INNER JOIN type ON heroes.type_id = type.id WHERE heroes.id = ' .  $_GET['id'];
$result = jalan($sql);
$data = mysqli_fetch_assoc($result);
$sqlType = 'SELECT * FROM type';
$heroes = jalan($sqlType);

if(isset($_GET['hapus'])){
    $sql = jalan('DELETE FROM heroes where id =' . $_GET['hapus']);
    header('location:index.php');
}


if(isset($_POST['submit'])){
   if($_FILES["photo"]["name"]){
    $target_dir = "img/";
    $target_file = $target_dir . rand(1,100). basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    $name = $_POST['name'];
    $type_id = $_POST['type_id'];
    $sql = "UPDATE heroes  SET name='".$name."',type_id=".$type_id ." , photo = '".$target_file."' where id=".$_GET['id'];
    jalan($sql);
   }else{
    $name = $_POST['name'];
    $type_id = $_POST['type_id'];
    $sql = "UPDATE heroes  SET name='" . $name . "',type_id=" . $type_id . " where id=".$_GET['id'];
    jalan($sql);
    
    
   }
  
    header('location: detail.php?id=' . $_GET['id']);
  }
  


?>



<div class="container">
<h3>Detail Heroes</h3>
<div class="row">

<div class="card mr-4 mb-4" style="width: 25%;">
  <img src="<?= $data['photo'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $data['name'] ?></h5>
    <p class="card-text"><?= $data['name_type']?></p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      Edit
    </button>
    <a href="?hapus=<?= $data['id']?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger">Hapus</a>
  </div>
</div>
</div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Heroes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama Heroes</label>
        <input type="text" name="name" id="" class="form-control" required value="<?= $data['name'] ?>">
      </div>
      <div class="form-group">
        <label for="">Photo Heroes</label>
        <input type="file" name="photo" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Type</label>
        <select name="type_id" id="" class="form-control">
        <?php while($datas = mysqli_fetch_assoc($heroes)): ?>
          <option value="<?= $datas['id']?>" <?= $data['type_id'] == $datas['id'] ? 'selected' : '' ?>><?= $datas['name'] ?></option>
        <?php endwhile ?>
        </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>