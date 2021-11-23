<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">

             <?php if (isset($_SESSION['message'])) { ?> <!-- si existe una variable dentro de la sesion. => true -->
                <div class="alert alert-<?= $_SESSION['message-type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

               

            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control my-2" placeholder="Task title" />
                    </div>
                    <div class="form-group">
                        <textarea rows="3" class="form-control" name="description" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block my-2" name="save_ta" value="Save Task">
                </form>

            </div>

        </div>
        <div class="col-md-8">
                <table class= "table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Creado</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $query = "SELECT * FROM task";
                            $result_task = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($result_task)){?>

                                <tr>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['description']?></td>
                                    <td><?php echo $row['created_at']?></td>
                                </tr>

                            

                        <?php }?>
                </tbody>

                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>