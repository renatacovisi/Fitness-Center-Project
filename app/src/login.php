<?php

require('../../public/config.php');

require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");
#Include the config file - configuration settings are available to the script


if (isLoggedIn($user)) {
    header( "Location: " . WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php" );
    exit;
}

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$results = array();

if ( $action == "tryLogin") {
    login($results);
}

function login(&$results) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = User::getByEmail($email, connect());
    if (isset($user) and $user->password == $password) {
        $_SESSION['userEmail'] = $email;
        header( "Location: " . WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php" );
    }
    else {
        // Login failed: display an error message to the user
        $results['errorMessage'] = "Incorrect username or password. Please try again.";

    }
}

function isLoggedIn($user) {
    return $user->type == "admin" || $user->type == "member";
}
?>
<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title to be showed in the tab of the window-->
    <title>Login</title>
    <?php
    require(FIXED_PATH."/Fitness-Center-Project/app/views/common_head.php");
    ?>
</head>

<body class="backgroundColor">
<!-- header -->
<?php
require(FIXED_PATH."/Fitness-Center-Project/app/views/header.php");
?>




<!--login form-->

<main class="mx-3">
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded faqImage text-white">
        <div class="container">
            <h1 class="display-4 my-5 py-5">Login</h1>
        </div>
    </section>

    <section>
        <?php if ( isset( $results['errorMessage'] ) ) { ?>
            <div class="col-md-6 mx-auto"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>
        <form class="col-md-6 mx-auto" action="login.php?action=tryLogin" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <small id="emailHelp" class="form-text text-muted">Your password must be 8-20 characters long, contain
                    letters and numbers, and must not contain spaces, special characters, or emoji.</small>

            </div>

            <button type="submit" class="fColorIndigo btn btn-light buttonSize mx-auto d-block  mt-5 mb-3">Sign in
            </button>
            <a href="#" class="d-flex justify-content-center my-3 fColorSilver">Forgot my password</a>
        </form>
    </section>

</main>
<!-- requires footer-->
<?php
require(FIXED_PATH."/Fitness-Center-Project/app/views/footer.php");
?>
</body>
</html>