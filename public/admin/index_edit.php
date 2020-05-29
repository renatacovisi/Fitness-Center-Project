<?php
//using real path to make easier to the scripts to find the other files
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
require_once(FIXED_PATH."/Fitness-Center-Project/public/config.php");
//require Post file to be able to control the uploads of images by the admin
require_once(FIXED_PATH."/Fitness-Center-Project/classes/Post.php");
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");


//inserts the values coming from the index_edit.php after creation of the post
$postToEdit = $results['postToEdit'];

//if the action is to show the edit posts modal
if ($results['showEditPosts']) {
    ?>
    <div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Edit news/offers area</h5>
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
                    $url = isset($postToEdit->id) ? '/Fitness-Center-Project/public/index.php?action=editPost&id=' . $postToEdit->id : '/Fitness-Center-Project/app/src/upload.php?action=savePost'
                    ?>
                    <!-- inserts the url in the action of the form-->
                    <form action="<?php echo $url ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- uses the id input only if there is an id already set and uses the id in its value-->
                            <?php if(isset($postToEdit->id)) {?> <input type="hidden" id="id" name="id" value="<?php echo $postToEdit->id?>"> <?php } ?>
                            <!-- hides the label and input of the image if already exist a post - feature to be done in the future to allow user to change photo as well-->
                            <label <?php echo isset($postToEdit->id) ? 'hidden' : '' ?> class="font-weight-bold mt-1" for="fileToUpload">Select image
                                to upload:</label>
                            <input type="<?php echo isset($postToEdit->id) ? 'hidden' : 'file' ?>" name="fileToUpload" id="fileToUpload" class="d-block"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->photoLink : '' ?>">
                            <!--  all inputs allow the admin to edit if a id is there-->
                            <label class="font-weight-bold mt-3" for="publicationDate">Publication Date</label>
                            <input type="date" class="form-control" id="publicationDate" name="publicationDate"
                                   value="<?php echo isset($postToEdit->id) ? date("Y-m-d", $postToEdit->publicationDate) : '' ?>">
                            <label class="font-weight-bold mt-1" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->title : '' ?>">
                            <label class="font-weight-bold mt-1" for="text">Text</label>
                            <input type="text" class="form-control" id="text" name="text"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->text : '' ?>">
                            <label class="font-weight-bold mt-1" for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->link : '' ?>">
                            <label class="font-weight-bold mt-1" for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->type : '' ?>">
                            <label class="font-weight-bold mt-1" for="buttonText">Button Text</label>
                            <input type="text" class="form-control" id="buttonText" name="buttonText"
                                   value="<?php echo isset($postToEdit->id) ? $postToEdit->buttonText : '' ?>">
                        </div>
                        <input type="submit" value="Save" name="submitPost"
                               class="m-2 btn btn-secondary buttonSizeAdm">
                    </form>
                    <div class="d-block mt-3 ml-1">
                    <div class="dropdown mt-5">
<!--                        dropdown button populated with all posts already in the database to chose to edit or delete. When it is chosen it refreshes the page and shows all inputs populated-->
                        <button class="btn btn-secondary dropdown-toggle buttonSizeAdm" type="button" id="dropdownEdit"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Post
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownEdit">
                            <?php
                            $data1 = Post::getList(50, "news");
                            $data2 = Post::getList(50, "offers");
                            foreach ($data1['results'] as $post) { ?>
                                <a role="button" class="dropdown-item"
                                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php?action=showEditPosts&id=<?php echo $post->id ?>" ?>"><?php echo $post->title ?></a>
                            <?php } ?>
                            <?php foreach ($data2['results'] as $post) { ?>
                                <a role="button" class="dropdown-item"
                                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php?action=showEditPosts&id=<?php echo $post->id ?>" ?>"><?php echo $post->title ?></a>
                            <?php } ?>
                        </div>
                    </div>
<!--                        delete button that triggers a confirmation dialog and deletes the selected post-->
                    <a class="btn btn-secondary mt-2 buttonSizeAdm"
                       href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/index.php?action=deletePost&id=<?php echo $postToEdit->id ?>" ?>"
                       role="button" onclick="return confirm('Delete This Article?')">Delete</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>$('#logoutConfirmation').modal('show')</script>
<?php } ?>

<?php //if ($results['showEditCarousel']) { ?>
<!--    <div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"-->
<!--         aria-hidden="true">-->
<!--        <div class="modal-dialog modal-lg" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Logout</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body fColorIndigo">-->
<!--                    <form action="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/app/src/upload.php?action=saveCarousel" ?>" method="post"-->
<!--                          enctype="multipart/form-data">-->
<!--                        <label class="font-weight-bold mt-1" for="fileToUpload">Select image to upload:</label>-->
<!--                        <input type="file" name="fileToUpload" id="fileToUpload" class="d-block">-->
<!--                        <label class="font-weight-bold mt-3" for="publicationDate">Publication Date</label>-->
<!--                        <input type="date" class="form-control" id="publicationDate" name="publicationDate">-->
<!--                        <label class="font-weight-bold mt-1" for="title">Title</label>-->
<!--                        <input type="text" class="form-control" id="title" , name="title">-->
<!--                        <label class="font-weight-bold mt-1" for="text">Text</label>-->
<!--                        <input type="text" class="form-control" id="text" , name="text">-->
<!--                        <label class="font-weight-bold mt-1" for="state">State</label>-->
<!--                        <input type="text" class="form-control" id="state" , name="state">-->
<!--                        <label class="font-weight-bold mt-1" for="position">Position</label>-->
<!--                        <input type="text" class="form-control" id="position" , name="position">-->
<!--                        <label class="font-weight-bold mt-1" for="buttonText">Button Text</label>-->
<!--                        <input type="text" class="form-control" id="buttonText" , type="buttonText">-->
<!---->
<!---->
<!--                        <input type="submit" value="Save" name="submitCarousel" class="float-right m-2">-->
<!--                    </form>-->
<!---->
                    <!-- error or confirmation message-->
<!--                    --><?php //if (isset($results['message'])) { ?>
<!--                        <p class="mt-5 mx-auto widthMessage">--><?php //echo $results['message'] ?><!--</p>-->
<!--                    --><?php //} ?>
<!---->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Done!</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>$('#logoutConfirmation').modal('show')</script>-->
<?php //} ?>
