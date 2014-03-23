<?php
$atributos_formulario = array("class"=>"form-horizontal", "rol"=>"form");
echo form_open('user/actualizar_usuario', $atributos_formulario);
foreach ($usuario->result() as $info_usuario ) {
  $codigo = $info_usuario->usucodigo;
  $nombre = $info_usuario->usunomcom;
  $cargo = $info_usuario->usudescar;
  $urol = $info_usuario->rolcodigo;
  $activo = $info_usuario->usuactivo;
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
  <?php echo form_error('codigo', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
  <div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <?php
      $usuario_nombre =array(
        'name' => 'nombre',
        'class'=> 'form-control',
        'placeholder' => 'Nombre Completo',
        'required' => '',
        'value'=>$nombre,
        );
      echo form_input($usuario_nombre);
      ?>
    </div>
  </div>
    <?php echo form_error('nombre', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
    <div class="form-group">
    <label for="cargo" class="col-sm-2 control-label">Cargo</label>
    <div class="col-sm-10">
      <?php
      $usuario_cargo =array(
        'name' => 'cargo',
        'class'=> 'form-control',
        'placeholder' => 'Descripción del Cargo',
        'required' => '',
        'value'=>$cargo,
        );
      echo form_input($usuario_cargo);
      ?>
    </div>
  </div>
    <?php echo form_error('cargo','<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contrase&ntilde;a</label>
    <div class="col-sm-10">
      <?php
      $usuario_password =array(
        'name' => 'password',
        'class'=> 'form-control',
        'placeholder' => 'Contraseña',
        );
      echo form_password($usuario_password);
      ?>
    </div>
  </div>
    <?php echo form_error('password', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
  <div class="form-group">
    <label for="rol" class="col-sm-2 control-label">Rol</label>
    <div class="col-sm-10">
      <?php
        $roles = array(''=>'Seleccione una opci&oacuten');
        $tmp_rol = $this->mdl_rol->consultar_rol('');
        foreach ($tmp_rol->result() as $rol){
            $roles[$rol->rolcodigo] = $rol->roldescri;
        }
        $atributos_rol = "class='form-control' name='rol' required=''";
        echo form_dropdown('rol', $roles, $urol, $atributos_rol);
              ?>
    </div>
  </div>
    <?php echo form_error('rol', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
  <div class="form-group">
    <label for="activo" class="col-sm-2 control-label">Acceso</label>
    <div class="col-sm-10">
      <div class="radio">
        <label>
          <input type="radio" name="activo" id="optionsRadios1" value="1" <?php if($activo==1) echo "checked"?>>
          Activo
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="activo" id="optionsRadios2" value="0" <?php if($activo==0) echo "checked"?>>
          Inactivo
        </label>
      </div>  
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Guardar</button>
    </div>
  </div>
<?php
echo form_close();
?>