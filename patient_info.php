

<?php include 'server.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Wizard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>COVID-19 Self-Assessment System</h1>
        <p>A Self-Assessment wizard to predict Covid 19 </p> 
    </div>
    <!--navbar starts-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a class="navbar-brand" href="#">Covid19Wizard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php" target="_blank">View all Record </a>
            </li>
              
          </ul>
        </div>  
      </nav>
    <!--navbar ends-->
      
      
      <div class="container" style="margin-top:30px">

        

        
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-12 col-lg-8">
              
                

            
            
            
            
            
          <!--Show Tables -->
            </div>
            <div class="col-4">
             View all Record
             
             <p><a href="view.php" target="_blank">Click Here</a></p>
             <iframe src="view.php" name="iframe_a" height="50%" width="100%" title="Iframe Example"></iframe>
             <p>*Recent Record</p>
            </div>
          </div>
      </div>
      

       <!--Footer -->
      <div class="jumbotron text-center " style="margin-bottom:0">
        <p>This COVID-19 Self Assessment System is only for software
            development purpose and may not yield actual result. Any
            information given by users of this system will not be disclosed
            or store to anywhere.</p>
        <p class="col-lg-12 footer-text  text-center ">
          © Copyright All rights reserved to <span style="font-weight: 700; color: rgb(236, 93, 93);"><a href="http://shahriersarder.s3-website-us-east-1.amazonaws.com/" target="_blank">Shahrier Sarder Shoumik</a></span>
         </p>
      </div>



   <!--script here--> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>