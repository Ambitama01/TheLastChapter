<?php
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    unset($_SESSION['cart'][$id]);
    unset ($_SESSION['cart']);
    ?>
        <script>
            alert("Item removed");
            window.history.go(-1);
        </script>
    <?php
}
?>