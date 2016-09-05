<?php

Class clsDatos
{

Public function fExecuteProcedure($strCadena,$strNameProcedure,$strParameterValues,$intOpcion)
{
	try
	{
		$ArrDatosCon = explode(',', $strCadena);
		$link = mysql_connect($ArrDatosCon[0],$ArrDatosCon[1],$ArrDatosCon[2]) or die (mysql_error());
		mysql_select_db($ArrDatosCon[3], $link) or die(mysql_error());

		$ArrParameter = explode(',', $strParameterValues);
		$strValues = "";
		if($strParameterValues != "")
		{
			for ($i = 0;$i < count($ArrParameter);$i++)
			{
				if ($strValues == "")
					{
						$strValues = "'" . $ArrParameter[$i] . "'";
					}
				else
					{
						$strValues = $strValues . ",'" . $ArrParameter[$i] . "'";
					}
			}
		}
		
		$strQuery = " call " . $strNameProcedure . " (" . $strValues . ");";
		$result = mysql_query($strQuery,$link) or die(mysql_error()); 
		if($intOpcion==1)
		{
			$numero = 0;
		while ($row = mysql_fetch_row($result)){ 
		       echo "<tr><td width=\"10%\"><font face=\"verdana\">" . 
				    $row[0] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[1] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[2] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[3]. "</font></td>"; 
				echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[4]. "</font></td>"; 
				echo "<td width=\"10%\"><font face=\"verdana\"> 
				    <input class=\"Boton\" type=\"button\" name=\"btn\"" . $numero . " value=\"Editar\"></font></td></tr>";    
			    $numero++;

		} 
		echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Número de registros: " . $numero . 
      			"</b></font></td></tr>";
		}
		mysql_close($link);
		return $this->$result;
	}
	catch (Exception $e) 
	{
		echo "Error al ejecutar el Procedimiento" . $e->getMessage();
    }
}

Public function fExecuteQuery($strCadena,$strQuery)
{
	try
	{
		$ArrDatosCon = explode(',', $strCadena);
		$link = mysql_connect($ArrDatosCon[0],$ArrDatosCon[1],$ArrDatosCon[2]) or die (mysql_error());
		mysql_select_db($ArrDatosCon[3], $link) or die(mysql_error());
		$result = mysql_query($strQuery,$link) or die(mysql_error()); 
		mysql_close($link);
		return $result;
	}
	catch (Exception $e) 
	{
		echo "Error al ejecutar el Query" . $e->getMessage();
    }
}
}

?>