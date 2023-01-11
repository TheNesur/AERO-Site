
<?php
  $servername = "sql7.freesqldatabase.com";
  $username = "sql7588645";
  $password = "YrMStLCW7p";
  $dbname = "sql7588645";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT idMesure,NomMesure FROM Mesure";
  $result = $conn->query($sql);
  echo '<form action="VoirMesure.php" method="get">';
  echo "<select name='selecmesure'>";
  while($row = $result->fetch_assoc()) {
    echo '<option value="' . $row["idMesure"] . '">' . $row["NomMesure"] . '</option>';

  }
  echo "</select>";
  echo "<input type='submit' value='Visualiser mesure'></br>";
  
   if (isset($_GET['selecmesure'])) {
	 
		$mesureavoir = $_GET['selecmesure'];
		$sql = "SELECT NomMesure,MesureTrainee,MesurePortance,RepertoirePhoto FROM Mesure WHERE idMesure = '$mesureavoir'";
		$result = $conn->query($sql);
		  if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "Valeur de portance: " . $row['MesurePortance'] . "<br>";
				echo "Valeur de trainée: " . $row['MesureTrainee'] . "<br>";
				
				if(is_null($row['RepertoirePhoto'])){
					echo "Pas de photo en lien avec cette session de mesure <br>";
				}else{
					echo "Repertoire de photo: " . $row['RepertoirePhoto'] . "<br>";
					$imgDir = scandir("./img/" . $row['RepertoirePhoto']);
					foreach($imgDir as $fichier){
						if($fichier != "." && $fichier != "..")
						echo "<img width='200' height='200'  src='./img/" . $row['RepertoirePhoto'] . "/" . $fichier . "'></br>";
					}
				}
			}
		} 
	}


  $conn->close();
?>
