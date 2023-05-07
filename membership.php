<?php
session_start();
require_once('smtp\PHPMailerAutoload.php');
 $servername="localhost";
 $username="sayani";
 $password="abcdefg";
 $dbname="library";

 //Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) 
 {
     die("Connection failed: " . $conn->connect_error);
 }

 $sql = "SELECT * FROM customer_details ";
 $result= $conn->query($sql);
 if(mysqli_num_rows($result)){
 while($row = mysqli_fetch_assoc($result)){
 $time=$row['Time_stamp'];
 echo "Membership purchased".$time;

$membership_ends=date("Y-m-d", strtotime(date("Y-m-d",strtotime($time)). "+1 day"));
echo "Membership expires".$membership_ends;
$date=date("Y-m-d");
echo "Today is".$date;

 if(date("Y-m-d")< $membership_ends){
     echo "Membership is live";

 }else if(date("Y-m-d")>=$membership_ends){
    echo "Membership expired!";
    $sql_u=mysqli_query($conn,"UPDATE customer_details set Package=0 where CURRENT_DATE-Time_stamp>=1;");
    if($sql_u){
        $sql_p=mysqli_query($conn,"SELECT * from customer_details where Package=0;");
        if(mysqli_num_rows($sql_p)>0){
            
                $mail= new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host="smtp.gmail.com";
                $mail->Port=587;
                $mail->SMTPSecure='tls';
                $mail->SMTPAuth=true;
                $mail->isHTML(true);
                $mail->Username="sayanihati2001@gmail.com";
                $mail->Password="jqwujzzfgszlepbt";
                $mail->setFrom("sayanihati2001@gmail.com");
                $mail->SMTPOptions=array('ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>false
                ));
                while($row_p=mysqli_fetch_assoc($sql_p)){
                $email=$row_p['email'];

                $mail->addAddress($email);
                $mail->Subject="Package expired!";
                $mail->Body="  

                <div class='container' style='background-image: url(https://i.pinimg.com/originals/6b/dc/da/6bdcda32d4cce8f1ff690fe948dee0b8.jpg);
                        background-size:cover;height: 400px;
                        width: auto;
                        opacity: 0.7;'>
                    <p style=' text-align: center;
                        font-size: 20px;
                        color: red;
                        text-decoration:thick;
                        padding-top: 100px;'> The Last Chapter says,<br> Your Membership has expired! <br>
                    Please renew it to avail our services.<br>
                    <a href='http://localhost/sem-6%20Project/update_package.php'>Click here to renew your membership</a></p>
                    
                </div>
            ";
               }
               if($mail->send()){
                echo "Mail send";
            }else{
                echo "no";
            }
            }
        }
    }

  }}

?>