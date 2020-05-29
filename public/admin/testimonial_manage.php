<?php
require_once(FIXED_PATH.'/Fitness-Center-Project/classes/Testimonial.php');
require_once(FIXED_PATH.'/Fitness-Center-Project/app/src/session.php');



//if the action is to show the edit posts modal
if ($results["showApproveTestimonialForm"]) {
?>
<div class="modal fade" id="approvalForm" tabindex="-1" role="dialog" aria-labelledby="approvalForm"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fColorIndigo">Approve Testimonials</h5>
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

<!--                    shows all pending testimonials-->
                    <?php foreach ($results['pendingTestimonials'] as $testimonial) { ?>
                    <tr>
                        <th scope="row"><?php echo $testimonial->id ?></th>
                        <td><?php echo $testimonial->title ?></td>
                        <td><?php echo $testimonial->text ?></td>
                        <td><?php echo $testimonial->name ?></td>
                        <td><?php echo $testimonial->stars ?></td>
                        <td><?php echo $testimonial->className ?></td>
                        <td><?php echo date("m-d", $testimonial->creationDate) ?></td>
                        <td>
<!--                            allows the admin to approve a testimonial-->
                            <a class="float-right mx-1"
                               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php?action=approveTestimonial&id=".$testimonial->id ?>"
                               onclick="return confirm('Approve This Testimonial?')">
                            <i class="fas fa-check-circle"></i></a>
<!--                            allows the admin to delete a testimonial-->
                            <a class="float-right mx-1"
                               href="<?php echo WEB_URL_PREFIX."/Fitness-Center-Project/public/testimonial.php?action=deleteTestimonial&id=".$testimonial->id ?>"
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