<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!--Specifying the charsert to be used and make sure special chars will apper ok-->
  <meta charset="utf-8">
  <!-- bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--title to be showed in the tab of the window-->
  <title>Registration</title>
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

    <form action="registration.php" method="post">

      <h3 class="mt-5">Plans</h3>
      <div class="card-deck">
        <div class="row">
          <div class="col-6 col-md-4 d-flex align-items-stretch">
            <div class="card mt-1 backgroundColorYellow fColorIndigo">
              <div class="card-body text-center">
                <input id="planTypeTree" type="radio" value="Tree" name="Plan" checked="Checked">
                <label class="inline font-weight-bold typeOfPlan" for="planTypeTree">Tree</label>
                <p class="card-text">Basic plan where you can choose 2 differente classes*</p>
                <h5 class="card-text font-weight-bold">€59,90</h5>
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

          <div class="col-6 col-md-4 d-flex align-items-stretch">
            <div class="card mt-1 backgroundColorYellow fColorIndigo">
              <div class="card-body text-center">
                <input id="planTypeLotus" type="radio" value="Lotus" name="Plan" checked="Checked">
                <label class="inline font-weight-bold typeOfPlan" for="planTypeLotus">Lotus</label>
                <p class="card-text">Medium plan where you can choose 4 differente classes*</p>
                <h5 class="card-text font-weight-bold">€89,90</h5>
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
                    <tr>
                      <td>Meditation</td>
                    </tr>
                    <tr>
                      <td>Pregnancy</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 d-flex align-items-stretch">
            <div class="card mt-1 backgroundColorYellow fColorIndigo">
              <div class="card-body text-center">
                <input id="planTypeButterfly" type="radio" value="Butterfly" name="Plan" checked="Checked">
                <label class="inline font-weight-bold typeOfPlan" for="planTypeButterfly">Butterfly</label>
                <p class="card-text">Unlimited plan where you can do all differente classes*</p>
                <h5 class="card-text font-weight-bold ">€129,90</h5>
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
                    <tr>
                      <td>Meditation</td>
                    </tr>
                    <tr>
                      <td>Pregnancy</td>
                    </tr>
                    <tr>
                      <td>Pilates</td>
                    </tr>
                    <tr>
                      <td>Zumba</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <h3 class="mt-5">Your details</h3>
      <div class="col-md-9">
        <label class="font-weight-bold mt-1" for="RegistrationNameInput">Name</label>
        <input type="text" class="form-control" id="RegistrationNameInput">
        <label class="font-weight-bold mt-3" for="FormSurnameInput">Surname</label>
        <input type="text" class="form-control" id="FormSurnameInput">
        <label class="font-weight-bold mt-3" for="FormPpsInput">PPS Number</label>
        <input type="text" class="form-control" id="FormPpsInput">
        <label class="font-weight-bold mt-3" for="birthday">Date of birth</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
        <label class="font-weight-bold mt-3" for="FormPhoneNumberInput">Cellphone</label>
        <input type="tel" class="form-control" id="FormPhoneNumberInput" name="phone">
      </div>

      <h3 class="text-center mt-5">Chose your classes</h3>
      <div class="container m-2 col-md-8 mx-auto">
        <table class="table table-bordered backgroundColorYellow fColorIndigo">
          <thead>
            <tr>
              <th>Option</th>
              <th>Class</th>
              <th>Time</th>
              <th>Teacher</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input id="typeOne" type="radio" value="SlowVinyasaClass" name="Plan" checked="Checked"></td>
              <td>Slow Vinyasa</td>
              <td>7h45</td>
              <td>Nance</td>
            </tr>
            <tr>
              <td><input id="typeTwo" type="radio" value="YinClass" name="Plan" checked="Checked"></td>
              <td>Yin</td>
              <td>10h30</td>
              <td>Audrey</td>
            </tr>
            <tr>
              <td><input id="typeThree" type="radio" value="PowerVinyasaClass" name="Plan" checked="Checked"></td>
              <td>Power Vinyasa</td>
              <td>8h00</td>
              <td>Zoe</td>
            </tr>
            <tr>
              <td><input id="typeFour" type="radio" value="HathaClass" name="Plan" checked="Checked"></td>
              <td>Hatha</td>
              <td>9h30</td>
              <td>Audrey</td>
            </tr>
          </tbody>
        </table>
      </div>

      <h3 class="text-center mt-5">Upload an image for your profile</h3>
      <div class="m-2 col-md-6 mx-auto">
        <div class="profile text-center">
          <div class="photo">
            <input type="file" accept="image/*">
            <div class="photo__helper">
              <div class= "photo__frame">
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
        <label class="font-weight-bold mt-1" for="pwd">New password</label>
        <input type="password"  class="form-control" id="pwd" name="pwd">
        <label class="font-weight-bold mt-2" for="repPwd">Confirm password</label>
        <input type="password"  class="form-control" id="repPwd" name="pwd">
        <label class="font-weight-bold mt-2" for="message">Security message</label>
        <input type="text"  class="form-control" id="message" name="securityMessage"><br>
      </div>

      <h3 class="mt-3">Card details</h3>
      <div class="col-md-8">
        <label class="font-weight-bold mt-1" for="cNum">Card</label>
        <input type="text" class="form-control" id="cNum" name="cardnumber">
        <label class="font-weight-bold mt-3" for="cName">Name </label>
        <input type="text" class="form-control" id="cName" name="cardname">
        <label class="font-weight-bold mt-3" for="secCode">Security code</label>
        <input type="text" class="form-control" id="secCode" name="cvv">
        <label class="font-weight-bold mt-3" for="expDAte">Expiration date</label>
        <input type="date" class="form-control" id="expDate" name="expDAte">
        <input type="submit" class="btn btn-dark mt-3" value="Submit">
      </div>

    </form>

    <!-- require footer-->
    <?php
    require('../app/views/footer.php');
    ?>

  </main>
</body>
</html>
