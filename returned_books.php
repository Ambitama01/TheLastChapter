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
    <h3 class="heading">Information on Returned Books</h3>
    
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
            $var_return='<p style="background-color:green;color:black;text-align:center;">Returned</p>';
            $sql = "SELECT order_details.* FROM order_details JOIN book_details on order_details.order_id=book_details.Book_id 
            where order_details.approve ='$var_return' order by order_details.return_date desc;";
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
                echo 'No returned book to show.';
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
        $Security_deposit=$_SESSION['SD'];
        $sql_u=mysqli_query($conn,"UPDATE customer_details JOIN order_details ON customer_details.id=order_details.User_id SET customer_details.Security_deposit=customer_details.Security_deposit-order_details.price
        WHERE customer_details.id='$user_id' AND order_details.User_id='$user_id' and order_details.order_id='$order_id' ;");
        if($sql_u){
            $query=mysqli_query($conn,"SELECT * from customer_details where id='$user_id'");
            $result_u=mysqli_num_rows($query);
            if($result_u>0){
            $row_u=mysqli_fetch_assoc($query);
            $_SESSION['SD']=$row_u['Security_deposit'];
            }
        ?>
        <script>
            alert("Updated succesfully");
            window.location.href="returned_books.php";
           
        </script>
    <?php
    }}
?>


