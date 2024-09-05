<?php
// Include the database connection file
require_once "db_connect.php";

// Process form data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_FILES['image']['name'];
    $explode = explode('.', $fname);
    $ext = strtolower(end($explode));

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

  

    // Check file extension and upload
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
        $dir = 'foldimage';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $randomnum = rand(1000, 9999);
        $newFileName = $randomnum . '.' . $ext;
        $pathname = $dir . '/' . $newFileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $pathname)) {
            $sql = "INSERT INTO documents (first, last, email, phone, dob, dept,addr,position,hd,salary,status,image) 
                    VALUES ('$Firstname', '$Lastname', '$Email', '$Phone', '$DOB', '$Dept','$Address','$Position',' $HireDate','$Salary','$Status','$pathname')";
            if ($connection->query($sql) === TRUE) {
                echo "Successfully added";
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

$connection->close();
?>
