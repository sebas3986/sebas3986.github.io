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
	
	
	 <script type="text/javascript">
	function fValidaData()
	{ 
	    var identificacion = document.getElementById("idIdentificacion").value; 
	    var Sala = document.getElementById("ddlSala").value;  

		
		if (Identificacion == "") 
	       {
		       	alert("Identificació Obligatoria");
		       	document.getElementById("idIdentificacion").focus();
		       	return false;
			}
		if (Sala == 0) 
	       {
		       	alert("Seleccione una Sala!");
		       	document.getElementById("ddlSala").focus();
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
 		 <div id="Register" title="Ingresar Usuario a Sala" style="width:450px;">
		 	<form id="frmRegister" method="Post" onSubmit="return fValidaData()" action="../Vistas/LoginSala.php" >
		 			<table class="tableRegister">
			 			<tr>
			 			<td colspan="2">
			 			<h5>Login a Sala</h5>
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
			 			Sala
			 			</td>
			 			<td class="ColumnRegister">
			 			<?php
			 				include("../Controlador/clsUsuario.php");
							$objUser = new clsUsuario();
							$objUser -> mtdCargaCombo("ddlSala","select idsala,cnombre from sala");
						?>
						</td>
			 			</tr>
			 			
			 			<tr>
			 			<td class="ColumnRegister">
			 			
			 			</td>
			 			<td class="ColumnRegister">
			 			<input class="Cajas" type="submit" name="sbtGuardar" value="Ingresar a Sala">
			 			</td>
			 			</tr>
			 			
			 		</table>
		 		</form>
		 </div>
 		<?php
 				if (isset($_POST['sbtGuardar'])) 
					{     
					    $strResult = $objUser -> mtdValidaUserSinLogin($_POST["txtIdentificacion"]);
					    if ($strResult!="")
					    {
					    	print("<script language='javascript'> 
							alert('" . $strResult . "'); 
							</script>");
					    }
						else
						{
							if ($objUser -> mtdLoginSala($_POST["txtIdentificacion"],2,$_POST["ddlSala"]))
							{
							print("<script language='javascript'> 
							alert('Se Inserto el Usuario con Exito'); 
							</script>");
							}
						}
						
					} 
		 ?>	
		</br>
		
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