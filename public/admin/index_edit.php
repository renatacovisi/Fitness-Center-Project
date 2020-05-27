<?php
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
                    <form action="/Fitness-Center-Project/app/src/upload.php?action=savePost" method="post"
                          enctype="multipart/form-data">
                        <label class="font-weight-bold mt-1" for="fileToUpload">Select image to upload:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="d-block">
                        <label class="font-weight-bold mt-3" for="publicationDate">Publication Date</label>
                        <input type="date" class="form-control" id="publicationDate" name="publicationDate">
                        <label class="font-weight-bold mt-1" for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <label class="font-weight-bold mt-1" for="text">Text</label>
                        <input type="text" class="form-control" id="text" name="text">
                        <label class="font-weight-bold mt-1" for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                        <label class="font-weight-bold mt-1" for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type">
                        <label class="font-weight-bold mt-1" for="buttonText">Button Text</label>
                        <input type="text" class="form-control" id="buttonText" name="buttonText">


                        <input type="submit" value="Save" name="submitPost" class="float-right m-2">
                    </form>

                    <!-- error or confirmation message-->
                    <?php if (isset($results['message'])) { ?>
                        <p class="mt-5 mx-auto widthMessage"><?php echo $results['message'] ?></p>
                    <?php } ?>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Done!</button>
                </div>
            </div>
        </div>
    </div>
    <script>$('#logoutConfirmation').modal('show')</script>
<?php } ?>

<?php if ($results['showEditCarousel']) { ?>
<div class="modal fade" id="logoutConfirmation" tabindex="-1" role="dialog" aria-labelledby="logoutConfirmation"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fColorIndigo" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body fColorIndigo">
                <form action="/Fitness-Center-Project/app/src/upload.php?action=saveCarousel" method="post"
                      enctype="multipart/form-data">
                    <label class="font-weight-bold mt-1" for="fileToUpload">Select image to upload:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="d-block">
                    <label class="font-weight-bold mt-3" for="publicationDate">Publication Date</label>
                    <input type="date" class="form-control" id="publicationDate" name="publicationDate">
                    <label class="font-weight-bold mt-1" for="title">Title</label>
                    <input type="text" class="form-control" id="title" , name="title">
                    <label class="font-weight-bold mt-1" for="text">Text</label>
                    <input type="text" class="form-control" id="text" , name="text">
                    <label class="font-weight-bold mt-1" for="state">State</label>
                    <input type="text" class="form-control" id="state" , name="state">
                    <label class="font-weight-bold mt-1" for="position">Position</label>
                    <input type="text" class="form-control" id="position" , name="position">
                    <label class="font-weight-bold mt-1" for="buttonText">Button Text</label>
                    <input type="text" class="form-control" id="buttonText" , type="buttonText">


                    <input type="submit" value="Save" name="submitCarousel" class="float-right m-2">
                </form>

                <!-- error or confirmation message-->
                <?php if (isset($results['message'])) { ?>
                    <p class="mt-5 mx-auto widthMessage"><?php echo $results['message'] ?></p>
                <?php } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Done!</button>
            </div>
        </div>
    </div>
</div>
    <script>$('#logoutConfirmation').modal('show')</script>
    <?php } ?>
