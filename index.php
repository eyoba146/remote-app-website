<?php
$con = mysqli_connect("localhost","root","","remote_users") or die("connection failed");

session_start();
?>
<!DOCTYPE html>
<html id="htm" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remote Connectivity App</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header id="header">
    <nav>
      <div class="logo">
        <a href="#hero">Remote Connectivity App</a>
      </div>
      <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#how-it-works">How It Works</a></li>
         <li><a href="#requirements">Requirements</a></li>
        <li><a href="#download">Download</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a id="tobe"onclick="change();" href="#">Day</a></li>
      </ul>
    </nav>
  </header>
  <form id="hidden" method="POST" action="#"
  style="
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background:rgba(0,0,0,0.5);
  position:absolute;

  z-index:1000;
  display:none;
"
  >
	<div id="container"
  style="
	display: flex;
	align-items: center;
	flex-direction: column;
	justify-content: center;
	border:1px solid aqua;
	border-radius: 12px;
	width: 30%;
	height: 65%;
	transition: .5s ease;
	animation: scale .5s ease;
"
>
	<h2 style="
  font-family: Comic Sans Ms;
	color: aqua;
  "
  > Login - Below</h2><br><br>
	<input type="text" name="username"placeholder="your username..." id="user" required autocomplete="false"
  style="
	width: 90%;
	border:none;
	background: transparent;
	border-bottom: 1px solid aqua;
	padding: 13px;
	outline: none;
	font-size: 16px;
	transition: .5s ease;
	color:aqua;
	font-family: monospace;
  "
  ><br><br><br>
	<input type="password" placeholder="your password..." name="password" required id="pass"
  style ="
	width: 90%;
	border:none;
	background: transparent;
	border-bottom: 1px solid aqua;
	padding: 13px;
	outline: none;
	font-size: 16px;
	transition: .5s ease;
	color:aqua;
	font-family: monospace;
  "
  ><br><br>
	<button type="submit" name="sign_in"
  style="
  	width: 80%;
	height: 10%;
	background: transparent;
	font-size: 24px;
	font-family: Comic Sans Ms;
	color:aqua;
	border:1px solid aqua;
	border-radius: 140px;
	cursor: pointer;
	transition: .5s ease;
  ">Login</button><br>
	<p style= "color: white;">don't have an account?<b onclick="signup();" style="	text-decoration: none;color: aqua;cursor:pointer;"> Create an account.</b></p>
</div>
<?php
if (isset($_POST['sign_in'])) {
   $User = $_POST['username'];
   $Pass = $_POST['password'];
   $select = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$User' AND `password` = '$Pass'");
   $row = mysqli_fetch_array($select);
   if(is_array($row)) {
      $_SESSION["User"] = $row['username'];
      $_SESSION["Pass"] = $row['password'];   
      echo "
      document.getElementById('create').innerText ='Account created successfully';
      ";
   }else {
    echo "
    document.getElementById('create').innerText ='Account created successfully';
   ";
   }
  
}

?>
</form>

<form id="hidden2" method="POST" action="#"
  style="
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background:rgba(0,0,0,0.5);
  position:absolute;

  z-index:1000;
  display:none;
"
  >
	<div id="container"
  style="
	display: flex;
	align-items: center;
	flex-direction: column;
	justify-content: center;
	border:1px solid aqua;
	border-radius: 12px;
	width: 30%;
	height: 65%;
	transition: .5s ease;
	animation: scale .5s ease;
"
>
	<h2 style="
  font-family: Comic Sans Ms;
	color: aqua;
  "
  id="create"
  > Create - Account</h2><br><br>
	<input type="text" name="c_user"placeholder="your username..." id="useer" required autocomplete="false"
  style="
	width: 90%;
	border:none;
	background: transparent;
	border-bottom: 1px solid aqua;
	padding: 13px;
	outline: none;
	font-size: 16px;
	transition: .5s ease;
	color:aqua;
	font-family: monospace;
  "
  ><br><br><br>
	<input type="password" placeholder="your password..." name="c_pass" required id="passs"
  style ="
	width: 90%;
	border:none;
	background: transparent;
	border-bottom: 1px solid aqua;
	padding: 13px;
	outline: none;
	font-size: 16px;
	transition: .5s ease;
	color:aqua;
	font-family: monospace;
  "
  ><br><br>
	<button type="submit" name="sign_up"
  style="
  	width: 80%;
	height: 10%;
	background: transparent;
	font-size: 24px;
	font-family: Comic Sans Ms;
	color:aqua;
	border:1px solid aqua;
	border-radius: 140px;
	cursor: pointer;
	transition: .5s ease;
  ">Sign up</button><br>
	<p style= "color: white;">have an account?<b onclick="loginn();" style="	text-decoration: none;color: aqua;cursor:pointer;"> Login now.</b></p>
</div>
</form>
<?php
if(isset($_POST['sign_up'])) {
  $user = $_POST['c_user'];
  $pass = $_POST['c_pass'];
  
  $errors = array();
   $u = "SELECT username FROM `users` WHERE username ='$user' ";
   $uu  = mysqli_query($con,$u);
   if(mysqli_num_rows($uu) > 0) {
      $errors['u'] = "Username already taken";
   }
   if (count($errors)<=0) {
      $query = "INSERT INTO `users`(`ID`,`username`, `password`)VALUES ('','$user','$pass')";
      $result = mysqli_query($con,$query);
      if($result) {
      echo "<script>
      document.getElementById('create').innerText ='Account created successfully';
      </script>";
     }else {
      echo "<script>
      document.getElementById('create').innerText ='Account created successfully';
      </script>";
     }
   }else {
    echo "<script>
    alert('Username already taken, please choose another username!')
    </script>";
   }
  }
?>
  <section id="hero">
    <video id="video-background" src="background.mp4" autoplay muted loop></video>
    <h1>Remote Connectivity App</h1>
    <p>Connect and Collaborate Remotely</p>
    <a href="#contact" class="cta-button">Get Started</a>
  </section>

  <section id="features">
    <h3 id="h">Key Features</h3>
    <ul>
      <li>Secure and reliable remote connections</li>
      <li>Real-time collaboration tools</li>
      <li>Screen sharing and file transfer</li>
      <li>Multi-platform support</li>
      <li>Intuitive and user-friendly interface</li>
    </ul>
  </section>

  <section id="how-it-works">
    <h3 id="h1">How It Works</h3>
    <ol>
      <p>Download and install the Remote Connectivity App on your device.</p>
      <p>Launch the app and create an account.</p>
      <p>Connect to other users by entering their unique ID or email.</p>
      <p>Initiate a secure connection and start collaboratingW in real-time.</p>
    </ol>
    <center><video src="background.mp4" id="vid" style="width:70%;height:auto; margin-top:20px;box-shadow:0px 0.2px 2px white"controls></video></center>
  </section>
  <section id="requirements">
    <h3 id="h2">System Requirements</h3>
    <ol>
      <li>Windows 7 or later(for windows users)</li>
      <li>CPU: 1.7Ghz or higher</li>
      <li>Ram: minimum 512MB</li>
      <li>Space: atleast 200MB free space.</li>
    </ol>
  </section>

  <section id="download">
    <h3 id="h3">Download the App</h3>
    <form method="post"class="download-buttons">
      <button type="submit"class="cta-button"onclick="blur();" name="download_w">Download for Windows</button>
      <button type="submit"class="cta-button"onclick="blur();" name="download_l">Download for Linux</button>
  
</form>
  </section>

  <section id="contact">
    <h3 id="h4">Contact Us</h3>
    <p style="color:white;font-weight: 300;">Don't hesitate to reach us out if you have any questions.</p>
    <form action="#" method="POST">
      <input type="text" name="name" placeholder="Your Name" style="width: 300px;">
      <input type="email" name="email" placeholder="Your Email" style="width: 300px;">
      <textarea name="message" placeholder="Your Message"></textarea>
      <button type="submit">Send Message</button>
    </form>
  </section>

  <footer id="foot">
    &copy; 2023 Remote Connectivity App. All rights reserved.
  </footer>
  <?php
if (isset($_POST['download_w'])) {
if(isset($_SESSION['User'])) {
echo '<script>
window.location.href = "/landing/download/Remote Connectivity App.7z";
</script>';
}else {
echo '<script>
window.location.href = "#hero"
document.getElementById("hidden").style.display = "flex";
// document.getElementById("hidden").style.backdrop-filter = "blur(1)";
document.body.style.overflow = "hidden";
document.getElementById("hero").style.filter = "blur(6px)";
</script>';
}
}
?>
<?php
if (isset($_POST['download_l'])) {
  if(isset($_SESSION['User'])) {
  echo '<script>
  window.location.href = "/landing/download/Linux Remote Connectivity App.tar";
  </script>';
  }else {
  echo '<script>
  window.location.href = "#hero"
  document.getElementById("hidden").style.display = "flex";
  document.body.style.overflow = "hidden";
  document.getElementById("hero").style.filter = "blur(6px)";
  </script>';
  }
  }
  ?>
  <script src="script.js"></script>
</body>
</html>
