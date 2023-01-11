<?php

$LogsDir = scandir("./logs");
echo '<form action="VoirLogs.php" method="get">';
echo "<select name='logs'>";
foreach($LogsDir as $fichier){
	if($fichier != "." && $fichier != "..")
	echo "<option value='" . $fichier . "'>" . $fichier . "</option>";
}
echo "<input type='submit' value='Visualiser logs'>";



 if (isset($_GET['logs'])) {
	 
	$fichierdeLogs = "logs/". $_GET['logs'];
    if(file_exists($fichierdeLogs)){
		$content = file_get_contents($fichierdeLogs);
		echo "<textarea>$content</textarea>";
	}
}else{
	echo "<textarea>Selectionner un fichier a visualiser</textarea>";
}



?>