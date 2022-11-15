<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `admin` VALUES (NULL , '$name' , '$password' , '$email','$job' , '$image_name')";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Insert To Admin");
}


?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info">Admin Add page </h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container text-center col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name :</label>
                                <input name="name" type="text" class="form-control" style="margin-bottom: 10px;">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input name="email" type="email" class="form-control"style="margin-bottom: 10px;">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input name="password" type="password" class="form-control"style="margin-bottom: 10px;">
                            </div>
                            <div class="form-group">
                                <label>Job :</label>
                                <input name="job" type="text" class="form-control" style="margin-bottom: 10px;">
                            </div>
                            <div class="form-group">
                                <label>Photo :</label>
                                <input name="image" type="file" class="form-control" style="margin-bottom: 20px;">
                            </div>
                            <button name="send" class="btn btn-info btn-block w-50 mx-auto" > Send Data </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include '../shared/script.php';
?>