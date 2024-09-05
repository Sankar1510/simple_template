<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forms | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <style>
        .book-details {
            background: #808080;
            padding: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Documents details</h1>
            <div>
                <a href="javascript:history.back()" class="btn btn-primary">Go Back</a>
            </div>
        </header>
        <div class="book-details my-4">
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                include("db_connect.php");
                $sql = "SELECT * FROM documents WHERE id=$id";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_array($result);

                if ($data) {
            ?>
                    <h5>Firstname:</h5>
                    <p><?php echo htmlspecialchars($data['first']); ?></p>
                    <h5>Lastname:</h5>
                    <p><?php echo htmlspecialchars($data['last']); ?></p>
                    <h5>Email:</h5>
                    <p><?php echo htmlspecialchars($data['email']); ?></p>
                    <h5>Phone:</h5>
                    <p><?php echo htmlspecialchars($data['phone']); ?></p>
                    <h5>DOB:</h5>
                    <p><?php echo htmlspecialchars($data['dob']); ?></p>
                    <h5>Department:</h5>
                    <p><?php echo htmlspecialchars($data['dept']); ?></p>
                    <h5>Address:</h5>
                    <p><?php echo htmlspecialchars($data['addr']); ?></p>
                    <h5>Position:</h5>
                    <p><?php echo htmlspecialchars($data['position']); ?></p>
                    <h5>Hire Date:</h5>
                    <p><?php echo htmlspecialchars($data['hd']); ?></p>
                    <h5>Salary:</h5>
                    <p><?php echo htmlspecialchars($data['salary']); ?></p>
                    <h5>Status:</h5>
                    <p><?php echo htmlspecialchars($data['status']); ?></p>
                    <h5>Image:</h5>
                    <p><img src="<?php echo htmlspecialchars($data['image']); ?>" width="400" height="200" style="object-fit: contain;"></p>
                <?php
                } else {
                    echo "<p>No record found.</p>";
                }
            } else {
                echo "<p>ID is not set.</p>";
            }
            ?>
        </div>
    </div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
