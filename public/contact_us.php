<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us</title>
    <?php
    require('../app/views/common_head.php');
    ?>
</head>

<body class="backgroundColor">
    <?php
    require('../app/views/header.php');
    ?>

<main>
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

    <!--form-->
    <form action="contact_us.php" method="post">
        <div class="col-md-6 mx-auto">
            <label class="font-weight-bold mt-2" for="FormNameInput">Name</label>
            <input type="text" class="form-control" id="FormNameInput" placeholder="Name">
            <label class="font-weight-bold mt-3" for="FormEmailInput">E-mail</label>
            <input type="email" class="form-control" id="FormEmailInput" placeholder="your@name.com">
            <label class="font-weight-bold mt-3" for="FormPhoneNumberInput">Phone Number</label>
            <input type="text" class="form-control" id="FormPhoneNumberInput" placeholder="phone number">
            <label class="font-weight-bold mt-3" for="MessageInput">Message</label>
            <textarea class="form-control" id="MessageInput" rows="6"></textarea>
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
