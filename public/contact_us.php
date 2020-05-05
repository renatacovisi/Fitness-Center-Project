<!-- Specifying the use of html, opening the HTML document and setting the language to english -->
<!DOCTYPE html>
<html lang="en">
<head>
<!--Specifying the charsert to be used and make sure special chars will apper ok-->
<meta charset="utf-8">
<!-- bootstrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--title to be showed in the tab of the window-->
<title>Contact us</title>
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

<?php
require('../app/views/header.php');
?>


<main class="backgroundColor">
<!-- jumbotron -->
<section class="jumbotron jumbotron-fluid rounded contact_us text-white">
  <div class="container">
    <h1 class="display-4 mt-5 pt-5">Contact us</h1>
    <p class="lead">WOur costumer relationship channel is through our social
      networks or the contact form bellow. Do you have any suggestions, comments or questions?
      Contact us or visit our Frequently Asked Questions area. The answer to your questions may be there
    </p>
  </div>
</section>

<!-- form allows the member or public to contact the fitness center -->
<form>
  <div class="mx-auto" style="width: 500px;">
    <div class="form-group">
      <label class="font-weight-bold" for="FormControlInput">Name</label>
      <input type="text" class="form-control" id="FormControlInput1" placeholder="Name">
    </div>
    <div class="form-group">
      <label class="font-weight-bold" for="FormControlInput">E-mail</label>
      <input type="email" class="form-control" id="FormControlInput1" placeholder="your@name.com">
    </div>
    <div class="form-group">
      <label class="font-weight-bold" for="FormControlInput">Phone Number</label>
      <input type="text" class="form-control" id="FormControlInput1" placeholder="phone number">
    </div>
    <div class="form-group">
      <label class="font-weight-bold" for="FormControlInput">Message</label>
      <textarea class="form-control" id="ControlInput1" rows="6"></textarea>
    </div>
    <button type="submit" class="btn btn-dark float-right">Submit</button>

  </div>
</form>


<footer class="pt-4 my-md-5 pt-md-3 backgroundColorFooter">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md">
        <a id="logo" href="#"><img id="logo" src="../app/images/logo.svg" alt=""></a>
        <ul>
          <i class="fab fa-instagram fa-2x mt-4 mr-2"></i>
          <i class="fab fa-twitter fa-2x mt-4 mr-2"></i>
          <i class="fab fa-facebook-square fa-2x mt-4 mr-2"></i>
          <i class="fab fa-whatsapp fa-2x mt-4"></i>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5 class="title pt-4 pb-2 font-weight-bold">Locations</h5>
        <i class="fas fa-map-pin"> Dublin 1</i>
        <p class="font-italic">Studio Lotus</p>
        <i class="fas fa-map-pin"> Dublin 2</i>
        <p class="font-italic">Studio Three</p>
        <i class="fas fa-map-pin"> Dublin 8</i>
        <p class="font-italic">Studio Balance</p>
      </div>
      <div class="col-6 col-md">
        <h5 class="title pt-4 pb-2 font-weight-bold">Any questions</h5>
        <a class="fColorIndigo" href="#">See our FAQ</a>
      </div>
      <div class="col-6 col-md my-6">
        <h5 class="title pt-4 pb-2 font-weight-bold">Contact Us</h5>
        <a class="fColorIndigo" href="#">Send a message</a>
      </div>

    </div>
  </div>

</footer>

</html>
