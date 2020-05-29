<?php
//using real path to make easier to the scripts to find the other files
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
//require_once(FIXED_PATH."/Fitness-Center-Project/public/config.php");
//require Post file to be able to control the uploads of images by the admin
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Post.php");
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//inserts the values coming from the index_edit.php after creation of the post
$feePlanToEdit = $results['feePlanToEdit'];

//if the action is to show the edit posts modal
if ($results['showEditFeeForm']) {
    ?>
    <div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Edit Fee Plans area</h5>
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
                    $url = isset($feePlanToEdit->id) ? '/Fitness-Center-Project/public/registration.php?action=editFeePlan&id=' . $feePlanToEdit->id : '/Fitness-Center-Project/public/registration.php?action=saveFeePlan'
                    ?>
                    <!-- inserts the url in the action of the form-->
                    <form action="<?php echo $url ?>" method="post">
                        <div class="form-group">
                            <!-- uses the id input only if there is an id already set and uses the id in its value-->
                            <?php if(isset($feePlanToEdit->id)) {?> <input type="hidden" id="id" name="id" value="<?php echo $feePlanToEdit->id?>"> <?php } ?>

                            <!--  all inputs allow the admin to edit if a id is there-->
                            <label class="font-weight-bold mt-3" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?php echo isset($feePlanToEdit->id) ? $feePlanToEdit->name : '' ?>">

                            <label class="font-weight-bold mt-1" for="text">Text</label>
                            <input type="text" class="form-control" id="text" name="text"
                                   value="<?php echo isset($feePlanToEdit->id) ? $feePlanToEdit->text : '' ?>">

                            <label class="font-weight-bold mt-1" for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                   value="<?php echo isset($feePlanToEdit->id) ? $feePlanToEdit->price : '' ?>">

                            <label class="font-weight-bold mt-1" for="maxClasses">Max Classes</label>
                            <input type="text" class="form-control" id="type" name="maxClasses"
                                   value="<?php echo isset($feePlanToEdit->id) ? $feePlanToEdit->maxClasses : '' ?>">

                        </div>
                        <input type="submit" value="Save" name="submitFeePlan"
                               class="m-2 btn btn-secondary buttonSizeAdm">
                    </form>



                    <div class="d-block mt-3 ml-1">
                        <div class="dropdown mt-5">
                            <!--                        dropdown button populated with all posts already in the database to chose to edit or delete. When it is chosen it refreshes the page and shows all inputs populated-->
                            <button class="btn btn-secondary dropdown-toggle buttonSizeAdm" type="button" id="dropdownEdit"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Plan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownEdit">
                                <?php
                                $data = Fee::getList(50);
                                foreach ($data['results'] as $feePlan) { ?>
                                    <a role="button" class="dropdown-item"
                                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/registration.php?action=showEditFeeForm&id=" . $feePlan->id?>"><?php echo $feePlan->name ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>$('#logoutConfirmation').modal('show')</script>
<?php } ?>