<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Specifying the charsert to be used and make sure special chars will apper ok-->
        <meta charset="utf-8">
        <!-- bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--title to be showed in the tab of the window-->
        <title>Classes</title>
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
        
        <main class="mr-3 ml-3">
            <!-- jumbotron -->
            <section class="jumbotron jumbotron-fluid rounded classesImage text-white">
                <div class="container">
                    <h1 class="display-4 mt-5 pt-5">Classes</h1>
                    <p class="lead">We have different classes  to suit your necessities and help to find your health and mind balance.
                    </p>
                </div>
            </section>

            <!-- Cards -->
            <section>
            <div class="row">
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/side_plank.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize" >
                        <div class="card-body">
                            <h5 class="card-title">Hatha Yoga</h5>
                            <p class="card-text">You will get a gentle introduction to the most basic yoga postures.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/one_leg_up.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Pilates</h5>
                            <p class="card-text">Low-impact exercise that aims to strengthen muscles while improving postural alignment and flexibility.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/cobra.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Slow Vinyasa</h5>
                            <p class="card-text">Sequence of fluid, movement-intensive practices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/seated_heart.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Meditation</h5>
                            <p class="card-text">Training in awareness and getting a healthy sense of perspective.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 d-flex  my-2">
                    <img src="../app/images/two_legs_up.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Power Vinyasa</h5>
                            <p class="card-text">Invigorating, powerful, energetic form of yoga where participants move or “flow” from pose to pose.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/stratch_seated.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Pregnancy Yoga</h5>
                            <p class="card-text">Practice adapted for "moms to be" and is tailored to women in all trimesters.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 d-flex  my-2">
                    <img src="../app/images/tree.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Yin Yoga</h5>
                            <p class="card-text">Slow-paced style with seated postures that are held for longer periods of time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex my-2">
                    <img src="../app/images/hold_leg_up.svg" alt="class icon" class="backgroundColorYellow rounded classIconSizeClasses">
                    <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                        <div class="card-body">
                            <h5 class="card-title">Zumba</h5>
                            <p class="card-text">Dance inspired exercise classes.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            </section>
        </main>
    </body>
</html>
