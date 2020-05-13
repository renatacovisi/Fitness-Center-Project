<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title to be showed in the tab of the window-->
    <title>Login</title>
    <?php
    require('../app/views/common_head.php');
    ?>
</head>

<body class="backgroundColor">
<!-- header -->
<?php
require('../app/views/header.php');
?>

<main class="mx-3">
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded faqImage text-white">
        <div class="container">
            <h1 class="display-4 my-5 py-5">Login</h1>
        </div>
    </section>

    <section>
        <form class="col-md-6 mx-auto">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Your password must be 8-20 characters long, contain
                    letters and numbers, and must not contain spaces, special characters, or emoji.</small>

            </div>

            <button type="submit" class="fColorIndigo btn btn-light buttonSize mx-auto d-block  mt-5 mb-3">Sign in
            </button>
            <a href="#" class="d-flex justify-content-center my-3 fColorSilver">Forgot my password</a>
        </form>
    </section>

</main>
</body>
</html>