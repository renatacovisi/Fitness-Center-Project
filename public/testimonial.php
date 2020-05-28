<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/Fitness-Center-project/classes/Testimonial.php");
require_once("$root/Fitness-Center-project/public/config.php");

$results = Array();

$action = isset($_GET['action']) ? $_GET['action'] : '';

$results['showTestimonialForm'] = $action == 'showAddNewTestimonial' || $action == 'addTestimonial';

if ($action == 'addTestimonial') {
    $testimonial = new Testimonial();

    //store the values received in the post to the other variables
    $testimonial->storeFormValues($_POST);

    //insert the values in the database and assign if the data was successfully uploaded or not

    if ($testimonial->insert() == 'success') {
        $results['message'] = 'Testimonial created successfully';
    }
    else {
        $results['message'] = 'Failed to save testimonial, please try again';
    }

}

$results['testimonial'] = Testimonial::getList(50, "approved")['results'];;
?>


<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title to be showed in the tab of the window-->
    <title>Testimonials</title>
    <?php
    require('../app/views/common_head.php');
    ?>
</head>

<body class="backgroundColor">
<!-- header -->
<?php
require('../app/views/header.php');
?>

<main class="mr-3 ml-3">
    <?php
    require("$root/Fitness-Center-project/public/testimonial_add.php");
    ?>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded testimonialImage text-white">
        <div class="container">
            <h1 class="display-5 mt-5 pt-5">Testimonials</h1>
            <p class="lead">This space is to show how our community percieves our work.
                Thank you everyone!
            </p>
            <a type="button" class="fColorIndigo btn btn-light buttonSize" href="registration.php">Join Us</a>
        </div>
    </section>

    <!-- Testimonials Cards -->
    <section>
        <?php if ($user->type == 'member') { ?>
            <div class="d-inline-block container-fluid">
                <!--                the button redirects the admin user to the add testimonial modal -->
                <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
                   href="/Fitness-Center-Project/public/testimonial.php?action=showAddNewTestimonial">Add Testimonial</a>
            </div>
        <?php } ?>


        <?php foreach ($results['testimonial'] as $testimonial) { ?>
        <div class="d-flex my-2">
            <img src="../app/images/side_plank.svg" alt="class icon"
                 class="backgroundColorYellow rounded testimonialIconSizeClasses">
            <div class="card fColorSilver border-warning backgroundColor testimonialCardsSize">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $testimonial->title ?></h5>
                    <p class="card-text"><?php echo $testimonial->text ?> </p>
                    <p class="card-text"><?php echo $testimonial->className ?> </p>
                    <p class="card-text"><?php echo date("m-d-Y", $testimonial->creationDate) ?> </p>
                    <p><?php echo $testimonial->name ?></p>
                    <?php for ($i = 1; $i <= $testimonial->stars; $i++) { ?>
                    <span class="fa fa-star fa-lg checkedStar"></span>
                    <?php } ?>
                    <?php for ($i = $testimonial->stars+1; $i <= 5; $i++) { ?>
                    <span class="fa fa-star fa-lg"></span>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
</main>
<!--require footer-->
<?php
require('../app/views/footer.php');
?>
</body>
</html>
