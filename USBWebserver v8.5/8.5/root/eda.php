
<!DOCTYPE html>

<html lang="en">
    
  <head>
      

  <?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "usbw";
        $dbname = "baza";
      $profil = $_SESSION["username"];
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); }        
        
          
            
      
      

  ?>




    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="style.css">

      <title>Private</title>

      <style>
.topnav {
  overflow: hidden;
  background-color: none;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}

/* Style the search box inside the navigation bar */

.topnav button[type=submit] {
  float: left;
  padding: 13px;
  border: none;
  margin-top: 2px;
  margin-right: 10px;
  font-size: 15px;
  background: lightgreen;
}

.topnav input[type=text] {
  float: left;
  padding: 12px;
  border: none;
  margin-top: 5px;
  margin-right: 15px;
  font-size: 20px;
}

.topnav a[type=dropdown] {
  float: right;
  padding: 12px;
  border: none;
  margin-top: 5px;
  margin-right: 0px;
  font-size: 17px;
}



/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
 
}
</style>
      
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="150">
      
        <nav class="navbar navbar-light bg-faded navbar-fixed-top"  id="navbar">

        <img src="logo.jpg" alt="Italian Trulli" height="60px" class="navbar-brand" >

          <a class="navbar-brand" href="#" style="font-size: 20px;">HireMe</a>
          <ul class="nav navbar-nav">
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link" href="#jumbotron">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link" href="https://www.google.com">Jobs</a>
            </li>  
            <li class="nav-item" style="font-size: 20px;">
              <a class="nav-link" href="https://www.google.com">Work</a>
            </li>          
            <li class="nav-item dropdown pull-xs-right">
                <a class="nav-link dropdown-toggle"  type="dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $profil?>
                </a>
                <div class="dropdown-menu"  style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Work</a>
                  <a class="dropdown-item" href="#">Setings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="http://localhost:8080/work">Log out</a>
                </div> 
            </li>
                            <!--SEARCH-->
                            
  </div>       
          </ul> 
          
        </nav> 


          <br>
          <br>
          <br>
        
          <div class="">
            <div class="row">
                <div class="col-md-2 ">
                     <div class="list-group ">
                      <a href="http://localhost:8080/work/dashboard/personal.php" class="list-group-item list-group-item-action">Dashboard</a>
                      <a href="#" class="list-group-item list-group-item-action active">Search Jobs</a>
                      <a href="http://localhost:8080/work/post/cv.php" class="list-group-item list-group-item-action ">Post CV</a>
                      <a href="http://localhost:8080/work/editpublic/personal.php" class="list-group-item list-group-item-action ">Edit Public Informations</a>
                      <a href="http://localhost:8080/work/editprivate/personal.php" class="list-group-item list-group-item-action ">Edit Private Informations</a>

                      
                      
                      
                    </div> 
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Jobs</h4>
                                    <hr>
                                </div>
                            </div>
<div class="topnav">
            <button type="submit" name="search"><i class="fa fa-search"></i></button>
            <input type="text" placeholder="Search..">
                            <div class="row">
                                <div class="col-md-12">

          <?php
          
          $select = "SELECT * FROM job";
          $result = $conn->query($select);  
          if ($result->num_rows > 0) {  // output data of each row
          while($row = $result->fetch_assoc()) {              
              $tittle= $row["title"];
              $description  = $row["description"];
              ?>

              <div class="form-group row">                                        
                                  <div class="col-md-12">
                                  <h2><?php echo $tittle ?></h2 >
                                  <p><?php echo substr($description , 0, 400);echo 's';?></p>
                                  <div>
                                  <span class="badge">Posted 2012-08-02 20:47:04</span><div class="pull-right"><span class="label label-default">alice</span> <span class="label label-primary">story</span> <span class="label label-success">blog</span> <span class="label label-info">personal</span> <span class="label label-warning">Warning</span>
                                  <span class="label label-danger">Danger</span></div>  
                                </div>
                                <br>
                                <br>
                                <?php
                    }
                  }
              ?>

          

                                







                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> 

             </div>
            </div>
        </div>

        
          
      
      
      
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
  </body>

  
    
</html>