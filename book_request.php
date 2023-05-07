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
    <h3 class="heading">Request of books</h3>
    <form method="POST" class="form">
  <div class="mb-3">
    <label for="userid" class="form-label">User Id</label>
    <input type="text" name="userid" class="form-control" id="userid">
  </div>
  <div class="mb-3">
    <label for="orderid" class="form-label">Order Id</label>
    <input type="text" name="orderid" class="form-control" id="orderid">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    <table class="table">
        <?php
         if(isset( $_SESSION['ADMIN_LOGIN'])){
            $sql = "SELECT order_details.*,book_details.Availability,book_details.Quantity FROM order_details JOIN book_details on order_details.order_id=book_details.Book_id where order_details.approve='';";
         $result = $conn->query($sql);
         if(mysqli_num_rows($result)>0)
         {

        ?>
            <thead>
                <tr>
                <th scope="col">User Id</th>
                <th scope="col">Order Id</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Price</th>
                <th scope="col">Rent</th>
                <th scope="col">Availability</th>
                <th scope="col">Quantity</th>
                <th scope="col">Approval</th>
                <th scope="col">Issued Date</th>
                <th scope="col">Return Date</th>
                </tr>
            </thead>
            <?php
                while ($row = mysqli_fetch_assoc($result)){
                ?>
            <tbody>
                <tr>
                <td><?php echo $row['User_id'];?></td>
                <td><?php echo $row['order_id'];?></td>
                <td><?php echo $row['order_name'];?></td>
                <td><?php echo $row['author'];?></td>
                <td><?php echo $row['genre'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['rent'];?></td>
                <td><?php echo $row['Availability'];?></td>
                <td><?php echo $row['Quantity'];?></td>
                <td><?php echo $row['approve'];?></td>
                <td><?php echo $row['issue_date'];?></td>
                <td><?php echo $row['return_date'];?></td>
                </tr>
            </tbody>
            <?php }
            }else{
                echo 'There is no pending request.';
            }}else{
                echo 'Please log in first';
            }
                ?>
        </table>  
    </div>
    <?php
    if(isset($_POST['submit'])){
        $_SESSION['userid']=$_POST['userid'];
        $_SESSION['orderid']=$_POST['orderid'];
        ?>
        <script>
            window.location.href='approve.php';
        </script>
        <?php
    }?>
</body>
</html>