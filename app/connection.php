
<?php



echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap' rel='stylesheet'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' rel='stylesheet'>";
echo "<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap' rel='stylesheet'>";
echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>";
echo "<link rel='stylesheet' href='../css/style.css'>";

// Database Credentials
$user = "a3003935_appuser_assignment3";
$pw = "c;X9Vt-sN0ab";
$db = "a3003935_assignment_3";

// Database Connection object (adress, user, pw, db)
$connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

// Create variable that stores all records from our database
$result = $connection->query("select * from pages") or die($connection->error());

// first check if form has been submitted with data
// SUBMIT_X = checks for x / y coordinates when clicking on image? also add submit to value and name of image.
if (isset($_POST['submit_x'])) {
    // create variables from our posted form values
    $item = htmlspecialchars($_POST['item']);
    $item = $connection->real_escape_string($item); 

    $class = htmlspecialchars($_POST['class']);
    $class = $connection->real_escape_string($class); 

    $containment = htmlspecialchars($_POST['containment']);
    $containment = $connection->real_escape_string($containment); 

    $description = htmlspecialchars($_POST['description']);
    $description = $connection->real_escape_string($description); 

    $image = htmlspecialchars($_POST['image']);
    $image = $connection->real_escape_string($image); 
    
    $extra = htmlspecialchars($_POST['extra']);
    $extra = $connection->real_escape_string($extra); 

    // Create a insert command

    $sql = "insert into pages(item, class, containment, description, image, extra)
    values('$item', '$class', '$containment', '$description', '$image', '$extra')";

    // display success or error message on screen
    if ($connection->query($sql) === TRUE) {
        echo "
        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1><span class='greenText'>{$item}</span> added to SCP Database.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>

        <h3>The database has been updated with the <span class='greenText'>{$item}</span> submission.</h3>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
      
        
        ";
    } 
    else
    {
        echo "


        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1>There was an <span class='redText'>ERROR</span> submitting this record.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
        ";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // create delete sql command

    $del = "delete from pages where id=$id";

    // run the command and then display approrpiate success or error messages
    if ($connection->query($del) === TRUE) {

        echo "
        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1>Database Entry has been <span class='redText'>DELETED</span> successfully.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>

        <h3>The database has been updated with the entry deleted.</h3>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
        ";
    } else {
        echo "


        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1>There was an <span class='redText'>ERROR</span> deleting this record.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
        ";
    }
}

// update form check if update button has been clicked
if (isset($_POST['update_x'])) {
    // create variables from our posted form values
    $id = $_POST['id'];
    $item = htmlspecialchars($_POST['item']);
    $item = $connection->real_escape_string($item); 

    $class = htmlspecialchars($_POST['class']);
    $class = $connection->real_escape_string($class); 

    $containment = htmlspecialchars($_POST['containment']);
    $containment = $connection->real_escape_string($containment); 

    $description = htmlspecialchars($_POST['description']);
    $description = $connection->real_escape_string($description); 

    $image = htmlspecialchars($_POST['image']);
    $image = $connection->real_escape_string($image); 
    
    $extra = htmlspecialchars($_POST['extra']);
    $extra = $connection->real_escape_string($extra); 

    // Create an update command
    $update = "
            update pages set item='$item', class='$class', containment='$containment', description='$description', image='$image', extra='$extra'
            where id='$id'
    ";

    // display success or error message on screen
    if ($connection->query($update) === TRUE) {
        echo "

        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1><span class='greenText'>{$item}</span> updated successfully.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>

        <h3>The database entry for <span class='greenText'>{$item}</span> has been updated.</h3>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
        
        ";
    } 
    else 
    {
        echo "


        <body>
        <div><img class='imageHeader' src='../images/selfmade/header.png' alt='header'></div>
        <hr style='border: 5px solid rgb(75,175,75); width: 100%; margin: auto;'>

        

        <div class='siteContainer'>
        <br>
        <br>

        <h1>There was an <span class='redText'>ERROR</span> updating this record.</h1>
        <br>
        <br>

        <div class='db-container'>
        <div class='db'>
        <a href='../index.php'><img src='../images/selfmade/database.png' style='width: 8em; margin:6px 0 6px 0; padding-bottom: 5px;' /></a>
        </div>
        </div>
        <br>
        <br>
        <h3>Return to the index page by clicking the database icon or return button.</h3>

        <br>
        
        <br>

        <hr style='border: 2px solid rgb(75,175,75); width: 75%; margin: auto;'>
        <br>
        <br>
        <a href='../index.php'><img class='playButton' src='../images/selfmade/return_index.png' style='border-style: none; height: auto; width: 15em;' /></a>
        <br>
        <br>
        </div>
        <footer>
              <a href='../index.php'>
                  <img class='imageFooter' src='../images/foundImages/scp_foundation_emblem.png' alt='SCP Emblem'></a>
              <h6>© 2020 M. FRANKEN. ALL RIGHTS RESERVED. SCP FOUNDATION. </h6>
        </footer>
        ";
    }
}





?>