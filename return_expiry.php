<?php
session_start();
include('smtp\PHPMailerAutoload.php');
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
 $var='<p style="background-color:red;color:black;text-align:center;">Expired</p>';
$sql=mysqli_query($conn,"SELECT * from order_details where approve='$var'");
if(mysqli_num_rows($sql)>0){
    while($row=mysqli_fetch_assoc($sql)){
        $date=date("Y-m-d");
        $return_date=$row['return_date'];
        if($date>$return_date){
            $query=mysqli_query($conn,"SELECT customer_details.*,order_details.* from customer_details join order_details on customer_details.id=order_details.User_id
             WHERE order_details.approve='$var';");
             if(mysqli_num_rows($query)>0){

                    $mail= new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host="smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure='tls';
                    $mail->SMTPAuth=true;
                    $mail->Username="sayanihati2001@gmail.com";
                    $mail->Password="jqwujzzfgszlepbt";
                    $mail->setFrom("sayanihati2001@gmail.com");
                    $mail->SMTPOptions=array('ssl'=>array(
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>false
                    ));

                    while($row_u=mysqli_fetch_assoc($query)){
                        $email=$row_u['email'];
                        $name=$row_u['Firstname'];
                        $bookname=$row_u['order_name'];
                        $return=$row_u['return_date'];
   
                       $date_u=strtotime($row_u['return_date']);
                       $current_date=strtotime(date("Y-m-d"));
                       $diff=$current_date-$date_u;
                       if($diff>=0){
                       $day=floor($diff/(60*60*24));
                       $fine=$day*10;
                       }
                        echo $email,$name,$bookname;
                    $mail->addAddress("$email");
                    $mail->isHTML(true);
                    $mail->Subject="Book issue Expired!";
                    $mail->Body=" <div class='container' style='background-image: url(https://i.pinimg.com/originals/6b/dc/da/6bdcda32d4cce8f1ff690fe948dee0b8.jpg);
                    background-size:cover;height: 400px;
                    width: auto;
                    opacity: 0.7;'>
                <p style=' text-align: center;
                    font-size: 20px;
                    color: red;
                    text-decoration:thick;
                    padding-top: 100px;'>Hi, $name, your issue of $bookname has expired on $return. Please click on the return book button on book issue page to return the book. Please ensure that the book is in perfect condtion and return
                     it to our delivery agent along with a fine of $fine. Thank You. </p></div>";
                    }
                   
                    if($mail->send()){
                        echo "Mail send";
                    }else{
                        echo "no";
                    }
                 }
        }
    }
}
?>