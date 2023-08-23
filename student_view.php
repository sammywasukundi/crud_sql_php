<?php require 'dbconnexion.php'; require 'code.php'; ?>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            View student details
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            $student_id=$_GET['id'];
                            $readOne =$pdo->query("SELECT * from add_student WHERE id='$student_id'");
                            $i = 1;
                            while($student=$readOne->fetch()){
                        ?>
                            <input type="hidden" name="student_id" value="<?= $student['id'] ; ?>">
                            <div class="mb-3">
                                <label class="fw-bold">Student Name</label>
                                <p>
                                    <?= $student['name_student'] ; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Student Email</label>
                                <p>
                                    <?= $student['email'] ; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Student Phone</label>
                                <p>
                                    <?= $student['phone'] ; ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Student matricule</label>
                                <p>
                                    <?= $student['matricule'] ; ?>
                                </p>
                            </div>
                        <?php
                                ++$i;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>