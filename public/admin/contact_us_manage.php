<?php
//using real path to make easier to the scripts to find the other files
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
//require_once(FIXED_PATH.'/public/config.php');
//require Post file to be able to control the uploads of images by the admin
require_once(FIXED_PATH.'/Fitness-Center-Project/classes/ContactUs.php');
require_once(FIXED_PATH.'/Fitness-Center-Project/app/src/session.php');



//if the action is to show the edit posts modal
if ($results["showSeeMessagesForm"]) {
    ?>
    <div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="approvalForm"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fColorIndigo">See messages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body fColorIndigo">

                    <!-- error or confirmation message after try to add or edit a record-->
                    <?php if (isset($results['message'])) { ?>
                        <p class="mt-5 mx-auto alert alert-primary"><?php echo $results['message'] ?></p>
                    <?php } ?>


                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Text</th>
                            <th scope="col">Name</th>
                            <th scope="col">Stars</th>
                            <th scope="col">Class name</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($results['messages'] as $message) { ?>
                            <tr>
                                <th scope="row"><?php echo $message->id ?></th>
                                <td><?php echo $message->name ?></td>
                                <td><?php echo $message->email ?></td>
                                <td><?php echo $message->phone ?></td>
                                <td><?php echo $message->message ?></td>
                                <td>
                                    <a class="float-right mx-1" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php?action=seeMessage&id=" . $message->id ?>">
                                        <i class="fas fa-check-circle"></i></a>
                                    <a class="float-right mx-1" href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php?action=deleteMessage&id=" . $message->id ?>"
                                       onclick="return confirm('Delete This Testimonial?')">
                                        <i class="fas fa-trash-alt "></i> </a>
                                </td>


                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>$('#approvalForm').modal('show')</script>
<?php }?>