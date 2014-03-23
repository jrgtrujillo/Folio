<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Plantilla Login</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/login.css" />
	</head>
	<body>
		<div id="container">
			<?php 
			$atributos = array('class' => 'form-signin', 'rol' => 'form');
			echo form_open('principal', $atributos);
			?>
			    <h2 class="form-signin-heading">Bienvenido a HC</h2>
				<input type="text" class="form-control" placeholder="Usuario" required="" autofocus="" name="user" value="<?php echo set_value('user'); ?>">
				<input type="password" class="form-control" placeholder="Contrase&ntilde;a" required="" name="password">
				<button class="btn btn-lg btn-default btn-block" type="submit">Ingresar</button>
			<?php 
			echo form_close();
			?>
		</div>
		<div class="error">
			<?php
			if(isset($error_usuario)){
					echo $error_usuario;
				}					
			echo validation_errors();
			?>
		</div>
	</body>
</html>
