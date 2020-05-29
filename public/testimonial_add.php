<?php
//using real path to make easier to the scripts to find the other files
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
//require_once(FIXED_PATH.'/Fitness-Center-Project/public/config.php');
//require Testimonial file to be able to control the uploads of images by the admin
require_once(FIXED_PATH.'/Fitness-Center-Project/classes/Testimonial.php');
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//if the action is to show the edit posts modal
if ($results['showTestimonialForm']){
    ?>
    <div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              
                <div class="modal-header">
                    <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Add Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body fColorIndigo">

                    <!-- error or confirmation message after try to add or edit a record-->
                    <?php if (isset($results['message'])) { ?>
                        <p class="mt-5 mx-auto alert alert-primary"><?php echo $results['message'] ?></p>
                    <?php } ?>

                    <!-- inserts the url in the action of the form-->
                    <form action="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php?action=addTestimonial" ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" id="approval" name="approval" value="pending">

                            <label class="font-weight-bold mt-3" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">

                            <label class="font-weight-bold mt-1" for="text">text</label>
                            <input type="text" class="form-control" id="text" name="text">

                            <label class="font-weight-bold mt-1" for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name">

                            <h5>Stars</h5>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="stars" value="1" id="1">
                                        <i class="fas fa-star m-1"></i>
                                    </div>
                                </div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="stars" value="2">
                                        <i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i>
                                    </div>
                                </div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="stars" value="3">
                                        <i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i>
                                    </div>
                                </div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="stars" value="3">
                                        <i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i>
                                    </div>
                                </div>

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" aria-label="Radio button for following text input" name="stars" value="3">
                                        <i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i><i class="fas fa-star m-1"></i>
                                    </div>
                                </div>
                            </div>

                        <label class="font-weight-bold mt-1" for="className">Class Name</label>
                        <input type="text" class="form-control" id="className" name="className">
                        <label class="font-weight-bold mt-3" for="creationDate">Creation Date</label>
                        <input type="date" class="form-control" id="creationDate" name="creationDate">
                        <input type="submit" value="Save" name="submitPost" class="mt-5 btn btn-secondary buttonSizeAdm">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

    <script>$('#logoutConfirmation').modal('show')</script>

<?php } ?>
