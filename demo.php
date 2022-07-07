<?php
require_once('authenticate.php');
?>


<!DOCTYPE html>
<html>
<head><title>Website</title>
<script type="text/javascript">init_reload();function init_reload(){setInterval( function() {window.location.reload();},10000);}</script></head>
<center>
<img src="http://i.imgur.com/S8prDtg.jpg" alt="7.png" border="0" />
</center>
<body>

<center><h1> ------ SMART CONTROLLER -------  </h1></center>
<hr>
<center>
<table   style="color:blue;font-size:20px;width:70%">
		
	<tr><td width="20%">Temperature:</td>
            <td width="15%"> 
		<?php
		$fp = @fopen('myFile.txt', "r");
		$data = fread($fp, filesize('myFile.txt'));
		echo $data."<br>";
		?>	        
            </td>
            <td colspan=2></td></tr>	
	 
	<tr><td width="20%"><form name="temper" method="get" action="demo.php" >Set temperature:</th> <td width="15%" ><input type='text' name='msg0' size=3 autofocus></th> <td width="15%" ><input type='submit' value='Sent'></th></form><td></th>	
	</tr>	
		<?php
		$temp = $_GET['msg0'];
		$fileContent1 = "temperature: " .$temp. " \n";
		if($temp !=0)
		{
			file_put_contents('File.txt',$fileContent1);
		}
		?>
	
    <tr><td width="20%"><form name="feed" method="get" action="demo.php" > Set to feed: </th><td width="15%"><input type='text' name='msg1' size=3 autofocus>h </th><td width="15%"><input type='text' name='msg2' size=3 autofocus>m</th><td> <input type='submit' value='Sent'></th></form>
	</tr>	
		<?php
		$feederh = $_GET['msg1'];
		$feederm = $_GET['msg2'];
		$fileContent1 = "feeding: " .$feederh."h".$feederm." \n";
		if(($feederh !=0) || ($feederm !=0))
		{
			file_put_contents('File.txt',$fileContent1);
		}
		?>
	<tr>
		<td width="20%"><form name="exwarter" method="get" action="demo.php" > Exchange to water:</td>
        <td colspan=2  width="15%">Day<input type='text' name='msg3' size=3 autofocus>Time<input type='text' name='msg4' size=3 autofocus>h <input type='text' name='msg5' size=3 autofocus>m
	    </td>
		<td><input type='submit' value='Sent'></form></td>
	</tr>	
	<?php
		$exday = $_GET['msg3'];
		$extih = $_GET['msg4'];
                $extim = $_GET['msg5'];
		$fileContent1 = "ex-water: " .$exday."-".$extih."h".$extim."m\n";
		if(($exday !=0) || ($extih !=0) || ($extim !=0))
		{
			file_put_contents('File.txt',$fileContent1);
		}
	?>	
			
    
	<tr>
		<td width="20%">Feed</th><td width="15%" > <a href="?pin=ON1"><button>ON</button></a></th><td width="15%"> <a href="?pin=OFF1"><button>OFF</button></a></td><td></th>
	</tr>
	
	<tr>
		<td width="20%">Aeration </th><td width="15%" > <a href="?pin=ON2"><button>ON</button></a></th><td width="15%" > <a href="?pin=OFF2"><button>OFF</button></a><td></th>
	</tr>
	
	<tr><td width="20%">Set time </th><td width="15%" > <a href="?pin=setime"><button>SUBMIT</button></a></th><td width="15%"></th><td></th></tr>
	
	<tr><td width="20%">Reset </th><td width="15%" > <a href="?pin=reset"><button>RESET</button></a></th><td width="15%" ></th><td></th></tr>
        </table>
</center>
	<?php
	$button = $_GET['pin'];
	$fileContent1 = "status: " .$button. " \n";
	if(!empty($button))
	{
		file_put_contents('File.txt',$fileContent1);
	}
//        echo $button;
	?>
   
</table>   

</body>
</html>
				