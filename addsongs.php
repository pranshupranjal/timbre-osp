<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Timbre</title>
    <link rel="icon" type="image/png" href="Assets/icon.png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Assets/css/addsong.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <!-- Sidebar Begins-->
    <div class="sidebar">
            <div id="sidelogo">
                <img src="Assets/icon.png">
            </div>
            <div id="restbutton">
                <button id="all_songs" onclick="location.href='index.php'">All Songs</button>
                <br>
                <button id="add_songs" onclick="location.href='addsongs.php'">Add Songs</button>
            </div>
        </div>
        <!-- Sidebar ends -->
        <!-- Main area apart from sidebar begins-->
        <div class="main_area">
            <div class="registration-form">
                <header>
                    <h1>Add Song</h1>
                    <p>Fill in all informations</p>
                </header>
                <form method="POST" id="add-form" name="add-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="input-section email-section">
                        <input name="song_name" class="email" type="text" placeholder="ENTER SONG NAME HERE" autocomplete="off"/>
                        <div class="animated-button"><span class="icon-paper-plane"><i class="fas fa-music"></i></span><span class="next-button email"><i class="fa fa-arrow-up"></i></span></div>
                    </div>
                    <div class="input-section password-section folded">
                        <input name="artist_name"  class="password" type="text" placeholder="ENTER SINGER NAME HERE"/>
                        <div class="animated-button"><span class="icon-lock"><i class="fas fa-user"></i></span><span class="next-button password"><i class="fa fa-arrow-up"></i></span></div>
                    </div>
                    <div class="input-section repeat-password-section folded">
                        <input name="language"  class="repeat-password" type="text" placeholder="ENTER LANGUAGE HERE"/>
                        <div class="animated-button"  name="submit" id="submit"><span class="icon-repeat-lock"><i class="fas fa-language"></i></span><span class="next-button repeat-password"><i class="fa fa-paper-plane"></i></span></div>
                    </div>
                    <div class="success"> 
                     <p>SONG ADDED</p>
                    </div>
                </form>
            </div>
        </div>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "mysql";
            // Create connection
            $conn = new mysqli($servername, $username, $password,$db);
            if(! $conn ) {
                die('Could not connect: ' . mysql_error());
            }
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $song = $_POST['song_name'];
                $artist = $_POST['artist_name'];
                $lang = $_POST['language'];
                $sql = "INSERT INTO timbre (Song_Name, Singer, Language) VALUES (\"$song\",\"$artist\",\"$lang\")";
                if(!mysqli_query( $conn, $sql))
                {
                    die("<p style='margin-left:80vw;'>Could not enter data: </p>" . mysql_error());
                }
            }
            mysqli_close($conn);
        ?>
    <!-- JS Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="Assets/js/addsong.js"></script>
    <script>
        $(document).ready(function() {
        $("#submit").click( function(event) {
            setTimeout( function () { 
                document.forms['add-form'].submit();
            }, 2000);
            });
        });
    </script> 
</body>
</html>