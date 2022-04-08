<?php

include 'db.php';

    if(isset($_POST["newproduct_submit"])){
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_category_name = $_POST["product_category_name"];
        $product_price = $_POST["product_price"];
        $product_color = $_POST["product_color"];
        $product_weight = $_POST["product_weight"];
        $product_active = $_POST["product_active"];
        $product_image = $_FILES['product_image'];

        $product_image_name = $_FILES['product_image']['name']; // product image name
        $product_image_tmpName = $_FILES['product_image']['tmp_name'];// tmp location before product image gets uploaded to the product_image folder
        $product_image_size = $_FILES['product_image']['size']; // size of product image 
        $product_image_error = $_FILES['product_image']['error']; // is there an error with the image upload or not
        $product_image_type = $_FILES['product_image']['type']; 
        $fileExt = explode('.', $product_image_name); // separate $product_image
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($product_image_error === 0) {
                if($product_image_size <1000000){
                $image_new_name = uniqid('','true'). ".".$fileActualExt;
                $fileDestination = 'product_image/'.$image_new_name;
                move_uploaded_file($product_image_tmpName,$fileDestination);
                }else{
                    echo'FiLE IS TOO BIG';
                }
            } else {
                echo 'error uploading file';
            }
        } else {
            echo "choose valid image extension";
        }


     

        $query = "insert into product (name, description, category_id, price, color, weight,product_image)
        values ('$product_name','$product_description','$product_category_name',$product_price,'$product_color',$product_weight,'$image_new_name')";
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
            $product_category_name = $_POST["product_category_name"];
            $product_price = $_POST["price"];
            $product_color = $_POST["color"];
            $product_weight = $_POST["weight"];
            
            $opt = $_GET['p_id'];;
    
            $query = "UPDATE product set name = '$product_name', description = '$product_description', category_id ='$product_category_name',price = $product_price, color='$product_color', weight = $product_weight
            where product_id = $opt";
echo $query;
            $result = mysqli_query($conn, $query);
           header('Location: index.php');
          
        }
   
    }

    if(isset($_POST["newcategory_submit"])){
        $category_name= $_POST["category_name"];
        $category_description = $_POST["category_description"];

        $query = "insert into category(name, description)
        values ('$category_name','$category_description')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php');
    }    