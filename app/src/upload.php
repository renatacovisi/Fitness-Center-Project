<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once("$root/Fitness-Center-project/public/config.php");
#Include the config file - configuration settings are available to the script
require_once("$root/Fitness-Center-project/classes/Post.php");

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST['submitPost']) ) {
    $post = new Post;
    $post->photoLink = '/Fitness-Center-Project/app/src/'. $target_file;

    $post->storeFormValues($_POST);
//    INCLUIR CONDICAO
    $post->insert();
    $results['postSaved'] = true;
}

//if (isset($_POST['submitCarousel']) ) {
//    $carousel = new Carousel;
//
//    $carousel->storeFormValues($_POST);
//    $carousel->insert();
//    $results['carouselSaved'] = true;
//}



if ($action == 'savePost' and $results['postSaved'] == true){
    header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadSuccess');
}
else {
    header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadFailed');
}

if ($action == 'saveCarousel' and $results['carouselSaved'] == true){
    header('Location: /Fitness-Center-project/public/index?action=saveCarouselResult&status=uploadSuccess');
}
else {
    header('Location: /Fitness-Center-project/public/index?action=savePostResult&status=uploadFailed');
}
?>
