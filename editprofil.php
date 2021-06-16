<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
<section class="form signup">
<?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>
      <header>
      <?php echo "Halo ".$row['fname']. " " . $row['lname']?></header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" value="<?php echo $row['fname'] ?>">
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?php echo $row['lname'] ?>">
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>">
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password">
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
        <img style="border-radius:0%" src="php/images/<?php echo $row['img']; ?>" alt="">
          
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue">
        </div>
      </form>
    </section>
</div>

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/edit.js"></script>
</body>
</html>