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
	    var NameUser = document.getElementById("idNameUser").value;
	    var Pass = document.getElementById("Password").value;


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
 		Debe Inicar Sesión
 		</td>
 		<td class="tdContent">
 		<form id="frmLogin" method="Post" onSubmit="return fValidaData()" action="../Vistas/login.php" >
 			<table class="tableRegister">
	 			<tr>
	 			<td colspan="2">
	 			<h1>Ingreso al Sistema</h1>
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
	 			
	 			<td class="ColumnRegister">
	 			
	 			</td>
	 			<td class="ColumnRegister">
	 			<input class="Cajas" type="submit" name="sbtIngresar" value="Ingresar">
	 			</td>
	 			</tr>
	 			
	 		</table>
 		</form>
	 		<?php
	 			if(isset($_POST['sbtIngresar']))
	 			{
	 				include("../Controlador/clsUsuario.php");
					$objUser = new clsUsuario();
					$strResult = $objUser -> mtdValidaUser($_POST["txtNameUser"],$_POST["txtPassword"]);
					if ($strResult == "Usuario o contrasena Incorrectas")
					{
						print("<script language='javascript'> 
						alert('" . $strResult . "'); 
						</script>");
					}
					else
					{
						$ArrDatos = explode(",", $strResult);
						$strResult = "Bienvenido";
						print("<script language='javascript'> 
						alert('" . $strResult . "'); 
						</script>");
						$objUser -> mtdLogin($ArrDatos[0]);

						if ($ArrDatos[2] == 1)
					  {
					   echo "<script>
					   window.location.href=\"GetUser.php\";
					   </script>";
					   //header('Location: GetUser.php');
					  }
					  else
					  {
					   echo "<script>
					   window.location.href=\"MainControl.php\";
					   </script>";
					   //header('Location: MainControl.php'); 
					  }
						
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