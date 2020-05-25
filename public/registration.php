<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
#Include the config file - configuration settings are available to the script
require_once("$root/Fitness-Center-project/public/config.php");
    require("../classes/Fee.php");
    $data = Fee::getList(3);
    $results['feePlans'] = $data['results'];
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
    <section class="jumbotron jumbotron-fluid rounded registration text-white">
        <div class="container">
            <h1 class="display-4 mt-5 pt-5">Registration</h1>
            <p class="lead">Register your membership and be part of our community.</p>
        </div>
    </section>

    <form action="user.php?action=storeFormValues" method="post">

        <h3 class="mt-5">Plans</h3>
        <div class="card-deck">
            <div class="row">
                <?php foreach ($results['feePlans'] as $feePlan) { ?>
                <div class="col-6 col-md-4 d-flex align-items-stretch">
                    <div class="card mt-1 backgroundColorYellow fColorIndigo">
                        <div class="card-body text-center">
                            <input id=<?php echo $feePlan->name?> type="radio" value=<?php echo $feePlan->name?> name=<?php echo $feePlan->name?>>
                            <label class="inline font-weight-bold typeOfPlan" for="planTypeTree"><?php echo $feePlan->name?></label>
                            <p class="card-text"><?php echo $feePlan->text?></p>
                            <h5 class="card-text font-weight-bold"><?php echo $feePlan->price?></h5>
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
            <label class="font-weight-bold mt-1" for="userName">Name</label>
            <input type="text" class="form-control" id="userName">
            <label class="font-weight-bold mt-3" for="userSurname">Surname</label>
            <input type="text" class="form-control" id="userSurname">
            <label class="font-weight-bold mt-3" for="userPPS">PPS Number</label>
            <input type="text" class="form-control" id="userPPS">
            <label class="font-weight-bold mt-3" for="userDateOfBirthday">Date of birth</label>
            <input type="date" class="form-control" id="userDateOfBirthday" name="birthday">
            <label class="font-weight-bold mt-3" for="userPhone">Cellphone</label>
            <input type="tel" class="form-control" id="userPhone" name="phone">
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
        <h3 class="text-center mt-5">Upload an image for your profile</h3>
        <div class="m-2 col-md-6 mx-auto">
            <div class="profile text-center">
                <div class="photo">
                    <input type="file" accept="image/*">
                    <div class="photo__helper">
                        <div class="photo__frame">
                            <canvas class="photo__canvas backgroundColorYellow m-2"></canvas>
                            <div class="message">
                                <p class="message--mobile m-1">Tap here to select your picture.</p>
                                <button type="button" class="fColorIndigo btn btn-light buttonSize">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5">Create your password</h3>
        <div class="col-md-8">
            <label class="font-weight-bold mt-1" for="userPassword">New password</label>
            <input type="password" class="form-control" id="userPassword" name="userPassword">
<!--            <label class="font-weight-bold mt-2" for="repPwd">Confirm password</label>-->
<!--            <input type="password" class="form-control" id="repPwd" name="pwd">-->
<!--            <label class="font-weight-bold mt-2" for="message">Security message</label>-->
<!--            <input type="text" class="form-control" id="message" name="securityMessage"><br>-->
        </div>

<!--        <h3 class="mt-3">Card details</h3>-->
<!--        <div class="col-md-8">-->
<!--            <label class="font-weight-bold mt-1" for="cNum">Card</label>-->
<!--            <input type="text" class="form-control" id="cNum" name="cardnumber">-->
<!--            <label class="font-weight-bold mt-3" for="cName">Name </label>-->
<!--            <input type="text" class="form-control" id="cName" name="cardname">-->
<!--            <label class="font-weight-bold mt-3" for="secCode">Security code</label>-->
<!--            <input type="text" class="form-control" id="secCode" name="cvv">-->
<!--            <label class="font-weight-bold mt-3" for="expDAte">Expiration date</label>-->
<!--            <input type="date" class="form-control" id="expDate" name="expDAte">-->
            <input type="submit" class="btn btn-dark mt-3" value="Submit">
<!--        </div>-->

    </form>
</body>

<!-- require footer-->
<?php
require('../app/views/footer.php');
?>
</main>
</body>
</html>
