<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Testimonial.php");
require_once(FIXED_PATH."/Fitness-Center-Project/public/config.php");

$results = Array();

$action = isset($_GET['action']) ? $_GET['action'] : '';

$testimonialId = isset($_GET['id']) ? $_GET['id'] : '';

$results['showTestimonialForm'] = $action == 'showAddNewTestimonial' || $action == 'addTestimonial';

$results['showApproveTestimonialForm'] = $action == 'showApproveTestimonialForm' || $action == 'approveTestimonial' || $action == 'deleteTestimonial' ;

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

if ($action == 'approveTestimonial') {
    $testimonial = Testimonial::getById($testimonialId);

    //store the values received in the post to the other variables
    $testimonial->approval = 'approved';

    //insert the values in the database and assign if the data was successfully uploaded or not

    if ($testimonial->update() == 'success') {
        $results['message'] = 'Testimonial updated successfully';
    }
    else {
        $results['message'] = 'Failed to update testimonial, please try again';
    }

}

// if the action is delete post and there is no id display a message,
if ($action == 'deleteTestimonial') {
    if ($testimonialId == '' ) {
        $results['message'] = 'Testimonial Not Found';
    }
//    if there is an id retrieves it from the database, delete it and display a message
    else {
        $testimonialToDelete = Testimonial::getById($testimonialId);
        $testimonialToDelete->delete();
        $results['message'] = "Testimonial Deleted!";
    }
}

$results['testimonial'] = Testimonial::getList(50, "approved")['results'];
$results['pendingTestimonials'] = Testimonial::getList(50, "pending")['results'];;
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
    require(FIXED_PATH."/Fitness-Center-Project/public/testimonial_add.php");
    require(FIXED_PATH."/Fitness-Center-Project/public/admin/testimonial_manage.php");
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
                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php?action=showAddNewTestimonial" ?>">Add Testimonial</a>
            </div>
        <?php } ?>
        <?php if ($user->type == 'admin') { ?>
        <div class="d-inline-block container-fluid">
            <!--                the button redirects the admin user to the add testimonial modal -->
            <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php?action=showApproveTestimonialForm" ?>">Approve Testimonials</a>
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
