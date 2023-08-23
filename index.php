<?php require('dbconnexion.php'); require 'code.php';  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Student details
                                <a href="create_student.php" class="btn btn-success float-end">Add student</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Student name</th>
                                        <th>Student Email</th>
                                        <th>Student phone</th>
                                        <th>Student matricule</th>
                                        <th>Action</th>                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        //$delete=$_GET['id'];
                                        $read =$pdo->query("SELECT * from add_student");
                                        $i = 1;
                                        while($student=$read->fetch()){
                                    ?> 
                                            <tr>
                                                <td> <?= $student['id'] ; ?> </td>
                                                <td> <?= $student['name_student'] ; ?> </td>
                                                <td> <?= $student['email'];  ?> </td>
                                                <td><?= $student['phone'] ; ?></td>
                                                <td><?= $student['matricule'] ; ?></td>
                                                <td>
                                                    <a href="student_edit.php?id=<?= $student['id'] ; ?>" class="btn btn-info btn-small">Edit</a>
                                                    <a href="student_view?id=<?= $student['id'] ; ?>" class="btn btn-success btn-small">View</a>
                                                    <form action="" method="post" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?= $student['id'] ; ?>" class="btn btn-danger btn-small">Delete</button>   
                                                    </form>
                                                </td>                                      
                                            </tr>
                                    <?php
                                            ++$i;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>