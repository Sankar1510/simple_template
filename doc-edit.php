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
</head>

<body>
    <?php
     // Include the database connection file
      require_once "db_connect.php";
      $id = $_GET['id'];
      $sql = "SELECT * FROM documents WHERE id=$id";
      $result = $connection->query($sql);
      $data = $result->fetch_assoc();
      $connection ->close();
    ?>

    <div class="wrapper" >      
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Forms</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Basic Form</div>
                                <div class="card-body">
                                    
                                    <form accept-charset="utf-8"  method="post"  action="doc-update.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id"  value="<?php echo $data['id'];?>" >
                                        <div class="mb-3">
                                            <label for="first" class="form-label">First Name</label>
                                            <input type="text" name="first" placeholder="First Name" class="form-control" value="<?php echo $data['first'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="last" class="form-label">Last Name</label>
                                            <input type="text" name="last" placeholder="Last Name" class="form-control" value="<?php echo $data['last'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" placeholder="Email Address" class="form-control"  value="<?php echo $data['email'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" name="phone" placeholder="Phone Number" class="form-control"  value="<?php echo $data['phone'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" placeholder="" class="form-control" value="<?php echo $data['dob'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dept" class="form-label">Department</label>
                                            <input type="text" name="dept" placeholder="Department" value="<?php echo $data['dept'];?>"class="form-control" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="addr">Address</label>
                                            <textarea id="w3review" name="addr" rows="4" cols="50" value="<?php echo $data['addr'];?>">
                                            </textarea>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="addr">Address</label>
                                            <textarea id="addr" name="addr" rows="4" cols="50"><?php echo htmlspecialchars($data['addr']); ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" name="position" placeholder="Position" class="form-control" value="<?php echo $data['position'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hd" class="form-label">Hire Date</label>
                                            <input type="date" name="hd" placeholder="" class="form-control" value="<?php echo $data['hd'];?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input type="tel" name="salary" placeholder="Salary" class="form-control" value="<?php echo $data['salary'];?>"required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status">
                                        <option value="active" <?php echo $data['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo $data['status'] == 'inactive' ? 'selected' : ''; ?>>inactive</option>
                                        </select>
                                        </div>
                                         <div class="mb-3">      
                                            <input type="file" name="image" onchange="loadFile(event)" >
                                            <img id="output" src="<?php echo $data['image']; ?>" width="400" height="200" style="object-fit: contain;" >
                                        </div> 
                                      

                                              
                                        
                                        <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
                       
           
                                             
                                    
                                  
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/form-validator.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
<script>
    function loadFile(event){
        var imageType = event.target.files[0].type;
        var imageTypeSplit = imageType.split('/');
        var imageExt = imageTypeSplit[1];
        if(imageExt == 'jpg' || imageExt == 'jpeg' || imageExt == 'png'  ) {
       var reader = new FileReader();
       reader.onload = function() {
        var output = document.getElementById('output');
        output.src =reader.result;

       };
       reader.readAsDataURL(event.target.files[0])
            } else{
                alert('upload valid file format as jpg jpeg png')
            }
        }
        </script>
     
      <!-- <script>
function loadFile(event) {
    if (event.target.files.length > 0) {  // Check if any file is selected
        var file = event.target.files[0];
        var imageType = file.type;
        var validExtensions = ['jpg', 'jpeg', 'png'];

        // Extract the file extension from the MIME type
        var imageExt = imageType.split('/')[1];

        // Check if the selected file is a valid image
        if (validExtensions.includes(imageExt)) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(file);
        } else {
            alert('Please upload a valid file format (jpg, jpeg, png).');
        }
    }
}
</script> -->