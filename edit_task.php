<?php
  include("./include/header.php");
?>

<h1 class="text-center">Edit Task Data</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $edit_task_query = "SELECT * FROM `tasks` WHERE `id` = '$id'";
            $edit_task_result = mysqli_query($con, $edit_task_query);

            if(mysqli_num_rows($edit_task_result) > 0)
            {
                foreach($edit_task_result as $edit_task_query)
                {
                ?>

            <form action="process.php" method="POST">

            <input type="hidden" name="id" value="<?=$edit_task_query['id'];?>">

                <div class="row">
                <div class="col-md-12 mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" name="id">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">title</label>
                        <input type="text" class="form-control" name="title"
                            value="<?= $edit_task_query[`title`]; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description"
                            value="<?= $edit_task_query[`description`]; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <input type="text" class="form-control" name="priority"
                            value="<?= $edit_task_query[`priority`]; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date"
                            value="<?= $edit_task_query[`due_date`]; ?>">
                    </div>

                    <div class="col-md-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary" style="float: right;" name="edit_taskButton">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
                }
            }
            else
            {
                ?>
                <h4>No Record Found!</h4>
                <?php
            }
        }
?>
</div>

<?php
include ("./include/footer.php");
?>