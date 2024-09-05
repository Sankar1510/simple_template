<?php
// Include the database connection file
require_once "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $fname = $_FILES['image']['name'];
    $Firstname = $_POST['first'];
    $Lastname = $_POST['last'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $DOB = $_POST['dob'];
    $Dept = $_POST['dept'];
    $Address = $_POST['addr'];
    $Position = $_POST['position'];
    $HireDate = $_POST['hd'];
    $Salary = $_POST['salary'];
    $Status = $_POST['status'];

    // Extract file extension and validate the image type
    $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION)); // Extract file extension

    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
        $dir = 'foldimage';

        // Check if directory exists, if not, create it
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $randomnum = rand(1000, 9999);
        $newFileName = $randomnum . '.' . $ext;
        $pathname = $dir . '/' . $newFileName;

        // Move the uploaded file to the designated directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $pathname)) {
            // File upload successful, update the database
            $sql = "UPDATE documents SET first='$Firstname', last='$Lastname', email='$Email', phone='$Phone', dob='$DOB', dept='$Dept', addr='$Address', position='$Position', hd='$HireDate', salary='$Salary', status='$Status', image='$pathname' WHERE id='$id'";

            if ($connection->query($sql) === TRUE) {
                header("Location: users.php");
                echo "Successfully updated";
            } else {
                echo "Error: " . $sql . " " . $connection->error;
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "Invalid file format. Only JPG, PNG, and JPEG are allowed.";
    }
}

// Close the database connection
$connection->close();
?>
