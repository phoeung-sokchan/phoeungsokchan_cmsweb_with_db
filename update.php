<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', description='$desc', price='$price' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>
        <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required><br><br>
        <button type="submit" name="update">Update Product</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
