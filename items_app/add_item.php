<?php
include_once('db.php');
$title = "Add";
$device_name = "";
$quantity = "";
$problem_description = "";
$solution = "";
$device_location = "";
$device_reference = "";
$etablishment = "";
$storage = "";
$btn_title = "Save";

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM items WHERE id = $id";
    $item = mysqli_query($con, $sql);

    if ($item) {
        $title = "Update";
        $current_item = $item->fetch_assoc();
        $device_name = $current_item['device_name'];
        $class_id = $current_item['class_id'];
        $quantity = $current_item['quantity'];
        $problem_description = $current_item['problem_description'];
        $solution = $current_item['solution'];
        $device_location = $current_item['device_location'];
        $device_reference = $current_item['device_reference'];
        $etablishment = $current_item['etablishment'];
        $storage = $current_item['storage'];
        $btn_title = "Update";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Items App</title>
</head>

<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo $title; ?> Items</h2>
                <div><a href="items.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="items.php" method="post" >
                <div class="mb-3">
                    <label class="form-label">Device Name</label>
                    <input type="text" class="form-control" value="<?php echo $device_name; ?>"
                     name="device_name"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control"  value="<?php echo $quantity; ?>"
                     name="quantity"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Problem</label>
                    <input type="text" class="form-control" value="<?php echo isset($problem) ? $problem : ''; ?>"
                    name="problem" autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Problem Description</label>
                    <input type="text" class="form-control"  value="<?php echo $problem_description; ?>"
                    name="problem_description"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Solution</label>
                    <input type="text" class="form-control"  value="<?php echo $solution; ?>"
                    name="solution"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Device Location</label>
                    <input type="text" class="form-control"  value="<?php echo $device_location; ?>"
                    name="device_location"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Device Reference</label>
                    <input type="text" class="form-control"  value="<?php echo $device_reference; ?>"
                     name="device_reference"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Etablishment</label>
                    <input type="text" class="form-control"  value="<?php echo $etablishment; ?>"
                    name="etablishment"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Storage</label>
                    <input type="text" class="form-control"  value="<?php echo $storage; ?>"
                     name="storage"
                        autocomplete="false">
                </div>
                <?php 
                
                if (isset($_GET['id'])){?>


                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">


             <?php   }
                
                ?>
                <input type="submit" class="btn btn-primary" value="<?php echo $btn_title; ?>" name="save">
            </form>
        </div>

    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>