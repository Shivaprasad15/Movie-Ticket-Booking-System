<?php
   $con=mysqli_connect("localhost","root","","movie");
if(!$con)
echo "<center>Connection Failed</h1></center>";
session_start();


?>




<html>
    <head>
	   <title>Booking</title>
	   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <style>
	    #t{
			margin-bottom:20px;
			
		}
		.navi{
			width:42%;
			background:#142b47;
			overflow:auto;
			margin-bottom:20px;
			border-radius:60px;
		}
	    .navi ul{
			margin:0;
			padding:10px;
			list-style:none;
			line-height:60px;
			
		}
		.navi li{
			float:left;
			
		}
		.navi ul li a{
			background:#142b47;
			text-decoration:none;
			width:130px;
			display:block;
			text-align:center;
			color:#14dd0d;
			font-size:22px;
			font-family:terror pro;
			letter-spacing:0.5px;
			
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
  .binp{
	  padding:5px;
	border-radius:5px;
	width:170px;
  }
   #cc{
    margin-top:50px;  
	width:470px;
    background: rgba(0,0,0,0.75);
    padding: 10px;
	border-radius:20px ;
	border : 3px solid red;
	
	
}
.kpl{
	padding:20px;
	color:#42bff4;
	font-size:20px;
	font-family:Digital dream fat;
}
.kpr{
	
	padding:20px;
	padding-left:60px;
	color:#42bff4;
	font-size:20px;
	font-family:Digital dream fat;
}
#psa{
	
	margin-top:10px;  
	width:840px;
    background: rgba(0,0,0,0.75);
    padding: 10px;
	border-radius:20px ;
	border : 5px solid #ffc300;
	padding-bottom:30px;
	
}
.fff{
	margin-top:120px;
	color:#f4d641;
}

.th4{
	font-size:56px;
	font-family:inhuman bb;
	color:#142b47;
	font-weight:bold;
	
}
.th5{
	font-size:42px;
	font-family:inhuman bb;
	font-weight:bold;
	
	
}
	   
	   
	   </style>
	</head>
	<body>
	<?php
	      $v_id=$_SESSION['v_id'];
		  $vinfo="select * from viewer where v_id='$v_id'";
		  $info=mysqli_query($con,$vinfo);
		  $row=mysqli_fetch_assoc($info);
		  $name=$row['vname'];
		  echo  "<center><h1>...Welcome $name...</h1></center>";
		  
		  $sql="call proc";
		  $m=mysqli_query($con,$sql);
	?>
	<center><nav class="navi">
	   <ul>
	       <li><a href="#mm">MOVIES</a></li>
		    <li><a href="#th1">TIMING</a></li>
			<li><a href="#th3">SEATING</a></li>
			 <li><a href="#bb">BOOKING</a></li>
			  
	   
	   
	   
	   </ul>
	
	</nav></center>
	<center><table id="t" width="750" border="1" cellpadding="10" cellspacing="2" >
	      <tr>
		    <img src="ass.jpg" style=" width:125px; height:180px;">
			<img src="g.jpg" style=" width:125px; height:180px;">
			<img src="race.jpg" style=" width:125px; height:180px;">
			<img src="ff6.jpg" style=" width:280px; height:180px;">
			<img src="ra.jpg" style=" width:125px; height:180px;">
			<img src="mr.jpg" style=" width:125px; height:180px;">
			<img src="lucy.jpg" style=" width:125px; height:180px;">
			<img src="kp.jpg" style=" width:125px; height:180px;">
			<img src="dhoom.jpg" style=" width:125px; height:180px;">
		 </tr>
	     <center><marquee  hspace="10" width="50%" behavior="alternate"><h2 class="th4" id="mm">...Movie Details...</h2></marquee></center>
		
	     <tr id="th" style="background:gray; color:yellow; font-size:20px;">
 		    <th>Title</th> 
			<th>Language</th> 
			<th>Category</th> 
			<th>Duration</th> 
			<th>Rating</th>
            <th>Price</th> 			
		 </tr>
		 <div>
		 <?php
	        while($num=mysqli_fetch_assoc($m)){
				
				echo "<tr>";
				     echo "<td>".$num['title']."</td>";
					 echo "<td>".$num['lang']."</td>";
					 echo "<td>".$num['cat']."</td>";
					 echo "<td>".$num['duration']."</td>";
					 echo "<td>".$num['rating']."</td>";
					 echo "<td>".$num['price']."</td>";
				
				echo "</tr>";
			}	
			
		 ?>
		  </div>
		  
	    
	</table>
	<table style="margin-top:30px;">
	      <tr >
		    <img src="lo.jpg" style=" width:125px; height:180px;">
			<img src="pk.jpg" style=" width:125px; height:180px;">
			<img src="poc.jpg" style=" width:125px; height:180px;">
			<img src="jw.jpg" style=" width:125px; height:180px;">
			<img src="i.jpg" style=" width:125px; height:180px;">
			<img src="ff8.jpg" style=" width:280px; height:180px;">
			<img src="s.jpg" style=" width:125px; height:180px;">
			<img src="m.jpg" style=" width:125px; height:180px;">
			<img src="ccc.jpg" style=" width:125px; height:180px;">
		 </tr>
	</table>
	</center>
	<center><table id="t" width="100" border="1" cellpadding="10" cellspacing="2" >
	     <center><marquee  hspace="10" width="50%" behavior="alternate"><h2 class="th4" id="th1">...Timing...</h2></marquee></center>
	      <tr id="th2" style="background:gray; color:yellow; font-size:20px;">
	         <th>Time</th> 
		  </tr> 
		  <?php
		    $conn=mysqli_connect("localhost","root","","movie");
if(!$conn)
echo "<center>Connection Failed</h1></center>";

		    $time="select distinct stime from timing order by stime";
			$res=mysqli_query($conn,$time);
			while($n=mysqli_fetch_assoc($res)){
				echo "<tr>";
				     echo "<td>".$n['stime']."</td>";
					
				
				echo "</tr>";
			}
		  
		  ?>
	</table></center>
	
	
	 <center><marquee  hspace="10" width="50%" behavior="alternate"><h2  class="th4" id="th3">...Seating...</h2></marquee>
	 <div id="psa">
	    <table>
        <tr class="k"><td class="kpl">01  </td><td class="kpl">02  </td><td class="kpl">03 </td><td class="kpl"> 04 </td><td class="kpl">05  </td><td class="kpr">06  </td><td class="kpl">07  </td><td class="kpl">08  </td><td class="kpl">09  </td><td class="kpl">10  </td></tr>
		<tr class="k"><td class="kpl">20  </td><td class="kpl">19  </td><td class="kpl">18 </td><td class="kpl"> 17 </td><td class="kpl">16  </td><td class="kpr">15  </td><td class="kpl">14  </td><td class="kpl">13  </td><td class="kpl">12  </td><td class="kpl">11  </td></tr>
        <tr class="k"><td class="kpl">21  </td><td class="kpl">22  </td><td class="kpl">23 </td><td class="kpl"> 24 </td><td class="kpl">25  </td><td class="kpr">26  </td><td class="kpl">27  </td><td class="kpl">28  </td><td class="kpl">29  </td><td class="kpl">30  </td></tr>
        <tr class="k"><td class="kpl">40  </td><td class="kpl">39  </td><td class="kpl">38 </td><td class="kpl"> 37 </td><td class="kpl">36  </td><td class="kpr">35  </td><td class="kpl">34  </td><td class="kpl">33  </td><td class="kpl">32  </td><td class="kpl">31  </td></tr>
		<tr class="k"><td class="kpl">41  </td><td class="kpl">42  </td><td class="kpl">43 </td><td class="kpl"> 44 </td><td class="kpl">45  </td><td class="kpr">46  </td><td class="kpl">47  </td><td class="kpl">48  </td><td class="kpl">49  </td><td class="kpl">50  </td></tr>
		<tr class="k"><td class="kpl">60  </td><td class="kpl">59  </td><td class="kpl">58 </td><td class="kpl"> 57 </td><td class="kpl">56  </td><td class="kpr">55  </td><td class="kpl">54  </td><td class="kpl">53  </td><td class="kpl">52  </td><td class="kpl">51  </td></tr>
		
	    </table><hr class="fff"><hr style="color:#f4d641;">
	 </div></center>

	
	
	
	
	
	
	
	<div id="book">
<form action="#bb" method="post"><center><div id="cc">
<table><tr>	     <center><h2 class="th5" id="bb" style="color:#e53d3d;">...Booking...</h2></center>
</tr>
<tr> <td><h2 style="color:#14dd0d;">Movie </h2></td>
<td><h2><select name="title" class="binp"  onChange="getSeater(this.value);" placeholder="Select Movie" onBlur="checkAvailability()" required> 
<option value="">Select Movie</option>
<?php 

$query ="SELECT title FROM movies order by title";
$stmt2= mysqli_query($conn,$query);


while($row=mysqli_fetch_assoc($stmt2))
{
?>
<option value="<?php echo $row['title'];?>"> <?php echo $row['title'];?></option>
<?php } ?>
</select></h2></td></tr>
<tr>
   <td> <h2 style="color:#14dd0d;">Date </h2></td>
   <td> <h2><select name="date" class="binp"  onChange="getSeater(this.value);" placeholder="Select Time" onBlur="checkAvailability()" required> 
<option value="">Select Date</option>
<option value="2017-12-06">06-12-2017</option>
<option value="2017-12-07">07-12-2017</option>
<option value="2017-12-08">08-12-2017</option>
<option value="2017-12-09">09-12-2017</option>
<option value="2017-12-10">10-12-2017</option>

</select></h2></td>



</tr>
<tr>
   <td> <h2 style="color:#14dd0d;">Time </h2></td>
   
   
   <td><h2><select name="time" class="binp"  onChange="getSeater(this.value);" placeholder="Select time" onBlur="checkAvailability()" required> 
<option value="">Select Time</option>
<?php 

$query9 ="SELECT stime FROM timing";
$stmt9= mysqli_query($conn,$query9);


while($row9=mysqli_fetch_assoc($stmt9))
{
?>
<option value="<?php echo $row9['stime'];?>"> <?php echo $row9['stime'];?></option>
<?php } ?>
</select></h2></td>



</tr>
<tr>
   <td> <h2 style="color:#14dd0d;">No of Seats </h2></td>
   <td> <h2><select name="num" class="binp"  onChange="getSeater(this.value);" placeholder="Select Time" onBlur="checkAvailability()" required> 
<option value="">No of Seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>


</select></h2></td>



</tr>
<tr>
   
   <td> <h2><input type="submit" class="bt" value="Book Now" name="submit" required></h2></td>
    <td>
                       <center> <a href="login.php"><h2><b><input type="button" class="bt" value="  Log Out  "  class="login" ><b/></h2></a></center>
                    </td>


</tr>





</table></div></center></form></div>
	</body>
	
</html>
<?php
$con=mysqli_connect("localhost","root","","movie");
if(!$con)
echo "<center>Connection Failed</h1></center>";
if(isset($_POST['submit']))
{
	$a=$_POST['title'];
    $b=$_POST['date'];
    $c=$_POST['time'];
	$d=$_POST['num'];
	$xyz="select s_id from screen where movie='$a'";
	$pop="select price from movies where title='$a'";
	
	$gg=mysqli_query($con,$pop);
	$axn=mysqli_fetch_assoc($gg);
	
	
	$xxx=mysqli_query($con,$xyz);
	$axx=mysqli_fetch_assoc($xxx);
	
	
	$money=$axn['price'];
	$sid=$axx['s_id'];
	$total=$money*$d;
	$j="select num from seatno where s_id='$sid' and date='$b' and stime='$c'";
	$j1=mysqli_query($con,$j);
	if(mysqli_num_rows($j1)==1){
	       $j2=mysqli_fetch_assoc($j1);
		   $j3=$j2['num'];
		   $j4=$j3+$d;
		   
		   if(($j4)<61){
			   echo "<center><h1>...Your ticket has been Booked...</h1></center>";
			   echo "<center><h3>";
			   echo "Seat num are :";
			   
			   for ($x = 1; $x <=$d; $x++) {
				   $j5=$j3+$x;
                        echo  " $j5 , " ;
		   }
		   echo "</h3></center>";
		   $k="update seatno set num='$j4' where s_id='$sid' and date='$b' and stime='$c' ";
		   mysqli_query($con,$k);
		   echo "<center><h3>Total  price is = ₹ $total /-</h3></center>";
	echo "<center><h3> Screen ID is = $sid</h3></center>";
	echo"<center><h3> On the Date: $b </h3></center>";
	
	
	$ins="insert into booking (v_id,vname,movie,seats,total,time,s_id,date) values ('$v_id','$name','$a','$d','$total','$c','$sid','$b')";
	$vvv="select max(t_id) as tid from booking where v_id='$v_id'and vname='$name' and movie='$a' and seats='$d' and total='$total' and time='$c' and s_id='$sid' and date='$b'";
	$vvvv=mysqli_query($con,$ins);
	$abc=mysqli_query($con,$vvv);
	$aaaa=mysqli_fetch_assoc($abc);
	$t_id=$aaaa['tid'];
	echo "<center><h3> Your ticket ID  is = $t_id </h3></center>";
		   }	   
	
	else{
		 echo '<script type="text/javascript"> alert("!! These number of seats are not Available...") </script>';
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}	
else{
	
	$p="insert into seatno (s_id,date,stime,num) values ('$sid','$b','$c','$d')";
mysqli_query($con,$p);
echo "<center><h1>...Your ticket has been Booked...</h1></center>";
echo "<center><h3>Seat nums are : ";
			   for ($x = 1; $x <=$d; $x++) {
				   $j5=$x;
                        echo  " $j5, " ;
		   }
		   echo"</h3></center>";
		   echo "<center><h3>Total  price is = ₹ $total /-</h3></center>";
	echo "<center><h3>Screen ID is = $sid </h3></center>";
	echo "<center><h3> On Date:  $b </h3><center>";
	
	$ins="insert into booking (v_id,vname,movie,seats,total,time,s_id,date) values ('$v_id','$name','$a','$d','$total','$c','$sid','$b')";
	$vvv="select max(t_id) as tid from booking where v_id='$v_id'and vname='$name' and movie='$a' and seats='$d' and total='$total' and time='$c' and s_id='$sid' and date='$b'";
	$vvvv=mysqli_query($con,$ins);
	$abc=mysqli_query($con,$vvv);
	$aaaa=mysqli_fetch_assoc($abc);
	$t_id=$aaaa['tid'];
	echo "<center><h3>Your ticket ID  is = $t_id</h3></center>";
}
	
}
	
?>	
	