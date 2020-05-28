<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
#Include the config file - configuration settings are available to the script
require_once("$root/Fitness-Center-project/public/config.php");
require("../classes/Class_.php");


$results = array();


$action = isset($_GET['action']) ? $_GET['action'] : "";
//initializes the results variable with an array

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


$results['showEditClassForm'] = ($action == "showCreateNewClass" || $action == 'saveClassResult' || $action == 'showEditClassForm' || $action == 'editClass' || $action == 'deleteClass' );

//verify if the upload and saving are ok and display information to the user
if ($action == 'saveClassResult' and $status == 'uploadSuccess') {
    $results['message'] = "Changes Saved!";
} elseif ($action == 'saveClassResult' and $status == 'uploadFailed') {
    $results['message'] = "An error occurred, please try again.";
}

// verify if the action is edit post and there is no id and display a message
if ($action == 'saveClassResult' || $action == 'editClass') {
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

$data1 = Class_::getList(8, 'Tree');
$data2 = Class_::getList(8, 'Lotus');
$data3 = Class_::getList(8, 'Butterfly');
$results['classes'] = array_merge($data1['results'], $data2['results'], $data3['results']);


?>



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
    <?php
    require("$root/Fitness-Center-project/public/admin/class_details_edit.php")
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
               href="/Fitness-Center-Project/public/class.php?action=showCreateNewClass">Create New</a>
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
                            <?php if ($user->type == 'admin' || $user->type == 'member') { ?>
                            <a class="float-right mx-1" href="/Fitness-Center-project/public/class_details.php?id=<?php echo $class->id ?>">
                                    <i class="fas fa-plus-circle fColorYellow"></i></a>
                            <?php }
                            if ($user->type == 'admin') { ?>
                                <a class="float-right mx-1" href="/Fitness-Center-project/public/class.php?action=showEditClassForm&id=<?php echo $class->id ?>">
                                    <i class="fas fa-edit fColorYellow"></i></a>
                                <a class="float-right mx-1" href="/Fitness-Center-project/public/class.php?action=deleteClass&id=<?php echo $class->id ?>"
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
