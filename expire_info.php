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
    <h3 class="heading">Information on Expired Books</h3>
    <?php
    if(isset( $_SESSION['ADMIN_LOGIN'])){
        ?>
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
        <?php
     
            $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
            $sql = "SELECT order_details.* FROM order_details JOIN book_details on order_details.order_id=book_details.Book_id 
            where order_details.approve ='$var' order by order_details.return_date desc;";
            $result = $conn->query($sql);

       
        if(mysqli_num_rows($result)>0){
        ?><table class="mt-5 table">
            <thead>
                <tr>
                <th scope="col">User Id</th>
                <th scope="col">Order Id</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Price</th>
                <th scope="col">Rent</th>
                <th scope="col">Approval</th>
                <th scope="col">Issued Date</th>
                <th scope="col">Return Date</th>
                </tr>
            </thead>
            <?php
                $count=0;
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
                <td><?php echo $row['approve'];?></td>
                <td><?php echo $row['issue_date'];?></td>
                <td><?php echo $row['return_date'];?></td>
                </tr>
            </tbody>
            <?php }
            }else{
                echo 'No expired book to show.';
            }}else{
                echo 'Please log in first';
            }
                ?>
        </table>  
    </div>
    
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $user_id=$_POST['userid'];
        $order_id=$_POST['orderid'];
        $r=mysqli_query($conn,"SELECT * from order_details where User_id='$user_id' and order_id='$order_id';");
        while ($row_r = mysqli_fetch_assoc($r))
        {
            $date=strtotime($row_r['return_date']);
            $current_date=strtotime(date("Y-m-d"));
            $diff=$current_date-$date;
            if($diff>=0){
              $day=floor($diff/(60*60*24));
              $fine=$day*10;
            }
    
          }
        $x=date("Y-m-d");
        mysqli_query($conn,"INSERT into fine (User_id,Book_id,return_book,day,fine,status) values('$user_id','$order_id','$x','$day','$fine','paid')");
        $var_return='<p style="background-color:green;color:black;text-align:center;">Returned</p>';
        mysqli_query($conn,"UPDATE order_details set approve='$var_return' where User_id='$user_id' and order_id='$order_id'  ;");
        ?>
        <script>
            alert("Updated succesfully");
            window.location.href="expire_info.php";
           
        </script>
    <?php
    }
?>
