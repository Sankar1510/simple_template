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
    <title>Users | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Users
                            <a href="forms.php" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user-shield"></i> Add_User</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
    <div class="box-body">
        <table width="100%" class="table table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Firstname</th>
                    <!-- <th>Lastname</th> -->
                    <th>Email</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <!-- <th>Dept</th> -->
                    <!-- <th>Address</th> -->
                    <!-- <th>Position</th> -->
                    <th>HireDate</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "display.php";

                if ($result) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        $id=$row['id'];
                        $Firstname = $row['first'];
                        $Lastname = $row['last'];
                        $Email = $row['email'];
                        $Phone = $row['phone'];
                        $DOB = $row['dob'];
                        $Dept = $row['dept'];
                        $Address = $row['addr'];
                        $Position = $row['position'];
                        $HireDate = $row['hd'];
                        $Salary = $row['salary'];
                        $Status = $row['status']; 
                        $Image = $row['image']; 

                        echo '
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$Firstname.'</td>
                                <td>'.$Email.'</td>
                                <td>'.$Phone.'</td>
                                <td>'.$DOB.'</td>
                                <td>'.$HireDate.'</td>
                                <td>'.$Salary.'</td>
                                <td>'.$Status.'</td>
                                <td><img src="' . $Image . '" alt="Image" style="width:50px;height:50px;"></td>
                                <td class="text-end">
                                    <a href="doc-edit.php?id='.$id.'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="doc-delete.php?id='.$id.'" class="btn btn-outline-danger btn-rounded">
                                     <i class="fas fa-trash"></i></a>
                                    <a href="view.php?id='.$id.'" class="btn btn-outline-info btn-rounded"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>';
                        
                        $i++;
                    }
                }
                ?>
            </tbody>  
        </table>
    </div>
</div>


            
        
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>