<?php

//require Contact us file to be able to control the uploads of images by the admin
require_once(FIXED_PATH . '/Fitness-Center-Project/classes/ContactUs.php');
require_once(FIXED_PATH . '/Fitness-Center-Project/app/src/session.php');


//if the action is to show the see messages modal
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
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>

<!--                    shows all messages on the list-->
                    <?php foreach ($results['messagesList'] as $message) { ?>
                        <tr>
<!--                            shows the details of the message-->
                            <th scope="row"><?php echo $message->id ?></th>
                            <td><?php echo $message->name ?></td>
                            <td><?php echo $message->email ?></td>
                            <td><?php echo $message->title ?></td>
                            <td>
<!--                                allows the admin to see the complete message or delete ir-->
                                <a class="float-right mx-1"
                                   href="<?php echo WEB_URL_PREFIX . "/Fitness-Center-Project/public/contact_us.php?action=deleteMessage&id=" . $message->id ?>"
                                   onclick="return confirm('Delete This Message?')">
                                    <i class="fas fa-trash-alt "></i> </a>
                                <a class="float-right mx-1"
                                   href="<?php echo WEB_URL_PREFIX . "/Fitness-Center-Project/public/contact_us.php?action=seeMessage&id=" . $message->id ?>">
                                    <i class="fab fa-readme"></i></a>

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
<?php } ?>
<?php

//<!--    if the action is to show the message view modal-->
if ($results["showMessageView"]) { ?>
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="approvalForm"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fColorIndigo"><?php echo $results['messageToSee']->title?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body fColorIndigo">

                <!-- error or confirmation message after try to add or edit a record-->
                <?php if (isset($results['message'])) { ?>
                    <p class="mt-5 mx-auto alert alert-primary"><?php echo $results['message'] ?></p>
                <?php } ?>

<!--                shows all information about the message-->
                <p>Name: <?php echo $results['messageToSee']->name?></p>
                <p>E-mail: <?php echo $results['messageToSee']->email?></p>
                <p>Phone: <?php echo $results['messageToSee']->phone?></p>
                <p>Message: <?php echo $results['messageToSee']->message?></p>

<!--                goes back to the show messages modal-->
                <a class="btn btn-secondary mt-2 buttonSizeAdm float-right"
                   href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/contact_us.php?action=showSeeMessagesForm"?>"
                   role="button" >Go back</a>

            </div>
        </div>
    </div>
</div>
<script>$('#approvalForm').modal('show')</script>
<?php } ?>

