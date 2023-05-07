<?php

include('navbar.php');
if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
        window.location.href="search.php";
    </script>
    <?php
}
$user=$_SESSION['USER_NAME'];
$sessionid=  $_SESSION['USER_ID'] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="account.css">
    
</head>
<body>
<div class="profile">
<figure class="snip0045 green">
	<figcaption>
    <?php
     $query=mysqli_query($conn,"SELECT * from customer_details where id='$sessionid'");
     $result_u=mysqli_num_rows($query);
     if($result_u>0){
     $row_u=mysqli_fetch_assoc($query);
     $_SESSION['PACKAGE']=$row_u['Package'];
     }
     if($_SESSION['PACKAGE']>0){
        ?>
        <h4 style="color: green; font-size:20px; padding-bottom:5px;">Membership is Live!</h4>
        <?php
            $sql = "SELECT customer_details.*, customer_order.* FROM customer_details JOIN customer_order ON customer_details.id=customer_order.User_id where customer_details.Firstname='$user' limit 1";
        $result = $conn->query($sql);
        if(!empty($result))
            {
                while ($row = mysqli_fetch_assoc($result)){
                ?>
		<br><h2><?php echo $row['Firstname'];?> <span><?php echo $row['Lastname'];?></span></h2>
		<p>Some things don't need the thought people give them.</p>
        <p><i class="fa fa-address-card"> Address-</i><?php echo $row['address'],', ', $row['apartment'],', ', $row['city'],', ', $row['state'],', ', $row['pincode'];?></p>
        <p><i class="fa fa-envelope"> Email-</i><?php echo $row['email'];?></p>
        <p><i class="fa fa-phone"> Contact Number-</i><?php echo $row['Number'];?></p>
        <p><i class="fa fa-rocket"> Package-</i><?php echo $row['Package'];?></p>
        <p><i class="fa fa-rocket"> Security Deposit-</i><?php echo $row['Security_deposit'];?></p>
        <form method="POST" class="Update_package">
            <div class="mb-3">
                <label for="Security_deposit" class="form-label">Update Security Deposit</label>
                <input type="text" name="Security_deposit" class="form-control" id="Security_deposit">
                <span id="Security_deposit_result"></span>
                <span class="field_error" id="Security_deposit_error"></span>
                <h6>*For more informations on security deposit please visit our About Us page before making payment.</h6>
            </div>
            <button type="submit" name="submit" class="btn btn-warning make_payment" >Submit</button>
        </form>
                
	</figcaption>
	<img src=<?php echo $row['Image'];?> alt="sample6"/>	
    <?php
                }}else {
                    echo "0 results";
                }}else{
                    ?>
                    <h4 style="color: red;">Membership has Expired!</h4>
                    <?php
                }
                ?>
   
	<div class="position"><a href="logout.php">LOG OUT</a></div>
</figure>
</div>
<?php
      include('footer.php');
     ?>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $Package=$_SESSION['PACKAGE'];
    $Security_deposit=$_POST['Security_deposit'];
    $_SESSION['temp_sd']=$_POST['Security_deposit'];
    $sessionid=  $_SESSION['USER_ID'] ;
    if($Security_deposit!=$Package){
        ?>
        <script>
            alert("Enter Security deposit respective to your chosen package");
        </script>
    <?php

    }else{
    $sql_p="UPDATE customer_details set Security_deposit='$Security_deposit' where id='$sessionid'";
    if(mysqli_query($conn,$sql_p)==1){
        $_SESSION['SD']=$Security_deposit;

    }    
    ?>
 <script>
     window.location.href='payment_acc.php';
    
 </script>
 <?php
  
 }}
?>
