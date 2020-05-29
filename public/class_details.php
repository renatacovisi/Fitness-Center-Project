<?php
require_once("config.php");
require(FIXED_PATH."/Fitness-Center-Project/classes/Class_.php");
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//get the id of the class
$id= isset($_GET['id']) ? $_GET['id'] : "";

//get the Class_ object with getById method
$classToShow = Class_::getById($id);

//sets the page title
$results['pageTitle'] = $classToShow->name;
require('../app/views/header.php');
?>

<main>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded classesImage text-white">
        <div class="container">
<!--            populate the page with the details of the class-->
            <h1 class="display-4 mt-5 pt-5"><?php echo $classToShow->name?></h1>
            <p class="lead"><?php echo $classToShow->shortDescription?>
            </p>
            <a type="button" class="fColorIndigo btn btn-light buttonSize" href="registration.php">Join Us</a>
        </div>
    </section>
    <section>
        <div class="d-flex my-2">
            <img src="<?php echo $classToShow->image ?>" alt="class icon"
                 class="backgroundColorYellow rounded classIconSizeClasses">
            <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                <div class="card-body">
                    <h5 class="card-title">Details</h5>
                    <p class="card-text"><?php echo $classToShow->longDescription ?></p>
                    <h5 class="card-title">Time</h5>
                    <p class="card-text"><?php echo $classToShow->timetable ?></p>
                    <a type="button" class="fColorIndigo btn btn-light buttonSize" href="<?php echo $classToShow->externalLink ?>">See more</a>

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
