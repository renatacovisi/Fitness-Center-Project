<?php
//includes config

#Include the config file - configuration settings are available to the script
require('../../public/config.php');

//includes session
#Specifically for login, logout and upload, the session file is required directly, instead of via header.php since
#it is necessary to be able to redirect the user before sending actual html code (done by header.php) if the user
# does not have permissions or is already logged in or out.
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//if the user is already logged, redirect to index
if (isLoggedIn($user)) {
    header( "Location: " . WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php" );
    exit;
}

//sets an action
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

//sets the results variable
$results = array();

//if the user attempts a login it calls the login function
if ( $action == "tryLogin") {
    login($results);
}

//login function that receives by parameter the results variable
function login(&$results) {

//    gets the values of the email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

//    gets the user and verify if the password is the same - if yes sets the section and redirects to index
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

//function to verify if the user is logged
function isLoggedIn($user) {
    return $user->type == "admin" || $user->type == "member";
}

//sets the page title
$results['pageTitle'] = 'Login';
require(FIXED_PATH."/Fitness-Center-Project/app/views/header.php");
?>

<!--login form-->
<main>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded faqImage text-white">
        <div class="container">
            <h1 class="display-4 my-5 py-5">Login</h1>
        </div>
    </section>

    <section>
<!--        shows a message if there is an error-->
        <?php if ( isset( $results['errorMessage'] ) ) { ?>
            <div class="col-md-6 mx-auto"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>
<!--        sets the action to tryLogin when the form is submitted-->
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