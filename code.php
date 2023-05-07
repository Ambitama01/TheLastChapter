<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Linking bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--Custom css file link-->
        <link rel="stylesheet" href="modal.css">
        
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<?php
        include("navbar.php");
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
            if(isset($_POST['checking_viewbtn']))
            {
                $b_id=$_POST['book_id'];
                //echo $return =$b_id;
                $sql = "SELECT * from book_details where Book_id='$b_id'";
                $result = $conn->query($sql);
                if($result -> num_rows>0)
                {
                    foreach ($result as $row) {
                        echo $return='
                        <table class="view_table">
                            <tr>
                                <td colspan="2"><h4>'.$row['Book_name'].'</h4></td></tr>
                                <tr><td><b>'.$row['Author'].'</b></td>
                                <td><b>'.$row['Genre'].'</b></td></tr>
                                <tr><td colspan="2">'.$row['Synopsis'].'</td></tr>
                                <tr><td>Price-'.$row['Price'].'</td>
                                <td>Rent-'.$row['Rent'].'</td></tr>
                                <tr><td>'.$row['Availability'].'</td>
                            </tr>
                        </table>
                        
                    ';
                    }
                  
                }
                else
                {
                    echo $return= "0 results";
                }    
            }
            ?>
</html>