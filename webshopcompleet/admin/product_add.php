<?php 
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <div class="row justify-content-center">
    <form action="process.php" method="post">
        <div class="form-group">
        <input type="text" class=form-control placeholder="name" name="product_name">
        </div>
        <div class="form-group">
        <input type="text" class=form-control placeholder="description" name="product_description">
        </div>
        <!-- for category_id
        <div class="form-group">
        <input type="text" class=form-control placeholder="category_id" name="product_category_id">
        </div>
        -->
        <div class="form-group">
        <input type="text" class=form-control placeholder="price" name="product_price">
        </div>
        <div class="form-group">
        <input type="text" class=form-control placeholder="color" name="product_color">
        </div>
        <div class="form-group">
        <input type="text" class=form-control placeholder="weight" name="product_weight">
        </div>
        <!--for active or not
        <div class="form-group">
        <input type="text" class=form-control placeholder="active" name="product_active">
        </div>
        -->
        <div class="form-group">
        <input type="file" class=form-control name="product_image">
        </div>
        <div class="form-group">
        <input type="submit" class="form-control btn btn-primary"name="newproduct_submit">
        </div>
    </form>
    
    
</div>
    </div>
    
</body>
</html>