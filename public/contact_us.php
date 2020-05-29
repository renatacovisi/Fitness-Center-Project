<?php
require_once("config.php");
require_once(FIXED_PATH."/Fitness-Center-Project/classes/ContactUs.php");

$results = Array();

$action = isset($_GET['action']) ? $_GET['action'] : '';

$messageId = isset($_GET['id']) ? $_GET['id'] : '';

$results['showSeeMessagesForm'] = $action == 'showSeeMessagesForm' || $action == 'deleteMessage' ;

$results['showMessageView'] = $action == 'seeMessage';


if ($action == 'sendMessage') {
    $message = new ContactUs();

    //store the values received in the post to the other variables
    $message->storeFormValues($_POST);

    //insert the values in the database and assign if the data was successfully uploaded or not

    if ($message->insert() == 'success') {
        $results['message'] = 'Message sent successfully';
    }
    else {
        $results['message'] = 'Failed to send message, please try again';
    }

}


// if the action is delete post and there is no id display a message,
if ($action == 'deleteMessage') {
    if ($messageId == '' ) {
        $results['message'] = 'Message Not Found';
    }
//    if there is an id retrieves it from the database, delete it and display a message
    else {
        $messageToDelete = ContactUs::getById($messageId);
        $messageToDelete->delete();
        $results['message'] = "Message Deleted!";
    }
}

// if the action is see message and there is no id display a message,
if ($action == 'seeMessage') {
    if ($messageId == '' ) {
        $results['message'] = 'Message Not Found';
    }
//    if there is an id retrieves it from the database, delete it and display a message
    else {
        $results['messageToSee'] = ContactUs::getById($messageId);
    }
}

$messages = ContactUs::getList(50);
$results['messagesList'] = isset($messages['results']) ? $messages['results'] : [];

$results['pageTitle'] = 'Contact us';
require('../app/views/header.php');
?>

<main>
    <?php
    require(FIXED_PATH."/Fitness-Center-Project/public/admin/contact_us_manage.php");
    ?>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded contact_us text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Contact us</h1>
            <p class="lead">Our costumer relationship channel is through our social
                networks or the contact form bellow. Do you have any suggestions, comments or questions?
                Contact us or visit our <a class="text-white " href="#"><u>Frequently Asked Questions</u></a> area.
                The answer to your questions may be there. </p>
        </div>
    </section>

    <?php if ($user->type == 'admin') { ?>
        <div class="d-inline-block container-fluid">
            <!--                the button redirects the admin user to the add testimonial modal -->
            <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php?action=showSeeMessagesForm" ?>">See messages</a>
        </div>
    <?php } ?>

    <?php if (isset($results['message']) and ($user->type == 'member' || $action == 'sendMessage') ) { ?>
        <p class="mt-5 mx-auto alert alert-primary"><?php echo $results['message'] ?></p>
    <?php } ?>
    <!--form-->
    <form action="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php?action=sendMessage"?>" method="post">
        <div class="col-md-6 mx-auto">
            <label class="font-weight-bold mt-2" for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">

            <label class="font-weight-bold mt-3" for="email">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="your@name.com" name="email">

            <label class="font-weight-bold mt-3" for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" placeholder="phone number" name="phone">

            <label class="font-weight-bold mt-2" for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">

            <label class="font-weight-bold mt-3" for="message">Message</label>
            <textarea class="form-control" id="message" rows="6" name="message"></textarea>

            <input type="submit" class="btn btn-dark mt-3" value="Submit">
        </div>
    </form>
</main>

<!-- require footer-->
<?php
require('../app/views/footer.php');
?>

</body>

</html>
