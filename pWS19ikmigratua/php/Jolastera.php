<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php' ?>
	<style>
		table{
			border-collapse: collapse;
		}
	</style>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/JolastuFunctions.js"></script>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_SESSION["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}else{
			$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
			echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			exit();
		}
	?>
	<section class="main" id="s1">
		<div>
		<?php
			if(!isset($_SESSION['galderak'])){
	        	$_SESSION['galderak'] =0;
	    	    $_SESSION['asmatuak'] = 0;
	        }
			
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				exit();
			}
			$result = mysqli_query($konexioa, "SELECT MAX(Indizea) FROM questions");
			$balioa = mysqli_fetch_row($result);
			$Max = $balioa[0];
			mysqli_free_result($result);
			$result2 = mysqli_query($konexioa, "SELECT MIN(Indizea) FROM questions");
			$balioa2 = mysqli_fetch_row($result2);
			$Min = $balioa2[0];
			if(!isset($_SESSION['indizea'])){
				$indizea = rand($Min, $Max);
				$_SESSION['indizea'] = $indizea;
			}else{
				if($_SESSION['indizea'] != $Max){
			        $_SESSION['indizea'] = $_SESSION['indizea'] +1;
			    }else{
			        $_SESSION['indizea'] = $Min;
			    }
				$indizea = $_SESSION['indizea'];
			}
			
			$result3 = mysqli_query($konexioa, "SELECT * FROM questions WHERE Indizea= $indizea ");
			$balioa3 = mysqli_fetch_row($result3);
			
			$erantzunak = array($balioa3[1], $balioa3[2], $balioa3[3], $balioa3[4]);
			

			shuffle($erantzunak);
			
			echo $_SESSION['indizea'];
			
			echo '<table border="1" style="width:100%;" id="jokoatable">';
			echo '<tr>';
				echo '<th style= "border: 1px;">';
				echo "<br>";
					echo "<h3>Galdera: ".$balioa3[0];
					echo "</h3>";
					echo "<br>";
					echo '<img src="'.$balioa[8].'" alt="Galderaren Argazkia">';
				echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
				echo "<br>";
				echo '<input type="radio" id="erantzuna" name="erantzuna" onclick="aldatu();" value="'.$erantzunak[0].'">'.$erantzunak[0].' <br>';
				echo "<br>";
				echo '<input type="radio" id="erantzuna" name="erantzuna" onclick="aldatu();" value="'.$erantzunak[1].'">'.$erantzunak[1].'<br>';
				echo "<br>";
				echo '<input type="radio" id="erantzuna" name="erantzuna" onclick="aldatu();" value="'.$erantzunak[2].'">'.$erantzunak[2].'<br> ';
				echo "<br>";
				echo '<input type="radio" id="erantzuna" name="erantzuna" onclick="aldatu();" value="'.$erantzunak[3].'">'.$erantzunak[3].'<br> ';
				echo "<br>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
				echo "<br>";
				echo '<input type="button" id="like" name="like" onclick="like();" value="   Gustuko dut   ">';
				echo '<input type="button" id="dislike" name="dislike" onclick="dislike();" value=" Ez dut gustuko"><br> ';
				echo "<br>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>";
				echo "<br>";
				echo '<input type="button" value=" Erantzun " id="erantzunAjax" disabled onclick="zuzenduEtaAurrera('.$indizea.','.($Max-$Min).','.$_SESSION["galderak"].')"/>';
				echo "<br>";
				echo '<input type="button" value=" Hurrengoa " id="hurrengoa" style="visibility:hidden;"/>';
				echo "<br>";
				echo "<br>";
				echo "</td>";
			echo "</tr>";
			echo "</table>";
			
			?>
			<br>
			<h3 id ="emaitza" ></h3>
		</div>
		<div id="prediv">
		
		</div>
		<div id="azkendiv">
		</div>
		
	</section>
	<script>
    var btn = document.getElementById('hurrengoa');
    btn.addEventListener('click', function() {
      document.location.href = '<?php echo "Jolastera.php" ?>';
    });
	
	function aldatu(){
		
		$("#erantzunAjax").prop("disabled",false);
	}
	
	function like(){
		$("#like").css('color','green');
		$("#dislike").removeAttr("style"); 
	}
	function dislike(){
		$("#dislike").css('color','red');
		$("#like").removeAttr("style"); 
	}
	
  </script>
	<?php include '../html/Footer.html' ?>
</body>
</html>
