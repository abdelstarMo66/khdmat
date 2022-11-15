<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `note_info` ";
$s = mysqli_query($conn, $select);

?>
<main id="main" class="main">

<?php foreach ($s as $data) { ?>
<div class="card border-info mb-3" style="max-width: 18rem;">
  <div class="card-header">From User Name : <?= $data["user_name"] ?></div>
  <div class="card-body text-info">
    <p class="card-text"><?= $data["note"] ?></p>
  </div>
</div><?php } ?>

</main><!-- End #main -->
<?php
include '../shared/script.php';
?>