<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

  <title>Assignment 3 - SCP</title>
</head>

<body>

<div><img class="imageHeader" src="images/selfmade/header.png" alt="header"></div>
<?php include "app/connection.php" ?>

  <!-- Nav Menu Row -->

    <div class="topnav" id="myTopnav">
    <?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    ?>         
        <?php $pagename = trim($_GET['page'], "'"); ?>
        <a <?php if($url=='https://30039357.2020.labnet.nz/assignment3_scp_migaelfranken/index.php'){ ?>class="active" <?php }?> href="index.php"><i class="fa fa-fw fa-globe"></i>Index</a>
        <?php foreach($result as $page): ?>
        <?php $test = $page['item']; ?>
        <a <?php if($pagename==$test){ ?>class="active" <?php } ?> href="index.php?page='<?php echo $page['item']; ?>'"><?php echo $test?></a>
        <?php endforeach; ?>
        <a <?php if($url=='https://30039357.2020.labnet.nz/assignment3_scp_migaelfranken/form.php'){ ?>class="active" <?php }?> href="form.php" style="float: right">Submit new Entry</a>
        <a href="javascript:void(0);" class="icon" onclick="navFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

  <div class="siteContainer">
  <br>


  <!-- Database Content -->
  <div class="row">

    <div class="col">

    <?php
      if(isset($_GET['page']))
      {
        $pg = trim($_GET['page'], "'");

        $record = $connection->query("select * from pages where item='$pg'") or die($connection->error());

                // convert $record into an array for us to echo out the individual fields on screen.
                $row = $record->fetch_assoc();

                // create variables that hold data from all the table fields
                $item = $row['item'];
                $class = $row['class'];
                $containment = $row['containment'];
                $containment = nl2br($containment);
                $description = $row['description'];
                $description = nl2br($description);
                $image = $row['image'];
                $extra = $row['extra'];
                $extra = nl2br($extra);

                // variables to hold our update and delete url strings
                $id = $row['id'];
                $update = "update.php?update=" . $id;
                $delete = "app/connection.php?delete=" . $id;
        
                // Display information on screen
                echo"
                
                <h1>Item #: {$item}</h1>
                <h2>Object Class: {$class}</h2>

                <br>
                <div><img class='imageBreak' src='images/selfmade/breaker.png' alt='Breaker'></div>
                <br>

                <div class='click-zoom'>
                <label>
                <input type='checkbox'>
                <img class='imageContain' src='{$image}' alt='Picture of {$item}}'>
                </label>
                </div>

                <br>
                <div><img class='imageBreak' src='images/selfmade/breaker.png' alt='Breaker'></div>
                <br>
                
                <h3>Special Containment Procedures:</h3>
                <img class='playButton' src='images/selfmade/play_button.png' alt='Play Button' style='border-style: none; height: auto; width: 15em;'
            onclick='TextToSpeechPara()'>
                <p id='readMe'>{$containment}</p>
                <br>
                <div><img class='imageBreak' src='images/selfmade/breaker.png' alt='Breaker'></div>
                <br>

                <h3>Description:</h3>
                <p>{$description}</p>

                <br>
                <div><img class='imageBreak' src='images/selfmade/breaker.png' alt='Breaker'></div>
                <br>

                <h3>Extra Information</h3>
                <p>{$extra}</p>
        
                ";

                // Display Update and Delete buttons
                echo "
                <p>
                <br>
                <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
                <br>
                <div class='db-container'>
                 <div class='db'>
                 <a href='{$update}'><img src='images/selfmade/update_button.png' alt='Play Button' style='border-style: none; height: auto; width: 15em; padding-top:15px;'></a>
                </div>
                </div>
                <br>

                <div class='db-container'>
                <div class='db'>
                <a href='{$delete}'><img src='images/selfmade/delete_button.png' alt='Play Button' style='border-style: none; height: auto; width: 12em;'></a>
                </div>
                </div>
                
                </p>
                ";
        


      }

      // If this is the first time this page has been accessed, display content below (HOME PAGE?)
      else
      {
        
        echo "
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='index.php'><img src='images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <h1 class='greenText'>#SCP DATABASE V1.07 CLASSIFIED#</h1>
        <br>
        <div><img class='imageBreak' src='images/selfmade/breaker.png' alt='Breaker'></div>
        <br>
        <div class='db-container'>
        <div class='db'>
          <a href='form.php'><img src='images/selfmade/submit_button.png' alt='Submit' style='border-style: none; height: auto; width: 15em; padding-top:25px; padding-bottom:15px'></a>
        </div>
        </div>
        <br>
        <br>
        <hr style='border: 3px solid rgb(75,175,75)'>
        <br>
        <h1 style='padding-top: 20px;'>INSTRUCTIONS FOR USE</h1>
        <br>
        <ul>
        <li>Navigate to current database objects using the navigation bar.</li>
        <li>Delete or Update any entry with the buttons located at the bottom of the entry.</li>
        <li>Add new item to database using the submit button or submit option in navigation bar.</li>
        <li>All input fields are required except the 'Extra' field, this is considered optional data.</li>
        <li>Images are stored server-side and must be chosen, not uploaded, currently you may only select the available images, to add your own contact HQ.</li>
        <li>Do not share this Database with any unauthorized personel.</li>
        <li>You can navigate back to the database <span class='greenText'>INDEX</span> by clicking the large Database image, or the SCP logo in the footer of the page</li>
        </ul>
        <br>
        
        

        
        ";
      
      }

    ?>

    </div>

  </div>
  <br>
  <footer>
        <a href="index.php">
            <img class="imageFooter" src="images/foundImages/scp_foundation_emblem.png" alt="SCP Emblem"></a>
        <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
  </footer>


<script src="js/functions.js">
</script>
</body>

</html>