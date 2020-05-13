<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Team</title>
    <?php
    require('../app/views/common_head.php');
    ?>
</head>

<body class="backgroundColor">
<?php
require('../app/views/header.php');
?>

<main>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded our_team text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Our Team</h1>
            <p class="lead">We are more than a team, we are family! Know our teachers.</p>
            <button type="button" class="fColorIndigo btn btn-light buttonSize">Join us</button>
        </div>
    </section>

    <!--card group-->
    <div class="card-group">
        <div class="row m-0">
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card  backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_audrey.jpg" alt="Audrey O'Connell">
                    <div class="card-body">
                        <h5 class="card-title">Audrey O'Connell</h5>
                        <p> Audrey completed her 200hrs YTT in Hatha yoga and has been mentored
                            by senior Iyengar teacher, Orla Punch for the past three years.</p>
                        <p>Audrey's classes are focused on alignment, strength and relaxation.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_nance.jpg" alt="Nance McGowen">
                    <div class="card-body">
                        <h5 class="card-title">Nance McGowen</h5>
                        <p>Nance has experience in many styles including Children's yoga, Restorative,
                            Ashtanga, Trauma Sensitive Yoga, and Yin yoga.</p>
                        <p>Nance's classes are focused on flexibility ad relaxation.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_zoe.jpg" alt="Zoe Burke">
                    <div class="card-body">
                        <h5 class="card-title">Zoe Burke</h5>
                        <p>Hailing from Australia, Zoe found Yoga and quickly fell in love. She moved
                            to Ireland and completed her 250hrs Yoga Teacher Training at Samadhi.</p>
                        <p>Zoe teaches a strong vinyasa practice.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_patrick.jpg" alt="Patrick Prince">
                    <div class="card-body">
                        <h5 class="card-title">Patrick Prince</h5>
                        <p>Patrick is a yoga and breath-work teacher. He took his teacher training in Goa,
                            India, studying the lineages of Hatha, Vinyasa and Therapeutic yoga.</p>
                        <p>Patrick's yoga classes are breath focused and based on alignment and conscious movement.</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_paul.jpg" alt="Paul O'Brien">
                    <div class="card-body">
                        <h5 class="card-title">Paul O'Brien</h5>
                        <p>Paul spent his youth training in London. He began to train in India in 2004 where
                            he spent 2 years experiencing yoga as a way of life.</p>
                        <p>Paul's main practice there was in the Ashtanga Vinyasa tradition</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 d-flex align-items-stretch p-2">
                <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_julie.jpg" alt="Julie Lyane">
                    <div class="card-body">
                        <h5 class="card-title">Julie Lyane</h5>
                        <p>Julie originally qualified in Sports Therapy, Rehab and PT.
                            She completed her 250hrs YT Training with The Yoga Rooms in Dublin.</p>
                        <p>Julie's classes are energetic and challenging.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!--require footer-->
<?php
require('../app/views/footer.php');
?>

</body>

</html>
