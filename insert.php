<?php 
if($_POST){
include 'config/database.php';

try{
     
  // insert query
  $query = "INSERT INTO students SET firstname=:firstname, lastname=:lastname, course=:course, contact=:contact";

  // prepare query for execution
  $stmt = $con->prepare($query);

  // posted values
  $firstname=htmlspecialchars(strip_tags($_POST['fname']));
  $lastname=htmlspecialchars(strip_tags($_POST['lname']));
  $course=htmlspecialchars(strip_tags($_POST['course']));
  $contact=htmlspecialchars(strip_tags($_POST['contact']));

  // bind the parameters
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':course', $course);
  $stmt->bindParam(':contact', $contact);
   


  // Execute the query
  if($stmt->execute()){

      echo "<div class='alert alert-success'>Record was saved.</div>";
      header('Location:index.php');
      exit;
  }else{
      echo "<div class='alert alert-danger'>Unable to save record.</div>";
  }
   
}

// show error
catch(PDOException $exception){
  die('ERROR: ' . $exception->getMessage());
}

}