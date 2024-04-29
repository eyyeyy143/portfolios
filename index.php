<?php
include_once('config.php');

$query_ipcr = "SELECT * FROM displaycontent "; 
$result_ipcr = $con->query($query_ipcr); 

if ($result_ipcr->num_rows > 0) {
$ipcr_row = $result_ipcr->fetch_assoc();
                  $stdid = $ipcr_row['id'];
                  $displayname = $ipcr_row['display_name'];
                  $skill1 = $ipcr_row['display_skill_1'];
                  $description = $ipcr_row['descriptions'];
                  $home_picture = $ipcr_row['home_picture'];
                  $name = $ipcr_row['name'];
                  $des = $ipcr_row['des'];


}
$query = "SELECT * FROM socialmedia "; 
$result = $con->query($query); 

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
                  $logo = $row['logo'];
                  $link = $row['link'];
                  


}

$query_cv = "SELECT * FROM cv "; 
$result_cv = $con->query($query_cv); 

if ($result_cv->num_rows > 0) {
$row_cv = $result_cv->fetch_assoc();
                  $cv = $row_cv['cv_name'];
                 
                  


}
$query_contact = "SELECT * FROM contact "; 
$result_contact = $con->query($query_contact); 

if ($result_contact->num_rows > 0) {
$row_contact = $result_contact->fetch_assoc();
                  $email = $row_contact['email'];
                  $mobile_num = $row_contact['mobile_num'];
                  $address = $row_contact['address'];
                  


}
function insertContactData($name, $email, $subject, $message, $con) {
   
    $stmt = $con->prepare("INSERT INTO contact_me (name, email, subject, message) VALUES (?, ?, ?, ?)");
    

    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
   
    if ($stmt->execute()) {
        return true;
    } else {
        return false; 
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
   
    if (insertContactData($name, $email, $subject, $message, $con)) {
        echo "<script>alert('Message sent successfully');</script>";
    } else {
        echo "<script>alert('Error sending message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Abdurahim's Portfolio</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

 
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Varela" rel="stylesheet">

   
    
    
   

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">

    

</head>
<body>

    
    <div id="top" class="hero background-overlay">
        <div class="hero-content ">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $name?></h1>
                    <p class="hero-job"><?php echo $des?><span></span></p>
                    <p class="hero-job-desc"></p>
                        <div class="section-networks">
                        <?php
                            $query = "SELECT * FROM socialmedia"; 
                            $result = $con->query($query); 

                            if ($result->num_rows > 0) {
                                echo '<div class="section-networks">';
                                while ($row = $result->fetch_assoc()) {
                                    $logo = $row['logo'];
                                    $link = $row['link'];

                               
                                    echo '<a href="' . $link . '" class="rectangle">';
                                    echo '<i class="' . $logo . '"></i>';
                                    echo '</a>';
                                }
                                echo '</div>';
                            } else {
                                echo "No social media links found";
                            }
                            ?>
                        </div>
                </div>
                
                <div class="col-md-6 col-xs-13">
                    <div class="team-member">
                        <div class="flipper">
                            <div class="team-member-front">
                                <div class="team-member-thumb"><img src="admin/img/<?php echo $home_picture?>" class="img-res" alt="website template image"></div>
                                   
                            </div>
                            <div class="team-member-back">
                                <div class="team-member-info">
                                    <h3 class="team-member-back-name"><?php echo $displayname?></h3>
                                    <p class="team-member-back-info"><?php echo $skill1?></p>
                                    <p class="team-member-back-info"><?php echo $description?></p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>

        <div class="hero-arrow page-scroll home-arrow-down">
            <a class="" href="#intro"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
        </div>

    </div>
</div>
    <header id="masthead" class="site-header">
        <nav id="primary-navigation" class="site-navigation" data-spy="affix">
            <div class="container">
                <div class="navbar-header page-scroll">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#portfolio-perfect-collapse" aria-expanded="false" >
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                   
                    <div class="page-scroll site-logo">
                        <a href="#top">AA.</a>
                    </div>

                </div>

                <div class="main-menu collapse navbar-collapse" id="portfolio-perfect-collapse">

                  
                    <ul class="nav navbar-nav navbar-right">

                        <li class="page-scroll"><a href="#top">Home</a></li>
                        
                        <li class="page-scroll"><a href="#intro">Portfolio</a></li>
                        <li class="page-scroll"><a href="#services">Services</a></li>
                        <li class="page-scroll"><a href="#contact">Contact</a></li>
                        <li class="page-scroll"><a href="admin/cv/<?php echo $cv?>">Download CV</a></li>
                        
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    
    <main id="main" class="site-main">
        <section class="site-section section-hello" id="intro">
			<div class="container">
				<h2>Here's My Portfolio!</h2>
				<p class="section-subtitle"><span>Educational Background</span></p>
				<ul class="timeline">
                  
                <?php
                    
                        include_once('config.php');

                        $query = "SELECT * FROM education ORDER BY startyear ASC";
                        $result = $con->query($query);
                        
                        if ($result->num_rows > 0) {
                          
                            echo '<ul class="timeline">';
                            
                            while ($row = $result->fetch_assoc()) {
                                
                                $isEven = $row['id'] % 2 === 0; 
                                $startyear = $row['startyear'];
                                $endyear = $row['endyear'];
                                $edu = $row['edu'];
                                $school = $row['school'];
                                $course = $row['course'];
                                
                                if ($isEven) {
                                   
                                    echo '<li class="timeline-start">';
                                    echo '<div class="rectangle "><span>' . $startyear . ' - ' . $endyear . '</span></div>';
                                    echo '</li>';
                                    echo '<li>';
                                    echo '<div class="rectangle timeline-rectangle"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo '<div class="timeline-heading">';
                                    echo '<div class="timeline-position"><p>' . $row['edu'] .  '</p></div>';
                                    echo '</div>';
                                    echo '<div class="timeline-body">';
                                    echo '<p>' . $row['school'] . '</p>';
                                    echo '<p>' . $row['course'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                } else {
                                   
                                    echo '<li class="timeline-start">';
                                    echo '<div class="rectangle"><span>' . $startyear . ' - ' . $endyear . '</span></div>';
                                    echo '</li>';
                                    echo '<li class="timeline-inverted">';
                                    echo '<div class="rectangle timeline-rectangle"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo '<div class="timeline-heading">';
                                    echo '<div class="timeline-position"><p>' . $row['edu'] . '</p></div>';
                                    echo '</div>';
                                    echo '<div class="timeline-body">';
                                    echo '<p>' . $row['school'] . '</p>';
                                    echo '<p>' . $row['course'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                        } else {
                            echo "No education details found";
                        }
                        ?>

                
                    
                </ul>
			</div>
		</section>

        <section class="section-history" id="history">
            <div class="container">          
                <div class="text-center section-diff-title">     
                    <h2>Experience</h2>
                    <p></p>
                </div> 
                
                <ul class="timeline">
                    
                <?php
                     
                        include_once('config.php');

                     
                        $query = "SELECT * FROM experience ORDER BY start_year ASC";
                        $result = $con->query($query);
                        
                        if ($result->num_rows > 0) {
                            
                            echo '<ul class="timeline">';
                            
                            while ($row = $result->fetch_assoc()) {
                                
                                $isEven = $row['id'] % 2 === 0; 
                                $startyear = $row['start_year'];
                                $endyear = $row['end_year'];
                                $company_name = $row['company_name'];
                                $company_address = $row['company_address'];
                                $job_title = $row['job_title'];
                                $job_description = $row['job_description'];
                                
                                if ($isEven) {
                                  
                                    echo '<li class="timeline-start">';
                                    echo '<div class="rectangle "><span>' . $startyear . ' - ' . $endyear . '</span></div>';
                                    echo '</li>';
                                    echo '<li>';
                                    echo '<div class="rectangle timeline-rectangle"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo '<div class="timeline-heading">';
                                    echo '<div class="timeline-position"><p>' . $company_name .  '</p></div>';
                                    echo '</div>';
                                    echo '<div class="timeline-body">';
                                    echo '<p>' . $company_address . '</p>';
                                    echo '<p>' . $job_title  . '</p>';
                                    echo '<p>' . $job_description  . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                    
                                } else {
                                   
                                    echo '<li class="timeline-start">';
                                    echo '<div class="rectangle "><span>' . $startyear . ' - ' . $endyear . '</span></div>';
                                    echo '</li>';
                                    echo '<li class="timeline-inverted">';
                                    echo '<div class="rectangle timeline-rectangle"></div>';
                                    echo '<div class="timeline-panel">';
                                    echo '<div class="timeline-heading">';
                                    echo '<div class="timeline-position"><p>' . $company_name .  '</p></div>';
                                    echo '</div>';
                                    echo '<div class="timeline-body">';
                                    echo '<p>' . $company_address . '</p>';
                                    echo '<p>' . $job_title  . '</p>';
                                    echo '<p>' . $job_description  . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                        } else {
                            echo "No education details found";
                        }
                        ?>


                
                    
                </ul>
            </div>
        </section>
       
       
		
      
        <section class="site-section section-skills" id="skill">
                    <div class="text-center section-diff-title">
                       
                        <p class="section-subtitle"><span>Skills</span></p>
                    </div>
                    <div class="container">
              
                    <?php
                          

                            $query = "SELECT * FROM about";
                            $result = $con->query($query);

                            if ($result->num_rows > 0) {
                                
                                while ($row = $result->fetch_assoc()) {
                                 
                                    echo '<div class="progress-group">';
                                    echo '<p>' . $row['skillname'] . '</p>';
                                    echo '<div class="progress">';
                                    echo '<div class="progress-bar" role="progressbar" data-transitiongoal="' . $row['skillper'] . '"></div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "No skill data found";
                            }
                            ?>

                      

                      

                        
                    
                <
            </div>
        </section>
   

      
     
        <section class="site-section section-services" id="services">
    <div class="container-fluid">
        <h2>Projects</h2>
        <p class="section-subtitle"><span></span></p>
    </div>

    <div class="container">
        <div class="carousel slide" id="services-carousel">
            <div class="item-controls text-center">
                <a href="#services-carousel" class="left btn carousel-control" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <a href="#services-carousel" class="right btn carousel-control" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>

            <div class="carousel-indicators nav-tabs text-center">
                <?php
                $query = "SELECT * FROM projects";
                $result = $con->query($query);
                $active = true;

                if ($result->num_rows > 0) {
                    $indicatorIndex = 0;
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $picture = $row['picture'];
                        $description = $row['description'];
                        $link = $row['link'];
                ?>
                        <a data-target="#services-carousel" href="<?php echo $link ?>" data-slide-to="<?php echo $indicatorIndex ?>" class="<?php echo $active ? 'active' : ''; ?>">
                            <div class="col-xs-6 col-sm-fifth">
                                <div class="service">
                                    <div class="rectangle">
                                        <i class="fa fa-laptop" aria-hidden="true"></i>
                                    </div>
                                    <p class="hidden-xs"><?php echo $title ?></p>
                                </div>
                            </div>
                        </a>
                <?php
                        $active = false;
                        $indicatorIndex++;
                    }
                }
                ?>
            </div>

            <div class="carousel-inner">
                <?php
                $result->data_seek(0); 
                $active = true;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $picture = $row['picture'];
                        $description = $row['description'];
                        $link = $row['link'];
                ?>
                        <div class="item <?php echo $active ? 'active' : ''; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="service-info">
                                        <h3 class="service-title"><?php echo $title ?></h3>
                                        <p><?php echo $description ?></p>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6" >
                                    <img src="admin/img/<?php echo $picture ?>" class="img-fluid" style="object-fit:contain; width: 350px; height: 350px;"alt="Responsive image">
                                </div>
                            </div>
                        </div><!-- /.item -->
                <?php
                        $active = false;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <br>
            </br>
</section>

       

        <section class="site-section section-contact" id="contact">
            <div class="container">
                <h2>Contact</h2>
                <p class="section-subtitle"><span></span></p>
                <div class="row">
                <form method="POST" action="">
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="col-sm-12">
                            <textarea class="form-control" type="text" name="message" placeholder="Your Message"  required></textarea>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-inverted">Send Message</button>
                        </div>  
                    </form>
                </div>
            </div>
        </section>

        <section class="section-background section-twitter background-overlay text-center">
            <div class="container">
                <div class="rectangle">
                    <i class="fa fa-phone"></i>
                </div>
                <h1>Contacts</h1>
                <p><?php echo $email?></p>
                <p><?php echo $mobile_num?></p>
                <p><?php echo $address?></p>
                
            </div>
        </section>
        
        

        <section class="section-networks blue-bg">
            <div class="container">
                <?php
                            $query = "SELECT * FROM socialmedia"; 
                            $result = $con->query($query); 

                            if ($result->num_rows > 0) {
                                echo '<div class="section-networks">';
                                while ($row = $result->fetch_assoc()) {
                                    $logo = $row['logo'];
                                    $link = $row['link'];

                                  
                                    echo '<a href="' . $link . '" class="rectangle">';
                                    echo '<i class="' . $logo . '"></i>';
                                    echo '</a>';
                                }
                                echo '</div>';
                            } else {
                                echo "No social media links found";
                            }
                            ?>
                        </div>
                
                
            </div>
        </section>

    </main>


    <footer id="colophon" class="site-footer">

        <div class="container-fluid">

            <ul class="list-unstyled list-inline">
                        <li class="page-scroll"><a href="#top">Home</a></li>
                        <li class="page-scroll"><a href="#intro">Portfolio</a></li>
                        <li class="page-scroll"><a href="#services">Services</a></li>
                        <li class="page-scroll"><a href="#contact">Contact</a></li>
            </ul>

            <div class="page-scroll">
                <a href="#top" class="rectangle">
                    <i class="fa fa-angle-double-up"></i>
                </a>
            </div>

        </div>

    </footer>

    

   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-progressbar.min.js"></script>
    <script src="assets/js/jquery.countTo.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/touchswipe.min.js"></script>
    <script src="assets/js/script.js"></script>
  
</body>
</html>