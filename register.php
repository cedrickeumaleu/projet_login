<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign Up</title>
    <link rel="manifest" href="manifest.json">
     <!-- ios support -->
    <!-- <link rel="apple-touch-icon" href="images/icons/icon-72x72.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-96x96.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-128x128.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-144x144.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-152x152.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-192x192.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-384x384.png" />
    <link rel="apple-touch-icon" href="images/icons/icon-512x512.png" />
    <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
    <meta name="theme-color" content="#db4938" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

 <script src="./app.js"></script>

    <link rel="stylesheet" href="./css/style.css">
  
</head>
<body>


<div class="container">
    <div class="content">
    <div class="center">
        
    <h1>Bienvenue sur DOOM !</h1>
    <p>Connectez vous sur le plus Grand resau évènementiel</p>
    </div>
    <div class="w3-panel w3-red 3-card-4">
    <div>
    <a button class="button register" href="#">inscription</a>

    </div> 
    </div>

      
    <div class="wrapper form fade">
        <h2>inscription</h2>
        <p> Merci de bien remplir le formulaire.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div> 
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>   
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
            <label>photo de profil</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control <?php echo (!empty($upload_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $upload; ?>">
                <span class="invalid-feedback"><?php echo $upload_err; ?></span>
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>si vous avez déjà un compte? <a href="login.php">clickez ici</a>.</p>
        </form>
    </div>
</div>

<div class="w3-panel w3-red 3-card-4">
    <div>
    <h1>DOOM</h1>
    </div>
</div>    



<?php


// Include config file
require_once 'config.php';

var_dump($_POST);
 
// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = $upload = "";
$username_err = $email_err = $password_err = $confirm_password_err = $upload_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


      // Validate email
      if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/',trim($_POST["email"]))){
        $email_err = "email can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }




  
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_req = basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $upload_err = "File is not an image.";
        $uploadOk = 0;
      }
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $upload_err = "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 9000000) {
       $upload_err = "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "webp") {
        $upload_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_err = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        $upload_err = "Sorry, there was an error uploading your file.";
      }
    }
    


    $verification = substr(md5(mt_rand()), 0, 15);
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($upload_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password, role, isactive, verification, userimg) VALUES (?, ?, ?,'guest', 0, '$verification', '$target_req')";
         
       

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = trim($_POST["email"]);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
             
             
            // Envoi email
            // Préparation du mail contenant le lien d'activation
$destinataire = $email;
$sujet = "Activer votre compte" ;
$entete = "From: inscription@projet_login.com" ;

// Le lien d'activation est composé du username d'email et de la clé(verification)
$message = 'Bienvenue sur Notre site web,
Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur Internet.

https://cedrickk.promo-90.codeur.online/login/activation.php?username='.urlencode($username). '&email='.urlencode($email). '&verification='.urlencode($verification).'


---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';


//  Envoi email
$to = $email;
$subject = "Activation Code For Talkerscode.com";
$from = 'your email';
$body = 'Your Activation Code is ' . $verification . ' Please Click On This link <a href="https://cedrickk.promo-90.codeur.online/login/mapage.php?username=' . $username . '&email=' . $email . '&verification=' . $verification . '">ACTIVATION</a>to activate your account.';
$headers = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\n";
$headers .= "From:" . $from;
mail($param_email, $subject, $body, $headers);

echo "An Activation Code Is Sent To You Check You Emails"; 



            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }


    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

 <script>

$( document ).ready(function() {

  $( ".register" ).click(function() {
      console.log('test');
  $( ".form" ).removeClass('fade');
});
    
});

</script>

</body>
</html>

