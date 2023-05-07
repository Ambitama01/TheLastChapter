<?php include('navigation_admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book_issued.css">
</head>
<body>
<div class="profile">
    <h3 class="heading">Approve Book</h3>
    <form method="POST" class="approve_form">
  <div class="mb-3">
    <label for="approve" class="form-label">Approve</label>
    <input type="text" name="approve" class="form-control" id="approve" placeholder="yes or no" required>
  </div>
  <div class="mb-3">
    <label for="issuedate" class="form-label">Issue Date</label>
    <input type="text" name="issuedate" class="form-control" id="issuedate" placeholder="yyyy-mm-dd" required>
  </div>
  <div class="mb-3">
    <label for="returndate" class="form-label">Return Date</label>
    <input type="text" name="returndate" class="form-control" id="returndate" placeholder="yyyy-mm-dd" required>
  </div>
  <div class="mb-3">
    <label for="time" class="form-label">Return Date with Time</label>
    <input type="text" name="time" class="form-control" id="time" placeholder="May 18,2022 15:00:00" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $approve=$_POST['approve'];    
    $issuedate=$_POST['issuedate'];
    $returndate=$_POST['returndate'];
    $user_id=$_SESSION['userid'];
    $order_id=$_SESSION['orderid'];
    $time=$_POST['time'];
    mysqli_query($conn,"INSERT into timer_date values ('$user_id','$order_id','$time');");
    mysqli_query($conn,"UPDATE order_details set approve='$approve',issue_date='$issuedate',return_date='$returndate' 
    where User_id='$user_id' and order_id='$order_id' ;");

    mysqli_query($conn,"UPDATE book_details set Quantity=Quantity-1 where Book_id='$order_id'");
    $result=mysqli_query($conn,"SELECT Quantity from book_details where Book_id='$order_id'");
    while($row=mysqli_fetch_assoc($result)){
        if($row['Quantity']==0){
            mysqli_query($conn,"UPDATE book_details set Availability='Out of Stock' where Book_id='$order_id'");
        }
    }
    ?>
    <script>
        alert("Updated succesfully");
        window.location.href="book_request.php";
       
    </script>
<?php }
?>