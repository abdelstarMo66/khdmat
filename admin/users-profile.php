<?php
include 'allHead.php';
include './sharedFunc/func.php';
include './sharedFunc/db.php';

$id = $_SESSION['adminId'];
echo $id;
$select = "SELECT * FROM `admin` where id =$id ";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
echo $row['name'];
?>
<main id="main" class="main">

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="/khdmat/admin/admins/upload/<?php echo $_SESSION['image'] ?>" alt="Profile" class="rounded-circle">
            <h2><?php echo $row['name']; ?></h2>
            <h3><?php echo $row['job']; ?></h3>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include 'allUnder.php';
?>