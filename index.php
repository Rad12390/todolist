<?php
include  'Controller.php';

$todo = new Controller\Todo();

$getTask = $todo->getTask(); 
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
$arr = array();

$count = count($getTask['data']);
if($count) {
 $s_no = 1; 
 foreach($getTask['data'] as $task) {
   array_push($arr, $task['task']);
  if($s_no == 1){
   
  ?>
  <tr>
    <td id="changeText"><?php echo $s_no." ".$task['task']; ?></td>
   
  </tr> <?php } ?>
 <tr >
    <td ><img class="enotmptyTD<?php echo $s_no;?>" src="arrow_icon.png" style="width: 17px; display: none;" alt=""><?php echo $s_no." ".$task['task']; ?></td>
   
  </tr>
 
<?php 
  $s_no++;
  
  } 
 }
 $arr = json_encode($arr);
?>

</table>
<script type="text/javascript">

 var text = <?php echo $arr;?>;
 console.log(text);

 var counter = 0;
var elem = document.getElementById("changeText");
var inst = setInterval(change, 1000);

function change() {
  elem.innerHTML = text[counter];
   $(".enotmptyTD"+text.length).css("display" ,"none");

   $(".enotmptyTD"+counter).css("display" ,"none");
  
  counter++;
  // alert(counter);
   $(".enotmptyTD"+counter).css("display" ,"block");
    
    if (counter >= text.length) {

    counter = 0;
  
    }
}



</script>
</body>
</html>

