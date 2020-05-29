<?php
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Page.php");

//verify if there is an allowed user set and if it is allowed to execute actions in the page, if not, redirects to index
if (isset($results['allowedUserTypes']) && !in_array($user->type, $results['allowedUserTypes'], true)) {
    $location = isset($results['redirectionLocation']) ? $results['redirectionLocation'] : WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php";
    header( "Location: " . $location );
    exit;
}

$pageName = isset($results['pageName']) ? $results['pageName'] : $results['pageTitle'];
$page = Page::getByName($pageName);

if (($page->minLevel == 'member' && $user->type == 'public') ||
    ($page->minLevel == 'admin' && $user->type != 'admin')) {
    $location = WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php";
    header( "Location: " . $location );
    exit;
}

//sets the page title
$pageTitle = isset($results['pageTitle']) ? $results['pageTitle'] . ' | Sunrise Fitness Center' : 'Sunrise Fitness Center';

$siteMapPages = Page::getListByUserLevel($user->type)['results'];
?>

<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title to be showed in the tab of the window-->
    <title><?php echo $pageTitle ?></title>
    <!--Specifying the charsert to be used and make sure special chars will apper ok-->
    <meta charset="utf-8">
    <!-- bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--Font Awesome kit to use icons-->
    <script src="https://kit.fontawesome.com/6756b41fc1.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <!--Use the styling css created in another file-->
    <link rel="stylesheet" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/app/css/style.css" ?>" type="text/css" /></head>
<body class="backgroundColor">
<!-- header-->

<header>
    <nav class="navbar navbar-expand-lg fixed-top shadow">

        <!-- logo -->
        <a class="navbar-brand" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php" ?>">
            <img id="logo"
                 src="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/app/images/logo_horizontal_larger_font_emb.svg" ?>"
                 alt="">
        </a>

        <!-- hamburger button using font awsome icon to change color -->
        <div class="d-block float-right">
            <button class="navbar-toggler border border-warning mr-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                <span><i id="hamburgerButton" class="fas fa-bars"></i></span>
            </button>
        </div>

        <!-- rest of the navbar -->
        <div class="collapse navbar-collapse sticky-top text-right mr-1 ml-3" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fColorYellow"
                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php" ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow"
                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/about_us.php" ?>">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow"
                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/class.php" ?>">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow"
                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php" ?>">Testimonials</a>
                </li>

                <!-- dropdown menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fColorYellow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Site map
                    </a>
                    <div class="dropdown-menu backgroundColor" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($siteMapPages as $page) {
                            if ($page->link == null) continue;
                            ?>
                            <a class="dropdown-item fColorYellow" href="<?php echo $page->link ?>"><?php echo $page->name ?></a>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php" ?>">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/our_team.php" ?>">Our Team</a>
                </li>
            </ul>
            <!-- buttons -->
            <div class="d-block float-right">
<!--                if the user is public, shows sing in and sign up, if the user is admin or member, shows logout-->
                <?php if ($user->type == "public") {?>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow"
                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/registration.php" ?>">Sign Up</a>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow"
                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/app/src/login.php" ?>">Sign In</a>
                <?php }
                else {?>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow"
                    href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/app/src/logout.php" ?>">Log out</a>


                <?php }?>
            </div>
        </div>
    </nav>
</header>
