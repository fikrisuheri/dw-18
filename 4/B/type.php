<?php require 'header.php';


$sqlType = 'SELECT * FROM type';
$heroes = jalan($sqlType);


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $sql = "INSERT INTO type (`name`) VALUES('$name')";
  jalan($sql);

  header('location: type.php');
}


if(isset($_POST['submitEdit'])){
    $name = $_POST['name'];
    $sql = "UPDATE type SET name='" . $_POST['name'] . "' WHERE id=" . $_POST['id'];
    jalan($sql);
  
    header('location: type.php');
  }

if(isset($_GET['hapus'])){
    $sql = jalan('DELETE FROM type where id =' . $_GET['hapus']);
    header('location:type.php');
}

?>



<div class="container">
<h3>All TYPE <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
</h3>
<div class="row">
    <table class="table table-bordered">
        <tr class="thead-light">
        <th>Nama</th>
        <th>Aksi</th>
        </tr>
        <?php while($data = mysqli_fetch_assoc($heroes)) :?>
            <tr>
            <td><?= $data['name'] ?></td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit<?= $data['id']?>">
  Edit
</button><a href="?hapus=<?= $data['id']?>" class="btn btn-danger">Hapus</a></td>
            </tr>
            <div class="modal fade" id="exampleModalEdit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit<?= $data['id'] ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEdit<?= $data['id'] ?>Label">Tambah TIPE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama TIPE</label>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="name" value="<?= $data['name'] ?>" id="" class="form-control" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submitEdit" class="btn btn-primary" value="SIMPAN"></input>
        </form>
      </div>
    </div>
  </div>
</div>

        <?php endwhile ?>
    </table>
</div>
</div>



<div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal<?= $data['id'] ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal<?= $data['id'] ?>Label">Tambah TIPE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Nama TIPE</label>
        <input type="text" name="name" id="" class="form-control" required>
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