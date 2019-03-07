<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Timbre</title>
    <link rel="icon" type="image/png" href="Assets/icon.png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="Assets/css/grid.css" />
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
    <div class="main_area_allsongs">
        <div class="container">
            <div class="row">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db = "mysql";
                    $sql = "SELECT * FROM 'timbre'";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password,$db);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 
                    $sql = "SELECT * FROM timbre";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-3 card">
                                    <div class="songcard">
                                        <div class="songname">'.$row["Song_Name"].'</div>
                                        <div class="singer">'.$row["Singer"].'</div>
                                        <div class="language">'.$row["Language"].'</div>
                                    </div>
                                  </div>';
                        }
                    } else {
                        echo "No song found";
                    }
                    mysqli_close($conn);
                ?>
                <!-- Last Card with add symbol -->
                <div class="col-md-3 card">
                    <div class="songcard addsymbol">
                        <a class="button plus" href="addsongs.html">
                            <span class="bg" id="plus"></span>
                            <span class="symbol"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS Script -->
    <!-- <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
</body>
</html>