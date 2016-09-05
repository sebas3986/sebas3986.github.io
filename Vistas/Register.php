<!DOCTYPE html>

 <head>

 <title> Sistema de Ingreso </title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icoMain.ico" />
	 <meta charset="utf-8">
	 <style type="text/css"></style>
	 <LINK REL=StyleSheet HREF="../Styles/cssPrincipal.css" TYPE="text/css" MEDIA=screen>
	 	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script src="http://html5form.googlecode.com/svn/trunk/jquery.html5form-1.4-min.js"></script>
	<script type="text/javascript">
	function fValidaData()
	{ 
	    var Pass = document.getElementById("idPass").value; 
	    var PassCon = document.getElementById("idPassCon").value; 
	    var Ident = document.getElementById("idIdent").value; 
	    var Name = document.getElementById("idName").value; 
	    var Last = document.getElementById("idLast").value; 
	    var Email = document.getElementById("idEmail").value; 
	    var NameUser = document.getElementById("idNameUser").value; 

		if (Ident == "") 
	       {
		       	alert("Identidicacion Obligatoria");
		       	document.getElementById("idIdent").focus();
				return false;
		   }
		if (Name == "") 
	       {
		       	alert("Nombre Obligatorio");
		       	document.getElementById("idName").focus();
				return false;
		   }
		if (Last == "") 
	       {
		       	alert("Apellido Obligatorio");
		       	document.getElementById("idLast").focus();
				return false;
		   }

		if (Email == "") 
	       {
		       	alert("Email Obligatorio");
		       	document.getElementById("idEmail").focus();
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
 	</script>
 </head>

 <body class="Cuerpo">
 <!--Tabla Utilizada para particionar la pagina-->
 <table class="tableMain">
 	<tr>
 	<td colspan="3">
 		<div class="Titulo"><h1>Sistema de Acceso a las Salas de Informatica de la UNAD</h1></div>
 	</td>
 	</tr>
 	<tr>
 	<td  colspan="2" class="tdPag"></td>
 	<td class="tdlogin">
 	<input class="boton" type="button" name="btnLogin" value="Ingresar" onClick=" window.location.href='../Vistas/login.php' ">
 	</td>
 	</tr>
 	<tr>
 	<td colspan="3"><hr></td></tr>
 	</table>
 	<table class="tableMain">
 		<tr>
 		<td class="tdMenu">
 		<h5>Menú Principal</h5>
 		<input class="BotonMenu" type="button" name="btnMain" value="Inicio" onClick=" window.location.href='../Index.html' ">
 		</br>
		<input class="BotonMenu" type="button" name="btnGetUser" value="Consultar Usuario" onClick=" window.location.href='../Vistas/GetUser.php' ">
 		</td>
 		<td class="tdContent">
 		<form id="frmRegister" method="Post" onSubmit="return fValidaData()" action="../Vistas/Register.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h1>Registro de Usuarios</h1>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Identificación
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idIdent" type="number" name="txtIdentificacion" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Nombres
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idName"  type="text" name="txtName" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Apellidos
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idLast" type="text" name="txtLast" value="" required/>
	 			</td>
	 			</tr>
	 			<tr>
	 			<td class="ColumnRegister">
	 			Email
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" id="idEmail" type="email" name="txtMail" value="" required/>
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
	 		<?php
	 			if(isset($_POST['sbtGuardar']))
	 			{
	 				include("../Controlador/clsUsuario.php");
					$objUser = new clsUsuario();
					if ($objUser -> mtdRegisterUser($_POST["txtName"],$_POST["txtLast"],$_POST["txtIdentificacion"],$_POST["txtNameUser"],$_POST["txtPassword"],$_POST["txtMail"]))
					{
						print("<script language='javascript'> 
						alert('Registro asociado con exito'); 
						</script>");
					}
	 			}
			?>
	 	</td>
 		</tr>
 	</table>
 <div class="footer"> 
 	<div class="widgets"> Universidad Nacional Abierta y a Distancia UNAD </div>
 </div>




 </body>

 </html>