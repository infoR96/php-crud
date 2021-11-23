<?php include("db.php"); ?>

<?php
    if(isset($_POST['save_ta'])){
        $title=$_POST['title'];
        $description=$_POST['description'];
        
        $query="INSERT INTO task(title,description) VALUES('$title','$description')";
        $result= mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message']='TASK saved succesfully';
        $_SESSION['message-type']='success';

        header("Location: index.php");
    }
?>