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
$sql=mysqli_query($conn,"SELECT * from order_details where approve='yes'");
if(mysqli_num_rows($sql)>0){
    while($row=mysqli_fetch_assoc($sql)){
        $date=date("Y-m-d");
        $return_date=$row['return_date'];
        if($date==$return_date){
            $query=mysqli_query($conn,"SELECT * from  order_details WHERE approve='yes' and return_date='$date';");
             if(mysqli_num_rows($query)>0){
                
                    $mail= new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host="smtp.gmail.com";
                    $mail->Port=587;
                    $mail->SMTPSecure='tls';
                    $mail->SMTPAuth=true;
                    $mail->Username="sayanihati2001@gmail.com";
                    $mail->Password="beverlyhills90210";
                    $mail->setFrom("sayanihati2001@gmail.com");
                    $mail->SMTPOptions=array('ssl'=>array(
                        'verify_peer'=>false,
                        'verify_peer_name'=>false,
                        'allow_self_signed'=>false
                    ));
                    while($row_u=mysqli_fetch_assoc($query)){
                    $user_id=$row_u['User_id'];
                    $order_id=$row_u['order_id'];
                    $name=$row_u['order_name'];
                    $author=$row_u['author'];
                    $genre=$row_u['genre'];
                    $price= $row_u['price'];
                    $rent= $row_u['rent'];
                    $approve= $row_u['approve'];
                    $issue_date= $row_u['issue_date'];
                    $return_date= $row['return_date'];
                       
                    $mail->addAddress("sayanihati2001@gmail.com");
                    $mail->isHTML(true);
                    $mail->Subject="Books that are expiring today";
                    $mail->Body="  
                    <table class='table table-bordered' id='table' style=' border: 1px solid black; border-collapse: collapse;'>
                    <thead>
                        <tr>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>User Id</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Order Id</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Book Name</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Author</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Genre</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Price</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Rent</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Approval</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Issued Date</th>
                        <th scope='col' style=' border: 1px solid black; border-collapse: collapse;'>Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$user_id."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$order_id."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$name."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$author."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$genre."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$price."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$rent."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$approve."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$issue_date."</td>
                    <td style=' border: 1px solid black; border-collapse: collapse;'>".$return_date."</td>
                    </tr>
                </tbody>
                </table>";
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
