<?php

  include_once('../../config.php');
  session_start();
  if (!isset($_SESSION['ID'])) {
      header("Location:../../login/login.php");
      exit();
  }
  $query_ipcr = "SELECT * FROM education "; 
  $result_ipcr = $con->query($query_ipcr); 

  if ($result_ipcr->num_rows > 0) {
                    $ipcr_row = $result_ipcr->fetch_assoc();
                    $school = $ipcr_row['school'];
                    $edu = $ipcr_row['edu'];
                    $course = $ipcr_row['course'];
                    $startyear = $ipcr_row['startyear'];
                    $endyear = $ipcr_row['endyear'];
                    
 

}
$query = "SELECT * FROM experience "; 
  $result = $con->query($query); 

  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $company = $row['company_name'];
                    $address = $row['company_address'];
                    $job = $row['job_title'];
                    $job_des = $row['job_description'];
                    $startyear = $row['start_year'];
                    $endyear = $row['end_year'];
                    
 

}
$query_skill = "SELECT * FROM about "; 
  $result_skill = $con->query($query_skill); 

  if ($result_skill->num_rows > 0) {
                    $row_skill = $result_skill->fetch_assoc();
                    $skillname = $row_skill['skillname'];
                    $skillper = $row_skill['skillper'];
                
                    
                    
 

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
              <h3 class="page-title"> Portfolio</h3>
             
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Educational Background</h4>
                      
                      <form method="POST" action="education.php">
                        <div class="form-group">
                          <label for="edu">Education</label>
                          <input type="text" class="form-control" id="edu" name="edu" placeholder="(e.g. <?php echo $edu?>)">
                        </div>
                        <div class="form-group">
                          <label for="school">School</label>
                          <input type="text" class="form-control" id="school" name="school" placeholder="(e.g. <?php echo $school?>)">
                        </div>
                        <div class="form-group">
                          <label for="course">Course</label>
                          <input type="text" class="form-control" id="course" name="course" placeholder="(e.g. <?php echo $course?>)">
                        </div>
                        <div class="form-group">
                          <label for="startyear">Year Started</label>
                          <input type="number" class="form-control" id="startyear" name="startyear" placeholder="(e.g. <?php echo $startyear?>)">
                        </div>

                        <div class="form-group">
                          <label for="endyear">Year Ended</label>
                          <input type="number" class="form-control" id="endyear" name="endyear" placeholder="(e.g. <?php echo $endyear?>)">
                        </div>

                        <button type="submit" class="btn btn-success me-2">Update</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Education Table</h4>
                        
                        <div class="table-responsive"> 
                        <table class="table table-bordered " id="table4">
                          <thead>
                          <tr>
                              <th>Education</th>
                              <th>Year Started</th>
                              <th>Year Ended</th>
                              <th>School</th>
                              <th>Course</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                                
                                  $sql = "SELECT * FROM education";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                     
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["edu"] . "</td>";
                                          echo "<td>" . $row["startyear"] . "</td>";
                                          echo "<td>" . $row["endyear"] . "</td>";
                                          echo "<td>" . $row["school"] . "</td>";
                                          
                                          echo "<td>" . $row["course"] . "</td>";
                                          echo "<td><a href='delete_edu.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
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
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Experience Background</h4>
                      
                      <form method="POST" action="experience.php">
                        <div class="form-group">
                          <label for="company">Company Name</label>
                          <input type="text" class="form-control" id="company" name="company" placeholder="(e.g. <?php echo $company?>)">
                        </div>
                        <div class="form-group">
                          <label for="address">Company Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="(e.g. <?php echo $address?>)">
                        </div>
                        <div class="form-group">
                          <label for="job">Job Title</label>
                          <input type="text" class="form-control" id="job" name="job" placeholder="(e.g. <?php echo $job?>)">
                        </div>
                        <div class="form-group">
                          <label for="des">Job Description</label>
                          <input type="text" class="form-control" id="des" name="des" placeholder="(e.g. <?php echo $job_des?>)">
                        </div>
                        <div class="form-group">
                          <label for="startyear">Start</label>
                          <input type="number" class="form-control" id="startyear" name="startyear" placeholder="(e.g. <?php echo $startyear?>)">
                        </div>

                        <div class="form-group">
                          <label for="endyear">End</label>
                          <input type="number" class="form-control" id="endyear" name="endyear" placeholder="(e.g. <?php echo $endyear?>)">
                        </div>

                        <button type="submit" class="btn btn-success me-2">Update</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Recent Work</h4>
                        
                        <div class="table-responsive"> 
                        <table class="table table-bordered " id="table4">
                          <thead>
                          <tr>
                              <th>Company Name</th>
                              <th>Company Address</th>
                              <th>Job Title</th>
                              <th>Job Description</th>
                              <th>Year Started</th>
                              <th>Year Ended</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                                
                                  $sql = "SELECT * FROM experience";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                     
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["company_name"] . "</td>";
                                          echo "<td>" . $row["company_address"] . "</td>";
                                          echo "<td>" . $row["job_title"] . "</td>";
                                          echo "<td>" . $row["job_description"] . "</td>";
                                          echo "<td>" . $row["start_year"] . "</td>";
                                          echo "<td>" . $row["end_year"] . "</td>";
                                          echo "<td><a href='delete_experience.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
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
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Skills</h4>
                      
                      <form method="POST" action="skill.php">
                        <div class="form-group">
                          <label for="skillname">Skill</label>
                          <input type="text" class="form-control" id="skillname" name="skillname" placeholder="(e.g. <?php echo $skillname?>)">
                        </div>
                        <div class="form-group">
                          <label for="skillper">Skill Percentage</label>
                          <input type="number" class="form-control" id="skillper" name="skillper" placeholder="(e.g. <?php echo $skillper?>)">
                        </div>

                        <button type="submit" class="btn btn-success me-2">Update</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Skills</h4>
                        
                        <div class="table-responsive"> 
                        <table class="table table-bordered " id="table4">
                          <thead>
                          <tr>
                              <th>Skill Name</th>
                              <th>Skill Percentage</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                                
                                  $sql = "SELECT * FROM about";
                                  $result = $con->query($sql);

                                  if ($result->num_rows > 0) {
                                      // Output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row["skillname"] . "</td>";
                                          echo "<td>" . $row["skillper"] . "%</td>";
                                          echo "<td><a href='delete_skill.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
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