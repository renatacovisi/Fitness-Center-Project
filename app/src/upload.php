<?php
//using real path to make easier to the scripts to find the other files
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
require_once("$root/Fitness-Center-project/public/config.php");
//require Post file to be able to control the uploads of images by the admin
require_once("$root/Fitness-Center-project/classes/Post.php");

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
}

//if (isset($_POST['submitCarousel']) ) {
//    $carousel = new Carousel;
//
//    $carousel->storeFormValues($_POST);
//    $carousel->insert();
//    $results['carouselSaved'] = true;
//}


//defines the next action to be done by the browser after finished the insertion
if ($action == 'savePost'){
    if ($results['postSaved'] == 'success') {
        header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadSuccess');
    }
    else {
        header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadFailed');
    }
}

//if ($action == 'saveCarousel') {
//    if ($results['carouselSaved'] == 'success') {
//        header('Location: /Fitness-Center-project/public/index?action=saveCarouselResult&status=uploadSuccess');
//    } else {
//        header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadFailed');
//    }
//}
?>
