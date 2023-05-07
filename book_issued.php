<?php include('navbar.php');
$user=  $_SESSION['USER_ID'] ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book_issued.css">
</head>
<?php
    $book_id='';
    $b=mysqli_query($conn,"SELECT * from order_details where User_id='$user' and approve='yes' order by return_date asc limit 0,1;");
    $bid=mysqli_fetch_assoc($b);
    if($bid>0){
        $book_id= $bid['order_id'];
    }else{
        $book_id=null;
    }
    
    $query=mysqli_query($conn,"SELECT * from timer_date where User_id=$user and order_id='$book_id';");
    $res=mysqli_fetch_assoc($query);
?>
<body>
    <div class="profile">
    <h3 class="heading">Books Issued</h3>
    <!-----------------------------------Timer------------------->
    <!-- Display the countdown timer in an element -->
    <p id="demo"></p>
    <div class="timer">
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?php  echo $res['Time']; ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
    </script>
    </div>
    <!------------------------------------------------------------>
    <h5 class="">Late Fine: Rs
    <?php
        $d=$_SESSION['day'];
        echo ($d*10);
    ?></h5>
    <div class="col-md-12 mt-3">
        <div class="row px-5">
            <div class="col-md-6" style="margin-left: -44px;">
                <form action="" method="POST">
                <button class="btn btn-info " name="Return_book" id="Return_book" type="submit">Return Book</button> &nbsp;
                </form>
                <?php

if(isset($_POST['Return_book'])){
    include('smtp\PHPMailerAutoload.php');
    $email=$_SESSION['EMAIL'];
    $name= $_SESSION['USER_NAME'];
    $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
    $sql_check="SELECT * FROM `order_details` WHERE User_id='$user' and (approve='yes' or approve='' or approve='$var');";
    $result_check=mysqli_query($conn,$sql_check);
    if(mysqli_num_rows($result_check)>0){

       
        $mail= new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->Port=587;
        $mail->SMTPSecure='tls';
        $mail->SMTPAuth=true;
        $mail->Username="sayanihati2001@gmail.com";
        $mail->Password="jqwujzzfgszlepbt";
        $mail->setFrom("$email");
        $mail->addAddress("sayanihati2001@gmail.com");
        $mail->isHTML(true);
        $mail->Subject="Book Return";
        while($row_check=mysqli_fetch_assoc($result_check)){
            $book_name=$row_check['order_name'];
            $order_id=$row_check['order_id'];
        $mail->Body="Return book $book_name.
                    Order Id=$order_id.
                    User Id=$user.";
        }
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if($mail->send()){
            ?>
            <script>
                alert("Message sent! Wait patiently till our delivery boy collects your book.");
            </script>
            <?php
        }else{
            echo "no";
        }
    
    
    }
}
?>

        </div>
        <div class="col-md-6" style="padding-left:70px;">
            <form action="" method="POST">
                <div class="buttons">
                    <button class="btn btn-success" name="Returned" id="Returned" type="submit">Returned</button> &nbsp;
                    <button class="btn btn-danger" name="Expired" id="Expired" type="submit">Expired</button> &nbsp;
                    <button class="btn btn-dark" name="Unapproved" id="Unapproved" type="submit">Unapproved</button> &nbsp;
                    <button class="btn btn-light" name="Approved" id="Approved" type="submit">Approved</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <table class="table" id="table">
            <thead>
                <tr>
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
            if(isset($_POST['Returned'])){
                $var_return='<p style="background-color:green;color:black;text-align:center;">Returned</p>';
                $sql = "SELECT * from order_details where User_id=$user and approve= '$var_return'";
                $result = $conn->query($sql);

            }else if(isset($_POST['Expired'])){
                $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
                $sql = "SELECT * from order_details where User_id=$user and approve= '$var'";
                $result = $conn->query($sql);

            }else if(isset($_POST['Unapproved'])){
                $sql = "SELECT * from order_details where User_id=$user  and approve=''";
                $result = $conn->query($sql);
            }else if(isset($_POST['Approved'])){
                $sql = "SELECT * from order_details where User_id=$user and approve='yes'";
                $result = $conn->query($sql);

            }else{
                $sql = "SELECT * from order_details where User_id=$user ";
                $result = $conn->query($sql);
            }
       
        if(!empty($result))
            {
                while ($row = mysqli_fetch_assoc($result)){
                ?>
            <tbody>
                <tr>
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
                echo 'You have not issued anybook.';
            }
            ?>
        </table>  
    </div>
    <?php
      include('footer.php');
     ?>
</body>
</html>
