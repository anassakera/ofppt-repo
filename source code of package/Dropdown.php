<!-- dropdown.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="POST">
        <label>Select Establishment:</label>
        <select name="Establishment" id="establishmentSelect" onchange="loadClasses()">
            <?php
            $host = "localhost";
            $db = "mydatabase";
            $user = "root";
            $pass = "";

            $con = mysqli_connect($host, $user, $pass, $db);
            $sql_establishments = "SELECT * FROM `establishments`";
            $all_establishments = mysqli_query($con, $sql_establishments);

            while ($establishment = mysqli_fetch_array($all_establishments, MYSQLI_ASSOC)) :
            ?>
                <option value="<?php echo $establishment["id"]; ?>">
                    <?php echo $establishment["name_of_Establishment"]; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select> <br>
        <label>Select a Class</label>
        <select name="Class" id="classSelect">
            <!-- Options will be populated dynamically using JavaScript -->
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>

    <script>
        function loadClasses() {
            var establishmentId = document.getElementById('establishmentSelect').value;
            var classSelect = document.getElementById('classSelect');

            // Clear existing options
            classSelect.innerHTML = '';

            // AJAX request to fetch classes for the selected establishment
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_classes.php?establishment_id=' + establishmentId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var classes = JSON.parse(xhr.responseText);

                    // Populate classSelect with fetched classes
                    classes.forEach(function (classItem) {
                        var option = document.createElement('option');
                        option.value = classItem.id;
                        option.text = classItem.name_of_class;
                        classSelect.add(option);
                    });
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>
