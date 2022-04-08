<?php
include 'db.php';
?>
<div class="container-fluid">


    <?php
    if (isset($_GET['p_id'])) {
        $product_id = $_GET['p_id'];
        $sql = "select * from product where product_id = $product_id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $product_name = $row["name"];
            $product_description = $row["description"];
            $product_price = $row["price"];
            $product_color = $row["color"];
            $product_weight = $row["weight"];
            //$product_active = $row["product_active"];
        }
    }

    ?>

    <!--form to display product details and be able to edit details-->
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
        <form action="process.php?p_id=<?php echo $_GET['p_id'] ?> &opt=update" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $product_name; ?>" placeholder="name" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" name="description" value="" cols="30" rows="10">    <?php echo $product_description; ?>   </textarea>
                </div>
                <div class="form-group">
                    <label for="cars">Choose a category:</label>
                    <select name="product_category_name">

                        <?php
                        $sql = "select category_id, name from category";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>


                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="<?php echo $product_price; ?>" placeholder="Price" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" value="<?php echo $product_color; ?>" placeholder="color" class="form-control pb-2">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="decimal" name="weight" value="<?php echo $product_weight; ?>" placeholder="Weight" class="form-control pb-2">
                </div>
                <div class="form-group pt-4 text-center">
                    <button class="btn btn-success" type="submit" name="btn_edit_post">Edit Post</button>
                </div>
        </form>
</div>