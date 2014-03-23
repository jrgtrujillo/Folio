<?php
$atributos_formulario = array("class"=>"form-horizontal", "rol"=>"form");
echo form_open('user/crear_usuario', $atributos_formulario);
?>
  <div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Codigo</label>
    <div class="col-sm-10">
      <?php
      $usuario_codigo =array(
        'name' => 'codigo',
        'class'=> 'form-control',
        'placeholder' => 'Codigo',
        'required' => '',
        'autofocus'=>'',
        'value'=>set_value('codigo'),
        );
      echo form_input($usuario_codigo);
      ?>
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
        'value'=>set_value('nombre'),
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
        'value'=>set_value('cargo'),
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
        'required' => '',
        'value'=>set_value('password'),
        );
      echo form_password($usuario_password);
      ?>
    </div>
  </div>
    <?php echo form_error('password', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
    <div class="form-group">
    <label for="repassword" class="col-sm-2 control-label">Confirmar Contrase&ntilde;a</label>
    <div class="col-sm-10">
      <?php
      $usuario_repassword =array(
        'name' => 'repassword',
        'class'=> 'form-control',
        'placeholder' => 'Confirmar Contraseña',
        'required' => '',
        'value'=>set_value('repassword'),
        );
      echo form_password($usuario_repassword);
      ?>
    </div>
  </div>
    <?php echo form_error('repassword', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
  <div class="form-group">
    <label for="rol" class="col-sm-2 control-label">Rol</label>
    <div class="col-sm-10">
      <?php
        $roles = array(''=>'Seleccione una opci&oacuten');
        $tmp_rol = $this->mdl_rol->consultar_rol('');
        foreach ($tmp_rol->result() as $rol){
            $roles[$rol->rolcodigo] = $rol->roldescri;
        }
        $atributos_rol = "class='form-control' required=''";
        echo form_dropdown('rol', $roles, set_value('rol'), $atributos_rol);
              ?>
    </div>
  </div>
    <?php echo form_error('rol', '<div class="row"><p class="col-md-6 col-md-offset-3" style="color:red";>', '</p></div>'); ?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Guardar</button>
    </div>
  </div>
<?php
echo form_close();
?>
