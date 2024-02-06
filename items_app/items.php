<?php
include_once('db.php');
$action = false;
// Hello

if (isset($_POST['save'])) {
    $device_name = mysqli_real_escape_string($con, $_POST['device_name']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $problem = mysqli_real_escape_string($con, $_POST['problem']);
    $problem_description = mysqli_real_escape_string($con, $_POST['problem_description']);
    $solution = mysqli_real_escape_string($con, $_POST['solution']);
    $device_location = mysqli_real_escape_string($con, $_POST['device_location']);
    $device_reference = mysqli_real_escape_string($con, $_POST['device_reference']);
    $etablishment = mysqli_real_escape_string($con, $_POST['etablishment']);
    $storage = mysqli_real_escape_string($con, $_POST['storage']);

    if ($_POST['save'] == "Save") {
        $save_sql = "INSERT INTO `items` 
                     (`device_name`, `quantity`, `problem`, `problem_description`, `solution`, `device_location`, `device_reference`, `etablishment`, `storage`) 
                     VALUES ('$device_name','$quantity','$problem','$problem_description','$solution','$device_location','$device_reference','$etablishment','$storage')";
    } else {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $save_sql = "UPDATE `items` SET 
                     `device_name`='$device_name',`quantity`='$quantity',
                     `problem`='$problem',`problem_description`='$problem_description',
                     `solution`='$solution',`device_location`='$device_location',
                     `device_reference`='$device_reference',`etablishment`='$etablishment',
                     `storage`='$storage' WHERE id =$id";
    }

    $res_save = mysqli_query($con, $save_sql);
    if (!$res_save) {
        die(mysqli_error($con));
    } else {
        $action = isset($_POST['id']) ? "edit" : "add";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $del_sql = "DELETE FROM items WHERE id = $id";
    $res_del = mysqli_query($con, $del_sql);
    if (!$res_del) {
        die(mysqli_error($con));
    } else {
        $action = "del";
    }
}

$items_sql = "SELECT * FROM items";
$all_item = mysqli_query($con, $items_sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/toster.css">
  <title>items App</title>
</head>

<body>
  <div class="container">
    <div class="wrapper p-5 m-5">
      <div class="d-flex p-2 justify-content-between mb-2">
        <h2>All items</h2>
        <div><a href="add_item.php"><i data-feather="user-plus"></i></a></div>

      </div>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Device Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Problem</th>
            <th scope="col">Problem Description</th>
            <th scope="col">Solution</th>
            <th scope="col">Device Location</th>
            <th scope="col">Device Reference</th>
            <th scope="col">Etablishment</th>
            <th scope="col">Storage</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($item = $all_item->fetch_assoc()) { ?>

            <tr>

              <td>
                <?php echo $item['id']; ?>
              </td>
              <td>
                <?php echo $item['device_name']; ?>
              </td>

              <td>
                <?php echo $item['quantity']; ?>
              </td>
              <td>
                <?php echo $item['problem']; ?>
              </td>
              <td>
                <?php echo $item['problem_description']; ?>
              </td>
              <td>
                <?php echo $item['solution']; ?>
              </td>
              <td>
                <?php echo $item['device_location']; ?>
              </td>
              <td>
                <?php echo $item['device_reference']; ?>
              </td>
              <td>
                <?php echo $item['etablishment']; ?>
              </td>
              <td>
                <?php echo $item['storage']; ?>
              </td>

              <td>
                <div class="d-flex p-2 justify-content-evenly mb-2">

                  <i onclick="confirm_delete(<?php echo $item['id']; ?>);" class="text-danger" data-feather="trash-2"></i>
                  <i onclick="edit(<?php echo $item['id']; ?>);" class="text-success" data-feather="edit"></i>
                </div>
              </td>
            </tr>
          <?php }

          ?>

        </tbody>
      </table>
    </div>

  </div>
  <script src="js/jq.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/icons.js"></script>
  <script src="js/toster.js"></script>
  <script src="js/main.js"></script>
  <?php
  if ($action != false) {
    if ($action == 'add') { ?>
      <script>
        show_add()
      </script>


      <?php
    }
    if ($action == 'del') { ?>
      <script>
        show_del()
      </script>


      <?php
    }
    if ($action == 'edit') { ?>
      <script>
        show_update()
      </script>


      <?php
    }
  }
  ?>
  <script>
    feather.replace();
  </script>
</body>

</html>