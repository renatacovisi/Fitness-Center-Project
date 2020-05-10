<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Specifying the charsert to be used and make sure special chars will apper ok-->
        <meta charset="utf-8">
        <!-- bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--title to be showed in the tab of the window-->
        <title>About Us</title>
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

        <main class="">
            <!-- jumbotron -->
            <section class="jumbotron jumbotron-fluid rounded aboutUsImage text-white">
                <div class="container">
                    <h1 class="display-4 mt-5 pt-5">About us</h1>
                    <p class="lead">We are a zen space that helps your mental and body health.
                    </p>
                </div>
            </section>

        <!-- text -->
            <section class="fColorSilver">
                <p>Two sisters venture to create a beautiful,  spacious fun loving community space for Students to Grow though Yoga. </p>
                <p>Our philosophy is simple – To teach yoga, to help you become open in both body & mind, to help you see your strengths, to help you find your inner spark, to help you become flexible in your life – both your body & mind, to give back, to believe in yourself, to open to possibilities and let yourself dance, to share our passion, love and knowledge of our practice and to show you that you can provide yourself a safe, supportive and comfortable community to do it with! </p>
                <p>We strive to provide daily varieties to include all body forms the spectrum of young to older, mobile to less mobile, pre & post natal ­ Yoga & Pilates for EveryBody. </p>
                <p>Sunrise Fitness Center comprises of 3 Bespoke studios!  Come take time for you, for your body and mind. Come grow with us, on your mat. to be curious, to open to, to discover, to feel, to explore, to release, to increase strength, and most of all to believe in your own wonderful potential.
                </p>
            </section>

        </main>

        <?php
         require('../app/views/footer.php');
        ?>
    </body>
  </html>
