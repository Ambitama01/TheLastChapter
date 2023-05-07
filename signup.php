<html>
    <html lang="en">
        <?php
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
            $Firstname=$_REQUEST['fname'];
            $Lastname=$_REQUEST['lname'];
            $Email=$_REQUEST['email'];
            $Password=$_REQUEST['password'];
            $Address=$_REQUEST['address'];
            $Package=$_REQUEST['package'];
            $sql="INSERT INTO customer_details values ('Firstname', 'Lastname', 'Email', 'Password','Address','Package');";

            if ($conn->query($sql) === TRUE)
            {
                echo "Data inserted!";
                ?>
                <br>
                <a href ="signup_form.php"><button type="button">Go to previous page</button></a>
                <?php
            }   
                else{
                    echo "Error: " . $sql . "<br>" . $conn -> error;
                }
            
            $conn -> close();
            ?>
    </html>