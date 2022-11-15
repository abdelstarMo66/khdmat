<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `rate_info`";
$s = mysqli_query($conn, $select);
?>

<main id="main" class="main">
<?php foreach ($s as $data) { ?>
<div class="card border-success mb-3" style="max-width: 18rem;">
  <div class="card-header bg-transparent border-success"><?= $data["employee_name"] ?></div>
  <div class="card-body text-success">
    <h5 class="card-title">Job : <?= $data["employee_jop"] ?> </h5>
    <p class="card-text">Rating is ( <?= $data["rate"] ?> ) from user name is : <?= $data["user_name"]?> </p>
  </div>
</div>
<?php } ?> 

</main><!-- End #main -->
<?php
include '../shared/script.php';
?>