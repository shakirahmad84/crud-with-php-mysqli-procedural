<?php include_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="Author name">
   <meta name="keywords" content="Site keyword">
   <meta name="description" content="Description about site">

   <!-- Site Title-->
   <title>Crud System With PHP MySQLi by Shakir Ahmad</title>

   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

   <!-- CSS -->
   <link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>


   <h2 class="text-center">Crud System With PHP MySQLi by Shakir Ahmad</h2>
   
   <div class="container-fluid">
      <div class="row">
        
        
         <div class="col">
           
            <?php  // Insert Data
               if(isset($_POST['insert'])){
                  $insert_name = $_POST['user_name'];
                  if($insert_name == "" || empty($insert_name)){
                     echo "<div class='alert alert-danger' role='alert'>Field Should Not Be Empty!</div>";
                  }else{
                     $sql = "INSERT INTO user(user_name) VALUE('$insert_name')";
                     $insert_query = mysqli_query($connection, $sql);
                  }
               }
            ?>
            <form action="" method="post">
               <div class="from-group">
                  <label for="name">Add Name</label>
                  <input type="text" name="user_name" class="form-control" id="name">
               </div><br>
               <button type="submit" name="insert" class="btn btn-primary">Submit</button>
            </form><br><br>
            
            
            
            <?php
            
               // Show Data For Update
               if(isset($_GET['update'])){
                  $update_id = $_GET['update'];
                  $sql = "SELECT * FROM user WHERE user_id = '$update_id'";
                  $update_select_query = mysqli_query($connection, $sql);
                  $row = mysqli_fetch_assoc($update_select_query);
                  $user_name = $row['user_name'];
               }
            
               // Update 
               if(isset($_POST['update'])){
                  $user_name = $_POST['user_name'];
                  $sql = "UPDATE user SET user_name = '$user_name' WHERE user_id = '$update_id'";
                  $update_query = mysqli_query($connection, $sql);
               }
               
            ?>
            <form action="" method="post">
               <div class="from-group">
                 <label for="user_name">Update Name</label>
                  <input type="text" name="user_name" class="form-control" value="<?php if(isset($user_name)){echo $user_name;} ?>" id="user_name">
               </div><br>
               <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
            
         </div>
         
         
         <div class="col">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Delete</th>
                     <th>Edit</th>
                  </tr>
               </thead>
               <tbody>
                 
               <?php  // Select Data
                  $sql = "SELECT * FROM user";
                  $select_query = mysqli_query($connection, $sql);
                  while($row = mysqli_fetch_assoc($select_query)){
                     $user_id   = $row['user_id'];
                     $user_name = $row['user_name'];
                     echo "<tr>";
                     echo "<td>{$user_id}</td>";
                     echo "<td>{$user_name}</td>";
                     echo "<td><a href='index.php?delete={$user_id}' class='btn btn-danger btn-sm'>Delete</a></td>";
                     echo "<td><a href='index.php?update={$user_id}' class='btn btn-primary btn-sm'>Edit</a></td>";
                     echo "</tr>";
                  }
               ?>
                 
               <?php // Delete Data
                  if(isset($_GET['delete'])){
                     $delete_user_id = $_GET['delete'];
                     $sql = "DELETE FROM user WHERE user_id = '$delete_user_id'";
                     $delete_query = mysqli_query($connection, $sql);
                     header("Location: index.php");
                  } 
               ?>
                  
               </tbody>
            </table>
         </div>
         
         
      </div>
   </div>



   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="assets/js/jquery-3.2.1.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/scripts.js"></script>
</body>

</html>