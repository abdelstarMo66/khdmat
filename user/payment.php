<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';


if (isset($_GET['booking'])) {
    $empId = $_GET['booking'];
    $userId = $_SESSION['userId'];
    $select = "SELECT * FROM `employees` where id =$empId  ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    if (isset($_POST['pay'])) {

        $insert = "INSERT INTO `orders` VALUES (NULL ,$userId ,$empId  )";
        $i = mysqli_query($conn, $insert);
        testMessage($i, "تم حجز الخدمه");
        header("LOCATION:/khdmat/user/");

    }
}
if ($_SESSION['user']) {

} else {
    header("location:/khdmat/user/pages-login.php");
}

?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info">Services Reservation</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                        <p>Worker Name<?php echo $row['name'] ?></p>
                            <label for="">Choose payment way</label>
                            <br>
                            <input type="radio" name="way"> Cash
                            <br>
                            <input type="radio" name="way"> Visa
                            <br>
                            <input type="radio" name="way"> Vodavone Cash
                            <br>
                            <button onclick="return confirm('are you sure !')" name="pay" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Pay Now </button>
                        </form>

                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>