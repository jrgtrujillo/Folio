<?php 
$atributos_formulario = array('class'=>'form-horizontal', 'rol'=>'form');
echo form_open('rol/actualizar_rol', $atributos_formulario);
foreach ($rol->result() as $info_rol) {
  $codigo = $info_rol->rolcodigo;
  $nombre = $info_rol->roldescri;
}
?>  
<div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-10">
      <?php
      echo form_hidden('codigo', $codigo);
      ?>
       <p class="form-control-static"><?php echo $codigo; ?></p>
    </div>
  </div>
  <div class="form-group">
    <label for="rol" class="col-sm-2 control-label">Descripción de Rol</label>
    <div class="col-sm-10">
    	<?php
    	$atributos_rol = array(
    		'class'=>'form-control',
    		'placeholder'=>'Rol',
    		'name'=>'rol',
    		'value'=>$nombre
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