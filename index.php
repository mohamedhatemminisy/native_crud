<?php include('server.php');

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM boxes WHERE id=$id");
    // print_r($record->num_rows);
    // die();
    if ($record->num_rows == 1) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $width = $n['width'];
        $length = $n['length'];
        $height = $n['height'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <?php $results = mysqli_query($db, "SELECT * FROM boxes"); ?>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Width</th>
                <th>Length</th>
                <th>Height</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['width']; ?></td>
                <td><?php echo $row['length']; ?></td>
                <td><?php echo $row['height']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                </td>
                <td>
                    <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <form method="post" action="server.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr;?></span>
        </div>
        <div class="input-group">
            <label>Width</label>
            <input type="text" name="width" value="<?php echo $width; ?>">
        </div>
        <div class="input-group">
            <label>Length</label>
            <input type="text" name="length" value="<?php echo $length; ?>">
        </div>
        <div class="input-group">
            <label>Height</label>
            <input type="text" name="height" value="<?php echo $height; ?>">
        </div>
        <div class="input-group">
            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">Save</button>
            <?php endif ?>
        </div>
    </form>
</body>

</html>