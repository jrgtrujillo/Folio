<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Plantilla para Aplicación</title>
		<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
		<style>
			body {
				padding-top: 20px;
				padding-bottom: 20px;
			}

			.navbar {
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class ="container">
			<div class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
				  <div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">PLAHIC</a>
				  </div>
				  <div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Aplicaci&oacute;n<b class="caret"></b></a>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo base_url();?>index.php/user">Usuarios</a></li>
						  <li><a href="<?php echo base_url();?>index.php/rol">Roles</a></li>
						</ul>
					  </li>
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admisi&oacute;n <b class="caret"></b></a>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo base_url();?>index.php/paciente">Pacientes</a></li>
						  <li><a href="#">Entidades</a></li>
						</ul>
					  </li>
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Historia Clinica <b class="caret"></b></a>
						<ul class="dropdown-menu">
						  <li><a href="#">Consulta</a></li>
						  <li><a href="#">Panel Atenci&oacute;n</a></li>
						</ul>
					  </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					   <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario<b class="caret"></b></a>
						<ul class="dropdown-menu">
						  <li><a href="#">Cambiar Contrase&ntilde;a</a></li>
						  <li><a href="<?php echo base_url();?>index.php/principal/salir">Salir</a></li>
						</ul>
						</li>
					</ul>
				  </div>
				</div>
			</div>
			
			<div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title"><?php echo $titulo_panel;?></h3>
				  </div>
				  <div class="panel-body">