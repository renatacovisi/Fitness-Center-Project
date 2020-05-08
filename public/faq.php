<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Specifying the charsert to be used and make sure special chars will apper ok-->
        <meta charset="utf-8">
        <!-- bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--title to be showed in the tab of the window-->
        <title>FAQ</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!--Font Awesome kit to use icons-->
        <script src="https://kit.fontawesome.com/6756b41fc1.js" crossorigin="anonymous"></script>
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Alegreya|Lato&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
        <!--Use the styling css created in another file-->
        <link rel="stylesheet" href="../app/css/style.css" type="text/css" />
    </head>

    <body class="backgroundColor">
        <!-- header -->
        <?php 
        require('../app/views/header.php');
        ?>
        
        <main class="mr-3 ml-3">
            <!-- jumbotron -->
            <section class="jumbotron jumbotron-fluid rounded faqImage text-white">
                <div class="container">
                    <h1 class="display-4 my-5 py-5">Frequently Asked Questions</h1>
                </div>
            </section>

            <!-- Questions -->
            <section>
                    <button class="btn btn-secondary btn-lg btn-block my-2 text-left" type="button" data-toggle="collapse" data-target="#question1" aria-expanded="false" aria-controls="question1"> Which plans does Sunrise Fitiness Centre offer and how can I join?
                    <i class="fas fa-caret-down float-right mt-1"></i>
                    </button>
                    
                    <div class="collapse" id="question1">
                        <p class="card card-body backgroundColor fColorSilver d-inline-block">
                            We have three plans with different number of classes that you can do.
                            You can have more information in our <a href="registration.php">registration</a> page.
                        </p>
                    </div>
                    
                    <button class="btn btn-secondary btn-lg btn-block my-2 text-left" type="button" data-toggle="collapse" data-target="#question2" aria-expanded="false" aria-controls="question2"> Can I change my plan to another option?
                    <i class="fas fa-caret-down float-right mt-1"></i>
                    </button>
                    
                    <div class="collapse" id="question2">
                        <p class="card card-body backgroundColor fColorSilver d-inline-block">
                            Yes, of course. You can change it in our <a href="#">member</a> area.
                        </p>
                    </div>
                    
                    <button class="btn btn-secondary btn-lg btn-block my-2 text-left" type="button" data-toggle="collapse" data-target="#question3" aria-expanded="false" aria-controls="question3"> Can I transfer my plan to another person?
                    <i class="fas fa-caret-down float-right mt-1"></i>
                    </button>
                    
                    <div class="collapse" id="question3">
                        <p class="card card-body backgroundColor fColorSilver d-inline-block">
                            No, you can not. You can cancel your plan whenever you want, and the another person can register themselv directly on our <a href="registration.php">registration</a> page.
                        </p>
                    </div>
                    
                    <button class="btn btn-secondary btn-lg btn-block my-2 text-left" type="button" data-toggle="collapse" data-target="#question4" aria-expanded="false" aria-controls="question4"> I cannot access my member area.
                    <i class="fas fa-caret-down float-right mt-1"></i>
                    </button>
                    
                    <div class="collapse" id="question4">
                        <p class="card card-body backgroundColor fColorSilver d-inline-block">
                            Try use the recuperation tool on the login page. If it does not work, <a href="contact_us.php">contact us</a>.
                        </p>
                    </div>
                    
                    <button class="btn btn-secondary btn-lg btn-block my-2 text-left" type="button" data-toggle="collapse" data-target="#question5" aria-expanded="false" aria-controls="question5"> I did not find the answer I was searching for.
                    <i class="fas fa-caret-down float-right mt-1"></i>
                    </button>
                    
                    <div class="collapse" id="question5">
                        <p class="card card-body backgroundColor fColorSilver d-inline-block">
                            Please, send a message for us in our <a href="contact_us.php">contact us</a> page.
                        </p>
                    </div>
            </section>
        </main>
    </body>
</html>