<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
#Include the config file - configuration settings are available to the script
require_once(FIXED_PATH."/Fitness-Center-project/public/config.php");
require("../classes/Fee.php");

require_once(FIXED_PATH."/Fitness-Center-project/classes/User.php");
$data = Fee::getList(3);
$results['plan'] = $data['results'];
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$results['formAction'] = $action;


if (isset($_POST['saveUser']) and $results['formAction'] == 'storeFormValues') {
    $user = new User;

    $user->storeFormValues($_POST);
    $user->insert();
    $results['userSaved'] = true;
}
?>


<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Team</title>
    <?php
    require('../app/views/common_head.php');
    ?>
</head>

<body class="backgroundColor">
<?php
require('../app/views/header.php');
?>

<main>

    <?php
    if (isset($results["userSaved"]) == true) {
        ?>
        <div class="modal fade" id="savingUserConfirmation" tabindex="-1" role="dialog"
             aria-labelledby="savingUserConfirmation" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fColorIndigo">User Saved</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <p class="modal-body fColorIndigo">
                        Your registration was done successfully!
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <script>$('#savingUserConfirmation').modal('show')</script>
    <?php } ?>
    <section class="jumbotron jumbotron-fluid rounded registration text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Registration</h1>
            <p class="lead">Register your membership and be part of our community.</p>
        </div>
    </section>

    <form action="registration.php?action=storeFormValues" method="post">

        <h3 class="mt-5">Plans</h3>
        <div class="card-deck">
            <div class="row">
                <?php foreach ($results['plan'] as $plan) { ?>
                    <div class="col-6 col-md-4 d-flex align-items-stretch">
                        <div class="card mt-1 backgroundColorYellow fColorIndigo">
                            <div class="card-body text-center">
                                <input id=<?php echo $plan->name ?> type="radio"
                                       value=<?php echo $plan->name ?> name="plan">
                                <label class="inline font-weight-bold typeOfPlan"
                                       for="<?php echo $plan->name ?>"><?php echo $plan->name ?></label>
                                <p class="card-text"><?php echo $plan->text ?></p>
                                <h5 class="card-text font-weight-bold"><?php echo $plan->price ?></h5>
                                <p class="card-text pricePeriod">monthly</p>
                                <table class="table table-borderless fColorIndigo">
                                    <thead>
                                    <tr>
                                        <th>Classes*</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Slow Vinyasa</td>
                                    </tr>
                                    <tr>
                                        <td>Power Vinyasa</td>
                                    </tr>
                                    <tr>
                                        <td>Yin</td>
                                    </tr>
                                    <tr>
                                        <td>Hatha</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <h3 class="mt-5">Your details</h3>
        <div class="col-md-9">
            <label class="font-weight-bold mt-1" for="name">Name</label>
            <input type="text" class="form-control" id="name", name="name">
            <label class="font-weight-bold mt-3" for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname">
            <label class="font-weight-bold mt-3" for="PPS">PPS Number</label>
            <input type="text" class="form-control" id="PPS" name="PPS">
            <label class="font-weight-bold mt-3" for="dateOfBirthday">Date of birth</label>
            <input type="date" class="form-control" id="dateOfBirthday" name="dateOfBirthday">
            <label class="font-weight-bold mt-3" for="phone">Cellphone</label>
            <input type="tel" class="form-control" id="phone" name="phone">
            <label class="font-weight-bold mt-3" for="email">E-mail</label>
            <input type="tel" class="form-control" id="email" name="email">
        </div>

        <!--        <h3 class="text-center mt-5">Chose your classes</h3>-->
        <!--        <div class="container m-2 col-md-8 mx-auto">-->
        <!--            <table class="table table-bordered backgroundColorYellow fColorIndigo">-->
        <!--                <thead>-->
        <!--                <tr>-->
        <!--                    <th>Option</th>-->
        <!--                    <th>Class</th>-->
        <!--                    <th>Time</th>-->
        <!--                    <th>Teacher</th>-->
        <!--                </tr>-->
        <!--                </thead>-->
        <!--                <tbody>-->
        <!--                <tr>-->
        <!--                    <td><input id="typeOne" type="radio" value="SlowVinyasaClass" name="Plan" checked="Checked"></td>-->
        <!--                    <td>Slow Vinyasa</td>-->
        <!--                    <td>7h45</td>-->
        <!--                    <td>Nance</td>-->
        <!--                </tr>-->
        <!--                <tr>-->
        <!--                    <td><input id="typeTwo" type="radio" value="YinClass" name="Plan" checked="Checked"></td>-->
        <!--                    <td>Yin</td>-->
        <!--                    <td>10h30</td>-->
        <!--                    <td>Audrey</td>-->
        <!--                </tr>-->
        <!--                <tr>-->
        <!--                    <td><input id="typeThree" type="radio" value="PowerVinyasaClass" name="Plan" checked="Checked"></td>-->
        <!--                    <td>Power Vinyasa</td>-->
        <!--                    <td>8h00</td>-->
        <!--                    <td>Zoe</td>-->
        <!--                </tr>-->
        <!--                <tr>-->
        <!--                    <td><input id="typeFour" type="radio" value="HathaClass" name="Plan" checked="Checked"></td>-->
        <!--                    <td>Hatha</td>-->
        <!--                    <td>9h30</td>-->
        <!--                    <td>Audrey</td>-->
        <!--                </tr>-->
        <!--                </tbody>-->
        <!--            </table>-->
        <!--        </div>-->
        <!---->
        <!--        <h3 class="text-center mt-5">Upload an image for your profile</h3>-->
        <!--        <div class="m-2 col-md-6 mx-auto">-->
        <!--            <div class="profile text-center">-->
        <!--                <div class="photo">-->
        <!--                    <input type="file" accept="image/*">-->
        <!--                    <div class="photo__helper">-->
        <!--                        <div class="photo__frame">-->
        <!--                            <canvas class="photo__canvas backgroundColorYellow m-2"></canvas>-->
        <!--                            <div class="message">-->
        <!--                                <p class="message--mobile m-1">Tap here to select your picture.</p>-->
        <!--                                <button type="button" class="fColorIndigo btn btn-light buttonSize">Upload</button>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

        <h3 class="mt-5">Create your password</h3>
        <div class="col-md-8">
            <label class="font-weight-bold mt-1" for="password">New password</label>
            <input type="password" class="form-control" id="password" name="password">
<!--            <label class="font-weight-bold mt-2" for="repPwd">Confirm password</label>-->
<!--            <input type="password" class="form-control" id="repPwd" name="pwd">-->
            <label class="font-weight-bold mt-2" for="securityMessage">Security message</label>
            <input type="text" class="form-control" id="securityMessage" name="securityMessage"><br>
        </div>

        <h3 class="mt-3">Card details</h3>
        <div class="col-md-8">
            <label class="font-weight-bold mt-1" for="card">Card</label>
            <input type="text" class="form-control" id="card" name="card">
            <label class="font-weight-bold mt-3" for="nameOnCard">Name </label>
            <input type="text" class="form-control" id="nameOnCard" name="nameOnCard">
            <label class="font-weight-bold mt-3" for="securityCode">Security code</label>
            <input type="text" class="form-control" id="securityCode" name="securityCode">
            <label class="font-weight-bold mt-3" for="expirationDate">Expiration date</label>
            <input type="date" class="form-control" id="expirationDate" name="expirationDate">
            <input type="submit" class="btn btn-dark mt-3" name="saveUser" value="Save User">
        </div>

    </form>
</body>

<!-- require footer-->
<?php
require('../app/views/footer.php');
?>
</main>
</body>
</html>
