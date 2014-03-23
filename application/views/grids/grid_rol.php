<h4>Lista de Roles</h4>
<div class="form-group">
<?php
$parametos_rol = array("class"=>"btn btn-primary", "rol"=>"button");
echo anchor("rol/nuevo_rol", "Nuevo Rol", $parametos_rol); 
?>
</div>
<div class="form-group">
	<?php
	$atributos = array("class"=>"form-inline", "rol"=>"form"); 
	echo form_open('rol/consultar_rol', $atributos);
	?>
	  	<div class="form-group">
	    	<label class="sr-only" for="buscar">Buscar</label>
	    	<input type="text" class="form-control" placeholder="Buscar" name="buscar">
	  	</div>
	  	<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<?php
if($rol->num_rows() > 0){
	?>
	<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>CODIGO</th>
				<th>NOMBRE</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach ($rol->result() as $info_rol) {
		echo "<tr>";
		echo "<td>".$info_rol->rolcodigo."</td>";
		echo "<td>".$info_rol->roldescri."</td>";
		echo "<td>".anchor('rol/editar_rol/'.$info_rol->rolcodigo,'Editar', 'class="btn btn-link"')."</td>";
		echo "</tr>";
	}
}
?>
		</tbody>
	</table>
</div>