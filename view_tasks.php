<?php
  include("./include/header.php");
?>

<h1 class="text-center">View Task Data</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $view_task_query = "SELECT * FROM `tasks` WHERE `id` = '$id'";
                $view_task_result = mysqli_query($con, $view_task_query);

                if(mysqli_num_rows($view_task_result) > 0)
                {
                    foreach($view_task_result as $view_task_query)
                    {
        ?>

            <form action="process.php" method="POST">

            <input type="hidden" name="id" value="<?=$view_task_query['id'];?>">

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">Kitle</label>
                        <input type="text" class="form-control" name="title"
                            value="<?= $view_task_query['title']; ?>" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description"
                            value="<?= $view_task_query['description']; ?>" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" class="form-control" readonly>
                                <option value="" disabled>Select Priority</option>
                                <option value="Low" <?= ($view_task_query['priority'] == 'Low') ? 'selected':'';?> readonly>Low</option>
                                <option value="Medium" <?= ($view_task_query['priority'] == 'Medium') ? 'selected':'';?> readonly>Medium</option>
                                <option value="High" <?= ($view_task_query['priority'] == 'High') ? 'selected':'';?> readonly>High</option>
                            </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date"
                            value="<?= $view_task_query['due_date']; ?>" readonly>
                    </div>

                        <a href="index.php" type="back" class="btn btn-primary" style="float: right;">Back</a>
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