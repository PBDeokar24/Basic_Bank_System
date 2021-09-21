<!DOCTYPE html>
<html>
<head>
  <title>Table with database</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
  *{
    /* Reset */
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
    
    /* Navbar */
    #navbar1{
        display: flex;
        position: sticky;
        top: 0;
        background: rgba(55, 55, 55, 0.75);
        color: #fff;
        justify-content: space-between;
        z-index: 1;
        padding: 1rem;
    }
    a{
        text-decoration: none;
    }
    h1{
        font-size: 35px;    
    }
    #navbar1 ul{
        display: flex;
        align-items: center;
        list-style: none;
    }
    #navbar1 ul li a{
        color: #fff;
        padding: 0.75rem;
        margin: 0 0.25rem;
    }
    
    #navbar1 ul li a:hover, #navbar1 ul li a.current{
        background: #93cb52;
        color: #fff;
        border-radius: 5px;
    }

    /* Table */
    table {  
      border-collapse: collapse;
      width: 900px;
      border: 1px solid #bdc3c7;
      box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
      background: rgba(55, 55, 55, 0.75);
      color: black;
      position: absolute; 
      left: 50%;
      margin-top: 70px;
      transform: translate(-50%,-50%);
    }
    .header{
        background-color: #16a085;
    }
    th, td{
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd; 
        color: #fff;
    }
    td{
      background: #444;
    }
    .transcation {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      text-align: center;
      padding-bottom: 16px;
      background: rgba(55, 55, 55, 0.75);
      width: 700px;
      border-radius: 10px;
      position: absolute; 
      left: 50%;
      margin-top: 370px; 
      transform: translate(-50%,-50%);
    }
    .transcation:hover{
      background:#444;
    }
    .dropdown{
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 30px;
      width: 250px; 
      outline: 0;
      margin-top: 20px;
    }
    .text{
      width: 250px;
      height: 40px;
      border: 1px solid #ddd;
      border-radius: 30px;
      outline: 0;
      padding: 10px;
      font-weight:bold;
    }
    .button{
      background-color: rgba(34, 74, 90, 0.8);
      border-radius: 30px;
      width: 180px;
      height: 37px;
      font-size: 17px;
    }
    .button:hover{
      background-color: rgba(34, 74, 90);
      transform: scale(1.02);
    }
    .title{
        text-align: center;
        font-family: 'Gabriela', serif;   
        font-size: 40px;
        color: white;
        margin-top: 10px;
    }
  </style>
</head>
<body>
  
<nav id="navbar1">
    <h1><span class="text-primary1"><i><img class="logo" src="img/logo.png" alt="" width="37" height="37"></i> GRIP</span> Bank</h1>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="current" href="users.php">Users</a></li>
      <li><a href="history.php">History</a></li>
    </ul>
  </nav>
  <h3 class="title">Customer Details</h3>

  <table>
    <tr class="header">
      <th>Account Number</th>
      <th>Name</th>
      <th>Email</th>
      <th>Location</th>
      <th>Amount</th>
    </tr>

    <?php
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($server, $username, $password, "bank");
    if (!$conn) {
      die("Connection failed");
    }
    $_SESSION['user'] = $_GET['user'];
    $_SESSION['sender'] = $_SESSION['user'];
    ?>

    <?php
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $sql = "SELECT * FROM customers WHERE Name='$user'";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row["Acc_Number"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Location"] . "</td><td>" . $row["Amount"] . "</td>";
        echo "</tr>";
      }
    }
    ?>
  
    <div class="transcation">
      <?php
      if ($_GET['message'] == 'success') {
        echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
        <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
          <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
        </symbol>
        <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
          <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
        </symbol>
        <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
          <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
        </symbol>
      </svg>
      <div class='alert alert-success d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div>Congraulations... Transaction Successful!</div>
      </div>";
      }
      if ($_GET['message'] == 'transactionDenied') {
      echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
      <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
      </symbol>
      <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
      </symbol>
      <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
      </symbol>
    </svg>
    <div class='alert alert-danger d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div>Oops...Trancaction Denied! Amount Exceeded Outstanding Balance. </div>
    </div>";
    }
    ?>
    <h3 class="title">Make a Transaction</h3>
    <form action="transfer.php" method="POST">
      <b>To :&nbsp&nbsp&nbsp&nbsp</b>
      <select name="reciever" class="dropdown" required>
        <option>Select Recipient</option>
        <?php
        $db = mysqli_connect("localhost", "root", "", "bank");
        $res = mysqli_query($db, "SELECT * FROM customers WHERE name!='$user'");
        while ($row = mysqli_fetch_array($res)) {
          echo ("<option> " . "  " . $row['Name'] . "</option>");
        }
        ?>
      </select>
      <br><br>
      <b> From :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><span style="font-size:1.2em;"><input class="text" name="sender" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
      <br><br>
      <b>Amount :&nbsp&nbsp</b>
      <input name="amount" class="text" type="number" min="100"  required>
      <br><br>
      <a href="transfer.php"><button class="button" name="transfer" ;>Transfer</button></a>
    </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>