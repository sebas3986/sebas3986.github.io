<?php
include("../Datos/clsDatos.php");

class clsUsuario
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

public function mtdLogin($IdUsuario)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "insert into login ";
		$strQuery= $strQuery . " values (null," . $IdUsuario . ",now())";
		echo $strQuery;
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}


public function mtdRegisterUser($strName,$intTipoUsuario,$strLogin,$strPassword)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "insert into usuario ";
		$strQuery= $strQuery . " values (null,'" . $strName . "'," . $intTipoUsuario . ",'" . $strLogin . "','" . $strPassword . "',now())";
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdUpdateUser($strName,$intTipoUsuario,$strLogin,$strPassword,$intUsuario)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "Update usuario set cnombre='" . $strName . "',idtipo_usuario_sistema=" . $intTipoUsuario;
		$strQuery=$strQuery . ",clogin='" . $strLogin . "',cpasspord='" . $strPassword . "',dfecha=now()";
		$strQuery=$strQuery . " where idusuario=" . $intUsuario;
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdDeleteUser($intUsuario)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "delete from  usuario";
		$strQuery=$strQuery . " where idusuario=" . $intUsuario;
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdValidaUser($strNameUser,$strPassword)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select idusuario,cnombre,idtipo_usuario_sistema from usuario";
		$strQuery= $strQuery . " where clogin='" . $strNameUser . "' and cpasspord='" . $strPassword . "'";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$numero = 0;
		
		while ($row = mysql_fetch_row($result)){ 
			$IdUsuario=$row[0];
			$CName = $row[1];
			$nPerfil = $row[2];
		$numero ++;
		}
		if ($numero==0 )
		{
			return "Usuario o contrasena Incorrectas";
		}
		else
		{
			
			return "OK";
		}
	}	
	catch (Exception $e) 
	{
		return "Ocurrio un Error al tratar de consultar el Usuario";
    }	
}

public function fConsultaUsuario()
{
		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select u.idusuario,u.cnombre,t.cnombre,u.clogin,u.cpasspord,u.dfecha from usuario u inner join ";
		$strQuery= $strQuery . " tipo_usuario_sistema t on t.idtipo_usuario_sistema=u.idtipo_usuario_sistema";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$numero = 0;
		echo "<table id=\"tblUser\" class=\"tableResult\" border=\"1\" cellspacing=1 cellpadding=2>
			<tr>
			<td><font face=\"verdana\"><b>Actualiza</b></font></td>
			<td><font face=\"verdana\"><b>Elimina</b></font></td>
			<td><font face=\"verdana\"><b>Código</b></font></td>
			<td><font face=\"verdana\"><b>Nombre</b></font></td>
			<td><font face=\"verdana\"><b>Tipo Usuario</b></font></td>
			<td><font face=\"verdana\"><b>Nombre Usuario</b></font></td>
			<td><font face=\"verdana\"><b>Password</b></font></td>
			<td><font face=\"verdana\"><b>Fecha Modificación</b></font></td>
			</tr>";
		while ($row = mysql_fetch_row($result)){ 
				echo "<tr><td width=\"5%\"><font face=\"verdana\"> 
				     <input class=\"Boton\" type=\"button\" name=\"btn" . $numero . "\" onclick=\"fEditElimina(1," . $row[0] 
				     	. ",'" . $row[1]  . "','" . $row[2] . "','" . $row[3] . "','" . $row[4] . "')\" value=\"Editar\"></font></td>";
				echo "<td width=\"5%\"><font face=\"verdana\"> 
				     <input class=\"Boton\" type=\"button\" name=\"btnE" . $numero . "\" onclick=\"fEditElimina(2," . $row[0] 
				     	. ",'" . $row[1]  . "','" . $row[2] . "','" . $row[3] . "','" . $row[4] . "')\" value=\"Eliminar\"></font></td>";
				echo "<td width=\"5%\"><font face=\"verdana\">" . 
				    $row[0] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[1] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[2] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[3]. "</font></td>"; 
				echo "<td width=\"15%\"><font face=\"verdana\">" . 
				    $row[4]. "</font></td>"; 
				echo "<td width=\"10%\"><font face=\"verdana\">" . 
				    $row[5]. "</font></td> 
					</tr>";  
		$numero ++;
		}
		echo "</table>";
		
		
}


public function fConsultaUsuariosEnSalas()
{
		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select u.idusuario_sala, u.cidentificacion,u.cnombre";
		$strQuery= $strQuery . ",u.capellido,t.cnombre,l.dfecha_entrada,sa.cnombre from usuario_sala u inner join ciudad c on c.idciudad=u.idciudad";
		$strQuery= $strQuery . " inner join sexo s on s.idsexo=u.idsexo inner join tipo_usuario t on";
		$strQuery= $strQuery . " t.idtipo_usuario=u.idtipo_usuario inner join login_sala l on l.idusuario_sala=u.idusuario_sala";
		$strQuery= $strQuery . " inner join sala sa on sa.idsala=l.idsala ";
		$strQuery= $strQuery . " where l.dfecha_salida is null";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$numero = 0;
		echo "<table id=\"tblUser\" class=\"tableResult\" border=\"1\" cellspacing=1 cellpadding=2>
			<tr>
			<td><font face=\"verdana\"><b>Sacar Usuario</b></font></td>
			<td><font face=\"verdana\"><b>Código</b></font></td>
			<td><font face=\"verdana\"><b>Identificación</b></font></td>
			<td><font face=\"verdana\"><b>Nombre</b></font></td>
			<td><font face=\"verdana\"><b>Apellido</b></font></td>
			<td><font face=\"verdana\"><b>Tipo Usuario</b></font></td>
			<td><font face=\"verdana\"><b>Fecha Ingreso</b></font></td>
			<td><font face=\"verdana\"><b>Sala de Ingreso</b></font></td>
			</tr>";
		while ($row = mysql_fetch_row($result)){ 
				echo "<tr><td width=\"5%\"><font face=\"verdana\"> 
				     <input class=\"Boton\" type=\"button\" name=\"btn" . $numero . "\" onclick=\"fExitUser(" . $row[0] 
				     . ")\" value=\"Exit\"></font></td>";
				echo "<td width=\"5%\"><font face=\"verdana\">" . 
				    $row[0] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[1] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[2] . "</font></td>";
			    echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[3]. "</font></td>"; 
				echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[4]. "</font></td>"; 
				echo "<td width=\"20%\"><font face=\"verdana\">" . 
				    $row[5]. "</font></td>";
				echo "<td width=\"10%\"><font face=\"verdana\">" . 
				    $row[6]. "</font></td> 
					</tr>";  
		$numero ++;
		}
		echo "</table>";
		
		
}

public function mtdRegisterUserSala($strName,$intTipoUsuario,$intCiudad,$intSexo,$strIdentificacion,$strLast)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "insert into usuario_sala ";
		$strQuery= $strQuery . " values (null,'" . $strIdentificacion . "','" . $strName . "','" . $strLast . "'," . $intSexo . "," . $intCiudad . "," . $intTipoUsuario . ",now())";
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdUpdateLoginSala($intUsuario)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "update login_sala l inner join (select max(idlogin) idlogin"; 
		$strQuery= $strQuery . " from login_sala where idusuario_sala=" . $intUsuario . ")";
		$strQuery= $strQuery . " c1 on c1.idlogin=l.idlogin ";
		$strQuery= $strQuery . " set l.dfecha_salida=now()";
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdLoginSala($intIdentificacion,$intUsuarioSala,$intSala)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select idusuario_sala from usuario_sala where cidentificacion='" . $intIdentificacion . "'";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$intUsuario = 0;
		while ($row = mysql_fetch_row($result)){ 
			$intUsuario=$row[0];
		$numero ++;
		}
		$strQuery= "insert into login_sala ";
		$strQuery= $strQuery . " values (null," . $intUsuario . "," . $intUsuarioSala . ",now(),null," . $intSala . ")";
		$objData->fExecuteQuery($strCadena,$strQuery); 
		return true;
	}	
	catch (Exception $e) 
	{
		return false;
    	echo "Ocurrio un Error al tratar de Crear el Usuario";
    }	
}

public function mtdValidaUserSinLogin($intIdentificacion)
{
	try 
	{

		$objData = new clsDatos();
		$strCadena= $this->mtdLeeCadena();
		$strQuery= "select idusuario_sala from usuario_sala where cidentificacion='" . $intIdentificacion . "'";
		$result = $objData->fExecuteQuery($strCadena,$strQuery); 
		$intUsuario = 0;
		while ($row = mysql_fetch_row($result)){ 
			$intUsuario=$row[0];
		$numero ++;
		}
		if ($intUsuario==0)
		{
			return "EL usuario no existe!";
		}
		else
		{
			$strQuery= "select count(idusuario_sala) from login_sala where dfecha_salida is null and idusuario_sala=" . $intUsuario;
			$result = $objData->fExecuteQuery($strCadena,$strQuery); 
			$numero = 0;
			$nResultado = 0;
			while ($row = mysql_fetch_row($result)){ 
				$nResultado = $row[0];
			$numero ++;
			}
			if ($nResultado==0 )
			{
				return "";
			}
			else
			{
				return "El Usuario ya tiene una session abierta!";
			}
		}
		
	}	
	catch (Exception $e) 
	{
		return "Ocurrio un Error al tratar de consultar el Usuario";
    }	
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