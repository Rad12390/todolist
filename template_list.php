<?php
include  'Controller.php';

$todo = new Controller\Todo();

$getTask = $todo->getTask(); 
?>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.button {
    width: 115px;
    height: 25px;
    background:black;
    padding: 2px;
    text-align: center;
    border-radius: 1px;
    color: white;
    font-weight: bold;
    line-height: 49px;
}
</style>
</head>
<body>
<a href="http://localhost/todolist/to-do-form.php">Add Todo</a>


<table style="width:100%">
<?php
$count = count($getTask['data']);
if($count) {
 $s_no = 1; 
 foreach($getTask['data'] as $task) {

  ?>
 
  <tr>
    <td><?php echo $s_no." ".$task['task']; ?></td>
    <td ><a class="button" href="http://localhost/todolist/to-do-form.php?edit-task=<?php echo $task['id'];?>">Edit</a>
    <a class="button" href="http://localhost/todolist/to-do-form.php?delete-task=<?php echo $task['id'];?>">Delete</a></td>
  </tr>
 
<?php 
  $s_no++;
  
  } 
 }
?>

</table>

</body>
</html>

