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
        <?php
        require('../app/views/header.php');
        ?>

        <main>
            <!-- Carousel -->
            <section id="carousel" class="carousel slide mb-4" data-ride="carousel">
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
                        <img class="d-block w-100" src="../app/images/carousel2-v2.jpg" alt="Second slide">
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

            <!-- Classes Icons -->
            <section class="mt-4">
                <h3 class="m-2">Classes</h3>
                <div class="row">

                    <div class="col-6 classesIconsPosition">
                        <div class="col-12 col-md-6 float-left p-0">
                            <img src="../app/images/cobra.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/hold_leg_up.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/one_leg_up.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/seated_heart.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                        </div>
                        <div class="col-12 col-md-6 float-left p-0">
                            <img src="../app/images/side_plank.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/stratch_seated.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/tree.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                            <img src="../app/images/two_legs_up.svg"
                                class="classesIconSize backgroundColorYellow float-left customMarginIcons">
                        </div>
                    </div>
                    <!-- Classes image and text -->
                    <div class="col-6 hero-image overlap">
                        <div class="hero-text shadow">
                            <h3>See all classes</h3>
                            <i class="fas fa-plus-circle"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features - News and Offers -->
            <section class="row">
                <div class="col-md-6 ">
                    <div class="row ml-1">
                        <h3>News</h3>
                    </div>
                    <div class="row">

                        <div class="col-6">
                            <div class="card m-1 backgroundColorYellow fColorIndigo">
                                <img src="../app/images/online-yoga.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Online Classes</h5>
                                    <p class="card-text cardHeight">Be with us every morning on our online classes to meditate and work out with us in this difficult times</p>
                                    <a href="#" class="btn btn-dark">Join Online</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card m-1 backgroundColorYellow fColorIndigo">
                                <img src="../app/images/yoga-park.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Yoga in the Park</h5>
                                    <p class="card-text cardHeight">On 13th february we will have a class on St Stephen's Green </p>
                                    <a href="#" class="btn btn-dark">See more</a>
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

                        <div class="col-6">
                            <div class="card m-1 backgroundColorYellow fColorIndigo">
                                <img  src="../app/images/free-trial.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Free Trial</h5>
                                    <p class="card-text cardHeight">Do your first class free!</p>
                                    <a href="#" class="btn btn-dark">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card m-1 backgroundColorYellow fColorIndigo">
                                <img src="../app/images/pilates.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title ">First month free</h5>
                                    <p class="card-text cardHeight">Ten first registered members will have first month free</p>
                                    <a href="#" class="btn btn-dark">Register now!</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php
        require('../app/views/footer.php');
        ?>

      </body>

</html>
