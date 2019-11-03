<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php' ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php 
      $esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
      $ema = mysqli_query($esteka ,"SELECT * FROM Questions ");
      echo "<table>";

       echo '<tr><th> Galderaren Testua </th> <th> Erantzun zuzena 
       </th> <th> Erantzun okerra 1 </th>  <th> Erantzun okerra 2 </th>     
       <th> Erantzun okerra 3 </th><th> Zailtasuna </th><th> Gaia </th> <th> eposta </th> </tr>';


      while ( $row= mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
      // datuak tratatu, taula bateko lerroak eraikitzeko, adibidez
      echo '<tr><td>'.$row['galderarenTestua'].'</td> <td>'.$row['eZuzena'].
      '</td> <td>'. $row['eOkerra1'] .'</td>  <td>'. $row['eOkerra2'] .'</td>     
      <td>'. $row['eOkerra3'] .'</td><td>'. $row['zailtasuna'] .'</td><td>'.
       $row['gGaia'] .'</td> <td>'. $row['eposta'] .'</td> </tr>';
       }

      echo "</table>";
      mysqli_free_result($ema);
      mysqli_close($esteka);
       ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>