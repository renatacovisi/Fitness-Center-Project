<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Specifying the charsert to be used and make sure special chars will apper ok-->
    <meta charset="utf-8">
    <!-- bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--title to be showed in the tab of the window-->
    <title>Home</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--Font Awesome kit to use icons-->
    <script src="https://kit.fontawesome.com/6756b41fc1.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya|Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <!--Use the styling css created in another file-->
    <link rel="stylesheet" href="../app/css/style.css" type="text/css" />
</head>

<body class="backgroundColor">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top shadow">
            <div class="col-2">
                <a class="navbar-brand" href="#"><img id="logo" src="../app/images/logo.svg" alt=""></a>
            </div>
            <div class="col-10">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sticky-top text-right" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="aboutUs.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="classes.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="testimonials.php">Testimonials</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fColorYellow" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Site map
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item fColorYellow" href="index.php">Home</a>
                            <a class="dropdown-item fColorYellow" href="aboutUs.php">About us</a>
                            <a class="dropdown-item fColorYellow" href="faq.php">FAQ</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="contacts.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fColorYellow" href="gallery.php">Gallery</a>
                    </li>
                </ul>
                <div class="inlineBlock float-right">
                    <button type="button" class="fColorIndigo btn btn-light m-1 ml-3 inlineBlock buttonSize">Sign
                        Up</button>
                    <button type="button" class="fColorIndigo btn btn-light m-1 ml-3 inlineBlock buttonSize">Sign
                        In</button>
                </div>
            </div>
        </div>
        </nav>
    </header>

    <main>
        <!-- Carousel -->
        <section id="carousel" class="carousel slide" data-ride="carousel">
            <!-- slide icons -->
            <ul class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ul>
            <!-- carousel images and captions -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 bluring" src="../app/images/carousel1_1000_660.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="shadow">Yoga for everyone</h2>
                        <p class="shadow">Start your practice now!</p>
                        <button type="button" class="fColorIndigo btn btn-light buttonSize">Join Us</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../app/images/carousel2_1000_660.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="shadow">Our community is waiting for you</h2>
                        <p class="shadow">Our members and teachers are always happy to see our community grow up</p>
                        <button type="button" class="fColorIndigo btn btn-light buttonSize">Join Us</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../app/images/carousel3_1000_660.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="shadow">Classes</h2>
                        <p class="shadow">Our classes have prepared teachers to help you find your own balance</p>
                        <button type="button" class="fColorIndigo btn btn-light buttonSize">Join Us</button>
                    </div>
                </div>
            </div>
            <!-- carousel buttons to pass slides -->
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </section>


        <section class="backgroundColor">
            <h3 class="m-2">Classes</h3>
            <div class="row">

                <div class="col-6">
                    <div class="col-12 col-md-6 float-left p-0">
                        <img src="../app/images/cobra.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/hold_leg_up.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/one_leg_up.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/seated_heart.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                    </div>
                    <div class="col-12 col-md-6 float-left p-0">
                        <img src="../app/images/side_plank.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/stratch_seated.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/tree.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                        <img src="../app/images/two_legs_up.svg"
                            class="classesIconSize backgroundColorYellow float-left customMargin">
                    </div>
                </div>
                <div class="col-6">
                    <p>See all classes</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
            </div>
        </section>


        <section class="row">
            <div class="col-md-6 ">
                <div class="row ml-1">
                    <h3>News</h3>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <img class="card-img-top" src="../app/images/online-yoga.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Quarentine Online Classes</h5>
                                <p class="card-text">Be with us every morning on our online classes to meditate and work out with us in this difficult times</p>
                                <a href="#" class="btn btn-dark">Join Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <img class="card-img-top" src="../app/images/online-yoga.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="row ml-1">
                    <h3>Offers</h3>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <img class="card-img-top" src="../app/images/online-yoga.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <img class="card-img-top" src="../app/images/online-yoga.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-dark">Go somewhere</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>