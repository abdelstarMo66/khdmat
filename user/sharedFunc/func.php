<?php

function testMessage($condation, $message)
{
    if ($condation) {
        echo "<div class='mt-5 alert alert-info mx-auto w-50'>
<h3>  $message  </h3>
    </div>";
    } else {
        echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
        <h3>  $message Error </h3>
            </div>";
    }
}

function auth()
{
    if (isset($_SESSION['user'])) {
    } else {
        echo "not user";
        echo "<script>
        window.location.replace('http://localhost/khdmat/user/pages-login.php)
    </script>";
    }
}