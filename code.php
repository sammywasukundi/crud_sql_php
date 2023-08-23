<?php
    session_start();
    require('dbconnexion.php');

    if(isset($_POST['delete_student'])){
        $delete=$_GET['id'];

        $query =$pdo->prepare("DELETE FROM add_student WHERE id=?");
        $query->execute(array(
            $delete
        ));
        if($query){
            $_SESSION['message']='student deleted successfully';
            header('Location:index.php');
            exit(0);
        }
        else{
            $_SESSION['message']='student not deleted';
            header('Location:index.php');
            exit(0);
        }

    }

    if(isset($_POST['submit_update'])){
        $student_id=$_GET['id'];
        $name =htmlspecialchars($_POST['name']);
        $email =htmlspecialchars($_POST['email']);
        $phone =htmlspecialchars($_POST['phone']);
        $matricule =htmlspecialchars($_POST['matricule']);


        $query=$pdo->prepare("UPDATE add_student SET name_student=?,email=?,phone=?,matricule=? WHERE id=?");
        $query->execute(array($name,$email,$phone,$matricule,$student_id));
        if($query){
            $_SESSION['message']='student updated successfully';
            header('Location:index.php');
            exit(0);
        }
        else{
            $_SESSION['message']='student  not updated';
            header('Location:index.php');
            exit(0);
        }
    }

    if(isset($_POST['submit_create'])){
        $name =htmlspecialchars($_POST['name']);
        $email =htmlspecialchars($_POST['email']);
        $phone =htmlspecialchars($_POST['phone']);
        $matricule =htmlspecialchars($_POST['matricule']);

        $query = $pdo->prepare("INSERT INTO add_student(name_student,email,phone,matricule) VALUES(:name_student,:email,:phone,:matricule)");
        $query->execute(array(
            'name_student' => $name,
            'email' => $email,
            'phone' => $phone,
            'matricule' => $matricule
        ));
        if($query){
            $_SESSION['message']='student saved successfully';
            header('Location:create_student.php');
            exit(0);
        }
        else{
            $_SESSION['message']='student  not saved';
            header('Location:create_student.php');
            exit(0);
        }
    }
?>