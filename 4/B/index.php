<?php require 'header.php';

$sql = 'SELECT heroes.*,type.name as name_type from heroes INNER JOIN type ON heroes.type_id = type.id';
$result = jalan($sql);

$sqlType = 'SELECT * FROM type';
$heroes = jalan($sqlType);


if(isset($_POST['submit'])){
  $target_dir = "img/";
  $target_file = $target_dir . rand(1,100). basename($_FILES["photo"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
  $name = $_POST['name'];
  $type_id = $_POST['type_id'];
  $sql = "INSERT INTO heroes (`name`,`type_id`,`photo`) VALUES('$name','$type_id','$target_file')";
  jalan($sql);

  header('location: index.php');
}


?>



<div class="container">
<h3>All Heroes <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
</h3>
<div class="row">
<?php 

while($row = mysqli_fetch_assoc($result)):?>
<div class="card mr-4 mb-4" style="width: 18rem;">
  <img src="<?= $row['photo'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $row['name'] ?></h5>
    <p class="card-text"><?= $row['name_type']?></p>
    <a href="detail.php?id=<?= $row['id']?>" class="btn btn-primary">Detail</a>
  </div>
</div>
<?php endwhile ?>
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
        <input type="text" name="name" id="" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Photo Heroes</label>
        <input type="file" name="photo" id="" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Type</label>
        <select name="type_id" id="" class="form-control">
        <?php while($data = mysqli_fetch_assoc($heroes)): ?>
          <option value="<?= $data['id']?>"><?= $data['name'] ?></option>
        <?php endwhile ?>
        </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN"></input>
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