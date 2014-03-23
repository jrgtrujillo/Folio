<?php
$atributos_formulario = array("class"=>'', "rol"=>"form");
echo form_open('paciente/nuevo_paciente', $atributos_formulario);
?>
<h4>Información del Paciente</h4>
<hr>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="identificacion">Identificaci&oacute;n</label>
			<?php
			$paciente_id = array(
				'name'=>'identificaion',
				'class'=>'form-control',
				'placeholder'=>'Identificación',
				'required'=>'',
				'autofocus'=>'',
				'value'=> set_value('identificacion'),
			);
			echo form_input($paciente_id);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="tipoid">Tipo de Identificaci&oacute;n</label>
			<div class="form-control">
				<label class="checkbox-inline">
					<?php
					$datos_rc = array(
						'name'=>'tipoid',
						'value'=>'RC',
					);
					echo form_radio($datos_rc);
					?>
					RC
				</label>
				<label class="checkbox-inline">
					<?php
					$datos_ti = array(
						'name'=>'tipoid',
						'value'=>'TI',
					);
					echo form_radio($datos_ti);
					?>
					TI
				</label>
				<label class="checkbox-inline">
					<?php
					$datos_cc = array(
						'name'=>'tipoid',
						'value'=>'CC',
					);
					echo form_radio($datos_cc);
					?>
					CC
				</label>
				<label class="checkbox-inline">
					<?php
					$datos_ce = array(
						'name'=>'tipoid',
						'value'=>'CC',
					);
					echo form_radio($datos_ce);
					?>
					CE
				</label>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre1">Primer Nombre</label>
			<?php
			$paciente_nombre1 = array(
				'name'=>'nombre1',
				'class'=>'form-control',
				'placeholder'=>'Primer Nombre',
				'required'=>'',
				'value'=> set_value('nombre1'),
			);
			echo form_input($paciente_nombre1);
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre2">Segundo Nombre</label>
			<?php
			$paciente_nombre2 = array(
				'name'=>'nombre2',
				'class'=>'form-control',
				'placeholder'=>'Segundo Nombre',
				'value'=> set_value('nombre2'),
			);
			echo form_input($paciente_nombre2);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="apellido1">Primer Apellido</label>
			<?php
			$paciente_apellido1 = array(
				'name'=>'apellido1',
				'class'=>'form-control',
				'placeholder'=>'Primer Apellido',
				'required'=>'',
				'value'=> set_value('apellido1'),
			);
			echo form_input($paciente_apellido1);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="apellido2">Segundo Apellido</label>
			<?php
			$paciente_apellido2 = array(
				'name'=>'apellido2',
				'class'=>'form-control',
				'placeholder'=>'Segundo Apellido',
				'required'=>'',
				'value'=> set_value('apellido2'),
			);
			echo form_input($paciente_apellido2);
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="tipoid">Sexo</label>
			<div class="form-control">
				<label class="checkbox-inline">
					<?php
					$datos_m = array(
						'name'=>'sexo',
						'value'=>'M',
					);
					echo form_radio($datos_m);
					?>
					Hombre
				</label>
				<label class="checkbox-inline">
					<?php
					$datos_f = array(
						'name'=>'sexo',
						'value'=>'F',
					);
					echo form_radio($datos_f);
					?>
					Mujer
				</label>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="estado_civil">Estado Civil</label>
			<?php
			$estados = array(
				''=>'Seleccione una opción',
				'1'=>'Soltero',
				'2'=>'Casado',
				'3'=>'Union Libre'
			);
			$estado_atributo = "name='estado_civil' class='form-control' required=''";
			echo form_dropdown('estdo_civil',$estados, set_value('estado_civil'), $estado_atributo);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="fnacimiento">Fecha Nacimiento</label>
			<input type="date" name="fnacimiento" class="form-control", placeholder="Fecha Nacimiento" required="" max="<?php echo mdate('%Y-%m-%d')?>">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre2">Ciudad de Nacimiento</label>
			<?php
			$ciudad_nacimiento = array(
				'name'=>'cnacimiento',
				'class'=>'form-control',
				'placeholder'=>'Ciudad Nacimiento',
				'value'=> set_value('cnacimiento'),
			);
			echo form_input($ciudad_nacimiento);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre2">Telefono</label>
			<?php
			$telefono = array(
				'name'=>'telefono',
				'class'=>'form-control',
				'placeholder'=>'Telefono',
				'value'=> set_value('telefono'),
			);
			echo form_input($telefono);
			?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre2">Direccion</label>
			<?php
			$direccion = array(
				'name'=>'direccion',
				'class'=>'form-control',
				'placeholder'=>'Direccion',
				'value'=> set_value('direccion'),
			);
			echo form_input($direccion);
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="nombre2">Ciudad Residencia</label>
			<?php
			$ciudad_residencia = array(
				'name'=>'cresidencia',
				'class'=>'form-control',
				'placeholder'=>'Ciudad Residencia',
				'value'=> set_value('cresidencia'),
			);
			echo form_input($ciudad_residencia);
			?>
		</div>
	</div>
</div>
<h4>Información Socio-Económica </h4>
<hr>
<div class="row">
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="ocupacion">Ocupación</label>
			<?php
				$ocupaciones[''] = 'Seleccione una opción';
				foreach ($lst_ocupacion->result() as $ocupacion){
						$ocupaciones[$ocupacion->ocucodigo] = $ocupacion->ocudescri;
				}
				$atributos_ocupacion = "class='form-control' required=''";
				echo form_dropdown('ocupacion', $ocupaciones, set_value('ocupacion'), $atributos_ocupacion);
							?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="entidad">Entidad</label>
			<?php
				$entidades[''] = 'Seleccione una opción';
				foreach ($lst_eps->result() as $eps){
						$entidades[$eps->epscodigo] = $eps->epsnombre;
				}
				$atributos_eps = "class='form-control' required=''";
				echo form_dropdown('entidad', $entidades, set_value('entidad'), $atributos_eps);
							?>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<div class="form-group">
			<label for="vinculado">Vinculación</label>
			<?php
				$vinculados[''] = 'Seleccione una opción';
				foreach ($lst_vinculado->result() as $vinculado){
						$vinculados[$vinculado->vincodigo] = $vinculado->vindescri;
				}
				$atributos_vinculado = "class='form-control' required=''";
				echo form_dropdown('vinculado', $vinculados, set_value('vinculado'), $atributos_vinculado);
							?>
		</div>
	</div>
</div>
  <div class="form-group">
    <div class="col-xs-6 col-sm-4">
      <button type="submit" class="btn btn-default">Guardar</button>
    </div>
  </div>
<?php echo form_close();?>
