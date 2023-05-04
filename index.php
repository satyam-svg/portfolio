<?php
include 'connect.php';
include 'config.php';
include 'messageme.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $check_email_query = "SELECT * FROM `hire me` WHERE `email` = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_result) > 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry for inconvience,</strong>Email is already resistered with us,try with another email.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }else{
   $sql="INSERT INTO `hire me` ( `name`, `email`, `contact no`, `date`) VALUES ( '$name', '$email', '$phone', current_timestamp());";
$result=mysqli_query($conn,$sql);
if($result){
   
}else{
  
}
    
require 'smtp/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "praveen.2022ug2002@iiitranchi.ac.in";
$mail->Password = "satyam123!!!";
$mail->SetFrom("praveen.2022ug2002@iiitranchi.ac.in");
$mail->addAddress("$email");
$mail->IsHTML(true);
$mail->Subject = "New Contact Us";
$mail->Body = "Hi,<br><br>Thanku For contacting me.I will contact you soon  " . $email;

try {
    $mail->send();
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!!</strong> Email successfully sent to your registered email.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
} catch (Exception $e) {
    echo "Failed to send email. Error: {$mail->ErrorInfo}";
}
}
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
    <link rel="stylesheet" href="style.css?v=<?=$version?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="owl.carousel.min.css">
<link rel="stylesheet" href="owl.theme.default.min.css">
   
</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">Portfo<span>lio.</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#project" class="menu-btn">Project</a></li>
                <li><a href="#skills" class="menu-btn">Skills</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Hello, my name is</div>
                <div class="text-2">Praveen Maurya</div>
                <div class="text-3">And I'm a <span class="typing"></span></div>
				<button id="hire-me-button">Hire me</button>

				<div id="signup-form">
                    <button id="close-btn" onclick="closeSignup()">&times;</button>
					<form action="/portfolio/index.php" method="POST">
					  <h2>Hire Me</h2>
					  <label for="name">Name:</label>
					  <input type="text" id="name" name="name" required>
					  <label for="email">Email:</label>
					  <input type="email" id="email" name="email" required>
					  <label for="phone">Enter your phone number:</label>
					  <input type="phone" id="phone" name="phone"  required>
					  <button type="submit">Hire Me</button>
					</form>
				  </div>
    </section>
	<script>
		function closeSignup() {
		  document.getElementById("signup-form").style.display = "none";
		}
		</script>
    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="media/satyam.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">I'm Praveen and I'm a <span class="typing-2"></span></div>
                    <p>I am a first-year student at IIIT Ranchi, and I am very passionate about coding.As a first-year student at IIIT Ranchi, I am currently pursuing studies in web development. </p>
                    <a href="#" > Resume Uploading Soon..</a>
                </div>
            </div>
        </div>
    </section>
   
    <section class="project" id="project">
        <div class="max-width">
            <h2 class="title">My Project</h2>
            <div class="container">
                <div class="box">
                    <div class="box-content">
                        <h1>FIRE EXTINGUSIHER ROBOT</h1>
                        <p>FIRE EXTINGUISHER ROBOT" is a part of a hardware project. It was a very interesting project in which our team of four people had created it.I am very passionate about doing such more project in future.</p>
                    </div>
                    <button class="my-btn"><a href="#">Go Live</a> </button>
                </div>
        
                <div class="box" >
                    <div class="box-content">
                        <h1>Trip Tracker</h1>
                        <p>I am developing an app that aims to reduce traffic problem in various cites of India.I hav noticed that auto drivers sometimes stop for long periods to pick up customers because they arre afraid they won't find more customers ahead,causing traffic congestion.So,I am creating an app that will show the customers location along their route,which will prevent the driver from stopping for too long.</p>
                    </div>
                    <button class="my-btn"><a href="#">Go Live</a> </button>
                </div>
            </div>
        </div>
    </section>
    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">My skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My creative skills & experiences.</div>
                    <p>As a first-year student at IIIT Ranchi, I am currently pursuing studies in web development. I have participated in a hackathon organized by my college called House of Hackers, where I developed a robot fire extinguisher robot. Additionally, I am currently working on a website and app project named Trip Track, with the aim of making India a crowd-free country. While I am still in the early stages of my academic and professional career, I am eager to continue learning and expanding my skills in the field of web development.</p>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>HTML</span>
                            <span>90%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>CSS</span>
                            <span>60%</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>JavaScript</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
                            <span>50%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>MySQL</span>
                            <span>70%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>If you want to stay in touch with me, please contact me using the details provided below or you can also message me directly by filling  the form given.</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Praveen Maurya</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Allahabad,U.P</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">satyammaurya9620@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="/portfolio/index.php" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Name" name="name" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." name="message" required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js?v=<?=$version?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>