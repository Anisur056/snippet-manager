# PHP Login Form with Sessions

## Session variables are used to store individual client’s information on the web server for later use,  as a web server does not know which client’s request to be respond because HTTP address does not maintain state.

## This tutorial enables you to create sessions in PHP via Login form and web server respond according to his/her request.

## To Start a PHP Session:

```
<?php
session_start();
// Do Something
?>
```
 

To Store values in PHP Session variable:


```
session_start();
// Store Session Data
$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
```
 

To Read values of PHP Session variable:


```
session_start();
// Store Session Data
$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
echo $_SESSION['login_user'];
```
 

To Unset or Destroy a PHP Session:


```
session_destroy(); // Is Used To Destroy All Sessions
//Or
if(isset($_SESSION['id']))
unset($_SESSION['id']);  //Is Used To Destroy Specified Session
```

In our example, we have a login form when user fills up required fields and press login button, a session will be created on server which assigns him a unique ID and stores user information for later use.

Watch out live demo or download the given codes to use it.

php login form with sessions

Download script   Live Demo

Advance-PHP-Login-Script

Complete HTML and PHP codes are given below.

PHP File: index.php 
Given below code creates an HTML login form.

```
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>PHP Login Session Example</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
```
 

PHP File: login.php
Consists of login script in which PHP session is intialized.

```
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>
```
 

PHP File: profile.php
It is the redirected page on successful login.

```
<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>
```
 

PHP File: session.php
This page, fetches complete information of the logged in user.

```
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>
```
 

PHP File: logout.php
To destroy all the sessions and redirecting to home page.

```
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>
```
 

My SQL Code Segment:

To create database and table, execute following codes in your My SQL .

```
CREATE DATABASE company;
CREATE TABLE login(
id int(10) NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id)
)
```
 

CSS File: style.css

Styling HTML elements.

```
@import http://fonts.googleapis.com/css?family=Raleway;
/*----------------------------------------------
CSS Settings For HTML Div ExactCenter
------------------------------------------------*/
#main {
width:960px;
margin:50px auto;
font-family:raleway
}
span {
color:red
}
h2 {
background-color:#FEFFED;
text-align:center;
border-radius:10px 10px 0 0;
margin:-10px -40px;
padding:15px
}
hr {
border:0;
border-bottom:1px solid #ccc;
margin:10px -40px;
margin-bottom:30px
}
#login {
width:300px;
float:left;
border-radius:10px;
font-family:raleway;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px
}
input[type=text],input[type=password] {
width:99.5%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:raleway
}
input[type=submit] {
width:100%;
background-color:#FFBC00;
color:#fff;
border:2px solid #FFCB00;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
#profile {
padding:50px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7
}
#logout {
float:right;
padding:5px;
border:dashed 1px gray
}
a {
text-decoration:none;
color:#6495ed
}
i {
color:#6495ed
}
```
 

Conclusion:
Through Login/Logout form it becomes easy to deal with sessions in PHP. Hope you like it, keep reading our other blogs.
