<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Specifying the charsert to be used and make sure special chars will apper ok-->
        <meta charset="utf-8">
        <!-- bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--title to be showed in the tab of the window-->
        <title>Testimonials</title>
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
        <!-- header -->
        <?php 
        require('../app/views/header.php');
        ?>
        
        <main class="mr-3 ml-3">
            <!-- jumbotron -->
            <section class="jumbotron jumbotron-fluid rounded testimonialImage text-white">
                <div class="container">
                    <h1 class="display-4 mt-5 pt-5">Testimonials</h1>
                    <p class="lead">This space is to show how our community percieves our work.
                        Thank you everyone!
                    </p>
                    <button type="button" class="fColorIndigo btn btn-light buttonSize">Join Us</button>
                </div>
            </section>

            <!-- Testimonials Cards -->
            <section>
                <div class="d-flex my-2">
                    <img src="../app/images/side_plank.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize" >
                        <div class="card-body">
                            <h5 class="card-title">Excelent classes</h5>
                            <p class="card-text">In this fast paced and sometimes unsettling world we live in coming to the Yoga center allows me to bring my mind, body and soul back into balance. </p>
                            <p>@MikeJr</p>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex my-2">
                    <img src="../app/images/one_leg_up.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Perfect for injuries</h5>
                            <p class="card-text">I returned to Yoga primarily because of a knee injury and an inability to perform high impact exercise. My knee is much improved and so is my body as a whole.</p>
                            <p>@JessM</p>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex my-2">
                    <img src="../app/images/cobra.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Good for health</h5>
                            <p class="card-text">After a hectic/stressful day, coming to Yoga is calming and restorative. Since I’ve been practicing I am much stronger have much greater range of motion.</p>
                            <p>@LukeY</p>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg"></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex my-2">
                    <img src="../app/images/seated_heart.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Love it</h5>
                            <p class="card-text">One of the most relaxing experiences I have ever felt while being able to melt into myself.</p>
                            <p>@JenS</p>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg checkedStar"></span>
                            <span class="fa fa-star fa-lg"></span>
                        </div>
                    </div>
                </div>            
            </section>
        </main>
        <!--require footer-->
        <?php
            require('../app/views/footer.php');
        ?>
    </body>
</html>
