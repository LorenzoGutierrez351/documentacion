<!DOCTYPE html>
<html>
<head>
	<title>FORM QR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
    	<h1>FORM QR</h1>
        <label for="lang" placeholder="Estado">Estado:</label>
        <select name="Estado" id="lang">
        <option value="Retiro">Retiro</option>
        <option value="Devuelto">Devuelto</option>
        </select>
        <br>
        <label for="lang" placeholder="Elementos">Elementos</label>
        <select name="Elementos" id="lang">
        <option value="Computadora">Computadora</option>
        <option value="Zapatilla electrica">Zapatilla electrica</option>
        <option value="Adaptador MINI-HDMI">Adaptador MINI-HDMI</option>
        <option value="Parlante">Parlante</option>
        <option value="Pelota futbol">Pelota Futbol</option>
        <option value="Pelota handball">Pelota Handball</option>
        </select>
        <input type="number" name="id" placeholder="ID Elemento">
    	<input type="text" name="nomyape" placeholder="Nombre y Apellido:">
    	<input type="email" name="email" placeholder="Email:">
        <input type="datetime-local" name="hora" placeholder="Fecha y Hora de Retiro:">
    	<label for="lang" placeholder="Curso">Curso</label>
        <select name="Curso" id="lang">
        <option value="1V">1V</option>
        <option value="1M">1M</option>
        <option value="2V">2V</option>
        <option value="2M">2M</option>
        <option value="3V">3V</option>
        <option value="3M">3M</option>
        <option value="4V">4V</option>
        <option value="4M">4M</option>
        <option value="5V">5V</option>
        <option value="5M">5M</option>
        <option value="6V">6V</option>
        <option value="6M">6M</option>
      </select>
        <input type="submit" name="register">
    </form>
</body>
<?php 

$conex = mysqli_connect("localhost","root","","registros");

if (isset($_POST['register'])) {
    if (strlen($_POST['nomyape']) >= 1 && strlen($_POST['email']) >= 1) {
        $estado=$_POST['Estado'];
		$elementos=$_POST['Elementos'];
	    $id=$_POST['id'];
		$nombre=$_POST['nomyape'];
	    $email=$_POST['email'];
        $horario=$_POST['hora'];
		$Curso=$_POST['Curso'];
	    $consulta = "INSERT INTO alumnos VALUES ('$estado', '$elementos' , $id, '$nombre', '$email', '$horario', '$Curso')";
	    $resultado = mysqli_query($conex, $consulta);
	    if ($resultado) {
			?> 
	    	<h3 class="ok">Inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">ERROR</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">Complete los campos!</h3>
           <?php
    }
} ?> 
       <div style="text-align:center;">
       <table border="1" style="margin: 0 auto;">
       <tr>
            <td>Estado</td>
			<td>Elemento</td>
			<td>ID Elemento</td>
			<td>Nombre y Apellido</td>
            <td>Email</td>
            <td>Horario</td>
            <td>Curso</td>
		</tr>
        <?php
        $tabla="SELECT * from alumnos";
        $result=mysqli_query($conex,$tabla);
        while($vista=mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $vista['Estado'] ?></td>
			<td><?php echo $vista['Elementos'] ?></td>
			<td><?php echo $vista['id'] ?></td>
			<td><?php echo $vista['nomyape'] ?></td>
            <td><?php echo $vista['email'] ?></td>
			<td><?php echo $vista['hora'] ?></td>
			<td><?php echo $vista['Curso'] ?></td>
            <br>
		</tr>   
        <?php 
	    }
?>         
</html>
