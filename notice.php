<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <nav>

        <div  class="logo">
            <h1>Done</h1>
        </div>
        <div class="menu">
            <ion-icon class="menu-icon" name="menu-outline"></ion-icon>
        </div>
        <ul class = "nav">
            <li><a href="/finalproject/index.html">Home</a></li>
            <li><a href="/finalproject/register/register.php">Register</a></li>
            <li><a href="/finalproject/Notice/notice.php">Notice</a></li>
            <li><a href="/finalproject/about.html">About</a></li>
        </ul>
    </nav>
    <div class="notice-show-container">
    <h1>New Notice</h1>
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'notice_database';
    
        $conn = mysqli_connect($host, $user , $pass, $dbname);
        // Fetch notices from the database
        $query = "SELECT Notice FROM data";
        $result = mysqli_query($conn, $query);

        // Check if there are any rows returned from the query
        if (mysqli_num_rows($result) > 0) {
            $boxIndex = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo "<span>Notice:  </span>" . $row['Notice'] . "<br>";
                echo '</div>';
                $boxIndex++;
            }
        } else {
            echo "No results found.";
        }
        ?>
    <button id="add-notice">Add Notice</button>
</div>

    <div class="add-notice" id="input-notice">
        <div class="input-notice">
            <form action="" method="POST">
                <input type="text" name="notice" placeholder="Enter Notice"> <br>
                <input type="submit" name="btn-submit" class="btn-submit" id="">
            </form>
        </div>
        <div class="close" id="close">
            <ion-icon name="close-outline"></ion-icon>
        </div>
    </div>
   

    <script>
         const button = document.getElementById('add-notice');
         const div = document.getElementById('input-notice');
         const close = document.getElementById('close');
        

        button.addEventListener('click', () => {
            div.classList.toggle('active'); /* Toggle active class */
        });
        close.addEventListener('click', () => {
            div.classList.remove('active'); /* remove active class */
        });

    </script>
</body>
</html>
<?php
if(isset($_POST['btn-submit'])){
    $notice = $_POST['notice'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'notice_database';

    $conn = mysqli_connect($host, $user , $pass, $dbname);

    $query = "INSERT INTO data(Notice) values('$notice')";
    $data = mysqli_query($conn, $query);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
}  
?>