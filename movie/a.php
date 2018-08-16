<?php
   $con=mysqli_connect("localhost","root","","movie");
if(!$con)
echo "<center>Connection Failed</h1></center>";
session_start();


?>
<html>
    <head>
	   <title>Admin</title>
	   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <style>
	      
		  body{
			  
			  margin-top:25px;
			  
		  }
		  .login{
	background-color:#e53d3d;
	padding:3px;
	color:black;
	width:100px;
	text-align:center;
	font-size:16px; 
	font-weight:bold;  
	border-radius:4px;
}
		  
		  #cc{
    margin-top:50px;  
	width:470px;
    background: rgba(0,0,0,0.73);
    padding: 10px;
	border-radius:20px ;
	border : 3px solid red;
	
	
}
#cd{
    margin-top:50px;  
	width:470px;
    background: rgba(0,0,0,0.73);
    padding: 10px;
	border-radius:20px ;
	border : 3px solid red;
	
	
}
.ip{
	padding:6px;
	border-radius:5px;
	width:230px;
	
}

	   
	   
	   
	   
	   
	   
	   </style>
	</head>
   <body background="dec.png">
       <?php
	      $a_id=$_SESSION['a_id'];
		  $vinfo="select * from admin where a_id='$a_id'";
		  $info=mysqli_query($con,$vinfo);
		  $row=mysqli_fetch_assoc($info);
		  $name=$row['aname'];
		  echo  "<center><h1>...Welcome $name...</h1></center>";
        ?>
		<center><div class="admin">
           
        <form method="post" action="#last">
            <div id="cc"> <table>
			<tr>
			<center><h1 style="color:#e53d3d; padding-bottom:0px;"><i><b>...Add Movie...</b></i></h1></center>
			<img src="movie.png" style="width :80px; padding-bottom:25px; height :80px;">
			</tr>
                <tr>
                    <td><h2 style="color:#f2d91a;">Title :</h2></td>
                    <td>
                        <h2><input type="text" class="ip" placeholder="Enter Movie Title" name="title" required></h2>
                    </td>
                    
                </tr>
				
                 <tr>
                    <td><h2 style="color:#f2d91a;">Language :</h2></td>
                    <td>
                        <h2><input type="text" class="ip" placeholder="Enter Movie Language" name="lang" required></h2>
                    </td>
                    
                </tr>
				<tr>
                    <td><h2 style="color:#f2d91a;">Category :</h2></td>
                    <td>
                        <h2><input type="text" class="ip" placeholder="Enter Movie Category" name="cat" required></h2>
                    </td>
                    
                </tr>
				<tr>
                    <td><h2 style="color:#f2d91a;">Duration :</h2></td>
                    <td>
                        <h2><input type="number" class="ip" placeholder="Enter duration in min" name="duration" required></h2>
                    </td>
                    
                </tr>
				<tr>
                    <td><h2 style="color:#f2d91a;">Rating :</h2></td>
                    <td>
                        <h2><input type="number" step="0.1" class="ip" placeholder="Rating Stars" name="rating" required></h2>
                    </td> </tr>
					<tr>
                    <td><h2 style="color:#f2d91a;">Price :</h2></td>
                    <td>
                        <h2><input type="number" class="ip" placeholder="Enter Price" name="price" required></h2>
                    </td>
                    
                </tr>
                    
               
                <tr>
                    
                    <td>
                       <center> <h1 style="color:#d31782; float:right;"><b><input type="Submit" value="   ADD   "  class="login" name="add" ><b/></h1</center>
                    </td>
					<td>
                       <center> <a href="login.php"><h1 style="color:#d31782; float:right;"><b><input type="button" value="  Log Out  "  class="login" ><b/></h1></a></center>
                    </td>
                    
                 </tr>
                </table></div>
        </form>
        </div>
		<div>
		<form method="post" action="a.php">
            <div id="cd"> <table>
			<tr>
			<center><h1 style="color:#e53d3d; padding-bottom:0px;"><i><b>...Delete Movie...</b></i></h1></center>
			</tr>
			<tr> <td><h2 style="color:#f2d91a;"> Movie :</h2></td>
<td><h2><select name="tit" class="ip"  onChange="getSeater(this.value);" placeholder="Select Movie" onBlur="checkAvailability()" required> 
<option value="">Select Movie</option>
<?php 

$query ="SELECT title FROM movies order by title";

$stmt2= mysqli_query($con,$query);


while($row=mysqli_fetch_assoc($stmt2))
{
?>
<option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?></option>
<?php } ?>
</select></h2></td></tr>
                 <tr>
                    
                    <td>
                       <center> <h1 style="color:#d31782; float:right;"><b><input type="Submit" value="  DELETE  "  class="login" name="del" ><b/></h1</center>
                    </td>
					<td>
                       <center> <a href="login.php"><h1 style="color:#d31782; float:right;"><b><input type="button" id="last" value="  Log Out  "  class="login" ><b/></h1></a></center>
                    </td>
                    
                 </tr>
			
			
			
			
			</table></div>
		</form></div>
		</center>
		
   
   </body>	
 </html>
 <?php
    if(isset($_POST['add']))
{
	$a=$_POST['title'];
    $b=$_POST['lang'];
    $c=$_POST['cat'];
	$d=$_POST['duration'];
	$e=$_POST['rating'];
	$f=$_POST['price'];
	$t1="SELECT s_id FROM screen WHERE movie is NULL limit 1;";
	if(mysqli_query($con,$t1)){
    $row=mysqli_fetch_assoc(mysqli_query($con,$t1));
    $name=$row['s_id'];
	
	$t2="update screen set movie='$a' where s_id='$name'";
	$t3="insert into movies (title,lang,cat,duration,rating,price) values('$a','$b','$c','$d','$e','$f')";
	if(mysqli_query($con,$t3)){
		echo "<center><h1>$a movie got added to screen $name</h1></center>";
		$i=mysqli_query($con,$t2);
		echo '<script type="text/javascript"> alert("Movie Successfully Added....") </script>';
		
	}
    else{
		echo '<script type="text/javascript"> alert("!!!Error, Enter Unique Title....") </script>';
	}
}
else{
	echo '<script type="text/javascript"> alert("!!!Error, Screen not available....") </script>';
}
}

 if(isset($_POST['del'])){
	 
	 $z1=$_POST['tit'];
	 $z2="delete from movies where title='$z1'";
	 if(mysqli_query($con,$z2)){
		
		echo '<script type="text/javascript"> alert("Movie Successfully Deleted....") </script>';
		
	}
    else{
		echo '<script type="text/javascript"> alert("!!!Error, Something went wrong....") </script>';
	}
 }
 
 
 
 
 ?>
   