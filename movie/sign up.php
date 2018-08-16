<html>
<head>
<title>Sign up </title>
<style>
h1 {color:  #0040ff;}
td {color: #ff0055;}
#submit{
	background-color:#e2a738;
	padding:4px;
	color:black;
	width:120px;
	text-align:center;
	font-size:16px; 
	font-weight:bold; 
	border-radius:6px;
}
#back{
	background-color:#e2a738;
	padding:4px;
	color:black;
	width:120px;
	text-align:center;
	font-size:16px; 
	font-weight:bold; 
	border-radius:6px;
}

</style>

</head>
<body background="sign up.jpg" width="10px" height=auto ><center>
 <br>
<h1><b><i>.....Viewer Details.....</i></b></h1>
<center>

<form action="sign up.php" method="post"> 
<table width="400" hight="600" cellspacing="10"   >
                <tr>
                    <td><h3><b>Name :<b/></h3></td>
                    <td>
                        <h3><input type="text" placeholder="Enter your name" name="name" required>
                    </td>
                    
                </tr>
				
                 <tr>
                    <td><h3><b>Password :<b/></h3></td>
                    <td>
                        <h3><input type="Password" placeholder="Enter password" name="password" required></h3>
                    </td>
                    
                </tr>
				
				<tr>
                    <td><h3><b>Confirm password :<b/></h3></td>
                    <td>
                        <h3><input type="Password" placeholder="Confirm password" name="confirm" required></h3>
                    </td>
                    
                </tr>
				
                 <tr>
                    <td><h3>Email :</h3></td>
                    <td>
                        <h3><input type="email" placeholder="Email" name="email" required></h3>
                    </td>
                 </tr>
				 
                 <tr>
                    <td><h3><b>Address:<b/></h3></td>
                    <td>
                        <h3><input type="text" placeholder="City" name="address" required></h3>
                    </td>
                 </tr>
				 
                 <center><tr>
                    
                    <td>
                        <b><input type="Submit" value="Sign Up" id="submit" name="submit" ><b/>
                    </td>
					
                    
                 </tr>
				 <tr><td>
                       <a href="login.php"><input type="button"  id="back" value="Back" name="login" ></a>
                    </td>
				 </tr>
            </table></form></center>
			
            


</body>

</html>
<?php
$con=mysqli_connect("localhost","root","","movie");
if(!$con)
echo "<center>Connection Failed</h1></center>";
if(isset($_POST['submit']))
{
	$a=$_POST['password'];
    $b=$_POST['name'];
    $c=$_POST['email'];
	$d=$_POST['address'];
	
	

$r="select v_id from viewer where email='$c'";
$q="insert into viewer (vpass,vname,email,address) values ('$a','$b','$c','$d')";
if($_POST['password']==$_POST['confirm'])
{
if(mysqli_query($con,$q)){
echo " <h1><center>...Successfully Signed up...</center></h1>";

if(mysqli_num_rows(mysqli_query($con,$r))==1){
      $row=mysqli_fetch_assoc(mysqli_query($con,$r));
	  $str=$row['v_id'];
	  echo "<center><h2>$b, your unique User ID is =<b> $str</b></h2></center>" ; 
      mysqli_close($con);
	 

}else{
	echo "<h3>!!!Oops Something went wrong</h3>";
}
}
else
     {
        echo '<script type="text/javascript"> alert("!!Please enter unique E-mail...") </script>';
     }
}
else
     {
        echo '<script type="text/javascript"> alert("!!!Enter confirm Password correctly...") </script>';
     }
}














