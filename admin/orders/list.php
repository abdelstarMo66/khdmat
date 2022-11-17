<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `order_info`";
$s = mysqli_query($conn, $select);

?>
<main id="main" class="main">
  <?php foreach ($s as $data) { ?>

    <table class="table table-borderless" style="width:45%">
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:35%">Order</th>
                    <td class="table table-bordered table-info">
                      <?= $data["id"] ?>
                    </td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:35%">From User Name</th>
          <td class="table table-bordered table-info"><?= $data["user_name"] ?></td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:30%">User Email</th>
          <td class="table table-bordered table-info"><?= $data["user_email"] ?></td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:30%">User Address</th>
          <td class="table table-bordered table-info"><?= $data["user_address"] ?></td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:30%">User Phone</th>
          <td class="table table-bordered table-info"><?= $data["user_phone"] ?></td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:30%">To Worker Name</th>
          <td class="table table-bordered table-info"><?= $data["emp_name"] ?></td>
        </tr>
        <tr>
          <th scope="row" class="table table-bordered table-dark" style="width:30%">Work at</th>
          <td class="table table-bordered table-info"><?= $data["emp_filed"] ?></td>
        </tr>
      
    </table>

<?php } ?>


</main><!-- End #main -->
<?php
include '../shared/script.php';
?>