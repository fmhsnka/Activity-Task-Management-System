<?php
  include("./include/header.php");
?>

 <div class="container-fluid mt-4">
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h2 class="card-title text-center">Task Management System</h2>

              <a type = "button" href="create_task.php" style="float: right;" class="btn btn-primary">Add Task</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr class="text-center">
                    <th class="col">Title</th>
                    <th class="col">Description</th>
                    <th class="col">Priority</th>
                    <th class="col">Due Date</th>
                    <th class="col">Action</th>
                  </tr>
                </thead>
                <tbody>


                <?php
                $query = "SELECT * FROM `tasks`";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0)
                {
                foreach($query_run as $row)
                {
                ?>
                    <tr class="text-center">
                      <td><?= $row['title']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td><?= $row['priority']; ?></td>
                      <td><?= $row['due_date']; ?></td>

                      <td>
                        <a type="button" class="button btn btn-outline-success" href="view_tasks.php?id=<?=$row['id'];?>">View</a>
                        <a type="button" class="button btn btn-outline-warning" href="edit_task.php?id=<?=$row['id'];?>">Edit</a>
                        <a type="submit" class="button btn btn-outline-danger" href="delete_tasks.php?id=<?=$row['id'];?>">Delete</a>
                        </div>
                      </td>
                    </tr>

                    <?php
                } 
                } else
                {
                ?>
                <tr>
                <td colspan="6">No Record Found!</td>
                </tr>
                <?php
                }
                ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
 </div>

<?php
  include("./include/footer.php");
?>