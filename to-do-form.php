<?php
  include  'Controller.php';

  $todo = new Controller\Todo();

  $editTask = $todo->editTaskById();
  $createTask = $todo->createTask();
  
  if(isset($_GET['edit-task'])) {
      $createTask = $todo->updateTaskById();
  }
  if(isset($_GET['delete-task'])) {
      $deleteTask = $todo->deleteTaskById();
  }

?>
<a class="button" href="http://localhost/todolist/template_list.php">List</a>

  <form method="post">    
    <p class="text-danger">
        <?php 
         echo $createTask['success']??'';
         echo $createTask['taskMsg']??''; 
         ?>
    </p>
 
    <div class="input-group mb-3">
      <textarea name="task" ><?php echo $editTask['task']??''; ?></textarea>
     
      <button type="submit" class="btn btn-primary" name="<?php echo count($editTask)?'update':'add'; ?>"><?php echo count($editTask)?'update':'add'; ?></button>
    </div>

  </form>