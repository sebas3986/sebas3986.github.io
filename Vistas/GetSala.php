<!DOCTYPE html>

 <head>

 <title> PROYECTO FINAL </title>

	 <meta charset="utf-8">
	 <style type="text/css"></style>
	 <LINK REL=StyleSheet HREF="../Styles/cssPrincipal.css" TYPE="text/css" MEDIA=screen>
	 	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://html5form.googlecode.com/svn/trunk/jquery.html5form-1.4-min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	 <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script>
	 $(function () {
		 $("#Register").dialog(
		 {
			 autoOpen: false,
			 modal: true
		 });
		 $("#btnNuevo")
		 .button()
		 .click(function () 
		 {
		 	$("#Register").dialog("open");
		 });
	 });
	 $(function () {
	 	
		 $("#Elimina").dialog(
		 {
			 autoOpen: false,
			 modal: true
		 });
		 $("#btnEliminar")
		 
		 	 .button()
		 	 .click(function () 
		 {
		 	$("#Elimina").dialog("open");
		 
		 });
		 
		
	 });
	 $(function () {
	 	
		 $("#Actualiza").dialog(
		 {
			 autoOpen: false,
			 modal: true
		 });
		 $("#btnEditar")
		 
		 	 .button()
		 	 .click(function () 
		 {
		 	$("#Actualiza").dialog("open");
		 });
		 
		
	 });
	 </script>
	 <script type="text/javascript">
	function fEditElimina(intOpcion,ID,strNombre)
	{ 
		if (intOpcion==1)
		{
			document.frmActualiza.txtIdUserUp.value=ID;
			document.frmActualiza.txtNameUp.value=strNombre;		
			btnEditar.click();

		}
		else
		{
			document.frmElimina.txtIdUserEl.value=ID;
			
			btnEliminar.click();
		}
		
	}

	function fValidaData()
	{ 
	    var Name = document.getElementById("idName").value; 
		if (Name == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idName").focus();
		       	return false;
			}
		   return true;
 	} 
 	function fValidaDataUp()
	{ 
	    var Name = document.getElementById("idNameUp").value; 
		if (Name == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idNameUp").focus();
		       	return false;
			}
		   return true;
 	} 
 	</script>
 </head>

 <body class="Cuerpo">
 <div id="Register" title="Registrar Sala">
 	<form id="frmRegister" method="Post" onSubmit="return fValidaData()" action="../Vistas/GetSala.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h5>Registro de Salas</h5>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombre
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idName"  type="text" name="txtName" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="submit" name="sbtGuardar" value="Registrar">
	 			</td>
	 			</tr>
	 			
	 		</table>
 		</form>
 </div>

 <div id="Actualiza" title="Actualizar Sala">
 	<form id="frmActualiza" name="frmActualiza" method="Post" onSubmit="return fValidaDataUp()" action="../Vistas/GetSala.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h5>Actualizacion de Salas</h5>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Codigo Sala
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idUserUp"  type="text" name="txtIdUserUp" value="" readonly="true" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombre
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idNameUp"  type="text" name="txtNameUp" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="submit" name="sbtGuardarUp" value="Actualizar">
	 			</td>
	 			</tr>
	 			
	 		</table>
 		</form>
 </div>
 <div id="Elimina" title="Eliminar Sala">
 	<form id="frmElimina" name="frmElimina" method="Post" action="../Vistas/GetSala.php" >
 	<p>Esta seguro que desea eliminar esta Sala!</p>
 	<table class="tableRegister">
 		<tr>
	 			<td class="ColumnRegister">
	 			
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idUserEL"  type="text" name="txtIdUserEl" value="" readonly="true" required style="display:none;" />
	 			</td>
	 	</tr>
 		<tr>
	 			<td class="ColumnRegister">
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="submit" name="sbtElimina" value="Eliminar">
	 			</td>
	 	</tr>
 	</table>
 </form>
 </div>
 <!--Tabla Utilizada para particionar la pagina-->
 <table class="tableMain">
 	<tr>
 	<td colspan="3">
 		<div class="Titulo"><h1>Sistema de Acceso a las Salas de Informatica de la UNAD</h1></div>
 	</td>
 	</tr>
 	<tr>
 	<td class="tdlogin">
 	<div style="color:blue;bold:true;font-size:9pt;">
 	
 	</div>
 	</td>
 	</tr>
 	<td colspan="3"><hr></td></tr>
 	</table>
 	<table class="tableMain">
 		<tr>
 		<td class="tdMenu">
 		<h5>Menú Principal</h5>
 		<input class="BotonMenu" type="button" name="btnGetUser" value="Usuarios" onClick=" window.location.href='../Vistas/GetUser.php' ">
 		<input class="BotonMenu" type="button" name="btnGetSala" value="Salas" onClick=" window.location.href='../Vistas/GetSala.php' ">
 		<input class="BotonMenu" type="button" name="btnSalir" value="Salir" onClick=" window.location.href='../Controlador/clsUtilities.php' ">
 		</td>
 		<td class="tdContent">
 		<?php

 			if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST')
				{
					include("../Controlador/clsSala.php");
		 
					$objSala = new clsSala();
					$objSala -> fConsultaSala();
				}
				else
				{
					if (isset($_POST['sbtGuardar'])) 
					{          
						include("../Controlador/clsSala.php");
		 
						$objSala = new clsSala();
						$objSala -> mtdRegisterSala($_POST["txtName"]);
						
						$objSala -> fConsultaSala();    
						print("<script language='javascript'> 
							alert('Se Inserto la Sala con Exito'); 
							</script>");
					} 
					else if (isset($_POST['sbtGuardarUp'])) 
						{          
							include("../Controlador/clsSala.php");
		 
							$objSala = new clsSala();
							$objSala -> mtdUpdateSala($_POST["txtNameUp"],$_POST["txtIdUserUp"]);
							
							$objSala -> fConsultaSala();  
							print("<script language='javascript'> 
							alert('Se Actualizo la Sala con Exito'); 
							</script>");  
						}
					else if (isset($_POST['sbtElimina'])) 
						{          
							include("../Controlador/clsSala.php");
		 					$objSala = new clsSala();
							$objSala -> mtdDeleteSala($_POST["txtIdUserEl"]);
							
							$objSala -> fConsultaSala();  
							print("<script language='javascript'> 
							alert('Se elimino la Sala con Exito'); 
							</script>"); 
						}
				}
		 	
			
		 ?>	
		</br>
		<input class="Boton" id="btnNuevo" type="button" name="btnNuevo" value="Nueva Sala">
		<input class="Boton" id="btnEditar" type="button" name="btnEditar" value="Editar Sala" style="display:none;">
		<input class="Boton" id="btnEliminar" type="button" name="btnEliminar" value="Eliminar Sala" style="display:none;">
		
		
		
		
	 	</td>
 		</tr>
 		<tr>
 		<td>
 			
 		</td>
 		</tr>
 	</table>
 <div class="footer"> 
 	<div class="widgets"> Universidad Nacional Abierta y a Distancia UNAD </div>
 </div>

 </body>

 </html>