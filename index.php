<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php crup app with bootstrap modal.</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
 


<!-- Modal -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="insert.php" method="POST">
      <div class="modal-body">
           
                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                  
                </div>
                <div class="form-group">
                  <label >Last Name</label>
                  <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                  
                </div>
                <div class="form-group">
                  <label >Course</label>
                  <input type="text" name="course" class="form-control" placeholder="Enter Course Name">
                  
                </div>
                <div class="form-group">
                  <label >Phone Number</label>
                  <input type="text" name="contact" class="form-control" placeholder="Enter Phone Number">
                  
                </div>
                
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insertData" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ###################################################################################################################### -->
<!-- Edit Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update.php" method="POST">
      <div class="modal-body">
            <input type="hidden" name="updateId" id="updateId">
                <div class="form-group">
                  <label >First Name</label>
                  <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                  
                </div>
                <div class="form-group">
                  <label >Last Name</label>
                  <input type="text" name="lname" id="lname"  class="form-control" placeholder="Enter Last Name">
                  
                </div>
                <div class="form-group">
                  <label >Course</label>
                  <input type="text" name="course" id="course"  class="form-control" placeholder="Enter Course Name">
                  
                </div>
                <div class="form-group">
                  <label >Phone Number</label>
                  <input type="text" name="contact" id="contact"  class="form-control" placeholder="Enter Phone Number">
                  
                </div>
                
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updateData" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>





  <div class="container">
    <div class="jumbotron">
      <div class="card">
        <h1>PHP MODAL APP</h1>
      </div>
      <div class="card">
        <div class="card-body">
        <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentAddModal">
            New Student
          </button>

        </div>
      </div>


      <div class="card">
        <div class="card-body">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">LAST NAME</th>
                <th scope="col">COURSE</th>
                <th scope="col">CONTACT</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
// include database connection
include 'config/database.php';

// select all data
$query = "SELECT id, firstname, lastname, course,contact FROM students ORDER BY id DESC";
$stmt = $con->prepare($query);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();
if($num>0){

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);

  ?> 
              <tr>
               
                <td><?php echo $id;?></td>
                <td><?php echo $firstname;?></td>
                <td><?php echo $lastname;?></td>
                <td><?php echo $course;?></td>
                <td><?php echo $contact;?></td>
                <td><button type="button" class="btn btn-success editBtn">Edit</button></td>               
              </tr>
                
  <?php     }?>
    </tbody>
    </table>
  </div>
</div>
<?php
  }else{
    echo "<div class='alert alert-danger'>No records found.</div>";
  }
  ?>
    </div>
  </div>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script>

$(document).ready(function(){
  $('.editBtn').on('click',function(){
    $('#studentEditModal').modal('show');
    row = $(this).closest('tr');
    var data = row.children("td").map(function(){
      return $(this).text();
    }).get();

    console.log(data);
    $('#updateId').val(data[0]);
    $('#fname').val(data[1]);
    $('#lname').val(data[2]);
    $('#course').val(data[3]);
    $('#contact').val(data[4]);
  });
});

</script>
</body>
</html>
