
<h4>Lista de Pacientes</h4>
<div class="form-group">
<?php
$parametos_paciente = array("class"=>"btn btn-primary", "rol"=>"button");
echo anchor("paciente/nuevo_paciente", "Nuevo Paciente", $parametos_paciente); 
?>
</div>
<div class="form-group">
	<?php
	$atributos = array("class"=>"form-inline", "rol"=>"form"); 
	echo form_open('paciente/consultar_paciente', $atributos);
	?>
	  	<div class="form-group">
	    	<label class="sr-only" for="buscar">Buscar</label>
	    	<input type="text" class="form-control" placeholder="Buscar" name="buscar">
	  	</div>
	  	<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<?php
if($pacientes->num_rows() > 0){
	?>
	<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>IDENTIFICACION</th>
				<th>PRIMER NOMBRE</th>
				<th>SEGUNDO NOMBRE</th>
				<th>PRIMER APELLIDO</th>
				<th>SEGUNDO APELLIDO</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach ($pacientes->result() as $info_paciente) {
		echo "<tr>";
		echo "<td>".$info_paciente->pacidenti."</td>";
		echo "<td>".$info_paciente->pacnombr1."</td>";
		echo "<td>".$info_paciente->pacnombr2."</td>";
		echo "<td>".$info_paciente->pacapell1."</td>";
		echo "<td>".$info_paciente->pacapell2."</td>";
		echo "<td>"."</td>";
		echo "</tr>";
	}
}
?>
		</tbody>
	</table>
</div>