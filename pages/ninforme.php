<?php 
	session_start();
	ini_set( 'display_errors', 1 );
	include( "../bd/data-usuario.php" );
	checkSession( "" );
	include( "../bd/data-forms.php" );
	include( "../bd/data-campos.php" );
	include( "../bd/data-informe.php" );
	include( "../bd/data-paciente.php" );
	$nform = $_GET["nf"];
	
	if( isset( $_GET["nf"] ) && isset( $_GET["f"] ) && ( $_GET["f"] != "" ) ){
		if( esParamFormValido( $_GET["nf"], $tforms ) == true )
			$nform = $_GET["nf"];
		else
			$nform = NULL;
			
		$idf = $_GET["f"];
	} else header('Location: index.php');
	
	$informe = informeRegistrado( $dbh, $idf, $nform );	//Si ya hay un registro del informe, se redirige para visualizarlo
	if( $informe["reg"] == true ){
		$lnk = "informe.php?nf=".$nform."&f=".$idf;
		echo "<script>window.location.href='$lnk'</script>";	
	}
?>
<!DOCTYPE html>
<style>
	div.cke_pagebreak{ border:0 !important; }
</style>
<html lang="es">
	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/locales/bootstrap-datepicker.es.js"></script>
    <script src="../js/bootstrapValidator.min.js"></script>
	<!--<script src="../js/jquery.cleditor.js"></script>-->
    <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    <script src="../js/setup.js"></script>
    <script src="../js/bootstrap-tagsinput.js"></script>
    <script>
    	$(document).ready(function(){
			$("#lista_correo_aenviar").hide();
			$("#semail").click(function(){
				$("#lista_correo_aenviar").toggle(200);
			});
		});
    </script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="../css/ihstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-tagsinput.css">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interhistorias - Informe autogenerado</title>
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
</head>
<?php 
	if( isset( $_SESSION["user"] ) ){
		$druser = $_SESSION["user"];
	}
	$form = obtenerRegistroForm( $dbh, $idf, $nform );
	
	if( $form ){
		$dfile = obtenerArchivoInforme( $nform );
		include( "../bd/".$dfile["file"] );
		$keys = filtrarCamposNumericos( array_keys( $form ) );
		//prnt_frm_keys( filtrarCamposNumericos( $keys ) );
		$fecha = obtenerFechaConFormato($dbh, $form["fecha_r"], "%d/%m/%Y");	//Función en bd.php
		$dp = obtenerPacienteId( $dbh, $form["idPaciente"] );
		$motivo = motivo( $dfile["nombre"], $form, $keys, $dfile["fld_arr"] ); $tdur = tiempo( $form );
		$causas = mlesion( $form, $keys, $dfile["fld_arr"] );
		$efisico = elemSecForms( "exfisico", $form, $keys, $dfile["fld_arr"] );
		$studios = estudios( $form, $keys, $dfile["fld_arr"] );
		$ridx = elemFormRefId( "id", $form, $keys, $dfile["fld_arr"], $dfile["nombre"] );
		$idx = elemSecForms( "idx", $form, $keys, $dfile["fld_arr"], "ref" );
		$referencias = elemsRef( $form, $keys, $dfile["fld_arr"] );
		$plan = plan( $form, $keys, $dfile["fld_arr"] );
	}
?>
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
                <a class="navbar-brand" href="index.php" style="padding:7px; position:absolute; z-index:9;">
                <img src="../img/logo.png" width="165" height="58"></a>
            </div>
            <!-- /.navbar-header -->
			<?php include( "navbar-header.php" ); ?>
            <!-- /.navbar-top-links -->
            <?php include( "imenu.php" ); ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="title"></span></h1>
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	<div class="panel-heading">Registrar informe</div>
                        <div id="fdata_paciente" class="panel-body">
                            <div class="row">
                                <form role="form" id="form_informe" method="post" action="../bd/data-informe.php">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="hidden" name="idu" value="<?php echo $druser["idUsuario"];?>">
                                        <input type="hidden" name="emailu" value="<?php echo $druser["email"];?>">
                                        <input type="hidden" name="idf" value="<?php echo $idf;?>">
                                        <input type="hidden" name="fecha" value="<?php echo $fecha;?>">
                                        <input type="hidden" name="idp" value="<?php echo $form["idPaciente"];?>">
                                        <input type="hidden" name="nform" value="<?php echo $nform;?>">
                                        <textarea id="input1" name="input1" style="font-family:courier new,courier,monospace;">
                                    		<div style="font-family:courier new,courier,monospace;">
												<?php if( $form ){?>
                                                <!-- ---------------------------------------------- Encabezado --------------------------------------------- -->
												<?php echo "Caracas, ".$fecha; ?><br>Identificación<br>
                                                <?php echo $dp["nombre"]." ".$dp["apellido"]; ?><br>
                                                <?php echo $dp["cedula"]; ?><br><br>
                                                <!-- --------------------------------------------- Introducción -------------------------------------------- -->
                                                <div align="center">
                                                	<span style="text-decoration: underline; margin:0 auto;"><b>Informe Médico</b></span>
                                                </div><br>
                                                <?php echo "Paciente ".$dp["sexo"]." de ".$dp["edad"]." años"; ?> 
                                                de edad quien acude a esta consulta presentando <?php echo $motivo; ?>
												<?php echo $tdur; ?>, posterior a <?php echo $causas; ?>
                                    			<!-- --------------------------------------------- Examen físico ------------------------------------------- -->
                                                <div style="margin: 0 0 0 40px;"><b>Al examen físico</b></div>
                                    			<div style="margin: 0 0 0 50px;"><?php echo $efisico;?></div>
                                                <?php if( $studios != "" ){?>
                                    			<div style="margin: 0 0 0 40px;">
                                                	<div><b>Trae estudios</b></div>
                                                </div>
                                                <div style="margin: 0 0 0 50px;"><?php echo $studios;?></div>
                                                <?php } ?>
                                                <!-- ------------------------------------------------- IDX ------------------------------------------------- -->
												<?php if( $idx != "" ){?>
                                                	<br>
                                                    <div style="margin: 0 0 0 40px;"><div><b>Impresión diagnóstica</b></div></div>
                                                    <div style="margin: 0 0 0 50px;"><?php echo $idx;?></div>
                                                <?php } ?>
                                            	<!-- ------------------------------------------------- Plan ------------------------------------------------ -->
                                                <div style="margin: 0 0 0 40px;"><div><b>Plan</b></div></div>
                                            	<?php if( $plan["est"] != "" ){?>
                                                    <div style="margin: 0 0 0 50px; border: none; text-decoration:underline;">
                                                        <div>Se indican los siguientes estudios: </div></div>
                                                    <div style="margin: 0 0 0 60px;"><?php echo $plan["est"];?></div>
                                                <?php } ?>
                                                <?php if( $plan["ref"] != "" ){?>
                                                    <div style="margin: 0 0 0 50px; border: none; text-decoration:underline;">
                                                        <div>Se refiere para: </div>
                                                    </div>
                                                    <div style="margin: 0 0 0 60px;"><?php echo $plan["ref"];?></div>
                                                <?php }?>
                                                <?php if( $plan["req"] != "" ){?>
                                                    <div style="margin: 0 0 0 50px; border: none; text-decoration:underline;">
                                                        <div>Amerita: </div>
                                                    </div>
                                                    <div style="margin: 0 0 0 60px;"><?php echo $plan["req"];?></div>
                                                <?php } ?>
                                                <!-- ------------------------------------------------- Firma ----------------------------------------------- -->
                                    			<div id="firma" style="margin:40px 0 0 0;">
                                                	<div><?php echo $druser["nombre"]." ".$druser["apellido"];?></div>
                                                	<div><?php echo $druser["descripcion"];?></div>
                                                	<div> C.I.:<?php echo $druser["ci"];?></div>
                                                	<div> M.S.D.S.:<?php echo $druser["msds"];?></div>
                                                	<div> C.M.D.F.:<?php echo $druser["cmdf"];?></div>
                                    			</div>
                                            	<?php }?>
                                                <!-- ------------------------------------------------- Firma ----------------------------------------------- -->
												<?php 
													if( $form ){	
														foreach( $referencias as $eref ){ ?>
                                                    	<div class="informe_referencia">
                                                        	<?php include( "subforms/referencia.php" ) ?>	
                                                    	</div>
                                                <?php 	} 
													}
												?>
                                                <!-- ------------------------------------------------------------------------------------------------------- -->
                                            </div>
                                    	</textarea>	
                                    	<script> 
											CKEDITOR.env.isCompatible = true;
											CKEDITOR.replace( 'input1', {
												language: 'es', uiColor: '#35A2B2', height : '450px'
											});
										</script>
                                        <div class="checkbox" align="right">
                                            <label><input type="checkbox" name="enviomail" id="semail">Enviar por email</label>
                                        </div>
                                        <div class="checkbox" align="right" id="lista_correo_aenviar">
                                            <label><input type="text" name="dir_correo" data-role="tagsinput" 
                                            value="<?php echo $druser["email"];?>"></label>
                                        </div>
                                        <div style="padding:25px;" align="center">
                                            <button type="submit" class="btn btn-form">Enviar</button>
                                        </div>	
                                	</div>
                                </form>
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
<!-- /#wrapper -->
</body>
</html>
<?php include_once( "analyticstracking.php" ) ?>