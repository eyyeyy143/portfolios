
<?php

  include_once('../../config.php');
  session_start();
  if (!isset($_SESSION['ID'])) {
      header("Location:../../login/login.php");
      exit();
  }
  $query_ipcr = "SELECT * FROM contact "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
                    $ipcr_row = $result_ipcr->fetch_assoc();
                    $stdid = $ipcr_row['id'];
                    $email = $ipcr_row['email'];
                    $mobile_num = $ipcr_row['mobile_num'];
                    $address = $ipcr_row['address'];
                    
 

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Portfolio</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
   
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  
    <link rel="stylesheet" href="../../assets/css/style.css">
   
    
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
              <span class="icon-bg"><i class="mdi mdi-home-variant menu-icon"></i></span>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">
              <span class="icon-bg"><i class="mdi mdi-emoticon-cool menu-icon"></i></span>
              <span class="menu-title">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.php">
              <span class="icon-bg"><i class="mdi mdi-file-document menu-icon"></i></span>
              <span class="menu-title">Portfolio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recent.php">
              <span class="icon-bg"><i class="mdi mdi mdi-laptop-mac menu-icon"></i></span>
              <span class="menu-title">Recent Work</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="contact.php">
              <span class="icon-bg"><i class="mdi mdi-contact-mail menu-icon"></i></span>
              <span class="menu-title">Contact</span>
            </a>
          </li>
          
          
          <li class="nav-item nav-category">Log out</li>
          <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
              <a href="../../login/logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Log Out</span></a>
            </div>
          </li>
        </ul>
        </nav>
     
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> About Me </h3>
             
            </div>
            
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Personal Information</h4>
                    
                    <form class="forms-sample" method="POST" action="project.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" id="Name" name="name" placeholder="Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="Address">Descriptions:</label>
                        <input type="text" class="form-control" id="Address" name="description"placeholder="Description ">
                      </div>
                      <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="text" class="form-control file-upload-info" id="Email" name="link" placeholder="Insert URL">
                      </div>
                      <div class="input-group col-xs-12">
                          <input  name="fileImg" type="file" class="form-control file-upload-info">
                                 
                                  
                      </div>
                      <br>
                      <button type="submit" name="submit" class="btn btn-primary me-2">Add</button>
                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Message</h4>
                        
                        <div class="table-responsive"> 
                        <table class="table table-bordered " id="table4">
                          <thead>
                          <tr>
                              <th>Title</th>
                              <th>Picture</th>
                              <th>Description</th>
                              <th>Link</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                                
                                  $sql = "SELECT * FROM projects";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["title"] . "</td>";
                                         
                                          echo '<td><img style="" src="../../img/' . $row["picture"] . '" alt="Photo"></td>';
                                          echo "<td>" . $row["description"] . "</td>";
                                          echo "<td>" . $row["link"] . "</td>";
                                          echo "<td><a href='delete_project.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                                          echo "</tr>";
                                      }
                                  } else {
                                      echo "<tr><td colspan='4'>No messages found</td></tr>";
                                  }
                                  ?>
                          
                            
                          </tbody>
                        </table>
                        </div>
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