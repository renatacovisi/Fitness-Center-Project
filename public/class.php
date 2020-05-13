<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title to be showed in the tab of the window-->
    <title>Classes</title>

    <!-- common head -->
    <?php
    require('../app/views/common_head.php');
    ?>

</head>

<body class="backgroundColor">
<!-- header -->
<?php
require('../app/views/header.php');
?>

<main class="">
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded classesImage text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Classes</h1>
            <p class="lead">We have different classes to suit your necessities and help to find your health and mind
                balance.
            </p>
            <a type="button" class="fColorIndigo btn btn-light buttonSize" href="registration.php">Join Us</a>
        </div>
    </section>

    <!-- Cards -->
    <section>
        <div class="row">
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/side_plank.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Hatha Yoga</h5>
                        <p class="card-text">You will get a gentle introduction to the most basic yoga postures.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/one_leg_up.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Pilates</h5>
                        <p class="card-text">Low-impact exercise that aims to strengthen muscles while improving
                            postural alignment and flexibility.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/cobra.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Slow Vinyasa</h5>
                        <p class="card-text">Sequence of fluid, movement-intensive practices.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/seated_heart.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
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
                <img src="../app/images/two_legs_up.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Power Vinyasa</h5>
                        <p class="card-text">Invigorating, powerful, energetic form of yoga where participants move or
                            “flow” from pose to pose.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/stratch_seated.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Pregnancy Yoga</h5>
                        <p class="card-text">Practice adapted for "moms to be" and is tailored to women in all
                            trimesters.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 d-flex  my-2">
                <img src="../app/images/tree.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title">Yin Yoga</h5>
                        <p class="card-text">Slow-paced style with seated postures that are held for longer periods of
                            time.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 d-flex my-2">
                <img src="../app/images/hold_leg_up.svg" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
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

<?php
require('../app/views/footer.php');
?>

</body>

</html>
