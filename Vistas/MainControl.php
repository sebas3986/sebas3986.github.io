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
	 	
		 $("#Exit").dialog(
		 {
			 autoOpen: false,
			 modal: true
		 });
		 $("#btnExit")
		 
		 	 .button()
		 	 .click(function () 
		 {
		 	$("#Exit").dialog("open");
		 
		 });
		 
		
	 });
	 </script>
	 <script type="text/javascript">
	function fExitUser(IdUser)
	{ 
			document.frmExit.txtIdUserExit.value=IdUser;
			btnExit.click();
	}

	function fValidaData()
	{ 
	    var identificacion = document.getElementById("idIdentificacion").value; 
	    var Nombre = document.getElementById("idName").value; 
	    var Apellido = document.getElementById("idLast").value; 
	    var Sexo = document.getElementById("ddlSexo").value; 
	    var TipoUsuario = document.getElementById("ddlTipoUsuario").value;
	    var Ciudad = document.getElementById("ddlCiudad").value;  

		
		if (Identificacion == "") 
	       {
		       	alert("Identificació Obligatoria");
		       	document.getElementById("idIdentificacion").focus();
		       	return false;
			}
		if (Nombre == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idName").focus();
		       	return false;
			}
		if (Apellido == "") 
	        {
		       	alert("Apellido Obligatorio");
		       	document.getElementById("idLast").focus();
		       	return false;
			}

		if (TipoUsuario == 0) 
	       {
		       	alert("Seleccione un tipo de Usuario!");
		       	document.getElementById("ddlTipoUsuario").focus();
		       	return false;
			}
		if (Sexo == 0) 
	        {
		       	alert("Seleccione un Sexo!");
		       	document.getElementById("ddlSexo").focus();
		       	return false;
			}
		if (Ciudad == 0) 
	       {
		       	alert("Seleccione una Ciudad!");
		       	document.getElementById("ddlCiudad").focus();
		       	return false;
			}
			return true;
 	} 
 	</script>
 </head>

 <body class="Cuerpo">
 <div id="Register" title="Registrar Usuario" style="width:450px;">
 	<form id="frmRegister" method="Post" onSubmit="return fValidaData()" action="../Vistas/MainControl.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h5>Registro de Usuarios de SALA</h5>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Tipo de Usuario
	 			</td>
	 			<td class="ColumnRegister">
	 			<?php
	 				include("../Controlador/clsUsuario.php");
					$objUser = new clsUsuario();
					$objUser -> mtdCargaCombo("ddlTipoUsuario","select idtipo_usuario,cnombre from tipo_usuario");
				?>
				</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Identificación
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idIdentificacion" type="number" name="txtIdentificacion" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombre
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="text" id="idName" name="txtName" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Apellido
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="text" id="idLast" name="txtLast" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Sexo
	 			</td>
	 			<td class="ColumnRegister">
	 			<?php
					$objUser -> mtdCargaCombo("ddlSexo","select idsexo,cnombre from sexo ");
				?>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Ciudad
	 			</td>
	 			<td class="ColumnRegister">
	 			<?php
					$objUser -> mtdCargaCombo("ddlCiudad","select idciudad,cnombre from ciudad ");
				?>
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

 
 <div id="Exit" title="Sacar Usuario">
 	<form id="frmExit" name="frmExit" method="Post" action="../Vistas/MainControl.php" >
 	<p>Esta seguro que desea Terminar la sessión a este Usuario!</p>
 	<table class="tableRegister">
 		<tr>
	 			<td class="ColumnRegister">
	 			
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idUserExit"  type="text" name="txtIdUserExit" value="" readonly="true" required style="display:none;" />
	 			</td>
	 	</tr>
 		<tr>
	 			<td class="ColumnRegister">
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="submit" name="sbtExit" value="Salir">
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
 	<tr>
 	<td colspan="3"><hr></td>
 	</tr>
 	</table>
 	<table class="tableMain">
 		<tr>
 		<td class="tdMenu">
 		<h5>Menú Principal</h5>
 		<input class="BotonMenu" type="button" name="btnGetUsuarios" value="Usuarios en Salas" onClick=" window.location.href='../Vistas/MainControl.php' ">
 		<input class="BotonMenu" type="button" name="btnNewRegister" value="Ingresar a Sala" onClick=" window.location.href='../Vistas/LoginSala.php' ">
 		<input class="BotonMenu" type="button" name="btnSalir" value="Salir" onClick=" window.location.href='../Controlador/clsUtilities.php' ">
 		
 		</td>
 		<td class="tdContent">
 		<?php
 			if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST')
				{
					
					$objUser -> fConsultaUsuariosEnSalas();
				}
				else
				{
					if (isset($_POST['sbtGuardar'])) 
					{          
						$objUser -> mtdRegisterUserSala($_POST["txtName"],$_POST["ddlTipoUsuario"],$_POST["ddlCiudad"],$_POST["ddlSexo"],$_POST["txtIdentificacion"],$_POST["txtLast"]);
						print("<script language='javascript'> 
							alert('Se Inserto el Usuario con Exito'); 
							</script>");
						$objUser -> fConsultaUsuariosEnSalas(); 
					} 
					else if (isset($_POST['sbtExit'])) 
						{      
							$objUser -> mtdUpdateLoginSala($_POST["txtIdUserExit"]);
							print("<script language='javascript'> 
							alert('Cerrar sesión Exitosa!'); 
							</script>");
							$objUser -> fConsultaUsuariosEnSalas();   
						}
				}
		 ?>	
		</br>
		<input class="Boton" id="btnNuevo" type="button" name="btnNuevo" value="Nuevo Usuario">
		<input class="Boton" id="btnExit" type="button" name="btnExit" value="Sacar Usuario" style="display:none;">
		
		
		
		
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