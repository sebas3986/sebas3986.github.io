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
	function fEditElimina(intOpcion,ID,strNombre,strTipo,strLogin,strPassword)
	{ 
		if (intOpcion==1)
		{
			document.frmActualiza.txtIdUserUp.value=ID;
		document.frmActualiza.txtNameUp.value=strNombre;		
		if(strTipo=="Administrador")
			{
				document.frmActualiza.ddlTipoUsuarioUp.value=1;
			}
			else
			{
				document.frmActualiza.ddlTipoUsuarioUp.value=2;
			}
				document.frmActualiza.txtNameUserUp.value=strLogin;
				document.frmActualiza.txtPasswordUp.value=strPassword;
		
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
	    var Pass = document.getElementById("idPass").value; 
	    var PassCon = document.getElementById("idPassCon").value; 
	    var Name = document.getElementById("idName").value; 
	    var NameUser = document.getElementById("idNameUser").value; 
	    var TypeUser = document.getElementById("ddlTipoUsuario").value; 

		
		if (Name == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idName").focus();
		       	return false;
			}
		if (TypeUser == 0) 
	       {
		       	alert("Seleccione un tipo de Usuario!");
		       	document.getElementById("ddlTipoUsuario").focus();
		       	return false;
			}
		if (NameUser == "") 
	       {
		       	alert("Nombre de Usuario Obligatorio");
		       	document.getElementById("idNameUser").focus();
				return false;
		   }
		if (Pass == "") 
	       {
		       	alert("Contrasena Obligatoria");
		       	document.getElementById("idPass").focus();
				return false;
		   }

	    if (Pass != PassCon) 
	       {
		       	alert("La Contrasena no coincide!");
				return false;
		   }
		   return true;
 	} 
 	function fValidaDataUp()
	{ 
	    var Pass = document.getElementById("idPassUp").value; 
	    var Name = document.getElementById("idNameUp").value; 
	    var NameUser = document.getElementById("idNameUserUp").value; 
	    var TypeUser = document.getElementById("ddlTipoUsuarioUp").value; 

		
		if (Name == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idNameUp").focus();
		       	return false;
			}
		if (TypeUser == 0) 
	       {
		       	alert("Seleccione un tipo de Usuario!");
		       	document.getElementById("ddlTipoUsuarioUp").focus();
		       	return false;
			}
		if (NameUser == "") 
	       {
		       	alert("Nombre de Usuario Obligatorio");
		       	document.getElementById("idNameUserUp").focus();
				return false;
		   }
		if (Pass == "") 
	       {
		       	alert("Contrasena Obligatoria");
		       	document.getElementById("idPassUp").focus();
				return false;
		   }

		   return true;
 	} 
 	</script>
 </head>

 <body class="Cuerpo">
 <div id="Register" title="Registrar Usuario">
 	<form id="frmRegister" method="Post" onSubmit="return fValidaData()" action="../Vistas/GetUser.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h5>Registro de Usuarios</h5>
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
	 			Tipo de Usuario
	 			</td>
	 			<td class="ColumnRegister">
	 			<select id="ddlTipoUsuario" name="ddlTipoUsuario" required>
				<option value="0">Seleccione . . .</option>
				<option value="1">Administrador</option>
				<option value="2">Controlador</option>
				</select>
				</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombre de Usuario
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idNameUser" type="text" name="txtNameUser" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Contrasena
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="Password" id="idPass" name="txtPassword" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Confirma Contrasena
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="Password" id="idPassCon" name="txtPasswordConfirma" value="" required/>
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

 <div id="Actualiza" title="Actualizar Usuario">
 	<form id="frmActualiza" name="frmActualiza" method="Post" onSubmit="return fValidaDataUp()" action="../Vistas/GetUser.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h5>Actualizacion de Usuarios</h5>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Codigo Usuario
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
	 			Tipo de Usuario
	 			</td>
	 			<td class="ColumnRegister">
	 			<select id="ddlTipoUsuarioUp" name="ddlTipoUsuarioUp" required>
				<option value="0">Seleccione . . .</option>
				<option value="1">Administrador</option>
				<option value="2">Controlador</option>
				</select>
				</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombre de Usuario
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idNameUserUp" type="text" name="txtNameUserUp" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Contrasena
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="Password" id="idPassUp" name="txtPasswordUp" value="" required/>
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
 <div id="Elimina" title="Eliminar Usuario">
 	<form id="frmElimina" name="frmElimina" method="Post" action="../Vistas/GetUser.php" >
 	<p>Esta seguro que desea eliminar este Usuario!</p>
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
 	<tr>
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
					include("../Controlador/clsUsuario.php");
		 
					$objUser = new clsUsuario();
					$objUser -> fConsultaUsuario();
				}
				else
				{
					if (isset($_POST['sbtGuardar'])) 
					{          
						include("../Controlador/clsUsuario.php");
		 
						$objUser = new clsUsuario();
						$objUser -> mtdRegisterUser($_POST["txtName"],$_POST["ddlTipoUsuario"],$_POST["txtNameUser"],$_POST["txtPassword"]);
						print("<script language='javascript'> 
							alert('Se Inserto el Usuario con Exito'); 
							</script>");
						$objUser -> fConsultaUsuario();    
					} 
					else if (isset($_POST['sbtGuardarUp'])) 
						{          
							include("../Controlador/clsUsuario.php");
		 					$objUser = new clsUsuario();
							$objUser -> mtdUpdateUser($_POST["txtNameUp"],$_POST["ddlTipoUsuarioUp"],$_POST["txtNameUserUp"],$_POST["txtPasswordUp"],$_POST["txtIdUserUp"]);
							print("<script language='javascript'> 
							alert('Se Actualizo el Usuario con Exito'); 
							</script>");
							$objUser -> fConsultaUsuario();    
						}
					else if (isset($_POST['sbtElimina'])) 
						{          
							include("../Controlador/clsUsuario.php");
		 					$objUser = new clsUsuario();
							$objUser -> mtdDeleteUser($_POST["txtIdUserEl"]);
							print("<script language='javascript'> 
							alert('Se elimino el Usuario con Exito'); 
							</script>");
							$objUser -> fConsultaUsuario();   
						}
				}
		 	
			
		 ?>	
		</br>
		<input class="Boton" id="btnNuevo" type="button" name="btnNuevo" value="Nuevo Usuario">
		<input class="Boton" id="btnEditar" type="button" name="btnEditar" value="Editar Usuario" style="display:none;">
		<input class="Boton" id="btnEliminar" type="button" name="btnEliminar" value="Eliminar Usuario" style="display:none;">
		
		
		
		
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