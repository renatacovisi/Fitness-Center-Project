<?php
//using real path to make easier to the scripts to find the other files
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//require config file
require_once("$root/Fitness-Center-project/public/config.php");
//require Post file to be able to control the uploads of images by the admin
require_once("$root/Fitness-Center-project/classes/Testimonial.php");
require_once("$root/Fitness-Center-project/app/src/session.php");



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

                    <?php foreach ($results['pendingTestimonials'] as $testimonial) { ?>
                    <tr>
                        <th scope="row"><?php echo $testimonial->id ?></th>
                        <td><?php echo $testimonial->title ?></td>
                        <td><?php echo $testimonial->text ?></td>
                        <td><?php echo $testimonial->name ?></td>
                        <td><?php echo $testimonial->stars ?></td>
                        <td><?php echo $testimonial->className ?></td>
                        <td><?php echo $testimonial->creationDate ?></td>
                        <td>
                            <a class="float-right mx-1" href="/Fitness-Center-project/public/testimonial.php?action=approveTestimonial&id=<?php echo $testimonial->id ?>"
                               onclick="return confirm('Approve This Testimonial?')">
                            <i class="fas fa-check-circle"></i></a>
                            <a class="float-right mx-1" href="/Fitness-Center-project/public/testimonial.php?action=deleteTestimonial&id=<?php echo $testimonial->id ?>"
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