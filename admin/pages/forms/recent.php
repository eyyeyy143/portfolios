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
              <h3 class="page-title"> Home </h3>
             
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Home Settings</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="First">First Line</label>
                        <input type="text" class="form-control" id="First" placeholder="First Line">
                      </div>
                      <div class="form-group">
                        <label for="Second">Second Line</label>
                        <input type="text" class="form-control" id="Second" placeholder="Second Line">
                      </div>
                      <div class="form-group">
                        <label for="Third">Third Line</label>
                        <input type="text" class="form-control" id="Third" placeholder="Third Line">
                      </div>
                     
                      <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                    
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
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