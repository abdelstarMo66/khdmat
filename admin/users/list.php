<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
function go($path)
{
  echo "<script> window.location.replace('/khdmat/$path') </script>";
}

$select = "SELECT * FROM `users`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delet = "DELETE FROM `users` WHERE id=$id";
  $ss = mysqli_query($conn, $delet);
  go("admin/users/list.php");
}
?>
<main id="main" class="main">
  <?php foreach ($s as $data) { ?>
  <div class="card border-primary mb-3" style="max-width: 18rem;">
    <div class="card-header">
      <?= $data['name'] ?>
      <a class="btn btn-danger" style="margin-left: 100px;"
        href="/khdmat/admin/users/list.php?delete=<?php echo $data['id'] ?>">حذف
      </a>
    </div>
    <div class="card-body text-primary">
      <h3 class="card-title">Email: <?= $data['email'] ?>
      </h3>
      <h6 class="card-text">Phone: <?= $data['phone'] ?>
      </h6>
      <p class="card-text">Address: <?= $data['address'] ?>
      </p>
    </div>
  </div>
  <?php } ?>



</main><!-- End #main -->
<?php
include '../shared/script.php';
?>