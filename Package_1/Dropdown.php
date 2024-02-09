<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="POST">
        <label>Select esstablishment:</label>
        <select name="Establishment">
            <?php
            include('select_class.php');
            while ($establishment = mysqli_fetch_array(
                $all_establishments,
                MYSQLI_ASSOC
            )) :;
            ?>
                <option value="<?php echo $establishment["id"]; ?>">
                    <?php echo $establishment["name_of_Establishment"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select> <br>
        <label>Select a Class</label>
        <select name="Class">
            <?php
            include('select_class.php');
            while ($class = mysqli_fetch_array(
                $all_classes,
                MYSQLI_ASSOC
            )) :;
            ?>
                <option value="<?php echo $class["id"]; ?>">
                    <?php echo $class["name_of_class"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>

</html>