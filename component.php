<?php
    function cartElements($productimg, $productname, $productauthor,$productgenre,$productrent,$productid)
    {
    $element="
    <form action=\"cart.php?action=remove&Book_id=$productid\" method=\"POST\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3\">
                    <img src=$productimg alt=\"\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6 column2 \"style=\"text-align:left;\">
                    <h5 class=\"pt-2\">Title- $productname</h5>
                    <h5 class=\"pt-2\">Author- $productauthor</h5>
                    <h5 class=\"pt-2\">Genre- $productgenre</h5>
                    <h5 class=\"pt-2\">Rent- INR $productrent</h5>
                    <a href =\"delete.php?id=$productid\" style=\"text-decoration:none;\" class=\"btn-btn-primary mx-2\" id=\"remove\" name=\"remove\">Remove</a>
                    </div>
                    <div class=\"col-md-3\">

                    </div>
            </div>
        </div>
    </form>
    ";

        
    echo $element;
    }
    function checkoutElements($productimg, $productname, $productauthor,$productgenre,$productrent,$productid)
    {
    $element="
    <form action=\"checkout.php?action=remove&Book_id=$productid\" method=\"POST\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3\">
                    <img src=$productimg alt=\"\" class=\"img-fluid pt-4\">
                </div>
                <div class=\"col-md-9 column2 \"style=\"text-align:left;\">
                <button type=\"submit\" mx-2\" id=\"remove\" name=\"remove\" style=\"float:right; border:none; background-color:white; margin-top:10px;margin-left:100px;\">
                <i class=\"fa fa-trash\"></i></button>
                    <h5 class=\"pt-2\">Title- $productname</h5>
                    <h5 class=\"pt-2\">Author- $productauthor</h5>
                    <h5 class=\"pt-2\">Genre- $productgenre</h5>
                    <h5 class=\"pt-2\">Rent- INR $productrent</h5>
                    </div>
            
            </div>
        </div>
    </form>
    ";

        
    echo $element;
    }

?>
