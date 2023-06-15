<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Rgister problem
    </title>
    <style>
        body{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: rgb(255, 166, 0);
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
        .flex{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 300px;
            background-color: blueviolet;
            padding: 20px;
            color: white;
        }
        .inputt{
            height: 30px;
            background-color: transparent;
            border: none;
            outline: none;
            border-bottom: 2px white solid;
            margin-bottom: 10px;
            font-size: 20px;
            padding-left: 20px;
            color: white;
            text-transform: capitalize;
        }
        input::placeholder{
            color: rgb(160, 157, 157);
            font-size: 13px;
        }
        .button{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #btn-submit{
            padding: 10px;
            background-color: rgb(0, 213, 255);
            width: 150px;
            border: none;
            margin-top: 10px;
        }
        .submitted{
            text-align:center;
            transform: scaleX(0);
            transition: transform ease 0.2s;
        }
        .submitted.active{
            transform: scaleX(1);
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
            <li><a href="/finalproject/show.php">Show Problems</a></li>
            <li><a href="/finalproject/notice.php">Notice</a></li>
            <li><a href="/finalproject/about.html">About</a></li>
        </ul>
    </nav>

<div class="flex">
    <form action="#" method="POST">
        <label for="">Name</label>
        <input class="inputt" type="text" name="name" id="" placeholder="Enter your name" required>

        <label for="">Branch</label>
        <input class="inputt" type="text" name="branch" id="" placeholder="Enter your branch" required>
        
        <label for="">Roll No</label>
        <input class="inputt" type="text" name="rollno" id="" placeholder="Enter your roll no" required>
        
        <label for="">Problem</label>
        <textarea name="problem" id="" cols="30" rows="10"></textarea required>
        <div class="button">
            <input type="submit" name="btn-submit" id="btn-submit">
        </div>
        
    </form>
</div>

<div class="submitted" id="submitted">
    <h1>Your data is Submitted</h1>
</div>
    
<script>
        const button = document.getElementById('btn-submit');
        const div = document.getElementById('submitted');
        

        button.addEventListener('click', () => {
            div.classList.add('active'); 
        });
</script>

</body>
</html>
<?php
if(isset($_POST['btn-submit'])){
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $rollno = $_POST['rollno'];
    $problem = $_POST['problem'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'project';

    $conn = mysqli_connect($host, $user , $pass, $dbname);

    $query = "INSERT INTO register(name, branch, rollno, problem) values('$name', '$branch','$rollno', '$problem')";
    $data = mysqli_query($conn,$query);
    
}  
?>
