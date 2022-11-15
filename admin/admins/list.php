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

$select = "SELECT * FROM `admin`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delet = "DELETE FROM `admin` WHERE id=$id";
    $ss = mysqli_query($conn, $delet);
    go("admin/admins/list.php");
}
?>
<main id="main" class="main">
    
<?php foreach($s as $data){ ?>

    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <img src="/khdmat/admin/admins/upload/<?= $data["image"] ?>" class="card-img-top" width="60" height="170">
            <h5 class="card-title">Name: <?= $data["name"] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Job: <?= $data["job"] ?></h6>
            <p class="card-text">Email: <?= $data["email"] ?></p>
            <a href="/khdmat/admin/admins/list.php?delete=<?php echo $data['id'] ?>" class="card-link btn btn-danger">Delete</a>
        </div>
    </div>

<?php } ?>

</main><!-- End #main -->
<?php
include '../shared/script.php';
?>