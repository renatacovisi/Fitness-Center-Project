<?php
#Include the config file - configuration settings are available to the script
require_once("config.php");
require("../classes/Fee.php");

require_once(FIXED_PATH."/Fitness-Center-Project/classes/User.php");

$results = array();

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

if ($action != '' && $action != 'storeFormValues') {
    $results['allowedUserTypes'] = ['admin'];
    $results['redirectionLocation'] = WEB_URL_PREFIX . "/Fitness-Center-Project/public/registration.php";
}

$results['pageTitle'] = 'Sign up';
require('../app/views/header.php');

$results['showEditFeeForm'] = ($action == "showEditFeeForm" || $action == 'editFeePlan');

if (isset($_POST['saveUser']) and $action == 'storeFormValues') {
    $user = new User;

    $user->storeFormValues($_POST);
    $results['userSaved'] = $user->insert();
}


//initializes the id of a post that is being received from the browser for all interactions
$feeId = isset($_GET['id']) ? $_GET['id'] : "";

// Gets a fee by the id and assign it to a position on the results variable
$results['feePlanToEdit'] = Fee::getById($feeId);

// if the fee does not have an id it creates an empty object to help to handle it in the creation and edition
if ($results['feePlanToEdit'] == null) {
    $results['feePlanToEdit'] = new Fee();
}


// verify if the action is edit post and there is no id and display a message
if ($action == 'editFeePlan') {
    if ($results['feePlanToEdit']->id == null ) {
        $results['message'] = 'Fee Plan Not Found';
    }
//    if the there is an id stores the new values in the post object and update it
    else {
        $results['feePlanToEdit']->storeFormValues( $_POST );
        $results['feePlanToEdit']->update();
        $results['message'] = "Changes Saved!";
    }
}

$data = Fee::getList(3);
$results['plan'] = $data['results'];

?>

<main>

    <?php
    require(FIXED_PATH."/Fitness-Center-Project/public/admin/registration_edit.php");
    if (isset($results["userSaved"])) {
        ?>
        <div class="modal fade" id="savingFeeConfirmation" tabindex="-1" role="dialog"
             aria-labelledby="savingFeeConfirmation" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fColorIndigo">User Saved</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php if ($results["userSaved"]) { ?>
                    <p class="modal-body fColorIndigo">
                         'Your registration was done successfully!'
                    </p>
                    <?php }
                    else {?>
                    <p class="modal-body fColorIndigo">
                    An error occurred! Please Try Again!
                    </p>
                    <?php }?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <script>$('#savingFeeConfirmation').modal('show')</script>
    <?php } ?>
    <section class="jumbotron jumbotron-fluid rounded registration text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Registration</h1>
            <p class="lead">Register your membership and be part of our community.</p>
        </div>
    </section>

    <?php if ($user->type == 'admin') { ?>
        <div class="d-inline-block container-fluid">
            <!--                the button redirects the admin user to the add testimonial modal -->
            <a role="button" class="fColorIndigo btn btn-light m-1 ml-3 buttonSize float-right noShadow mr-5"
               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/registration.php?action=showEditFeeForm" ?>">Edit Fee Plans</a>
        </div>
    <?php } ?>

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
                                <h5 class="card-text font-weight-bold">€<?php echo $plan->price ?></h5>
                                <p class="card-text pricePeriod">monthly</p>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <section class="col-3 mt-5 mx-auto">
                <h3>Classes*</h3>
                <h4>Select your classes</h4>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Slow Vinyasa" name="class" id="SlowVinyasa">
                </div>
            </div>
            <label type="text" class="form-control" for="SlowVinyasa">Slow Vinyasa</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Power Vinyasa" name="class" id="PowerVinyasa">
                </div>
            </div>
            <label type="text" class="form-control" for="PowerVinyasa">Power Vinyasa</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Yin" name="class" id="Yin" >
                </div>
            </div>
            <label type="text" class="form-control" for="Yin">Yin</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Hatha Yoga" name="class" id="HathaYoga">
                </div>
            </div>
            <label type="text" class="form-control" for="HathaYoga">Hatha Yoga</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Pilates" name="class" id="Pilates">
                </div>
            </div>
            <label type="text" class="form-control" for="Pilates">Pilates</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Meditation" name="class" id="Meditation">
                </div>
            </div>
            <label type="text" class="form-control" for="Meditation">Meditation</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Pregnancy Yoga" name="class" id="PregnancyYoga">
                </div>
            </div>
            <label type="text" class="form-control" for="PregnancyYoga">Pregnancy Yoga</label>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" value="Zumba" name="class" id="Zumba">
                </div>
            </div>
            <label type="text" class="form-control" for="Zumba">Zumba</label>
        </div>
        </section>


        <h3 class="mt-5">Your details</h3>
        <div class="col-md-9">
            <label class="font-weight-bold mt-1" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
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


        <h3 class="mt-5">Create your password</h3>
        <div class="col-md-8">
            <label class="font-weight-bold mt-1" for="password">New password</label>
            <input type="password" class="form-control" id="password" name="password">
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
            <input type="password" class="form-control" id="securityCode" name="securityCode">
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
