<?php

session_start();

include('config.php'); 



if(isset($_POST['add'])){

    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $note = mysqli_real_escape_string($connection, $_POST['note']);
    

    $query = "INSERT INTO personal_journal (title,note) 
                VALUES 
                ('$title','$note')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)

    {

    $_SESSION['success'] = "Added Successfully";
    header('Location: index.php');

    }else{

    $_SESSION['failed'] = "Error Adding Data!";
    header('Location: index.php');
    }
}


//code for deleting customer data
if(isset($_POST['delete_btn'])){

    $rid = $_POST['delete_id'];
    

    $query = "DELETE FROM personal_journal WHERE id ='$rid' LIMIT 1";


    $query_run = mysqli_query($connection,$query);

    if($query_run){
           
        $_SESSION['success'] = "Data Deleted Successfully";
        header("Location: index.php");

    }else{
        $_SESSION['failed'] = "Error Deleting Data";
        header("Location: index.php");
    }
}





//code for updating resident data
if(isset($_POST['update_bt'])){

    $id = $_POST['edit_id'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $note = mysqli_real_escape_string($connection, $_POST['note']);
   
    


        $query = "UPDATE personal_journal SET title='$title',note='$note' WHERE id ='$id' LIMIT 1";

        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Data Updated Successfully";
            header('Location: index.php');
        }
        else
        {
            $_SESSION['failed'] = "Error Updating Data";
            header('Location: index.php');

        }   
}



?>