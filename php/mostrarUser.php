<?php
//mostrar los datos almacenados en la tabla 
header("Content-Type: text/html;charset=utf-8");
	include "conexion.php";
	$consultaSQL="Select *from max30102";
	

	//ejecutamos la consulta
	$ejecutarConsulta=$conexion->query($consultaSQL);
	//recorre los elementos de la consulta dentro de un 
	//array y almacenarlos en una variable cada fila
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tabla").DataTable();
		});
	</script>
	<?php
	echo "<table id='tabla'><thead><th>CURP</th><th>NOMBRE</th>
	<th>EDAD</th><th>SEXO</th><th>RITMO</th><th>OXIGEN</th><th>Eliminar</th></thead>";
	while ($fila=$ejecutarConsulta->fetch_array()) {
        //mostrar cada fila del array
		echo "<tr>";
		echo "<td>".$fila[1]."</td><td>".$fila[2]."</td>
		<td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td>
		<td>
		<p class='btn btn-warning' onclick='eliminar(".$fila[0].")'>
        <i class='fas fa-trash-alt'></i> Eliminar</p></td></td>";
		
		echo "</tr>";
	}
	echo "</table>";
	?>


</div>
<script type="text/javascript">
	$("#btnImprimir").click(function(event){
		window.open("php/imprime_usuarios.php","","fullscreen");
	});
</script>