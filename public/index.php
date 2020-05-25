<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
#Include the config file - configuration settings are available to the script
require_once("$root/Fitness-Center-project/public/config.php");

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$results = array();

if ( $action == "confirmLogout") {
    $results['confirmLogout'] = true;
}
else {
    $results['confirmLogout'] = false;
}

homePage($results);

function homePage($results)
{
    require("../classes/Post.php");

#calls the getList() method of the Article class
    $data1 = Post::getList(2, "news");
    $data2 = Post::getList(2, "offers");
#stores the results, along with the page title, in a $results associative array
#so the template can display them in the page
    $results['news'] = $data1['results'];
    $results['offers'] = $data2['results'];

    require("homePage.php");
}



?>


<!--//#check that the $_GET['action'] value exists by using isset-->
<!--//#If it doesn’t, we set the corresponding $action variable to an empty string ("")-->
<!--//#ternary operator provides a shorthand way of writing the if...else statements-->
<!--//#The ternary operator is represented by the question mark (?) symbol-->
<!--//#it takes three operands: a condition to check, a result for true, and a result for false.-->
<!--//$action = isset( $_GET['action'] ) ? $_GET['action'] : "";-->
<!--//#looks at the action parameter in the URL to determine which action to perform-->
<!--//#(display the archive, or view an article)-->
<!--//#If no action parameter is in the URL then the script displays the site homepage-->
<!--//switch ( $action ) {-->
<!--//    case 'archive':-->
<!--//        archive();-->
<!--//        break;-->
<!--//    case 'viewArticle':-->
<!--//        viewArticle();-->
<!--//        break;-->
<!--//    default:-->
<!--//        homepage();-->
<!--//}-->
<!--//-->
<!--//#displays a list of all the articles in the database-->
<!--//function archive() {-->
<!--//    $results = array();-->
<!--//    #calls the getList() method of the Article class-->
<!--//    $data = Article::getList();-->
<!--//    #stores the results, along with the page title, in a $results associative array-->
<!--//    #so the template can display them in the page-->
<!--//    $results['articles'] = $data['results'];-->
<!--//    $results['totalRows'] = $data['totalRows'];-->
<!--//    $results['pageTitle'] = "Article Archive | Widget News";-->
<!--//    #include the path to the template file to display the page.-->
<!--//    require( TEMPLATE_PATH . "/archive.php" );-->
<!--//}-->
<!--//#displays a single article page-->
<!--//function viewArticle() {-->
<!--//    #retrieves the ID of the article to display from the articleId URL parameter-->
<!--//    if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {-->
<!--//        homepage();-->
<!--//        return;-->
<!--//    }-->
<!--//-->
<!--//    $results = array();-->
<!--//    #calls the Article class’s getById() method to retrieve the article object-->
<!--//    #which it stores in the $results array for the template to use.-->
<!--//    $results['article'] = Article::getById( (int)$_GET["articleId"] );-->
<!--//    $results['pageTitle'] = $results['article']->title . " | Widget News";-->
<!--//    require( TEMPLATE_PATH . "/viewArticle.php" );-->
<!--//}-->
<!--//#displays the site homepage containing a list of up to HOMEPAGE_NUM_ARTICLES articles-->
<!--//#it passes HOMEPAGE_NUM_ARTICLES to the getList() method to limit the number of articles returned-->
<!--//function homepage() {-->
<!--//    $results = array();-->
<!--//    $data = Article::getList( HOMEPAGE_NUM_ARTICLES );-->
<!--//    $results['articles'] = $data['results'];-->
<!--//    $results['totalRows'] = $data['totalRows'];-->
<!--//    $results['pageTitle'] = "Widget News";-->
<!--//    require( TEMPLATE_PATH . "/homepage.php" );-->
<!--//}-->
<!--//-->
<!--//?>-->
