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
<?php include "app/connection.php" ?>
    <div><img class="imageHeader" src="images/selfmade/header.png" alt="header"></div>

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
    <br>

    <div class="db-container">
    <div class="db">
    <a href="index.php"><img src="images/selfmade/database.png" style="width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;" /></a>
    </div>
    </div>

    <?php
    $id = $_GET['update'];
    $record = $connection->query("select * from pages where id=$id") or die($connection->error());
    $row = $record->fetch_assoc();


    ?>

    <form class="form-group" method="post" action="app/connection.php">

    <h1>Update <span class="greenText"><? echo $row['item']; ?></span> entry below.</h1>
    <br>
    <hr style="border: 3px solid rgb(75,175,75)">

    <br>
    <input type="hidden" name="id" value="<? echo $row['id']; ?>">
    <h3>Item Name</h3>
    <input type="text" name="item" value="<? echo $row['item']; ?>">
    <br>
    <br>

    <h3>Class</h3>
    <input type="text" name="class" value="<? echo $row['class']; ?>">
    <br>
    <br>

    <h3>Special Containment Procedure</h3>
    <textarea name="containment" rows="5" placeholder="<?php echo $row['containment']; ?>"><?php echo $row['containment']; ?></textarea>
    <br>
    <br>

    <h3>Description</h3>
    <textarea name="description" rows="5" placeholder="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></textarea>
    <br>
    <br>

    <h3>Image</h3>
    <input type="text" name="image" value="<?php echo $row['image'];?>">
    <br>
    <br>

    <h3>Extra Information</h3>
    <textarea name="extra" rows="5" placeholder="<?php echo $row['extra']; ?>"><?php echo $row['extra']; ?></textarea>
    <br>

    <!-- BUTTON -->
    <input type="image" class="playButton" name="update" src="images/selfmade/update_button.png" value="update" alt="Update Button" style="border-style: none; height: auto; width: 18em;">
    <br>



    
    
    </form>
    
    <footer>
    <a href="index.html">
    <img class="imageFooter" src="images/foundImages/scp_foundation_emblem.png" alt="SCP Emblem"></a>
    <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
</footer>

</div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>