<?php 
include 'db_connect.php';
session_start();
?>
<?php
      
  if (isset($_POST['logout'])) {
      session_destroy();
      header('location:login_page.php');
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>


  <form method="post">
  <table border="0">
      <tr>
        <td style="width:2500px; text-align:left;"><img src="image/logo.jpg" alt="logo" width="50px" height="50px"></td>
        <td style="width:1500px; text-align:center; color:blue;">
          <h1>WanderLuxe Tours</h1>
        </td>
        
          <td style="width:1900px;text-align:right;">
            <button type="submit" name="packages" style="height: 30px; width: 30px; padding: 0; border: none;">
              <img src="image/pac.jpg" alt="Submit" width="30" height="30">
            </button>
          </td>
          <td>
            <button type="submit" name="notification" style="height: 55px; width: 55px; padding: 0; border: none;">
              <img src="image/bell.jpg" alt="Submit" width="55" height="55">
            </button>
          </td>
          <td><button type="submit" name="profile" style="height: 40px; width: 40px; padding: 0; border: none;">
              <img src="image/profile.jpg" alt="Submit" width="40" height="40">
            </button></td>
          <td><button type="submit" name="logout" style="height: 45px; width: 45px; padding: 0; border: none;">
              <img src="image/logout.jpg" alt="Submit" width="45" height="45">
            </button></td>
        
      </tr>


    </table>

    <center>
      <table>
        <tr>
          <h1>Our Packages</h1>
        </tr>
        <tr>
          <td style="padding: 10px;"><img src="image/cox.jpeg" alt="cox" width="300px" height="250px"> </td>
          <td style="padding: 10px;"><img src="image/stmart.jpeg" alt="stmart" width="300px" height="250px"></td>
          <td style="padding: 10px;"><img src="image/sajack.jpeg" alt="sajack" width="300px" height="250px"></td>
        </tr>
        <tr>
          <td align="center">
            <h2>Deep drive into the Sea</h2>
          </td>
          <td align="center">
            <h2>The Best Of The Maldives</h2>
          </td>
          <td align="center">
            <h2>Hill Kingdom Tour</h2>
          </td>
        </tr>
        <tr>
          <td align="center">
            <p>"Embark on an abyssal journey,</P>
            <p>exploring depths and encountering marine </p>
            <p>wonders in a deep-sea adventure of discovery."</p>
          </td>
          <td align="center">
            <p>"Dive into the paradise of Hill </p>
            <p> Immerse in turquoise waters, vibrant coral reefs, </p>
            <p>and unrivaled luxury escapes."</p>
          </td>
          <td align="center">
            <p>"Embark on a regal journey.</p>
            <p> Majestic landscapes, and enchanting culture </p>
            <p>await in this captivating exploration."</p>
          </td>
        </tr>
        <tr>
          <td align="center"><button type="submit" name="cox">Book Now</button></td>
          <td align="center"><button type="submit" name="stmart">Book Now</button></td>
          <td align="center"><button type="submit" name="sajack">Book Now</button></td>
        </tr>

        

      </table>
    </center>

  </form>
<?php 

//echo $_SESSION['username'];

?>

  <?php 

 
if (isset($_POST['packages'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: packages.php');
   }
  
 
}
 

if (isset($_POST['notification'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: notification.php');
   }
}



if (isset($_POST['profile'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: profile.php');
   } 
}   
 


if (isset($_POST['cox'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: packages.php');
    // sql query needed--------------------------------------------------
  } 
}

if (isset($_POST['stmart'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: packages.php');
    // sql query needed--------------------------------------------------
  } 
}

if (isset($_POST['sajack'])) {
  if (empty ($_SESSION['username']))
  {
  header('location: login_page.php');

  }
  else{
    header('location: packages.php');
    // sql query needed--------------------------------------------------
  } 
}
  
  ?>
</body>

</html>
