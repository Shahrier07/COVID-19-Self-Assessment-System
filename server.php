<?php
         
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname="covid19db";

         // Create connection
         $conn = mysqli_connect($servername, $username, $password, $dbname);
         // Check connection
         if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
         }
      
         
        /* $sql = "INSERT INTO users (age, sex,temperature, assess_date, score, result)
         VALUES (18, 'F', 38.45, '2020-09-02',9,'Positive')";

         if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
         */




        //---------$post Method----------
        $age = $sex =$temperature="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $age= $_POST["age"];
           $sex= $_POST["sex"]; // echo "Sex:". $sex;
           $temperature= $_POST["temperature"];


           
           // symptom array checking
           if(isset($_POST["symptoms"])== NULL){
              //echo "symtoms empty";
             // echo "<br>";
              $symptoms= array();
           }else{
               $symptoms= $_POST["symptoms"];
           }

           //additional symtom array checking
           if(isset($_POST["addsymptoms"])== NULL){
               //echo "addsymtoms empty";
              // echo "<br>";
               $addsymptoms= array();
            }else{
                $addsymptoms= $_POST["addsymptoms"];
            }

            //Date
            $assess_date=date("Y-m-d");
            //echo  $assess_date;
            
            
            //Result
            $result="";
            
           
        }



      
        //-----------------------------------------------//
        
        $count= count($symptoms);
        $score=0;
        

        //temparature
        if($temperature> 37.5){
           $score= $score+2;
           //echo $temperature;
          
        }
       
        //Symptom
        if($count==1){
           $symp=3;
           
        }else{
         for( $i=1; $i<$count; $i++){
           
            $symp=3+$i;
           // echo $symp;
         } 
        }
        $score= $score+ $symp;
       // echo "Symptoms Score: " .$score ;
        
        //Additional symptoms
        $count = count($addsymptoms);
   
        for( $i=0; $i<$count; $i++){
           
            $score=$score+2;
        } 
     
         
        
        //echo "Total Score: " .$score;
         //echo "<br>";
        
        //result
         if($score<5){
            $result='Negative';

            }else{
                     
                     $result='Positive';
               }

            
     

       
        //echo $result;
        
        //DB insertion
        
       
         $sql = "INSERT INTO users (age, sex,temperature, assess_date, score, result)
         VALUES ('$age', '$sex', '$temperature', '$assess_date','$score','$result')";

         if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
           
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
         
         $conn->close();
      ?>






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
        <p>Developed By <a href="http://shahriersarder.s3-website-us-east-1.amazonaws.com/" target="_blank">Shahrier Sarder </a></p>
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
      
      

     <!--Main Body-->
      <div class="container-fluid" style="margin-top:30px; height: 100%">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-12 col-lg-7">
              
                <!--View Card starts-->
                <div class="card text-center">
                     <div class="card-header">
                        <div class="col">Your Serial No: <?php print $last_id?></div>
                        <div class="col text-sm-right">Date: <?php print $assess_date?></div>
                     </div>
                     
                     <div class="card-body">
                        <h5 class="card-title text-dark">COVID19 Result: <?php print $result?> </h5>


                        <!--Advice -->
                        <p class="card-text">
                           <?php 
                              if($score<5){
                                 echo "Merely have chance to get affected by COVID19.".
                                 "You are adviced for isolation and contact doctor and follow
                                 advice.";
                                 $result='Negative';
                      
                              }elseif($score >=5){
                                 if($score>5 && $score<7){
                                  echo " Highly chance of COVID-19 affected. ".
                                  "You are adviced for isolation and contact doctor immediately
                                  and follow advice";
                                  echo "<br>";
                                  $result='Positive';
                                  echo "<br>";
                                  echo "<br>";
                                  echo "<br>";
                      
                      
                                  //emergency contact list
                                  echo "You are reqested to contact this list  of emergency phone numbers  in case of any emergency";
                                  echo "<br>";
                                  echo "*---------------------*------------------------*"; echo "<br>";
                                  echo "Uttara Adhunik Medical College Hospital(BMSRI)–Uttara". "("."Phone: 02-8932330".")"; echo "<br>";
                                  echo "*---------------------*------------------------*"; echo "<br>";
                                  echo"Uttarkhan General Hospital – Uttarkhan, Ward 45". "("."Phone: 88-02-8999066".")"; echo "<br>";
                                  echo "*---------------------*------------------------*"; echo "<br>";
                                  echo"Jatrabari Community Center, Jalapara, Jatrabari". "("."Phone: +8801914346429".")"; echo "<br>";
                                  echo "*---------------------*------------------------*"; echo "<br>";
                                  echo"Square Hospital, Dhaka". "("."Phone: 09610-010616".")"; echo "<br>";
                                  echo "*---------------------*------------------------*"; echo "<br>";
                                    
                      
                      
                                  }elseif($score>7){
                                     echo"Almost confirmed case of COVID-19 positive".
                                     "You are adviced for isolation and contact doctor immediately
                                     and follow advice";;
                                     echo "<br>";
                                     $result='Positive';
                                     echo "<br>";
                                     echo "<br>";
                                     echo "<br>";
                                     //emergency contact list
                                     echo "You are reqested to contact this list  of emergency phone numbers  in case of any emergency:";
                                     echo "<br>";
                                     echo "<br>";
                                     
                                     echo "*---------------------*------------------------*"; echo "<br>";
                                     echo "Uttara Adhunik Medical College Hospital(BMSRI)–Uttara". "("."Phone: 02-8932330".")"; echo "<br>";
                                     echo "*---------------------*------------------------*"; echo "<br>";
                                     echo"Uttarkhan General Hospital – Uttarkhan, Ward 45". "("."Phone: 88-02-8999066".")"; echo "<br>";
                                     echo "*---------------------*------------------------*"; echo "<br>";
                                     echo"Jatrabari Community Center, Jalapara, Jatrabari". "("."Phone: +8801914346429".")"; echo "<br>";
                                     echo "*---------------------*------------------------*"; echo "<br>";
                                     echo"Square Hospital, Dhaka". "("."Phone: 09610-010616".")"; echo "<br>";
                                     echo "*---------------------*------------------------*"; echo "<br>";
                                  }else{
                                        echo "Possible suspected case for COVID-19 affected."."You are requested for  for isolation and contact doctor and follow
                                         advice.";
                                         $result='Positive';
                                  }
                      
                              }
                           
                           ?>


                        </p>
                        <a href="index.html" class="btn btn-primary" target="_blank">Check Another</a>
                     </div>
                     <div class="card-footer text-muted">
                        Covid19 Wizard (<?php echo "Your score: ". $score   ?>)
                     </div>
                  </div>
                <!--View Card ends-->

            
            
         
          <!--Show Tables -->
            </div>
            <div class="col-7 mt-5" >
               <h5>View all Record</h5>
               
               <p><a href="view.php" target="_blank">Click Here</a></p>
               <iframe src="view.php" name="iframe_a" height="300px" width="100%" title="Iframe Example"></iframe>
               <p>*Recent Record</p>
            </div>
          </div>
      </div>
      




   <!--script here--> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>

