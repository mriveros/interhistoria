<?php 
	/*
	 * Interhistorias - Registro de usuarios subscripción
	 * 
	 */
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	//checkSession( "" );
?>
<!DOCTYPE html>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!--<script src="../bower_components/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap Core JavaScript -->
    <!--<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker3.css">
    <style>
		p{ font-family:Roboto-s-l !important; font-weight:lighter !important; }
		
    	.titapi{ padding:20px 0;}
		
		pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
		.string { color: green; }
		.number { color: darkorange; }
		.boolean { color: blue; }
		.null { color: magenta; }
		.key { color: red; }
    </style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - API</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
    	$(document).ready(function(){
			$(".jsoncode").hide();
			$(".openjcode").click( function(){
				var tg = $(this).attr("data-target"); 
				$("#" + tg).toggle(300); 
			});
		});
    </script>
</head>

<body>

    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; min-height:75px;">
          <div class="navbar-header" style="/*float:none;*/">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="../pages/index.php" style="padding:7px; position:absolute; z-index:9;">
            	<img src="../img/logo.png" width="165" height="58">
            </a>
            </div>
            <!-- /.navbar-top-links -->
            <?php //include( "../pages/imenu.php" );?>
        </nav>

      	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title">REST APIs</span></h1>
                </div>
                <div align="left" style="margin:25px 0;">
                	<a href="index.php"><span class="lsec">API</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="campos_bd.php"><span class="lsec">Campos tablas BD</span></a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="row">
                            	
                                    <div class="col-lg-6">
                                    	<!-- ITEM SERVICIO -->
                                    	<div class="item_servicio">
                                            <h3>POST usuario/inicio_sesion</h3>
                                            <p>Retorna los datos de usuario autenticado con los datos enviados en el archivo en formato json. Entre los datos que retorna está el token de acceso a los recursos del API.</p>
    
                                            <div class="titapi"><label for="parametros" class="tsec">Parámetros</label></div>
                                            <table width="100%" border="1">
                                              <tr class="code_syn" >
                                                <th bgcolor="#DAF1F1" scope="col">archivo json</th>
                                                <th bgcolor="#AADFDF" scope="col">{"username":"string", "password":"string"}</th>
                                              </tr>
                                            </table>
                                          <div class="titapi"><label for="parametros" class="tsec">URL Recurso</label></div>
                                            <span class="code_syn">http://api.interhistoria.net/usuario/inicio_sesion</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de solicitud</label></div>
                                            <span class="code_syn">http://api.interhistoria.net/usuario/inicio_sesion; 
                                          json string:{"username":"mikeven", "password":"1234"}</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de respuesta</label></div>
                                            <a href="#!" class="openjcode" data-target="j1">VER</a>
                                            <div id="j1" class="jsoncode">
                                            	<pre>{
    <span class="key">"cod_resp":</span> <span class="number">1</span>,
    <span class="key">"data_resp":</span> {
        <span class="key">"idUsuario":</span> <span class="string">"1"</span>,
        <span class="key">"usuario":</span> <span class="string">"mikeven"</span>,
        <span class="key">"email":</span> <span class="string">"mikeven@gmail.com"</span>,
        <span class="key">"nombre":</span> <span class="string">"Miguel"</span>,
        <span class="key">"apellido":</span> <span class="string">"Rangel"</span>,
        <span class="key">"ci":</span> <span class="string">"18413103"</span>,
        <span class="key">"descripcion":</span> <span class="string">"Administrador Interhistorias"</span>,
        <span class="key">"msds":</span> <span class="string">"-"</span>,
        <span class="key">"cmdf":</span> <span class="string">"-"</span>,
        <span class="key">"token_api":</span> <span class="string">"31967d05e5b3c72b914752cbd80d4606"</span>
    },
    <span class="key">"mensaje":</span> <span class="string">"Inicio de sesión exitoso"</span>
}</pre>
                                            </div>
                                        </div><!-- /.ITEM SERVICIO -->
                                        <hr>
                                        <!-- ITEM SERVICIO -->
                                        <div class="item_servicio">
                                            <h3>GET pacientes/registros</h3>
                                            <p>Retorna la lista de pacientes asociados al usuario autenticado</p>
    
                                            <div class="titapi"><label for="parametros" class="tsec">Parámetros</label></div>
                                            <table width="100%" border="1">
                                              <tr class="code_syn" >
                                                <th bgcolor="#DAF1F1" scope="col">token_api</th>
                                                <th bgcolor="#AADFDF" scope="col">Token obtenido tras autorización al iniciar sesión </th>
                                              </tr>
                                            </table>
                                          <div class="titapi"><label for="parametros" class="tsec">URL Recurso</label></div>
                                            <span class="code_syn">http://api.interhistoria.net/pacientes/registros</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de solicitud</label></div>
                                            <span class="code_syn">
                                            	http://api.interhistoria.net/pacientes/registros?token_api=8539a8f60ade36dfef8fb42bfd987058</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de respuesta</label></div>
                                        	<a href="#!" class="openjcode" data-target="j2">VER</a>
                                            <div id="j2" class="jsoncode">
                                            	<pre>{
    <span class="key">"cod_resp":</span> <span class="number">1</span>,
    <span class="key">"data_resp":</span> [
        {
            <span class="key">"idPaciente":</span> <span class="string">"1"</span>,
            <span class="key">"titulo":</span> <span class="string">""</span>,
            <span class="key">"nombre":</span> <span class="string">"Miguel"</span>,
            <span class="key">"apellido":</span> <span class="string">"Rangel"</span>,
            <span class="key">"cedula":</span> <span class="string">"16413103"</span>,
            <span class="key">"fecha_nacimiento":</span> <span class="string">"1988-07-27"</span>,
            <span class="key">"direccion":</span> <span class="string">"URB STA ROSALIA CALLE ESTE 16"</span>,
            <span class="key">"sexo":</span> <span class="string">"masculino"</span>,
            <span class="key">"ocupacion":</span> <span class="string">"Estudiante"</span>,
            <span class="key">"lugar_trabajo":</span> <span class="string">"Universidad"</span>,
            <span class="key">"telefono":</span> <span class="string">"04264121969"</span>,
            <span class="key">"email":</span> <span class="string">"mikeven@gmail.com"</span>,
            <span class="key">"edo_civil":</span> <span class="string">"soltero"</span>,
            <span class="key">"religion":</span> <span class="string">"catolica"</span>,
            <span class="key">"representante":</span> <span class="string">"Mireya"</span>,
            <span class="key">"idioma":</span> <span class="string">"espaÃ±ol"</span>,
            <span class="key">"actividad_fisica":</span> <span class="string">"BÃ©isbol"</span>,
            <span class="key">"peso":</span> <span class="string">"64"</span>,
            <span class="key">"estatura":</span> <span class="string">"1.69"</span>,
            <span class="key">"imc":</span> <span class="string">"0"</span>,
            <span class="key">"dominancia":</span> <span class="string">"Derecha"</span>,
            <span class="key">"seguro":</span> <span class="string">"seguros_altamira"</span>,
            <span class="key">"dr_remitido":</span> <span class="string">"Eduardo Rivas"</span>,
            <span class="key">"idUsuario":</span> <span class="string">"1"</span>
        },
        {
            <span class="key">"idPaciente":</span> <span class="string">"3"</span>,
            <span class="key">"titulo":</span> <span class="string">"Sra"</span>,
            <span class="key">"nombre":</span> <span class="string">"Rosa"</span>,
            <span class="key">"apellido":</span> <span class="string">"González"</span>,
            <span class="key">"cedula":</span> <span class="string">"17453265"</span>,
            <span class="key">"fecha_nacimiento":</span> <span class="string">"1994-05-27"</span>,
            <span class="key">"direccion":</span> <span class="string">"Caracas"</span>,
            <span class="key">"sexo":</span> <span class="string">"femenino"</span>,
            <span class="key">"ocupacion":</span> <span class="string">"Comerciante"</span>,
            <span class="key">"lugar_trabajo":</span> <span class="string">"Mercado de chacao"</span>,
            <span class="key">"telefono":</span> <span class="string">"04266548956"</span>,
            <span class="key">"email":</span> <span class="string">"rgonzalez@gmail.com"</span>,
            <span class="key">"edo_civil":</span> <span class="string">"soltero"</span>,
            <span class="key">"religion":</span> <span class="string">"Católica"</span>,
            <span class="key">"representante":</span> <span class="string">"Mireya"</span>,
            <span class="key">"idioma":</span> <span class="string">"español"</span>,
            <span class="key">"actividad_fisica":</span> <span class="string">"Rugby"</span>,
            <span class="key">"peso":</span> <span class="string">"85"</span>,
            <span class="key">"estatura":</span> <span class="string">"1.78"</span>,
            <span class="key">"imc":</span> <span class="null">null</span>,
            <span class="key">"dominancia":</span> <span class="null">null</span>,
            <span class="key">"seguro":</span> <span class="string">"seguros_la_previsora"</span>,
            <span class="key">"dr_remitido":</span> <span class="string">"Hilda Gómez"</span>,
            <span class="key">"idUsuario":</span> <span class="string">"1"</span>
        }
    ],
    <span class="key">"mensaje":</span> <span class="string">"Datos encontrados"</span>
}</pre>
                                            </div>
                                        </div><!-- /.ITEM SERVICIO -->
                                        <hr>
                                        <!-- ITEM SERVICIO -->
                                        <div class="item_servicio">
                                            <h3>GET pacientes/antecedentes</h3>
                                            <p>Retorna la lista de registros de antecedentes personales y examen funcional del paciente indicado en el identificador.</p>
    
                                            <div class="titapi"><label for="parametros" class="tsec">Parámetros</label></div>
                                            <table width="100%" border="1">
                                              <tr class="code_syn" >
                                                <th width="20%" bgcolor="#DAF1F1" scope="col">token_api</th>
                                                <th width="80%" bgcolor="#AADFDF" scope="col">Token obtenido tras autorización al iniciar sesión</th>
                                              </tr>
                                              <tr class="code_syn" >
                                                <th bgcolor="#DAF1F1" scope="col">cedula</th>
                                                <th bgcolor="#AADFDF" scope="col">El identificador asociado al paciente consultado</th>
                                              </tr>
                                            </table>
                                          <div class="titapi"><label for="parametros" class="tsec">URL Recurso</label></div>
                                            <span class="code_syn">http://api.interhistoria.net/pacientes/antecedentes</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de solicitud</label></div>
                                            <span class="code_syn">
                                            	http://api.interhistoria.net/pacientes/antecedentes?token_api=8539a8f60ade36dfef8fb42bfd987058&cedula=13785211</span>
                                            <div class="titapi"><label for="parametros" class="tsec">Ejemplo de respuesta</label></div>
                                        	<a href="#!" class="openjcode" data-target="j3">VER</a>
                                            <div id="j3" class="jsoncode">
                                            	<pre>{
    <span class="key">"cod_resp":</span> <span class="number">1</span>,
    <span class="key">"data_resp":</span> [
        {
            <span class="key">"idAntecedente":</span><span class="string">"1"</span>,
            <span class="key">"idPaciente":</span> <span class="string">"80"</span>,
            <span class="key">"idUsuario":</span> <span class="string">"1"</span>,
            <span class="key">"fecha_r":</span> <span class="string">"2016-01-13 15:02:45"</span>,
            <span class="key">"ap_trauma":</span> <span class="string">"Contusiones"</span>,
            <span class="key">"ap_quir":</span> <span class="string">"Operación de corazón"</span>,
            <span class="key">"al_asa":</span> <span class="string">"1"</span>,
            <span class="key">"al_aines":</span> <span class="string">"1"</span>,
            <span class="key">"al_penicilina":</span> <span class="string">"1"</span>,
            <span class="key">"al_otros":</span> <span class="string">""</span>,
            <span class="key">"ap_dmhiper":</span> <span class="string">"1"</span>,
            <span class="key">"ap_hta":</span> <span class="string">"1"</span>,
            <span class="key">"ap_asma":</span> <span class="string">"1"</span>,
            <span class="key">"ap_tiroides":</span> <span class="string">"1"</span>,
            <span class="key">"ap_medic":</span> <span class="string">""</span>,
            <span class="key">"ap_notas":</span> <span class="string">"Notas"</span>,
            <span class="key">"efn_rigmat":</span> <span class="string">"1"</span>,
            <span class="key">"efn_perdpeso":</span> <span class="string">"1"</span>,
            <span class="key">"efn_gpeso":</span> <span class="string">"1"</span>,
            <span class="key">"efn_apet":</span> <span class="string">"Normalizado"</span>,
            <span class="key">"efn_micc":</span> <span class="string">"Controladas"</span>,
            <span class="key">"efn_evac":</span> <span class="string">"Decadentes"</span>,
            <span class="key">"efn_hpbio":</span> <span class="string">"Patologías"</span>
        },
        {
            <span class="key">"idAntecedente":</span> <span class="string">"5"</span>,
            <span class="key">"idPaciente":</span> <span class="string">"80"</span>,
            <span class="key">"idUsuario":</span> <span class="string">"1"</span>,
            <span class="key">"fecha_r":</span> <span class="string">"2016-01-04 12:09:25"</span>,
            <span class="key">"ap_trauma":</span> <span class="string">"Caídas de alturas"</span>,
            <span class="key">"ap_quir":</span> <span class="string">"Apendicitis"</span>,
            <span class="key">"al_asa":</span> <span class="null">null</span>,
            <span class="key">"al_aines":</span> <span class="null">null</span>,
            <span class="key">"al_penicilina":</span> <span class="string">"1"</span>,
            <span class="key">"al_otros":</span> <span class="string">"Insulina"</span>,
            <span class="key">"ap_dmhiper":</span> <span class="null">null</span>,
            <span class="key">"ap_hta":</span> <span class="string">"1"</span>,
            <span class="key">"ap_asma":</span> <span class="string">"1"</span>,
            <span class="key">"ap_tiroides":</span> <span class="string">"1"</span>,
            <span class="key">"ap_medic":</span> <span class="string">""</span>,
            <span class="key">"ap_notas":</span> <span class="string">""</span>,
            <span class="key">"efn_rigmat":</span> <span class="string">"1"</span>,
            <span class="key">"efn_perdpeso":</span> <span class="string">"1"</span>,
            <span class="key">"efn_gpeso":</span> <span class="string">"1"</span>,
            <span class="key">"efn_apet":</span> <span class="string">"Normal"</span>,
            <span class="key">"efn_micc":</span> <span class="string">"Controladas"</span>,
            <span class="key">"efn_evac":</span> <span class="string">"obstruídas"</span>,
            <span class="key">"efn_hpbio":</span> <span class="string">"Noctámbulo"</span>
        }
    ],
    <span class="key">"mensaje":</span> <span class="string">"Datos encontrados"</span>
}</pre>
                                            </div>
                                        </div><!-- /.ITEM SERVICIO -->
                                	</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                     	<!-- ITEM SERVICIO -->
                                        <div class="item_servicio">
                                            <h3>GET historias/registros</h3>
                                            <p>Retorna la lista de registros de historias médicas del paciente indicado en el identificador</p>
                                            <div class="titapi"><label for="parametros" class="tsec">Parámetros</label></div>
                                            <table width="100%" border="1">
                                                <tr class="code_syn" >
                                                    <th width="20%" bgcolor="#DAF1F1" scope="col">token_api</th>
                                                    <th width="80%" bgcolor="#AADFDF" scope="col">Token obtenido tras autorización al iniciar sesión</th>
                                                </tr>
                                                <tr class="code_syn" >
                                                    <th bgcolor="#DAF1F1" scope="col">cedula</th>
                                                    <th bgcolor="#AADFDF" scope="col">El identificador asociado al paciente consultado</th>
                                                </tr>
                                            </table>
                                            <div class="titapi"><label for="parametros" class="tsec">URL Recurso</label></div>
                                                <span class="code_syn">http://api.interhistoria.net/historias/registros</span>
                                                <div class="titapi"><label for="parametros" class="tsec">Ejemplo de solicitud</label></div>
                                                <span class="code_syn">
                                                    http://api.interhistoria.net/historias/registros?token_api=8539a8f60ade36dfef8fb42bfd987058&cedula=13785211 </span>
                                                <div class="titapi"><label for="parametros" class="tsec">Ejemplo de respuesta</label></div>
                                                <a href="#!" class="openjcode" data-target="j4">VER</a>
                                                <div id="j4" class="jsoncode">
<pre>{
    <span class="key">"cod_resp":</span> <span class="number">1</span>,
    <span class="key">"data_resp":</span> [
    	[
    		{
                <span class="key">"idForm":</span> <span class="string">"35"</span>,
                <span class="key">"idPaciente":</span> <span class="string">"80"</span>,
                <span class="key">"idUsuario":</span> <span class="string">"1"</span>,
                <span class="key">"fecha_c":</span> <span class="null">null</span>,
                <span class="key">"fecha_r":</span> <span class="string">"2016-02-23 08:44:41"</span>,
                <span class="key">"lado":</span> <span class="string">"derecha"</span>,
                <span class="key">"mc_traumatismo":</span> <span class="string">"1"</span>,
                <span class="key">"dolor":</span> <span class="string">"1"</span>,
                <span class="key">"dol_sitio":</span> <span class="string">"fungio"</span>,
                <span class="key">"dol_inidesencad":</span> <span class="string">""</span>,
                <span class="key">"dol_cartipo":</span> <span class="string">"punzante"</span>,
                <span class="key">"dol_irrad":</span> <span class="string">"muslo"</span>,
                <span class="key">"dol_asoc":</span> <span class="string">""</span>,
                <span class="key">"dol_tha":</span> <span class="string">"3 meses"</span>,
                <span class="key">"dol_exa":</span> <span class="string">"caminatas"</span>,
                <span class="key">"dol_aten":</span> <span class="string">""</span>,
                <span class="key">"dol_sever":</span> <span class="string">"ocasional"</span>,
                <span class="key">"mc_signoc":</span> <span class="string">"1"</span>,
                <span class="key">"mc_aumento_vol":</span> <span class="null">null</span>,
                <span class="key">"mc_deformidad":</span> <span class="string">"1"</span>,
                <span class="key">"mc_inestabilidad":</span> <span class="null">null</span>,
                <span class="key">"mc_crep_chasq":</span> <span class="null">null</span>,
                <span class="key">"mc_rigid_art":</span> <span class="null">null</span>,
                <span class="key">"mc_calmed_dific":</span> <span class="null">null</span>,
                <span class="key">"mc_equimosis":</span> <span class="null">null</span>,
                <span class="key">"mc_notas":</span> <span class="string">""</span>,
                <span class="key">"rb_ds":</span> <span class="string">"dur_ld"</span>,
                <span class="key">"dur_sin":</span> <span class="string">"3"</span>,
                <span class="key">"ml_caida_pies":</span> <span class="string">"1"</span>,
                <span class="key">"ml_caida_altura":</span> <span class="string">"1"</span>,
                <span class="key">"ml_acc_deport":</span> <span class="null">null</span>,
                <span class="key">"ml_acc_trans":</span> <span class="null">null</span>,
                <span class="key">"ml_arroll":</span> <span class="null">null</span>,
                <span class="key">"ml_acc_inesp":</span> <span class="null">null</span>,
                <span class="key">"ml_cont_musc_br":</span> <span class="null">null</span>,
                <span class="key">"ml_tracon":</span> <span class="null">null</span>,
                <span class="key">"ml_tracor":</span> <span class="null">null</span>,
                <span class="key">"ml_traind":</span> <span class="null">null</span>,
                <span class="key">"ml_rot_forzada":</span> <span class="null">null</span>,
                <span class="key">"ml_hipex":</span> <span class="null">null</span>,
                <span class="key">"ml_otros":</span> <span class="string">""</span>,
                <span class="key">"ra_flexion":</span> <span class="string">"54"</span>,
                <span class="key">"ra_extension":</span> <span class="string">"46"</span>,
                <span class="key">"ra_rotin":</span> <span class="string">"18"</span>,
                <span class="key">"ra_rotex":</span> <span class="string">"20"</span>,
                <span class="key">"ra_abduc":</span> <span class="string">"20"</span>,
                <span class="key">"ra_aduc":</span> <span class="string">"36"</span>,
                <span class="key">"rp_flexion":</span> <span class="string">"64"</span>,
                <span class="key">"rp_extension":</span> <span class="string">"66"</span>,
                <span class="key">"rp_rotin":</span> <span class="string">"20"</span>,
                <span class="key">"rp_rotex":</span> <span class="string">"18"</span>,
                <span class="key">"ins_aumento_vol":</span> <span class="string">"1"</span>,
                <span class="key">"ins_mtrendel":</span> <span class="string">"1"</span>,
                <span class="key">"ins_flogosis":</span> <span class="null">null</span>,
                <span class="key">"ins_contflex":</span> <span class="null">null</span>,
                <span class="key">"ins_flexaforz":</span> <span class="null">null</span>,
                <span class="key">"ins_hipomov":</span> <span class="string">""</span>,
                <span class="key">"x_manfilt":</span> <span class="null">null</span>,
                <span class="key">"man_trendel":</span> <span class="null">null</span>,
                <span class="key">"man_flam":</span> <span class="null">null</span>,
                <span class="key">"man_patfab":</span> <span class="null">null</span>,
                <span class="key">"man_pinz":</span> <span class="null">null</span>,
                <span class="key">"man_tdeslab":</span> <span class="null">null</span>,
                <span class="key">"man_thomas":</span> <span class="null">null</span>,
                <span class="key">"man_ober":</span> <span class="null">null</span>,
                <span class="key">"man_piriforme":</span> <span class="null">null</span>,
                <span class="key">"man_fulcro":</span> <span class="null">null</span>,
                <span class="key">"man_metcraig":</span> <span class="string">""</span>,
                <span class="key">"man_otros":</span> <span class="string">""</span>,
                <span class="key">"pal_medmcv_izq":</span> <span class="string">"6"</span>,
                <span class="key">"pal_medmcv_der":</span> <span class="string">"24"</span>,
                <span class="key">"pal_medmca_izq":</span> <span class="string">"38"</span>,
                <span class="key">"pal_medmca_der":</span> <span class="string">"54"</span>,
                <span class="key">"pal_rorebit":</span> <span class="null">null</span>,
                <span class="key">"pal_roreprof":</span> <span class="null">null</span>,
                <span class="key">"pal_tromayor":</span> <span class="string">""</span>,
                <span class="key">"pal_tenglumed":</span> <span class="string">""</span>,
                <span class="key">"pal_isquiotib":</span> <span class="string">""</span>,
                <span class="key">"pal_bit":</span> <span class="string">""</span>,
                <span class="key">"pal_isquion":</span> <span class="string">""</span>,
                <span class="key">"pal_distpel":</span> <span class="string">"1"</span>,
                <span class="key">"pal_aproxpel":</span> <span class="string">"1"</span>,
                <span class="key">"pal_tenbifem":</span> <span class="string">""</span>,
                <span class="key">"pal_masas":</span> <span class="string">""</span>,
                <span class="key">"pal_coxis":</span> <span class="string">""</span>,
                <span class="key">"pal_ingle":</span> <span class="string">""</span>,
                <span class="key">"ef_exrodilla":</span> <span class="string">""</span>,
                <span class="key">"ef_excolumbar":</span> <span class="string">""</span>,
                <span class="key">"ef_laxartexa":</span> <span class="string">"1"</span>,
                <span class="key">"ef_cadlocafe":</span> <span class="null">null</span>,
                <span class="key">"ef_neuvasla":</span> <span class="null">null</span>,
                <span class="key">"ef_fmuscular":</span> <span class="null">null</span>,
                <span class="key">"ef_exabdom":</span> <span class="string">""</span>,
                <span class="key">"ef_cadcontlat":</span> <span class="string">""</span>,
                <span class="key">"ef_sharris":</span> <span class="null">null</span>,
                <span class="key">"es_rxpel":</span> <span class="string">""</span>,
                <span class="key">"es_rxcolsa":</span> <span class="string">""</span>,
                <span class="key">"es_rxotros":</span> <span class="string">""</span>,
                <span class="key">"es_rm":</span> <span class="string">""</span>,
                <span class="key">"es_tac":</span> <span class="string">""</span>,
                <span class="key">"es_us":</span> <span class="string">""</span>,
                <span class="key">"es_emg":</span> <span class="string">""</span>,
                <span class="key">"es_labs":</span> <span class="string">""</span>,
                <span class="key">"es_otros":</span> <span class="string">""</span>,
                <span class="key">"id_hiper":</span> <span class="null">null</span>,
                <span class="key">"id_burtt":</span> <span class="null">null</span>,
                <span class="key">"id_tenglu":</span> <span class="null">null</span>,
                <span class="key">"id_bloqart":</span> <span class="null">null</span>,
                <span class="key">"id_rigart":</span> <span class="null">null</span>,
                <span class="key">"id_burisq":</span> <span class="null">null</span>,
                <span class="key">"id_lapexpro":</span> <span class="null">null</span>,
                <span class="key">"id_aveiai":</span> <span class="null">null</span>,
                <span class="key">"id_aveias":</span> <span class="null">null</span>,
                <span class="key">"id_coxasext":</span> <span class="null">null</span>,
                <span class="key">"id_coxasint":</span> <span class="null">null</span>,
                <span class="key">"id_desepicap":</span> <span class="null">null</span>,
                <span class="key">"id_coxaval":</span> <span class="null">null</span>,
                <span class="key">"id_coxavar":</span> <span class="null">null</span>,
                <span class="key">"id_artsep":</span> <span class="null">null</span>,
                <span class="key">"id_fracad":</span> <span class="null">null</span>,
                <span class="key">"id_fracetab":</span> <span class="null">null</span>,
                <span class="key">"id_luxacad":</span> <span class="null">null</span>,
                <span class="key">"id_partfem":</span> <span class="null">null</span>,
                <span class="key">"id_coxamag":</span> <span class="null">null</span>,
                <span class="key">"id_osteocad":</span> <span class="null">null</span>,
                <span class="key">"id_sinpiri":</span> <span class="null">null</span>,
                <span class="key">"id_pintcam":</span> <span class="null">null</span>,
                <span class="key">"id_pintpin":</span> <span class="null">null</span>,
                <span class="key">"id_pintmix":</span> <span class="null">null</span>,
                <span class="key">"id_labace":</span> <span class="null">null</span>,
                <span class="key">"id_sacro":</span> <span class="null">null</span>,
                <span class="key">"id_merpar":</span> <span class="null">null</span>,
                <span class="key">"id_afasepcp":</span> <span class="null">null</span>,
                <span class="key">"id_afsepcp":</span> <span class="null">null</span>,
                <span class="key">"id_cadbal":</span> <span class="null">null</span>,
                <span class="key">"id_sindolreg":</span> <span class="null">null</span>,
                <span class="key">"id_patreuma":</span> <span class="null">null</span>,
                <span class="key">"id_dolref":</span> <span class="null">null</span>,
                <span class="key">"id_dolneuro":</span> <span class="null">null</span>,
                <span class="key">"id_dolines":</span> <span class="null">null</span>,
                <span class="key">"id_dolpsico":</span> <span class="null">null</span>,
                <span class="key">"id_tumpblan":</span> <span class="null">null</span>,
                <span class="key">"id_tumos":</span> <span class="null">null</span>,
                <span class="key">"id_leggcp":</span> <span class="null">null</span>,
                <span class="key">"id_herfem":</span> <span class="null">null</span>,
                <span class="key">"id_hering":</span> <span class="null">null</span>,
                <span class="key">"id_pubal":</span> <span class="null">null</span>,
                <span class="key">"id_lining":</span> <span class="null">null</span>,
                <span class="key">"id_otros":</span> <span class="string">""</span>,
                <span class="key">"x_pl_rx":</span> <span class="string">"1"</span>,
                <span class="key">"rx_poacp":</span> <span class="null">null</span>,
                <span class="key">"rx_rana":</span> <span class="string">"1"</span>,
                <span class="key">"rx_lateral":</span> <span class="string">"1"</span>,
                <span class="key">"rx_protent":</span> <span class="null">null</span>,
                <span class="key">"rx_proysal":</span> <span class="null">null</span>,
                <span class="key">"rx_falobli":</span> <span class="null">null</span>,
                <span class="key">"rx_judet":</span> <span class="null">null</span>,
                <span class="key">"pl_rm":</span> <span class="null">null</span>,
                <span class="key">"pl_artrorm":</span> <span class="null">null</span>,
                <span class="key">"pl_tac":</span> <span class="string">"1"</span>,
                <span class="key">"pl_tac3d":</span> <span class="null">null</span>,
                <span class="key">"pl_ecopbland":</span> <span class="null">null</span>,
                <span class="key">"pl_ecoart":</span> <span class="string">"1"</span>,
                <span class="key">"pl_dopven":</span> <span class="null">null</span>,
                <span class="key">"pl_ecodupva":</span> <span class="null">null</span>,
                <span class="key">"pl_emg":</span> <span class="null">null</span>,
                <span class="key">"pl_gamgra":</span> <span class="string">""</span>,
                <span class="key">"pl_labs":</span> <span class="null">null</span>,
                <span class="key">"pl_otros":</span> <span class="null">null</span>,
                <span class="key">"lab_perfil20":</span> <span class="null">null</span>,
                <span class="key">"lab_perfilpo":</span> <span class="null">null</span>,
                <span class="key">"lab_reuma":</span> <span class="null">null</span>,
                <span class="key">"lab_tiroid":</span> <span class="null">null</span>,
                <span class="key">"lab_hemat":</span> <span class="null">null</span>,
                <span class="key">"lab_qsang":</span> <span class="null">null</span>,
                <span class="key">"lab_phepat":</span> <span class="null">null</span>,
                <span class="key">"lab_ptpttinr":</span> <span class="null">null</span>,
                <span class="key">"lab_pcr":</span> <span class="null">null</span>,
                <span class="key">"lab_vsg":</span> <span class="null">null</span>,
                <span class="key">"lab_hba1c":</span> <span class="null">null</span>,
                <span class="key">"lab_fta":</span> <span class="null">null</span>,
                <span class="key">"lab_otros":</span> <span class="null">null</span>,
                <span class="key">"ref_rehab":</span> <span class="string">"1"</span>,
                <span class="key">"ref_reuma":</span> <span class="string">"1"</span>,
                <span class="key">"ref_cirgen":</span> <span class="null">null</span>,
                <span class="key">"ref_endoc":</span> <span class="null">null</span>,
                <span class="key">"ref_ciresp":</span> <span class="null">null</span>,
                <span class="key">"ref_dr":</span> <span class="string">""</span>,
                <span class="key">"ref_preoper":</span> <span class="string">""</span>,
                <span class="key">"ref_otros":</span> <span class="string">""</span>,
                <span class="key">"pro_atrocen":</span> <span class="string">""</span>,
                <span class="key">"pro_infiltra":</span> <span class="null">null</span>,
                <span class="key">"pro_anesloc":</span> <span class="string">"1"</span>,
                <span class="key">"pro_ester":</span> <span class="null">null</span>,
                <span class="key">"pro_visco":</span> <span class="null">null</span>,
                <span class="key">"pro_plaspl":</span> <span class="null">null</span>,
                <span class="key">"pro_notas":</span> <span class="string">""</span>,
                <span class="key">"cir_atroc":</span> <span class="string">"1"</span>,
                <span class="key">"cir_hartplas":</span> <span class="string">"1"</span>,
                <span class="key">"cir_atrop":</span> <span class="null">null</span>,
                <span class="key">"cir_notas":</span> <span class="string">""</span>,
                <span class="key">"nombre_frm":</span> <span class="string">"frm_cadera_adulto"</span>
            }
        ],
        [
        	{
                <span class="key">"idForm":</span> <span class="string">"36"</span>,
                <span class="key">"idPaciente":</span> <span class="string">"80"</span>,
                <span class="key">"idUsuario":</span> <span class="string">"1"</span>,
                <span class="key">"fecha_c":</span> <span class="null">null</span>,
                <span class="key">"fecha_r":</span> <span class="string">"2016-04-01 16:02:23"</span>,
                <span class="key">"lado":</span> <span class="null">null</span>,
                <span class="key">"mc_traumatismo":</span> <span class="string">"1"</span>,
                <span class="key">"dolor":</span> <span class="null">null</span>,
                <span class="key">"dol_sitio":</span> <span class="string">""</span>,
                <span class="key">"dol_inidesencad":</span> <span class="string">""</span>,
                <span class="key">"dol_cartipo":</span> <span class="string">""</span>,
                <span class="key">"dol_irrad":</span> <span class="string">""</span>,
                <span class="key">"dol_asoc":</span> <span class="string">""</span>,
                <span class="key">"dol_tha":</span> <span class="string">""</span>,
                <span class="key">"dol_exa":</span> <span class="string">""</span>,
                <span class="key">"dol_aten":</span> <span class="string">""</span>,
                <span class="key">"dol_sever":</span> <span class="string">""</span>,
                <span class="key">"mc_aumento_vol":</span> <span class="string">"1"</span>,
                <span class="key">"mc_deformidad":</span> <span class="null">null</span>,
                <span class="key">"mc_mareos":</span> <span class="null">null</span>,
                <span class="key">"mc_nauseas":</span> <span class="null">null</span>,
                <span class="key">"mc_desmayo":</span> <span class="null">null</span>,
                <span class="key">"mc_rigid_art":</span> <span class="null">null</span>,
                <span class="key">"mc_notas":</span> <span class="string">""</span>,
                <span class="key">"rb_ds":</span> <span class="string">"dur_ld"</span>,
                <span class="key">"dur_sin":</span> <span class="string">""</span>,
                <span class="key">"ml_caida_pies":</span> <span class="null">null</span>,
                <span class="key">"ml_caida_altura":</span> <span class="null">null</span>,
                <span class="key">"ml_tracor":</span> <span class="string">"1"</span>,
                <span class="key">"ml_acc_deport":</span> <span class="null">null</span>,
                <span class="key">"ml_acc_trans":</span> <span class="string">"1"</span>,
                <span class="key">"ml_acc_inesp":</span> <span class="null">null</span>,
                <span class="key">"ml_arroll":</span> <span class="null">null</span>,
                <span class="key">"ml_rot_forzada":</span> <span class="null">null</span>,
                <span class="key">"ml_hipex":</span> <span class="null">null</span>,
                <span class="key">"ml_insidioso":</span> <span class="null">null</span>,
                <span class="key">"ml_otros":</span> <span class="string">""</span>,
                <span class="key">"ra_flexion":</span> <span class="string">""</span>,
                <span class="key">"ra_extension":</span> <span class="string">""</span>,
                <span class="key">"ra_rotder":</span> <span class="string">""</span>,
                <span class="key">"ra_rotizq":</span> <span class="string">""</span>,
                <span class="key">"ra_latder":</span> <span class="string">""</span>,
                <span class="key">"ra_latizq":</span> <span class="string">""</span>,
                <span class="key">"rp_flexion":</span> <span class="string">""</span>,
                <span class="key">"rp_extension":</span> <span class="string">""</span>,
                <span class="key">"rp_rotder":</span> <span class="string">""</span>,
                <span class="key">"rp_rotizq":</span> <span class="string">""</span>,
                <span class="key">"rp_latder":</span> <span class="string">""</span>,
                <span class="key">"rp_latizq":</span> <span class="string">""</span>,
                <span class="key">"ins_avol":</span> <span class="null">null</span>,
                <span class="key">"ins_edema":</span> <span class="string">""</span>,
                <span class="key">"ins_masas":</span> <span class="string">""</span>,
                <span class="key">"ins_deform":</span> <span class="string">""</span>,
                <span class="key">"ins_aumtmusc":</span> <span class="null">null</span>,
                <span class="key">"ins_notas":</span> <span class="string">""</span>,
                <span class="key">"x_man_filt":</span> <span class="null">null</span>,
                <span class="key">"man_distr":</span> <span class="null">null</span>,
                <span class="key">"man_mbakder":</span> <span class="null">null</span>,
                <span class="key">"man_mbakizq":</span> <span class="null">null</span>,
                <span class="key">"man_ebakder":</span> <span class="null">null</span>,
                <span class="key">"man_ebakizq":</span> <span class="null">null</span>,
                <span class="key">"man_adsonder":</span> <span class="null">null</span>,
                <span class="key">"man_adsonizq":</span> <span class="null">null</span>,
                <span class="key">"man_halder":</span> <span class="null">null</span>,
                <span class="key">"man_halizq":</span> <span class="null">null</span>,
                <span class="key">"man_lheder":</span> <span class="null">null</span>,
                <span class="key">"man_lheizq":</span> <span class="null">null</span>,
                <span class="key">"man_romder":</span> <span class="null">null</span>,
                <span class="key">"man_romizq":</span> <span class="null">null</span>,
                <span class="key">"man_spuder":</span> <span class="null">null</span>,
                <span class="key">"man_spuizq":</span> <span class="null">null</span>,
                <span class="key">"man_rspuder":</span> <span class="null">null</span>,
                <span class="key">"man_rspuizq":</span> <span class="null">null</span>,
                <span class="key">"man_jackder":</span> <span class="null">null</span>,
                <span class="key">"man_jackizq":</span> <span class="null">null</span>,
                <span class="key">"man_bikder":</span> <span class="null">null</span>,
                <span class="key">"man_bikizq":</span> <span class="null">null</span>,
                <span class="key">"man_dnder":</span> <span class="null">null</span>,
                <span class="key">"man_dnizq":</span> <span class="null">null</span>,
                <span class="key">"man_otros":</span> <span class="string">""</span>,
                <span class="key">"pal_lmedia":</span> <span class="string">""</span>,
                <span class="key">"pal_procapes":</span> <span class="string">""</span>,
                <span class="key">"pal_parver":</span> <span class="null">null</span>,
                <span class="key">"pal_coltor":</span> <span class="null">null</span>,
                <span class="key">"pal_masder":</span> <span class="null">null</span>,
                <span class="key">"pal_masizq":</span> <span class="null">null</span>,
                <span class="key">"pal_ecmder":</span> <span class="null">null</span>,
                <span class="key">"pal_ecmizq":</span> <span class="null">null</span>,
                <span class="key">"pal_acromder":</span> <span class="null">null</span>,
                <span class="key">"pal_acromizq":</span> <span class="null">null</span>,
                <span class="key">"pal_espescder":</span> <span class="null">null</span>,
                <span class="key">"pal_espescizq":</span> <span class="null">null</span>,
                <span class="key">"pal_escader":</span> <span class="null">null</span>,
                <span class="key">"pal_escaizq":</span> <span class="null">null</span>,
                <span class="key">"pal_clavder":</span> <span class="null">null</span>,
                <span class="key">"pal_clavizq":</span> <span class="null">null</span>,
                <span class="key">"pal_paroder":</span> <span class="null">null</span>,
                <span class="key">"pal_paroizq":</span> <span class="null">null</span>,
                <span class="key">"pal_parverder":</span> <span class="null">null</span>,
                <span class="key">"pal_parverizq":</span> <span class="null">null</span>,
                <span class="key">"pal_atmder":</span> <span class="null">null</span>,
                <span class="key">"pal_atmizq":</span> <span class="null">null</span>,
                <span class="key">"pal_notas":</span> <span class="string">""</span>,
                <span class="key">"rfi_braq":</span> <span class="null">null</span>,
                <span class="key">"rfi_trici":</span> <span class="null">null</span>,
                <span class="key">"rfi_estilo":</span> <span class="null">null</span>,
                <span class="key">"emsi_axilar":</span> <span class="null">null</span>,
                <span class="key">"emsi_muscutan":</span> <span class="null">null</span>,
                <span class="key">"emsi_rad":</span> <span class="null">null</span>,
                <span class="key">"emsi_ulnar":</span> <span class="null">null</span>,
                <span class="key">"emsi_media":</span> <span class="null">null</span>,
                <span class="key">"emsi_circun":</span> <span class="null">null</span>,
                <span class="key">"emsi_braqci":</span> <span class="null">null</span>,
                <span class="key">"emsi_plexcersup":</span> <span class="null">null</span>,
                <span class="key">"emsi_cutmedant":</span> <span class="null">null</span>,
                <span class="key">"emsi_cutmedb":</span> <span class="null">null</span>,
                <span class="key">"emsi_accbraqcutin":</span> <span class="null">null</span>,
                <span class="key">"dtic_c2":</span> <span class="null">null</span>,
                <span class="key">"dtic_c3":</span> <span class="null">null</span>,
                <span class="key">"dtic_c4":</span> <span class="null">null</span>,
                <span class="key">"dtic_c5":</span> <span class="null">null</span>,
                <span class="key">"dtic_c6":</span> <span class="null">null</span>,
                <span class="key">"dtic_c7":</span> <span class="null">null</span>,
                <span class="key">"dtic_c8":</span> <span class="null">null</span>,
                <span class="key">"dtic_t1":</span> <span class="null">null</span>,
                <span class="key">"rfi_elevhc4":</span> <span class="null">null</span>,
                <span class="key">"rfi_abdhc5":</span> <span class="null">null</span>,
                <span class="key">"rfi_extmunc6":</span> <span class="null">null</span>,
                <span class="key">"rfi_flexmunc7":</span> <span class="null">null</span>,
                <span class="key">"rfi_extpulc8":</span> <span class="null">null</span>,
                <span class="key">"rfi_intmat1":</span> <span class="null">null</span>,
                <span class="key">"rfi_notas":</span> <span class="string">""</span>,
                <span class="key">"rfd_braq":</span> <span class="null">null</span>,
                <span class="key">"rfd_trici":</span> <span class="null">null</span>,
                <span class="key">"rfd_estilo":</span> <span class="null">null</span>,
                <span class="key">"emsd_axilar":</span> <span class="null">null</span>,
                <span class="key">"emsd_muscutan":</span> <span class="null">null</span>,
                <span class="key">"emsd_rad":</span> <span class="null">null</span>,
                <span class="key">"emsd_ulnar":</span> <span class="null">null</span>,
                <span class="key">"emsd_media":</span> <span class="null">null</span>,
                <span class="key">"emsd_circun":</span> <span class="null">null</span>,
                <span class="key">"emsd_braqci":</span> <span class="null">null</span>,
                <span class="key">"emsd_plexcersup":</span> <span class="null">null</span>,
                <span class="key">"emsd_cutmedant":</span> <span class="null">null</span>,
                <span class="key">"emsd_cutmedb":</span> <span class="null">null</span>,
                <span class="key">"emsd_accbraqcutin":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c2":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c3":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c4":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c5":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c6":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c7":</span> <span class="null">null</span>,
                <span class="key">"dtdc_c8":</span> <span class="null">null</span>,
                <span class="key">"dtdc_t1":</span> <span class="null">null</span>,
                <span class="key">"rfd_elevhc4":</span> <span class="null">null</span>,
                <span class="key">"rfd_abdhc5":</span> <span class="null">null</span>,
                <span class="key">"rfd_extmunc6":</span> <span class="null">null</span>,
                <span class="key">"rfd_flexmunc7":</span> <span class="null">null</span>,
                <span class="key">"rfd_extpulc8":</span> <span class="null">null</span>,
                <span class="key">"rfd_intmat1":</span> <span class="null">null</span>,
                <span class="key">"rfd_notas":</span> <span class="string">""</span>,
                <span class="key">"ef_hombro":</span> <span class="string">""</span>,
                <span class="key">"ef_coltorlum":</span> <span class="string">""</span>,
                <span class="key">"cadcinafe":</span> <span class="string">""</span>,
                <span class="key">"marcha":</span> <span class="string">""</span>,
                <span class="key">"es_rx":</span> <span class="string">""</span>,
                <span class="key">"es_rm":</span> <span class="string">""</span>,
                <span class="key">"es_tac":</span> <span class="string">""</span>,
                <span class="key">"es_us":</span> <span class="string">""</span>,
                <span class="key">"es_emg":</span> <span class="string">""</span>,
                <span class="key">"es_ang":</span> <span class="string">""</span>,
                <span class="key">"es_labs":</span> <span class="string">""</span>,
                <span class="key">"es_otros":</span> <span class="string">""</span>,
                <span class="key">"id_abpara":</span> <span class="null">null</span>,
                <span class="key">"id_cereti":</span> <span class="null">null</span>,
                <span class="key">"id_cermec":</span> <span class="null">null</span>,
                <span class="key">"id_cerbra":</span> <span class="null">null</span>,
                <span class="key">"id_costcer":</span> <span class="null">null</span>,
                <span class="key">"id_escol":</span> <span class="null">null</span>,
                <span class="key">"id_escolid":</span> <span class="null">null</span>,
                <span class="key">"id_escolcong":</span> <span class="null">null</span>,
                <span class="key">"id_escolneumu":</span> <span class="null">null</span>,
                <span class="key">"id_espodilanq":</span> <span class="null">null</span>,
                <span class="key">"id_espondilart":</span> <span class="null">null</span>,
                <span class="key">"id_espolisniv":</span> <span class="string">""</span>,
                <span class="key">"id_esplisis":</span> <span class="null">null</span>,
                <span class="key">"id_esplosis":</span> <span class="null">null</span>,
                <span class="key">"id_estartv":</span> <span class="null">null</span>,
                <span class="key">"id_estraq":</span> <span class="null">null</span>,
                <span class="key">"id_extdisniv":</span> <span class="string">""</span>,
                <span class="key">"id_fracacvn":</span> <span class="string">""</span>,
                <span class="key">"id_fraodo":</span> <span class="null">null</span>,
                <span class="key">"id_herdniv":</span> <span class="string">""</span>,
                <span class="key">"id_lmedesp":</span> <span class="null">null</span>,
                <span class="key">"id_lneumsup":</span> <span class="null">null</span>,
                <span class="key">"id_lneuminf":</span> <span class="null">null</span>,
                <span class="key">"id_lpbrader":</span> <span class="null">null</span>,
                <span class="key">"id_lpbraizq":</span> <span class="null">null</span>,
                <span class="key">"id_luxatoc":</span> <span class="null">null</span>,
                <span class="key">"id_mielcer":</span> <span class="null">null</span>,
                <span class="key">"id_ostver":</span> <span class="null">null</span>,
                <span class="key">"id_parot":</span> <span class="null">null</span>,
                <span class="key">"id_radcerniv":</span> <span class="string">""</span>,
                <span class="key">"id_rectcerv":</span> <span class="null">null</span>,
                <span class="key">"id_sinlat":</span> <span class="null">null</span>,
                <span class="key">"id_sinsaltor":</span> <span class="null">null</span>,
                <span class="key">"id_sinfacniv":</span> <span class="string">""</span>,
                <span class="key">"id_sinkf":</span> <span class="null">null</span>,
                <span class="key">"id_torti":</span> <span class="null">null</span>,
                <span class="key">"id_torticong":</span> <span class="null">null</span>,
                <span class="key">"id_otros":</span> <span class="string">""</span>,
                <span class="key">"x_pl_rx":</span> <span class="null">null</span>,
                <span class="key">"rx_ap":</span> <span class="null">null</span>,
                <span class="key">"rx_lat":</span> <span class="null">null</span>,
                <span class="key">"rx_din":</span> <span class="null">null</span>,
                <span class="key">"rx_oblic":</span> <span class="null">null</span>,
                <span class="key">"pl_rm":</span> <span class="null">null</span>,
                <span class="key">"pl_tac":</span> <span class="null">null</span>,
                <span class="key">"pl_tac3d":</span> <span class="null">null</span>,
                <span class="key">"pl_us":</span> <span class="null">null</span>,
                <span class="key">"pl_emgmsss":</span> <span class="null">null</span>,
                <span class="key">"pl_angicerv":</span> <span class="null">null</span>,
                <span class="key">"pl_angicere":</span> <span class="null">null</span>,
                <span class="key">"pl_labs":</span> <span class="null">null</span>,
                <span class="key">"pl_otros":</span> <span class="null">null</span>,
                <span class="key">"lab_perfil20":</span> <span class="null">null</span>,
                <span class="key">"lab_perfilpo":</span> <span class="null">null</span>,
                <span class="key">"lab_reuma":</span> <span class="null">null</span>,
                <span class="key">"lab_tiroid":</span> <span class="null">null</span>,
                <span class="key">"lab_hemat":</span> <span class="null">null</span>,
                <span class="key">"lab_qsang":</span> <span class="null">null</span>,
                <span class="key">"lab_phepat":</span> <span class="null">null</span>,
                <span class="key">"lab_ptpttinr":</span> <span class="null">null</span>,
                <span class="key">"lab_pcr":</span> <span class="null">null</span>,
                <span class="key">"lab_vsg":</span> <span class="null">null</span>,
                <span class="key">"lab_hba1c":</span> <span class="null">null</span>,
                <span class="key">"lab_fta":</span> <span class="null">null</span>,
                <span class="key">"lab_otros":</span> <span class="null">null</span>,
                <span class="key">"ref_rehab":</span> <span class="null">null</span>,
                <span class="key">"ref_reuma":</span> <span class="null">null</span>,
                <span class="key">"ref_endoc":</span> <span class="null">null</span>,
                <span class="key">"ref_neuro":</span> <span class="null">null</span>,
                <span class="key">"ref_dr":</span> <span class="string">""</span>,
                <span class="key">"ref_preoper":</span> <span class="string">""</span>,
                <span class="key">"ref_otros":</span> <span class="string">""</span>,
                <span class="key">"pro_infiltra":</span> <span class="null">null</span>,
                <span class="key">"pro_anesloc":</span> <span class="null">null</span>,
                <span class="key">"pro_ester":</span> <span class="null">null</span>,
                <span class="key">"pro_notas":</span> <span class="string">""</span>,
                <span class="key">"cir_artro":</span> <span class="null">null</span>,
                <span class="key">"cir_artroplas":</span> <span class="null">null</span>,
                <span class="key">"cir_notas":</span> <span class="string">""</span>,
                <span class="key">"nombre_frm":</span> <span class="string">"frm_columna_cervical"</span>
    		}
    	]
    ],
    <span class="key">"mensaje":</span> <span class="string">"Datos encontrados"</span>
    }</pre>	
                                                </div>
                                            </div><!-- /.ITEM SERVICIO -->   
                                    	
                                        </div>
                                    <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row"></div>
		</div>
      </div>
    </div>
    <!-- /#wrapper -->

    

</body>

</html>
<?php include_once( "../analyticstracking.php" ) ?>