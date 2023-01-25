<a href="form.php">Add New User</a>
<?php
session_start();
require 'conc.php';
$user_id ="";
if (isset($_POST['edit'])){

  $user_id =$_POST['user_id'] ;
  $useName = $_POST['name']  ;
  $email= $_POST['email']  ;
  $gander = $_POST['gender'] ;
  if (empty($_POST['Agree'])){
    $_POST['Agree'] = 'not agree';
  }
  $agree= $_POST['Agree']  ;
  $sql = "UPDATE persons
  SET Name = '$useName', Email = '$email', Gender = '$gander'  ,Mail_Status=  '$agree'
  WHERE  ID =  '$user_id'";
if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

}

//the query
$query="select* from persons";


//run query 
$result=$con->query($query);

?>

<table border="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Mail_Status</th>
    <th>Action</th>
  </tr>
  <?php
  //convert data to assoc array 

while($row=$result->fetch_assoc())
{
?>
<tr>
   <td><?php echo $row['ID']; ?> </td>
   <td><?php echo $row['Name']; ?> </td>
   <td><?php echo $row['Email']; ?> </td>
   <td><?php echo $row['Gender']; ?> </td>
   <td><?php echo $row['Mail_Status']; ?> </td>
   <td><a href="">view</a> <a href="">delete</a> <a href="edit.php?id=<?= $row['ID'];?>">edit</a> </td>
 <tr>
<?php
}
?>
