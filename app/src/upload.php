<?php
//require config file
require('../../public/config.php');
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");

#So far only admins can upload images to the server for posts and classes
if($user->type != 'admin') {
    header( "Location: " . WEB_URL_PREFIX . "/Fitness-Center-Project/public/index.php" );
    exit;
}

//require Post file to be able to control the uploads of images by the admin
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Post.php");

require_once(FIXED_PATH."/Fitness-Center-Project/classes/Class_.php");

// Setting the action to be done by this controller
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

//file upload management
//set the directory to upload the files
$target_dir = "uploads/";
//set the name of the file to be uploaded coming from the index_edit.php
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//set a sentinel variable to help control the upload
$uploadOk = 1;
//set the file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
//        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }
}

//receives the submission with the file and with t
if (isset($_POST['submitPost'])) {
    // create a new Post object
    $post = new Post;
    //assign the link received to the post photo link
    $post->photoLink = '/Fitness-Center-Project/app/src/'. $target_file;

    //store the values received in the post to the other variables
    $post->storeFormValues($_POST);

    //insert the values in the database and assign if the data was successfully uploaded or not
    $results['postSaved'] = $post->insert() == 'success';
    if ($results['postSaved'] == 'success') {
        header('Location: ' . WEB_URL_PREFIX . '/Fitness-Center-Project/public/index?action=savePostResult&status=uploadSuccess');
    }
    else {
        header('Location: ' . WEB_URL_PREFIX . '/Fitness-Center-Project/public/index?action=savePostResult&status=uploadFailed');
    }
}

//receives the submission with the file and with t
if (isset($_POST['submitClass'])) {
    // create a new Post object
    $class = new Class_;
    //assign the link received to the post photo link
    $class->image = '/Fitness-Center-Project/app/src/'. $target_file;

    //store the values received in the post to the other variables
    $class->storeFormValues($_POST);

    //insert the values in the database and assign if the data was successfully uploaded or not
    $results['classSaved'] = $class->insert() == 'success';
    if ($results['classSaved'] == 'success') {
        header('Location: ' . WEB_URL_PREFIX . '/Fitness-Center-Project/public/class.php?action=saveClassResult&status=uploadSuccess');
    }
    else {
        header('Location: ' . WEB_URL_PREFIX . '/Fitness-Center-Project/public/class.php?action=saveClassResult&status=uploadFailed');
    }
}

?>

