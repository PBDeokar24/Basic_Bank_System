<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Main */
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7rem;
        }
        body{
            background: rgba(66, 72, 82, 0.75);
            background-blend-mode: darken;
            background-image: url(img/background.png);
            height: 91vh;
            background-position: center;
            background-size: cover;
        }
        
        /* Classes */
        .text-primary1{
            color: #93cb52;
        }
        .logo{
            background: #fff;
            border-radius: 50%;
        }
        h1{
            font-size: 35px;    
        }
        
        /* Navbar */
        #navbar1{
            display: flex;
            position: sticky;
            top: 0;
            background: rgba(55, 55, 55, 0.75);
            color: #fff;
            justify-content: space-between;
            padding: 1rem;
        }
        #navbar1 ul{
            display: flex;
            align-items: center;
            list-style: none;
        }
        #navbar1 ul li a{
            color: #fff;
            text-decoration: none;
            padding: 0.75rem;
            margin: 0 0.25rem;
        }
        #navbar1 ul li a:hover, #navbar1 ul li a.current{
            background: #93cb52;
            color: #fff;
            border-radius: 5px;
        }
        
        .title{
            text-align: center;
            font-family: 'Gabriela', serif;   
            font-size: 40px;
            color: white;
            margin-top: 20px;
        }
        
        /* Table */
        table{
            position: absolute; 
            left: 50%;
            margin-top: 300px; 
            transform: translate(-50%,-50%);
            position: center;
            border-collapse: collapse;
            width: 1000px;
            height: 200px;
            border: 1px solid #bdc3c7;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
            background: rgba(55, 55, 55, 0.75);
            color: #fff;
        }

        tr{
            transition: all ,0.25s ease-in;
        }

        tr:hover{
            background: #444;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);

        }
        th, td{
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd; 
        }
        .header{
            background-color: #16a085;
            color: #fff;
            transition: none;
        }
        .header:hover{
        background-color: #16a085;
        transform: none;
        box-shadow:none;
        cursor: auto;
        }
    </style>
    <title>History</title>
</head>
<body>
  <nav id="navbar1">
    <h1><span class="text-primary1"><i><img class="logo" src="img/logo.png" alt="" width="37" height="37"></i> GRIP</span> Bank</h1>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="users.php">Users</a></li>
      <li><a class="current" href="history.php">History</a></li>
    </ul>
  </nav>
  <h1 class="title">Transaction History</h1>
  <table>
    <tr class="header">
    <th>Sender's Name</th>
    <th>Sender's Account</th>
    <th>Reciever's Name</th>
    <th>Reciever's Account </th>
    <th>Amount</th>
    </tr>

    <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }

        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td>";
                 echo "</tr>";
        }
        echo "</table>";
        }
    ?>
    </table>
    
</body>
</html> 