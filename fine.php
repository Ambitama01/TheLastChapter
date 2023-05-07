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
    <h3 class="heading">Information on Late Fines</h3>
    <?php
    if(isset( $_SESSION['ADMIN_LOGIN'])){
        ?>
        <form method="POST" class="form">
            <div class="mb-3">
                <label for="search" class="form-label"></label>
                <input type="text" name="Search" class="form-control" id="Search" placeholder="Search" >
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $search=$_POST['Search'];
            $query=mysqli_query($conn,"SELECT fine.*, customer_details.* from fine JOIN customer_details ON fine.User_id=customer_details.id
             where customer_details.Firstname LIKE '$search%';");
             if(mysqli_num_rows($query)==0){
                 echo "Sorry, no data is found";
             }else{?>
                <table class="mt-5 table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Order Id</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">No of days</th>
                    <th scope="col">Fine</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php
                    $count=0;
                    while ($row = mysqli_fetch_assoc($query)){
                    ?>
                <tbody>
                    <tr>
                    <td><?php echo $row['User_id'];?></td>
                    <td><?php echo $row['Firstname']." ". $row['Lastname'];?></td>
                    <td><?php echo $row['Book_id'];?></td>
                    <td><?php echo $row['return_book'];?></td>
                    <td><?php echo $row['day'];?></td>
                    <td><?php echo $row['fine'];?></td>
                    <td><?php echo $row['status'];?></td>
                    </tr>
                </tbody>
            <?php
             }
        }}else{
     
            $sql = "SELECT fine.*, customer_details.* from fine JOIN customer_details ON fine.User_id=customer_details.id;";
            $result = $conn->query($sql);

       
        if(mysqli_num_rows($result)>0){
        ?><table class="mt-5 table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Order Id</th>
                <th scope="col">Return Date</th>
                <th scope="col">No of days</th>
                <th scope="col">Fine</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
                $count=0;
                while ($row = mysqli_fetch_assoc($result)){
                ?>
            <tbody>
                <tr>
                <td><?php echo $row['User_id'];?></td>
                <td><?php echo $row['Firstname']." ". $row['Lastname'];?></td>
                <td><?php echo $row['Book_id'];?></td>
                <td><?php echo $row['return_book'];?></td>
                <td><?php echo $row['day'];?></td>
                <td><?php echo $row['fine'];?></td>
                <td><?php echo $row['status'];?></td>
                </tr>
            </tbody>
            <?php }
            }else{
                echo 'No late fines.';
            }}}else{
                echo 'Please log in first';
            }
                ?>
        </table>
    </div>
    
</body>
</html>
