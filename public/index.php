<?php
require_once("config.php");
//require post class to allow control posts transactions
require_once("../classes/Post.php");

//sets the action that is being received from the browser for all interactions
$action = isset($_GET['action']) ? $_GET['action'] : "";
//initializes the results variable with an array
$results = array();
//initializes the status message that is being received from the browser for all interactions
$status = isset($_GET['status']) ? $_GET['status'] : "";

//initializes the id of a post that is being received from the browser for all interactions
$postId = isset($_GET['id']) ? $_GET['id'] : "";

// Gets a pot by the id and assign it to a position on the results variable
$results['postToEdit'] = Post::getById($postId);

// if the post does not have an id it creates an empty post to help to handle it in the creation and edition
if ($results['postToEdit'] == null) {
    $results['postToEdit'] = new Post();
}

// indicates if the actions bellow are true or false to allow the modals to be open
$results['confirmLogout'] = $action == "confirmLogout";

$results['showEditPosts'] = ($action == "showEditPosts" || $action == 'savePostResult' || $action == 'editPost' || $action == 'deletePost' );

//$results['showEditCarousel'] = ($action == "showEditCarousel" || $action == 'savePostResult');

//verify if the upload and saving are ok and display information to the user
if ($action == 'savePostResult' and $status == 'uploadSuccess') {
    $results['message'] = "Changes Saved!";
} elseif ($action == 'savePostResult' and $status == 'uploadFailed') {
    $results['message'] = "An error occurred, please try again.";
}

//if ($action == 'saveCarouselResult' and $status == 'uploadSuccess') {
//    $results['message'] = "Changes Saved!";
//} elseif ($action == 'saveCarouselResult' and $status == 'uploadFailed') {
//    $results['message'] = "An error occurred, please try again.";
//}

// verify if the action is edit post and there is no id and display a message
if ($action == 'editPost') {
    if ($results['postToEdit']->id == null ) {
        $results['message'] = 'Post Not Found';
    }
//    if the there is an id stores the new values in the post object and update it
    else {
        $results['postToEdit']->storeFormValues( $_POST );
        $results['postToEdit']->update();
        $results['message'] = "Changes Saved!";
    }
}

// if the action is delete post and there is no id display a message,
if ($action == 'deletePost') {
    if ($postId == '' ) {
        $results['message'] = 'Post Not Found';
    }
//    if there is an id retrieves it from the database, delete it and display a message
    else {
        $postToDelete = Post::getById($postId);
        $postToDelete->delete();
        $results['message'] = "Post Deleted!";
    }
}

// displays the homepage
homePage($results);

// function to create the home page with the posts information
function homePage($results) {

//    stores the posts of type news in a variable and the type offers in another
    $data1 = Post::getList(2, "news");
    $data2 = Post::getList(2, "offers");

//    assign the values of each variable for a postion in the results array
    $results['news'] = $data1['results'];
    $results['offers'] = $data2['results'];

    $results['pageTitle'] = 'Home';

    //starts the display of the home page
    require("homePage.php");
}

?>