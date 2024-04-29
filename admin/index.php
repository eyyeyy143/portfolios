<?php
   

   include_once('config.php');
   session_start();
   if (!isset($_SESSION['ID'])) {
       header("Location:login/login.php");
       exit();
   }

   $query_ipcr = "SELECT * FROM displaycontent "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
  $ipcr_row = $result_ipcr->fetch_assoc();
                    $stdid = $ipcr_row['id'];
                    $displayname = $ipcr_row['display_name'];
                    $skill1 = $ipcr_row['display_skill_1'];
                    $description = $ipcr_row['descriptions'];
                    $home_picture = $ipcr_row['home_picture'];
 

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileImg'])) {

  if ($_FILES['fileImg']['error'] === UPLOAD_ERR_OK) {
    
    $file = $_FILES['fileImg']['tmp_name'];
    $fileName = $_FILES['fileImg']['name'];
    
    // Move the uploaded file to the desired location
    $destination = 'img/' . $fileName;
    move_uploaded_file($file, $destination);

    // Update the image field in the admin table
    $sql = "UPDATE displaycontent SET home_picture = '$fileName' WHERE id = 1";
    mysqli_query($con, $sql);

    header("Location: index.php");
    exit();

  } else {
 
  }
}








?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Portfolio</title>

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
   
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  
    <link rel="stylesheet" href="assets/css/style.css">
   
    
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          
            <li class="nav-item nav-category">Portfolio Settings</li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">About Me</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Portfolio</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="recent.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Recent Work</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="contact.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Contact</span>
              </a>
            </li>
            
            
            
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
     
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Home </h3>
             
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Home Settings</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="displayname">Name</label>
                        <input type="text" class="form-control" name = "displayname"id="First" placeholder="<?php echo $displayname ?>">
                      </div>
                      <div class="form-group">
                        <label for="skill1">Skill</label>
                        <input type="text" class="form-control" id="skill1" placeholder="<?php echo $skill1 ?>">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="<?php echo $description ?>">
                      </div>
                      
                      
                    
                    
                      <button type="submit" class="btn btn-primary me-2">Update</button>
                      
                    </form>

                    <br>
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Image upload</label><br>
                        <?php
                    
                        
                          echo '<img style="width:15rem;border-radius: 10px;" src="img/' . $home_picture . '" alt="Photo">';
                      
                        ?>
                        </br>
                        <br>
                             
                      </div>
                                <div class="input-group col-xs-12">
                                        <input  name="fileImg" type="file" class="form-control file-upload-info">
                                        <input type="submit" class="btn btn-primary me-2"  name='submit' value="Submit">
                                  
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
    
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
   
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
  
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
 
  </body>
</html>