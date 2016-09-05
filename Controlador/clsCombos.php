<?php
include("../Datos/clsDatos.php");

class clsCombo
{
private function mtdLeeCadena()
{

	$file = fopen("C:\inetpub\wwwroot\UNAD_SALAS\Datos\@d3n4_DB.db", "r") or exit("Unable to open file!");
	$strCadena = "";
	while(!feof($file))
	{
		$strCadena = fgets($file);
	}
	fclose($file);
	return $strCadena;
}
Public function mtdCargaCombo($strNameCombo,$strQuery)
{
		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$numero = 0;
		echo "<select id=\"" . $strNameCombo . "\" name=\"" . $strNameCombo ."\" required>
				<option value=\"0\">Seleccione . . .</option>";
				while ($row = mysql_fetch_row($result)){

					echo "<option value=\"" . $row[0] . "\">" . $row[1] . "</option>"; 
				$numero ++;
				}
		echo "</select>";

}

}

?>