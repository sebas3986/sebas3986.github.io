<?php
include("../Datos/clsDatos.php");

class clsSala
{

private function mtdLeeCadena()
{

	$file = fopen("C:\AppServ\www\UNAD_SALAS\Datos\@d3n4_DB.db", "r") or exit("Unable to open file!");
	$strCadena = "";
	while(!feof($file))
	{
		$strCadena = fgets($file);
	}
	fclose($file);
	return $strCadena;
}
public function mtdRegisterSala($strName)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "insert into sala ";
		$strQuery= $strQuery . " values (null,'" . $strName . "',now())";
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear la Sala";
    }	
}

public function mtdUpdateSala($strName,$intSala)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "Update sala set cnombre='" . $strName . "'";
		$strQuery=$strQuery . " where idSala=" . $intSala;
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear la Sala";
    }	
}

public function mtdDeleteSala($intSala)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "delete from  sala";
		$strQuery=$strQuery . " where idsala=" . $intSala;
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear la Sala";
    }	
}

public function fConsultaSala()
{
		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select idsala,cnombre,dfecha from sala ";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$numero = 0;
		echo "<table id=\"tblUser\" class=\"tableResult\" border=\"1\" cellspacing=1 cellpadding=2>
			<tr>
			<td><font face=\"verdana\"><b>Actualiza</b></font></td>
			<td><font face=\"verdana\"><b>Elimina</b></font></td>
			<td><font face=\"verdana\"><b>Código</b></font></td>
			<td><font face=\"verdana\"><b>Nombre</b></font></td>
			<td><font face=\"verdana\"><b>Fecha Modificación</b></font></td>
			</tr>";
		while ($row = mysql_fetch_row($result)){ 
				echo "<tr><td width=\"10%\"><font face=\"verdana\"> 
				     <input class=\"Boton\" type=\"button\" name=\"btn" . $numero . "\" onclick=\"fEditElimina(1," . $row[0] 
				     	. ",'" . $row[1]  . "')\" value=\"Editar\"></font></td>";
				echo "<td width=\"10%\"><font face=\"verdana\"> 
				     <input class=\"Boton\" type=\"button\" name=\"btnE" . $numero . "\" onclick=\"fEditElimina(2," . $row[0] 
				     	. ",'" . $row[1]  . "')\" value=\"Eliminar\"></font></td>";
				echo "<td width=\"10%\"><font face=\"verdana\">" . 
				    $row[0] . "</font></td>";
			    echo "<td width=\"50%\"><font face=\"verdana\">" . 
				    $row[1] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[2] . "</font></td>
					</tr>";  
		$numero ++;
		}
		echo "</table>";
		
		
}


}

?>