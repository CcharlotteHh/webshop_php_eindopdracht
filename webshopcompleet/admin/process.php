<?php

include 'db.php';

    if(isset($_POST["newproduct_submit"])){
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_price = $_POST["product_price"];
        $product_color = $_POST["product_color"];
        $product_weight = $_POST["product_weight"];
        $product_active = $_POST["product_active"];

        $_SESSION['message'] = "Record has been saved";
        $_SESSION['mgs_type'] ="succes";

        $query = "insert into product (name, description, price, color, weight)
        values ('$product_name','$product_description',$product_price,'$product_color',$product_weight)";
        $result = mysqli_query($conn, $query);
        header('Location: index.php');
    }
     //delete product
     if (isset($_GET['Del'])) {
        $Del = $_GET['Del'];
        $sql = "delete from product where product_id='$Del'";
        $result = mysqli_query($conn, $sql);

        $_SESSION['message'] = "Record has been deleted";
        $_SESSION['mgs_type'] ="danger";

        if ($result) {
            header('location: index.php');
        }
    }
     //edit product + (view details)

    if(isset($_GET['opt'])){
        if($_GET['opt'] == 'update'){
            //update start date
            $product_name = $_POST["name"];
            $product_description = $_POST["description"];
            $product_price = $_POST["price"];
            $product_color = $_POST["color"];
            $product_weight = $_POST["weight"];
            
            $opt = $_GET['p_id'];;
    
            $_SESSION['message'] = "Record has been saved";
            $_SESSION['mgs_type'] ="succes";
    
            $query = "UPDATE product set name = '$product_name', description = '$product_description', price = $product_price, color='$product_color', weight = $product_weight
            where product_id = $opt";
echo $query;
            $result = mysqli_query($conn, $query);
           header('Location: index.php');
          
        }
   
    }