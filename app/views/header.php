<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once("$root/Fitness-Center-project/app/src/session.php");

?>



<header>
    <nav class="navbar navbar-expand-lg fixed-top shadow">

        <!-- logo -->
        <a class="navbar-brand" href="index.php"><img id="logo" src="/Fitness-Center-Project/app/images/logo_horizontal_larger_font_emb.svg" alt=""></a>

        <!-- hamburger button using font awsome icon to change color -->
        <div class="d-block float-right">
            <button class="navbar-toggler border border-warning mr-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                <span><i id="hamburgerButton" class="fas fa-bars"></i></span>
            </button>
        </div>

        <!-- rest of the navbar -->
        <div class="collapse navbar-collapse sticky-top text-right mr-2 ml-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="about_us.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="class.php">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="testimonial.php">Testimonials</a>
                </li>

                <!-- dropdown menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fColorYellow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Site map
                    </a>
                    <div class="dropdown-menu backgroundColor" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item fColorYellow" href="index.php">Home</a>
                        <a class="dropdown-item fColorYellow" href="about_us.php">About us</a>
                        <a class="dropdown-item fColorYellow" href="class.php">Classes</a>
                        <a class="dropdown-item fColorYellow" href="faq.php">FAQ</a>
                        <a class="dropdown-item fColorYellow" href="testimonial.php">Testimonials</a>
                        <a class="dropdown-item fColorYellow" href="contact_us.php">Contact Us</a>
                        <a class="dropdown-item fColorYellow" href="registration.php">Registration</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="contact_us.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fColorYellow" href="gallery.php">Gallery</a>
                </li>
            </ul>
            <!-- buttons -->
            <div class="d-block float-right">
                <?php if ($user->type == "public") {?>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow" href="registration.php">Sign Up</a>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow" href="/Fitness-Center-Project/app/src/login.php">Sign In</a>
                <?php }
                else {?>
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 d-block buttonSize noShadow"
                    href="/Fitness-Center-Project/app/src/logout.php">Log out</a>


                <?php }?>
            </div>
        </div>
    </nav>
</header>
