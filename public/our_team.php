<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
<!--Specifying the charsert to be used and make sure special chars will apper ok-->
<meta charset="utf-8">
<!-- bootstrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--title to be showed in the tab of the window-->
<title>Our Team</title>
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

    <main class="mr-1 ml-1 ">

    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded our_team text-white">
      <div class="container">
        <h1 class="display-4 mt-5 pt-5">Our Team</h1>
        <p class="lead">We are more than a team, we are family! Know our teachers.</p>
        <button type="button" class="fColorIndigo btn btn-dark m-1 ml-3 buttonSize">Join us</button>
      </div>
    </section>

    <!--card group-->
    <div class="card-group">
      <div class="row mr-1 ml-1 ">
        <div class="col-6 col-md-4 mt-1">
          <div class="card  backgroundColorYellow fColorIndigo">
            <img class="card-img-top" src="../app/images/our_team_audrey.jpg" alt="Audrey O'Connell">
            <div class="card-body">
              <h5 class="card-title">Audrey O'Connell</h5>
              <p class="cardHeightOurTeamP1"> Audrey completed her 200hrs YTT in Hatha yoga and has been mentored
                by senior Iyengar teacher, Orla Punch for the past three years.</p>
                <p class="cardHeightOurTeamP2">Audrey's classes are focused on alignment, strength and relaxation.</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 mt-1">
            <div class="card backgroundColorYellow fColorIndigo">
              <img class="card-img-top" src="../app/images/our_team_nance.jpg" alt="Nance McGowen">
              <div class="card-body">
                <h5 class="card-title">Nance McGowen</h5>
                <p class="cardHeightOurTeamP1">Nance has experience in many styles including Children's yoga, Restorative,
                  Ashtanga, Trauma Sensitive Yoga, and Yin yoga.</p>
                  <p class="cardHeightOurTeamP2">Nance's classes are focused on flexibility ad relaxation.</p>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 mt-1">
              <div class="card backgroundColorYellow fColorIndigo">
                <img class="card-img-top" src="../app/images/our_team_zoe.jpg" alt="Zoe Burke">
                <div class="card-body">
                  <h5 class="card-title">Zoe Burke</h5>
                  <p class="cardHeightOurTeamP1">Hailing from Australia, Zoe found Yoga and quickly fell in love. She moved
                    to Ireland and completed her 250hrs Yoga Teacher Training at Samadhi.</p>
                    <p class="cardHeightOurTeamP2">Zoe teaches a strong vinyasa practice.</p>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 mt-1">
                <div class="card backgroundColorYellow fColorIndigo">
                  <img class="card-img-top" src="../app/images/our_team_patrick.jpg" alt="Patrick Prince">
                  <div class="card-body">
                    <h5 class="card-title">Patrick Prince</h5>
                    <p class="cardHeightOurTeamP1">Patrick is a yoga and breath-work teacher. He took his teacher training in Goa,
                      India, studying the lineages of Hatha, Vinyasa and Therapeutic yoga.</p>
                      <p class="cardHeightOurTeamP2">Patrick's yoga classes are breath focused and based on alignment and conscious movement.</p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-4 mt-1">
                  <div class="card backgroundColorYellow fColorIndigo">
                    <img class="card-img-top" src="../app/images/our_team_paul.jpg" alt="Paul O'Brien">
                    <div class="card-body">
                      <h5 class="card-title">Paul O'Brien</h5>
                      <p class="cardHeightOurTeamP1">Paul spent his youth training in London. He began to train in India in 2004 where
                        he spent 2 years experiencing yoga as a way of life.</p>
                        <p class="cardHeightOurTeamP2">Paul's main practice there was in the Ashtanga Vinyasa tradition</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-4 mt-1">
                    <div class="card backgroundColorYellow fColorIndigo">
                      <img class="card-img-top" src="../app/images/our_team_julie.jpg" alt="Julie Lyane">
                      <div class="card-body">
                        <h5 class="card-title">Julie Lyane</h5>
                        <p class="cardHeightOurTeamP1">Julie originally qualified in Sports Therapy, Rehab and PT.
                          She completed her 250hrs YT Training with The Yoga Rooms in Dublin.</p>
                          <p class="cardHeightOurTeamP2">Julie's classes are energetic and challenging.</p>
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
