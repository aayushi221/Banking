<html>
   <head>
   <title>View Customers</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" href="styles.css"> -->

<style> 
  .container {
    margin-top : 1%;
  }
  
  body {
    background-image: url("display.jpg");
    background-position: center; 
    background-repeat: no-repeat; 
    background-size: cover;
    opacity : 2;
 
  }

  table {
    width: 100%;
  }
  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  color: white;
}
  .btn {
    margin-top: 9%;
  }
  .nounderline
{
    text-decoration:none !important;
}

.btn-home {
  margin-bottom: 10%;
}
  </style>
  </head>
  <body>
  <div class="container">
  <a href ="showtransactions.php" class ="nounderline"><button type="button" class="btn btn-secondary btn-lg btn-block btn-home">Show Transactions</button></a>

<?php

include("connection.php");
error_reporting(0);

$query = "SELECT * FROM transfer";
$data = mysqli_query($conn,$query);

?>


 <div class= "container">
   
 <div class= "table-responsive">  
 <table class="table table-hover table-bordered ">
  <thead class="thead-dark">
    <tr  style= "background-color: #ffffff;">
      <th scope="col">Account_No</th>
      <th scope="col">Name </th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Current_credit</th>
    </tr>
  </thead>

</div>
</div>

<?php
 
 
while($result = mysqli_fetch_assoc($data))
{
   echo " <strong> <tr>
   <td>".$result['Account_No']."</td>
    <td>".$result['Name']."</td>
   <td>".$result['Email']."</td>
   <td>".$result['Phone_no']."</td>
   <td>".$result['Current_credit']."</td>
</tr></strong>";
}


?>

</table>
</div>
<a href ="transfers.php" class ="nounderline"><button type="button" class="btn btn-secondary btn-lg btn-block">Transfer Money</button></a>
</body>
</html>

