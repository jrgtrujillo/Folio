
<h4>Lista de Usuarios</h4>
<div class="form-group">
<?php
$parametos_usuario = array("class"=>"btn btn-primary", "rol"=>"button");
echo anchor("user/crear_usuario", "Nuevo Usuario", $parametos_usuario); 
?>
</div>
<div class="form-group">
	<?php
	$atributos = array("class"=>"form-inline", "rol"=>"form"); 
	echo form_open('user/consultar_usuario', $atributos);
	?>
	  	<div class="form-group">
	    	<label class="sr-only" for="buscar">Buscar</label>
	    	<input type="text" class="form-control" placeholder="Buscar" name="buscar">
	  	</div>
	  	<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<?php
if($usuarios->num_rows() > 0){
	?>
	<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>CODIGO</th>
				<th>NOMBRE</th>
				<th>CARGO</th>
				<th>ROL</th>
				<th>ESTADO</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach ($usuarios->result() as $info_usuario) {
		echo "<tr>";
		echo "<td>".$info_usuario->usucodigo."</td>";
		echo "<td>".$info_usuario->usunomcom."</td>";
		echo "<td>".$info_usuario->usudescar."</td>";
		echo "<td>".$info_usuario->roldescri."</td>";
		if($info_usuario->usuactivo == 1){
			$activo = "ACTIVO";
		}else{
			$activo = "INACTIVO";
		}
		echo "<td>".$activo."</td>";
		echo "<td>".anchor('user/editar_usuario/'.$info_usuario->usucodigo,'Editar', 'class="btn btn-link"')."</td>";
		echo "</tr>";
	}
}
?>
		</tbody>
	</table>
</div>