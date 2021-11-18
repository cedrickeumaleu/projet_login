<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="manifest" href="manifest.json" />
    <!-- ios support -->
    <link rel="apple-touch-icon" href="images/icons/icon-72x72.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-96x96.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-128x128.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-144x144.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-152x152.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-192x192.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-384x384.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-512x512.png" />
    <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
    <meta name="theme-color" content="#db4938" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>ma page</title>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#"  class="w3-bar-item w3-button w3-padding-large w3-theme-d4">doom
    <img src="./css/img/logodj2.png" class="w3-circle" style="width:30px" >
  </a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <a href="my_account.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My account">
  
  <?php
include('config.php');
$username = $_SESSION['username'];
$sql = "SELECT userimg FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
$row= mysqli_fetch_assoc($result);

echo "<img src='./uploads/".$row['userimg']."' class='w3-circle' style='height:23px;width:23px' alt='Avatar' ><br>";
?> 
  
  
    <a button class="button"href="logout.php">déconnexion</a>
    
    
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Contact</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">info</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Message</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Notification</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <p class="w3-center">
         <h4 class="centre">  Bienvenue sur Doom !</h4>
         <?php
          $username = $_SESSION['username'];
          $sql = "SELECT userimg FROM users WHERE username = '$username'";
          $result = mysqli_query($link, $sql);
          $row= mysqli_fetch_assoc($result);

          echo "<img src='./uploads/".$row['userimg']." ' class='w3-circle' style='height:90px;width:90px' alt='Avatar' ><br>";
          ?> 
         
         
         <h4><?php echo $_SESSION["username"]; ?></h4>
         <hr>
         <!--
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Métier</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>Ville</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> Anniv </p>-->
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">

        <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-user fa-fw w3-margin-right"></i> Profil</button>
          <div id="Demo1" class="w3-hide w3-container">
            
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>nom de l'entreprise</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div> 

            <div class="form-group">
                <label>siege social</label>
                <input type="text" name="pays" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label>adress</label>
                <input type="text" name="adress" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group">
                <label>domaine</label>
                <input type="text" name="domaine" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div> 

            <div class="form-group">
                <label>date de création</label>
                <input type="date" name="anniversaire" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div>

        </form>
          </div>
         
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> reseau sociaux</button>
          <div id="Demo2" class="w3-hide w3-container">
          <form class="is-readonly">
            <div class="form-group">
               <label for="exampleInputPassword1"> facebook</label>
                <input type="text" class="form-control is-disabled" id="exampleInputPassword1" placeholder="facebook" value="" disabled>
             </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> instagram</label>
                <input type="text" class="form-control is-disabled" id="exampleInputEmail1" placeholder="istagram" value="" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Youtub</label>
                <input type="text" class="form-control is-disabled" id="exampleInputEmail1" placeholder="youtub" value="" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"> Site web</label>
                <input type="text" class="form-control is-disabled" id="exampleInputEmail1" placeholder="site_web" value="" disabled>
              </div>
            <button type="button" class="btn btn-default btn-edit js-edit">Edit</button>
            <button type="button" class="btn btn-default btn-save js-save">Save</button>
          </form>
              
            
          </div>
        
         
          <button onclick="myFunction('Demo4')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-video fa-fw w3-margin-right"></i> Videos</button>
          <div id="Demo4" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo5')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Photos </button>
          <div id="Demo5" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="./css/img/arsmad.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="./css/img/lasouce.png" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="./css/img/ruddy.png" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="./css/img/logo_gris.png" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="./css/img/ever1.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="./css/img/yonson.png" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>prestataires plus visible</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">hôtels</span>
            <span class="w3-tag w3-small w3-theme-d4">restaurants</span>
            <span class="w3-tag w3-small w3-theme-d3">café club</span>
            <span class="w3-tag w3-small w3-theme-d2">salon de çoifures</span>
            <span class="w3-tag w3-small w3-theme-d1">salle de fêtes</span>
            <span class="w3-tag w3-small w3-theme">Gypnast</span>
            <span class="w3-tag w3-small w3-theme-l1">espace de jeux</span>
            <span class="w3-tag w3-small w3-theme-l2">shoppings</span>
            <span class="w3-tag w3-small w3-theme-l3">glaciers</span>
            <span class="w3-tag w3-small w3-theme-l4">boullangerie</span>
            <span class="w3-tag w3-small w3-theme-l5"></span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">recherche sur doom</h6>
              <p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      
      <?php
          $username = $_SESSION['username'];
          $sql = "SELECT userimg FROM users WHERE username = '$username'";
          $result = mysqli_query($link, $sql);
          $row= mysqli_fetch_assoc($result);

          echo "<img src='./uploads/".$row['userimg']." ' class='w3-circle' style='height:70px;width:70px' alt='Avatar' ><br>";
          ?>
           <span class="w3-right w3-opacity">1 min</span>
        <h4><?php echo $_SESSION["username"]; ?></h4><br>
        <hr class="w3-clear"> 

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="./css/img/logodj.png" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="./css/img/logodj2.png" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  j'aime</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Commenter</button>
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-share"></i> partager</button>  
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      <?php
          $username = $_SESSION['username'];
          $sql = "SELECT userimg FROM users WHERE username = '$username'";
          $result = mysqli_query($link, $sql);
          $row= mysqli_fetch_assoc($result);

          echo "<img src='./uploads/".$row['userimg']." ' class='w3-circle' style='height:70px;width:70px' alt='Avatar' ><br>";
          ?>
        <span class="w3-right w3-opacity">16 min</span>
        <h4><?php echo $_SESSION["username"]; ?></h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  j'aime</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Commenter</button>
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-share"></i>  partager</button>  
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      <?php
          $username = $_SESSION['username'];
          $sql = "SELECT userimg FROM users WHERE username = '$username'";
          $result = mysqli_query($link, $sql);
          $row= mysqli_fetch_assoc($result);

          echo "<img src='./uploads/".$row['userimg']." ' class='w3-circle' style='height:70px;width:70px' alt='Avatar' ><br>";
          ?>
        <span class="w3-right w3-opacity">32 min</span>
        <h4><?php echo $_SESSION["username"]; ?></h4><br>
        <hr class="w3-clear">
        <p>A ne pas manquer</p>
        <img src="./css/img/blackp.jpg" style="width:100%" class="w3-margin-bottom">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  j'aime</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Commenter</button>
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-share"></i> partager</button>  
      </div> 
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
        <p><strong>Evènement en cour</strong></p>
          <img src="./css/img/ever1.jpg" alt="Forest" style="width:100%;">
          <p><strong>Novembre</strong></p>
          <p>Dimanche 12 /2021</p>
          <div id="flip">Click ici pour info</div>
          <div id="panel">Hello world!</div>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Abonnez vous</p>
          <?php
          $username = $_SESSION['username'];
          $sql = "SELECT userimg FROM users WHERE username = '$username'";
          $result = mysqli_query($link, $sql);
          $row= mysqli_fetch_assoc($result);

          echo "<img src='./uploads/".$row['userimg']." ' class='w3-circle' style='height:70px;width:70px' alt='Avatar' ><br>";
          ?>
          <span><?php echo $_SESSION["username"]; ?></span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

        
     
    
     


      
    <?php if ($_SESSION['role'] == 'admin') : ?>
        <h3 style="color:red;"></h3>


    <?php elseif ($_SESSION['role'] == 'guest') : ?>

        <h3 style="color:red;"></h3>


    <?php endif ?>

    

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>


<script src="scripts/app.js"></script>
<script src="scripts/main.js"></script>
</body>
</html>