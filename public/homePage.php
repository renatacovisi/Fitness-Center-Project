<?php
require('../app/views/header.php');
?>

<main>
    <!--  requires the index_edit file to be used later  -->
    <?php
    require('../public/admin/index_edit.php');
    // Modal to be shown when the user logs out of the system called after the logout done on the header
    if (isset($results["confirmLogout"]) and $results["confirmLogout"] == true) {
        ?>
        <div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <p class="modal-body fColorIndigo">
                        You logged out successfully!
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <script>$('#logoutConfirmation').modal('show')</script>
    <?php } ?>

    <!-- Carousel -->
    <section id="carousel" class="carousel slide mb-4" data-ride="carousel">

        <!-- slide icons -->
        <ul class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ul>
        <!-- carousel images and captions -->
        <div class="carousel-inner overlappedCarousel">

            <div class="carousel-item active">

                <img class="d-block w-100 bluring" src="../app/images/carousel1_1000_660.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">

                    <h2 class="shadow">Yoga for everyone</h2>
                    <p class="shadow">Start your practice now!</p>
                    <a role="button" class="fColorIndigo btn btn-light buttonSize" href="registration.php">Join Us</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../app/images/carousel2-v2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="shadow">Our community is waiting for you</h2>
                    <p class="shadow">Our members and teachers are always happy to see our community grow up</p>
                    <a type="button" class="fColorIndigo btn btn-light buttonSize" href="registration.php">Join Us</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../app/images/carousel3_1000_660.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="shadow">Classes</h2>
                    <p class="shadow">Our classes have prepared teachers to help you find your own balance</p>
                    <a type="button" class="fColorIndigo btn btn-light buttonSize" href="class.php">See classes</a>
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
                    <a href="class.php"><i class="fas fa-plus-circle fColorYellow"></i></a>
                </div>
            </div>
        </div>
        <!--show the button to edit if the user is admin-->
        <?php if ($user->type == 'admin') { ?>
            <div class="d-inline-block container-fluid">
<!--                the button redirects the admin user to the index, that redirects to the index_edit to show the edit modal-->
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php?action=showEditPosts" ?>">Edit</a>
            </div>
        <?php } ?>
    </section>

    <!-- Features - News and Offers -->
    <section class="row">
        <div class="col-md-6 ">
            <div class="row ml-1">
                <h3>News</h3>
            </div>
            <div class="row">

                <!-- a for each loop to make the news feature be populated (two records are retrieved from the database)-->
                <?php foreach ($results['news'] as $article) { ?>
                    <div class="col-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <!-- populate the photo of each article -->
                            <img src=<?php echo $article->photoLink ?> alt="Card image cap">
                            <div class="card-body">
                                <!-- populate the title of each article -->
                                <h5 class="card-title"><?php echo $article->title ?></h5>
                                <!-- populate the text of each article -->
                                <p class="card-text cardHeight"><?php echo $article->text ?></p>
                                <!-- populate the link and the buttons of each article -->
                                <a href=<?php echo $article->link ?> class="btn
                                   btn-dark"><?php echo $article->buttonText ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="row ml-1">
                <h3>Offers</h3>
            </div>
            <div class="row">

                <!-- one more loop because we have two different features here, derived both from the post class-->
                <!-- a for each loop to make the news feature be populated (two records are retrieved from the database)-->
                <?php foreach ($results['offers'] as $article) { ?>
                    <div class="col-6">
                        <div class="card m-1 backgroundColorYellow fColorIndigo">
                            <!-- populate the photo of each article -->
                            <img src=<?php echo $article->photoLink ?> alt="Card image cap">
                            <div class="card-body">
                                <!-- populate the title of each article -->
                                <h5 class="card-title"><?php echo $article->title ?></h5>
                                <!-- populate the text of each article -->
                                <p class="card-text cardHeight"><?php echo $article->text ?></p>
                                <!-- populate the link and the buttons of each article -->
                                <a href=<?php echo $article->link ?> class="btn
                                   btn-dark"><?php echo $article->buttonText ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<!-- requires the foot-->
<?php
require('../app/views/footer.php');
?>

</body>

</html>

