<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 800px;
            background-color: rgb(255, 166, 0);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        nav{
            width: 100%;
            height: 80px;
            background-color: darkgoldenrod;
            position: relative;
            top: 0;
        }
        .logo{
            position: absolute;
            /* top: 10px; */
            left: 50px;
            color: white;
            cursor: pointer;
        }
        nav ul{
            position: absolute;
            right: 20px;
            top: 10px;
            display: flex;
        }
        nav ul li{
            list-style:none;

        }
        nav ul li a{
            text-decoration: none;
            margin-left: 20px;
            color: blue;
        }
        nav ul li a:hover{
            text-decoration: underline;
        }


        .container {
            height: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .box {
            height: auto;
            background-color: blueviolet;
            color: white;
            margin: 10px;
            padding: 20px;
            width: 200px;
            overflow: hidden;
            max-height: 400px;
        }

        .all-problem{
            text-align: center;
            color: white;
            font-size: 60px;
        }

        h2 {
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
<nav>

<div class="logo">
    <h1>Done</h1>
</div>
<ul>
    <li><a href="/finalproject/index.html">Home</a></li>
    <li><a href="/finalproject/register.php">Register</a></li>
    <li><a href="/finalproject/notice.php">Notice</a></li>
    <li><a href="/finalproject/about.html">About</a></li>
</ul>
</nav>
    <h1 class="all-problem">All Problems</h1>
    <h2>Please vote for support</h2>
    <div class="container">
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'project';
        $conn = mysqli_connect($host, $user, $pass, $dbname);

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT name, branch, problem FROM register";
        $result = mysqli_query($conn, $query);

        // Check if there are any rows returned from the query
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo "<span>Name: </span>" . $row['name'] . "<br>";
                echo "<span>Branch: </span>" . $row['branch'] . "<br>";
                echo "<span>Problem: </span>" . $row['problem'] . "<br>";
                // echo '<button onclick="vote(this, ' . $row['vote'] . ')">Vote</button>';
                // echo '<span class="vote-count">' . $row['vote'] . '</span>';
                echo '</div>';
            }
        } else {
            echo "No results found.";
        }

        // Close the connection
        mysqli_close($conn);
        ?>
    </div>
    <!-- <script>
        function vote(button, initialCount) {
            var box = button.parentNode;
            var voteCount = box.querySelector('.vote-count');
            var currentCount = parseInt(voteCount.textContent);

            // Check if initialCount is defined (voted count from database)
            if (initialCount !== undefined) {
                currentCount = initialCount;
            }

            // Retrieve the stored vote count from localStorage
            var storedCount = localStorage.getItem('voteCount');

            // If storedCount exists and is a valid number, update currentCount
            if (storedCount !== null && !isNaN(storedCount)) {
                currentCount = parseInt(storedCount);
            }

            voteCount.textContent = currentCount.toString();
            arrangeVotes();

            // Increment the vote count when clicked
            button.addEventListener('click', function() {
                currentCount++;
                voteCount.textContent = currentCount.toString();
                arrangeVotes();

                // Store the updated vote count in localStorage
                localStorage.setItem('voteCount', currentCount.toString());
            });
        }

        function arrangeVotes() {
            var optionsContainer = document.querySelector('.container');
            var optionElements = document.querySelectorAll('.box');

            var sortedOptions = Array.from(optionElements).sort(function(a, b) {
                var votesA = parseInt(a.querySelector('.vote-count').textContent);
                var votesB = parseInt(b.querySelector('.vote-count').textContent);
                return votesB - votesA;
            });

            sortedOptions.forEach(function(option) {
                optionsContainer.appendChild(option);
            });
        }
    </script> -->
</body>
</html>
