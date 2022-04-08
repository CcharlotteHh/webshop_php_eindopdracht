<?php
include 'includes/db.inc.php';

$sql = "SELECT name, description, price, color, weight FROM product ";
if (isset($_POST["search_btn"])) {
  $search_result = $_POST["search_box"];

  $sql .= "WHERE name = '{$search_result}'";
  $sql .= "OR description = '{$search_result}'";
  $sql .= "OR price = '{$search_result}'";
  $sql .= "OR color = '{$search_result}'";
  $sql .= "OR weight = '{$search_result}'";
}

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="filter_page">
  
  <div class="container">
    <div class="row">
      <div class="col-2">
    <form action="" method="POST" name="search-form">
      <label for="name">Name</label>
      <input type="text" placeholder="name" name="search_box">
      <input type="submit" name="search_btn" value="search">
    </form> 
    </div>
    <div class="col-8">
    
    <table class="table table-dark">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Color</th>
        <th>Weight</th>
      </tr>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['description']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['color']; ?></td>
          <td><?php echo $row['weight']; ?></td>
        </tr>
      <?php } ?>
      </div>
    </table>
  </div>
  </div>
  <script src="assets/js/script.js"></script>
</body>

</html>