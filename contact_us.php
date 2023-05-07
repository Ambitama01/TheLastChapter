<?php
include("navbar.php");
if(isset($_GET['type']) && $_GET['type'] != ''){
    $type=get_safe_value($conn,$_GET['type']);
    
    if($type == 'delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE from contact_us where id='$id";
        mysqli_query($conn,$delete_sql);
    }
}

$sql="SELECT * from contact_us order by id desc";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--Linking bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="contact_us.css">
</head>
<body>
<div class="contact">
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Query</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
   <?php
   $i=1;
   while($row=mysqli_fetch_assoc($result)){?>
    <tr>
        <td class="serial"><?php echo $i?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['Email']?></td>
        <td><?php echo $row['Mobile']?></td>
        <td><?php echo $row['Comment']?></td>
        <td><?php echo $row['Added_on']?></td>
    </tr>
   <?php
   } ?>
  </tbody>
</table>
</div>
<!--Linking javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>