<?php


if($_POST){


  //include database connection
include 'config/database.php';

$id=isset($_POST['updateId']) ? $_POST['updateId'] : die('ERROR: Record ID not found.');

      
  try{
   
      // write update query
      // in this case, it seemed like we have so many fields to pass and 
      // it is better to label them and not use question marks
      $query = "UPDATE students 
                  SET firstname=:firstname, lastname=:lastname, course=:course,contact=:contact 
                  WHERE id = :id";

      // prepare query for excecution
      $stmt = $con->prepare($query);

       // posted values
  $firstname=htmlspecialchars(strip_tags($_POST['fname']));
  $lastname=htmlspecialchars(strip_tags($_POST['lname']));
  $course=htmlspecialchars(strip_tags($_POST['course']));
  $contact=htmlspecialchars(strip_tags($_POST['contact']));
  $id=htmlspecialchars(strip_tags($_POST['updateId']));

      // bind the parameters
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':course', $course);
  $stmt->bindParam(':contact', $contact);
      $stmt->bindParam(':id', $id);
      
      
    
      // Execute the query
      if($stmt->execute()){
          echo "<div class='alert alert-success'>Record was updated.</div>";
          header('Location:index.php');
      }else{
          echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
      }
       
  }catch(PDOException $exception){
      die('ERROR: ' . $exception->getMessage());
  }
}