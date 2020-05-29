<?php

//require Post file to be able to control the uploads of images by the admin
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Class_.php");
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//inserts the values coming from the index_edit.php after creation of the post
$classToEdit = $results['classToEdit'];

//if the action is to show the edit posts modal
if ($results["showEditClassForm"]) {
    ?>
    <div class="modal fade" id="editClass" tabindex="-1" role="dialog" aria-labelledby="editClass"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Edit Classes area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fColorIndigo">

                    <!-- error or confirmation message after try to add or edit a record-->
                    <?php if (isset($results['message'])) { ?>
                        <p class="mt-5 mx-auto alert alert-primary"><?php echo $results['message'] ?></p>
                    <?php } ?>

                    <!-- sets the correct url to be called in the form depending on the existence of an id that means that is an edition or non existence that means an creation-->
                    <?php
                    $url = isset($classToEdit->id) ? '/Fitness-Center-Project/public/class.php?action=editClass&id=' . $classToEdit->id : '/Fitness-Center-Project/app/src/upload.php?action=saveClass'
                    ?>
                    <!-- inserts the url in the action of the form-->
                    <form action="<?php echo $url ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- uses the id input only if there is an id already set and uses the id in its value-->
                            <?php if(isset($classToEdit->id)) {?> <input type="hidden" id="id" name="id" value="<?php echo $classToEdit->id?>"> <?php } ?>
                            <!-- hides the label and input of the image if already exist a post - feature to be done in the future to allow user to change photo as well-->
                            <label <?php echo isset($classToEdit->id) ? 'hidden' : '' ?> class="font-weight-bold mt-1" for="fileToUpload">Select image
                                to upload:</label>
                            <input type="<?php echo isset($classToEdit->id) ? 'hidden' : 'file' ?>" name="fileToUpload" id="fileToUpload" class="d-block"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->image : '' ?>">

                            <!--  all inputs allow the admin to edit if a id is there-->
                            <label class="font-weight-bold mt-3" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?php echo isset($classToEdit->id) ? ($classToEdit->name) : '' ?>">
                            <label class="font-weight-bold mt-1" for="shortDescription">Short Description</label>
                            <input type="text" class="form-control" id="shortDescription" name="shortDescription"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->shortDescription : '' ?>">
                            <label class="font-weight-bold mt-1" for="longDescription">Long Description</label>
                            <input type="text" class="form-control" id="longDescription" name="longDescription"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->longDescription : '' ?>">
                            <label class="font-weight-bold mt-1" for="timetable">timetable</label>
                            <input type="text" class="form-control" id="timetable" name="timetable"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->timetable : '' ?>">
                            <label class="font-weight-bold mt-1" for="plan">plan</label>
                            <input type="text" class="form-control" id="plan" name="plan"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->plan : '' ?>">
                            <label class="font-weight-bold mt-1" for="externalLink">externalLink</label>
                            <input type="text" class="form-control" id="externalLink" name="externalLink"
                                   value="<?php echo isset($classToEdit->id) ? $classToEdit->externalLink : '' ?>">
                        </div>
                        <input type="submit" value="Save" name="submitClass"
                               class="m-2 btn btn-secondary buttonSizeAdm">
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>$('#editClass').modal('show')</script>
<?php } ?>