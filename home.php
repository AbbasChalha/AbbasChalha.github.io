<?php
session_start();
if(!isset($_SESSION['username']))
    header('location:login.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <style>
        body{
        margin: 0;
        padding: 0;
        font-family: 'Nunito', sans-serif;
        background: url(welcome.jpg);
        background-size: cover;
    }
    h1{
        color:red;
        text-align: center;
    }
    h3{
        color:#eeeec3;
        text-align:center;
    }
    a {
    text-decoration: none;
    
    color: #ffffff;
    font-size: 35px; 
    }
    a:hover{
        color: red;
        text-decoration: underline;
    }
    table {
	border-collapse: collapse;
	border-spacing: 0;
	font-family: Futura, Arial, sans-serif;
    }

    th, td { padding: .75em; }
    th { 
        background-color:#990000;
        color: #fff;
    }
    th:first-child {
        border-radius: 9px 0 0 0;
        
    }
    th:last-child {
        border-radius: 0 9px 0 0;
    }
    tr{
        background: #eeeec3;
    }
    
    </style>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['username'];?></h1>
    <div style="position:absolute; left:88%; top:21px;">
        <a href="logout.php" color:red>Logout</a>
    </div>
    <div>
        <h3>Here is some movies suggestions :</h3>
    </div>
    <?php
        $con = mysqli_connect("localhost","id15737082_mohamadhabach","#9W{BM<jQ>2]K0w@");
        if(!$con)
        die("Could not connect to the server. ".mysqli_connect_error());
         
        $DBcon = mysqli_select_db($con,"id15737082_webproject");
        if(!$DBcon)
        die("Could not connect to db ".mysqli_connect_error());
        echo"<center>";
        echo "<table border='1' width=60%>";
        echo "<tr> <th>Title</th> <th>Release Year</th> <th>Director</th></tr>";
        $dbR = mysqli_query($con,"SELECT `Title`, `Release Year`, `Director` FROM `Movie`");
        while($row = mysqli_fetch_row($dbR))
        {
            echo "<tr><td align='center'>{$row[0]}</td>";
            echo "<td align='center'>{$row[1]}</td>";
            echo "<td align='center'>{$row[2]}</td></tr>";
        }
        echo"</center>";
        

    ?>
    
</body>
</html>




