<?php 
$atributos_formulario = array('class'=>'form-horizontal', 'rol'=>'form');
echo form_open('rol/nuevo_rol', $atributos_formulario);
?>
  <div class="form-group">
    <label for="rol" class="col-sm-2 control-label">Descripción de Rol</label>
    <div class="col-sm-10">
    	<?php
    	$atributos_rol = array(
    		'class'=>'form-control',
    		'placeholder'=>'Rol',
    		'name'=>'rol',
    		'value'=>set_value('rol')
    		);
    	echo form_input($atributos_rol);
    	?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Guardar</button>
    </div>
  </div>
</form>