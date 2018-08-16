
<html>
    <head>
        <title>Login</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
          h2 {color: #ff0055;}
		  #login{
	background-color:#0baa43;
	padding:3px;
	color:black;
	width:100px;
	text-align:center;
	font-size:16px; 
	font-weight:bold;  
	border-radius:4px;
}
#signup{
	background-color:#0baa43;
	padding:3px;
	color:black;
	width:100px;
	text-align:center;
	font-size:16px; 
	font-weight:bold;  
	border-radius:4px;
}
#cc{
    margin-top:120px;  
	width:500px;
    background: rgba(0,0,0,0.5);
    padding: 10px;
	border-radius:10px ;
	
	
	
}
.ip{
	padding:5px;
	border-radius:5px;
	width:250px;
	
}
.ipp{
	padding:5px;
	border-radius:5px;
	width:170px;
	
}
.bt{
	background-color:#0ab1d3;
	padding:5px;
	color:black;
	width:100px;
	text-align:center;
	font-size:15px; 
	font-weight:bold;  
	border-radius:4px;
	
}


         </style>
    
    </head>
    
    <body background="b-4.jpg">
    <center><h1 id="h" style="color:#f2d91a;"><b><i>....Log-in page....</i></b></h1></center>
	
        <center>
            <form method="post" action="login.php" style= " float:right; padding-top:30px; padding-right:27px;">
                <div class="admin"><table>
                        <div><tr id="ttt">
                         <td><h2 style="color:#0baa43; font-size:28px; padding-top:0px;"><b>Admin Login :</b></h2></td>
                        <td><h1><input type="number" class="ipp" placeholder="Enter Admin ID" name="aname" required></h1>
                    </td>
                     <td>
                        <h1><input class ="ipp" type="Password" placeholder="Enter password" name="apassword" required>
                    </td>
                    <td>
                        <h1><b><input type="Submit" class="bt" value="SUBMIT" name="asubmit" ><b/></h1>
                    </td>
                        
                            </tr></div>
                    
                    </table></div>
                
                
            </form></center>
            
            
            
        
    <center>
        
        <center><div class="viewer">
           
        <form method="post" action="login.php">
            <div id="cc"> <table>
			<tr>
			<center><h1 style="color:#0ab1d3; padding-bottom:0px;"><i><b>...Viewer Login...</b></i></h1></center>
			<img src="login.png" style="width :80px; padding-bottom:25px; height :80px;">
			</tr>
                <tr>
                    <td><h2 style="color:#f2d91a;">User ID  :</h2></td>
                    <td>
                        <h2><input type="number" class="ip" placeholder="Enter user ID" name="vname" required></h2>
                    </td>
                    
                </tr>
				
                 <tr>
                     <td><h2 style="color:#f2d91a;">Password  :</h2></td>
                    <td>
                        <h2><input type="Password" class="ip" placeholder="Enter password" name="vpassword" required></h2>
                    </td>
                    
                </tr>
                <tr>
                    
                    <td>
                       <center> <h1 style="color:#d31782; float:right;"><b><input type="Submit" value="  Login  "  id="login" name="vsubmit" ><b/></h1</center>
                    </td>
                     <td>
                       <a href="sign up.php"><center><input type="button"  id="signup" value="Sign Up" name="signup" ></center></a>
                    </td>
                 </tr>
                </table></div>
        </form>
        </div></center>
    </body>
</html>

<?php
$con=mysqli_connect("localhost","root","","movie");
if(!$con)
echo "<center>Connection Failed</h1></center>";
session_start();
if(isset($_POST['asubmit']))
{
	$a=$_POST['apassword'];
    $b=$_POST['aname'];
	$q="select apass from admin where a_id='$b'";
	if(mysqli_query($con,$q)){
	$row=mysqli_fetch_assoc(mysqli_query($con,$q));
	$str=$row['apass'];
	if($a==$str)
	{
		mysqli_close($con);
		$_SESSION['a_id']=$b;
		header("location: a.php");
	}
	else{
		echo '<script type="text/javascript"> alert("Invalid Admin-ID or Password") </script>';
	}
	}
	
	
}


if(isset($_POST['vsubmit']))
{
	$c=$_POST['vpassword'];
    $d=$_POST['vname'];
	$r="select vpass from viewer where v_id='$d'";
	if(mysqli_query($con,$r)){
	$row=mysqli_fetch_assoc(mysqli_query($con,$r));
	$stri=$row['vpass'];
	
	if($c==$stri)
	{   $_SESSION['v_id']=$d;
        mysqli_close($con);
        
		header("location: ticket.php");
	}
	else{
		echo '<script type="text/javascript"> alert("Invalid User-ID or Password") </script>';
	}
	}
	

}	
?>  