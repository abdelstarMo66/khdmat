<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);
?>
<main id="main" class="main">
  <div class="pagetitle">
    <!-- <h1>عرض </h1> -->
    <nav>

    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-9 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>الاسم</th>
                <th>الرقم</th>
                <th>العنوان</th>
                <th>التخصص</th>
                <!-- <th>البطاقه</th> -->
                <th colspan="3">Actions</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['phone'] ?> </th>
                  <th> <?php echo $data['address'] ?> </th>
                  <th> <?php echo $data['filed'] ?> </th>
                  <th> <a class="btn btn-warning" href="/khdmat/admin/emps/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php
include '../shared/script.php';
?>