<?php
require('config.php');
//sets page title
$results['pageTitle'] = 'FAQ';
require('../app/views/header.php');
?>

<main>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid rounded faqImage text-white">
        <div class="container">
            <h1 class="display-4 my-5 py-5">Frequently Asked Questions</h1>
        </div>
    </section>

    <!-- Questions -->
    <section>
        <button class="btn btn-secondary btn-lg btn-block my-2 text-left buttonMoreLines" type="button"
                data-toggle="collapse" data-target="#question1" aria-expanded="false" aria-controls="question1"> Which
            plans does Sunrise Fitiness Centre offer and how can I join?
            <i class="fas fa-caret-down float-right mt-1"></i>
        </button>

        <div class="collapse" id="question1">
            <p class="card card-body backgroundColor fColorSilver d-inline-block ">
                We have three plans with different number of classes that you can do.
                You can have more information in our <a class="fColorSilver" href="registration.php">registration</a>
                page.
            </p>
        </div>

        <button class="btn btn-secondary btn-lg btn-block my-2 text-left buttonMoreLines" type="button"
                data-toggle="collapse" data-target="#question2" aria-expanded="false" aria-controls="question2"> Can I
            change my plan to another option?
            <i class="fas fa-caret-down float-right mt-1"></i>
        </button>

        <div class="collapse" id="question2">
            <p class="card card-body backgroundColor fColorSilver d-inline-block">
                Yes, of course. You can change it in our <a class="fColorSilver" href="#">member</a> area.
            </p>
        </div>

        <button class="btn btn-secondary btn-lg btn-block my-2 text-left buttonMoreLines" type="button"
                data-toggle="collapse" data-target="#question3" aria-expanded="false" aria-controls="question3"> Can I
            transfer my plan to another person?
            <i class="fas fa-caret-down float-right mt-1"></i>
        </button>

        <div class="collapse" id="question3">
            <p class="card card-body backgroundColor fColorSilver d-inline-block">
                No, you can not. You can cancel your plan whenever you want, and the another person can register
                themselv directly on our <a class="fColorSilver" href="registration.php">registration</a> page.
            </p>
        </div>

        <button class="btn btn-secondary btn-lg btn-block my-2 text-left buttonMoreLines" type="button"
                data-toggle="collapse" data-target="#question4" aria-expanded="false" aria-controls="question4"> I
            cannot access my member area.
            <i class="fas fa-caret-down float-right mt-1"></i>
        </button>

        <div class="collapse" id="question4">
            <p class="card card-body backgroundColor fColorSilver d-inline-block">
                Try use the recuperation tool on the login page. If it does not work, <a class="fColorSilver"
                                                                                         href="contact_us.php">contact
                    us</a>.
            </p>
        </div>

        <button class="btn btn-secondary btn-lg btn-block my-2 text-left buttonMoreLines" type="button"
                data-toggle="collapse" data-target="#question5" aria-expanded="false" aria-controls="question5"> I did
            not find the answer I was searching for.
            <i class="fas fa-caret-down float-right mt-1"></i>
        </button>

        <div class="collapse" id="question5">
            <p class="card card-body backgroundColor fColorSilver d-inline-block">
                Please, send a message for us in our <a class="fColorSilver" href="contact_us.php">contact us</a> page.
            </p>
        </div>
    </section>
</main>
<!-- requires footer-->
<?php
require(FIXED_PATH."/Fitness-Center-Project/app/views/footer.php");
?>
</body>
</html>