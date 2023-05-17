<?php
namespace  Controller;
include('database.php'); 

class Todo {

public function updateTaskById()
{
  global $conn; 
  
    if (isset($_POST['update']) && isset($_GET['edit-task']) && !empty($_GET['edit-task'])) {
      
          $id = $_GET['edit-task'];

          $task = $_POST['task'];

          $data['taskMsg'] = '';
          $validation = false;

         if(empty($task)) {
            $data['taskMsg'] = "task Field is required";
          
          }


          if(empty($data['taskMsg'])) {
             $validation = true;
          }
           /* validation */

          if($validation) {

             /* sql query*/
           

           $query  = "UPDATE `todo` SET `task` = '".$task."' WHERE `todo`.`id` =".$id;

            $result = $conn->query($query);
           
             if ($result) {
               $data['success'] = "Task is updated successfully";
              echo "<script>window.location='template_list.php'</script>";
            }
          }
          
          return $data;
       }
}
public function editTaskById(){

  global $conn;
    $data=[];
  if(isset($_GET['edit-task']) && !empty($_GET['edit-task']) ) {
     
    $id = $_GET['edit-task'];
    $msg = [];

     /* sql query*/
  $query = "SELECT task ";
  $query .= "FROM todo ";
  $query .= "WHERE id=$id"; 

    $result = $conn->query($query);
    $data = $result->fetch_assoc();

 }
 return $data; 

}  

public function getTask()
{
   global $conn; 
    $data['data'] = [];

    $query  = "SELECT id, task ";
    $query .= "FROM todo ORDER BY id DESC"; 

    $result = $conn->query($query);
    
    if ($result) {

      if($result->num_rows> 0) {

        $data['data'] = $result->fetch_all(MYSQLI_ASSOC);

      }

   }
    return $data;
  
}

function deleteTaskById()
{
  
  global $conn; 
  
if (isset($_GET['delete-task']) && !empty($_GET['delete-task'])) {
      
    $id = $_GET['delete-task'];

    $query  = "DELETE FROM todo WHERE `todo`.`id`=".$id;
   
    $result = $conn->query($query);

     if ($result) {
      echo "<script>window.location='template_list.php'</script>";
      return $data;
    }
    
}

  
}

public function createTask()
{

  global $conn;   

  if (isset($_POST['add'])) {

      /* validation */
    $task = $_POST['task'];

    $data['taskMsg'] = '';
    if(empty($task)) {

      $data['taskMsg'] = "Empty Task Field!";
    }

     $validation = false;
    if(empty($data['taskMsg'])) {
       $validation = true;
    }

     if($validation) {

     /* insert query*/
    $query  = "INSERT INTO todo";
    $query .= "(task) ";
    $query .= "VALUES ('$task')";
 
    $result = $conn->query($query);

    if ($result) {
      $data['success'] = "Task is added successfully";
    }
   }

     return $data;

   }

  
}
}