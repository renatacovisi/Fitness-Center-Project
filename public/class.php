<?php

require_once("config.php");
require("../classes/Class_.php");


//initializes the results variable with an array
$results = array();

//sets the action
$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($action != '') {
    $results['allowedUserTypes'] = ['admin'];
    $results['redirectionLocation'] = WEB_URL_PREFIX . "/Fitness-Center-Project/public/class.php";
}

$results['pageTitle'] = 'Classes';
require('../app/views/header.php');


//initializes the status message that is being received from the browser for all interactions
$status = isset($_GET['status']) ? $_GET['status'] : "";

//initializes the id of a post that is being received from the browser for all interactions
$classId = isset($_GET['id']) ? $_GET['id'] : "";

// Gets a class by the id and assign it to a position on the results variable
$results['classToEdit'] = Class_::getById($classId);

// if the post does not have an id it creates an empty post to help to handle it in the creation and edition
if ($results['classToEdit'] == null) {
    $results['classToEdit'] = new Class_();
}

//if one of the actions is true, allows the edit class form modal to appear
$results['showEditClassForm'] = ($action == "showCreateNewClass" || $action == 'saveClassResult' || $action == 'showEditClassForm' || $action == 'editClass' || $action == 'deleteClass' );

//verify if the upload and saving are ok and display information to the user
if ($action == 'saveClassResult' and $status == 'uploadSuccess') {
    $results['message'] = "Changes Saved!";
} elseif ($action == 'saveClassResult' and $status == 'uploadFailed') {
    $results['message'] = "An error occurred, please try again.";
}

// verify if the action is edit post and there is no id and display a message
if ($action == 'editClass') {
    if ($results['classToEdit']->id == null ) {
        $results['message'] = 'Class Not Found';
    }
//    if the there is an id stores the new values in the post object and update it
    else {
        $results['classToEdit']->storeFormValues( $_POST );
        $results['classToEdit']->update();
        $results['message'] = "Changes Saved!";
    }
}

// if the action is delete post and there is no id display a message,
if ($action == 'deleteClass') {
    if ($classId == '' ) {
        $results['message'] = 'Class Not Found';
    }
//    if there is an id retrieves it from the database, delete it and display a message
    else {
        $classToDelete = Class_::getById($classId);
        $classToDelete->delete();
    }
}

//get the lists of all plans and puts them on one unique array
$data1 = Class_::getList(8, 'Tree');
$data2 = Class_::getList(8, 'Lotus');
$data3 = Class_::getList(8, 'Butterfly');
$results['classes'] = array_merge($data1['results'], $data2['results'], $data3['results']);

?>

<main>
    <?php
    require(FIXED_PATH."/Fitness-Center-Project/public/admin/class_details_edit.php")
    ?>
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

    <!--show the button to edit if the user is admin-->
    <?php if ($user->type == 'admin') { ?>
        <div class="d-inline-block container-fluid">
            <!--                the button redirects the admin user to the index, that redirects to the index_edit to show the edit modal-->
            <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/class.php?action=showCreateNewClass" ?>">Create New</a>
        </div>
    <?php } ?>

    <!-- Cards -->
    <section>
        <div class="row">
            <?php foreach ($results['classes'] as $class) { ?>
            <div class="col-sm-6 d-flex my-2">
                <img src="<?php echo $class->image ?>" alt="class icon"
                     class="backgroundColorYellow rounded classIconSizeClasses">
                <div class="card fColorSilver border-warning backgroundColor classesCardsSize">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $class->name ?>
<!--                            if the user is admin or member shows the class details button-->
                            <?php if ($user->type == 'admin' || $user->type == 'member') { ?>
                            <a class="float-right mx-1" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/class_details.php?id=".$class->id ?>">
                                    <i class="fas fa-plus-circle fColorYellow"></i></a>
                            <?php }
//                            if the user is admin, show edit class button
                            if ($user->type == 'admin') { ?>
                                <a class="float-right mx-1" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/class.php?action=showEditClassForm&id=".$class->id ?>">
                                    <i class="fas fa-edit fColorYellow"></i></a>
                                <a class="float-right mx-1" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/class.php?action=deleteClass&id=".$class->id ?>"
                                   onclick="return confirm('Delete This Class?')">
                                    <i class="fas fa-trash-alt fColorYellow"></i></a>



                            <?php } ?></h5>

                        <p class="card-text"><?php echo $class->shortDescription ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php
require('../app/views/footer.php');
?>

</body>
</html>
