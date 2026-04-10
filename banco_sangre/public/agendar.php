<?php
require_once "../middleware/auth.php";
require_once "../config/database.php";
require_once "../models/Cita.php";

$db = $conexion;
$citaModel = new Cita($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $citaModel->agendar(
        $_SESSION['user']['id'],
        $_POST['fecha'] ?? null,
        $_POST['hora'] ?? null,
        $_POST['tipo_donacion'] ?? null,
        $_POST['sede'] ?? null,
        $_POST['peso'] ?? null,
        $_POST['donado_antes'] ?? null,
        $_POST['medicamentos'] ?? null,
        $_POST['cirugia'] ?? null,
        $_POST['tipo_donante'] ?? null
    );

    header("Location: mis_citas.php");
    exit();
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container-cita">

<div class="perfil-actions">
        <a href="./dashboard.php" class="btn-volver">Menú principal</a>
    </div>

<h2 class="titulo">🩸 Agendar Cita</h2>

<form method="POST">

<div class="card">
<h3>💉 Tipo de Donación</h3>

<label>¿Vas a donar a algún familiar, amigo o conocido?</label>

<select id="tipoDonante" name="tipo_donante" required>

<option value="">Seleccione</option>
<option value="altruista">Donar a desconocido</option>
<option value="reposicion">Donar a familiar o amigo</option>

</select>

</div>


<div class="card">
<h3>📅 Información de la Cita</h3>

<div class="grid-2">

<div>
<label>Fecha *</label>
<input type="date" name="fecha" required>
</div>

<div>
<label>Hora *</label>
<input type="time" name="hora" required>
</div>

</div>

<div class="grid-2">

<div>
<label>Tipo de Donación *</label>
<select name="tipo_donacion" required>

<option value="">Seleccione</option>
<option value="Sangre Total">Sangre Total</option>
<option value="Plaquetas">Plaquetas</option>
<option value="Plasma">Plasma</option>

</select>
</div>

<div>
<label>Sede *</label>

<select name="sede" required>

<option value="">Seleccione</option>
<option value="Hospital General">Hospital General</option>
<option value="Cruz Roja">Cruz Roja</option>

</select>

</div>

</div>
</div>


<div class="card">

<h3>👤 Datos del Donante</h3>

<div class="grid-2">

<div>
<label>Peso (kg) *</label>
<input type="number" name="peso" required>
</div>

<div>
<label>¿Ha donado antes? *</label>

<select name="donado_antes" required>

<option value="">Seleccione</option>
<option value="Si">Sí</option>
<option value="No">No</option>

</select>

</div>

</div>

</div>


<div class="card">

<h3>🩺 Cuestionario</h3>

<label>¿Está tomando medicamentos?</label>
<textarea name="medicamentos"></textarea>

<label>¿Ha tenido cirugía reciente?</label>

<select name="cirugia">

<option value="">Seleccione</option>
<option value="Si">Sí</option>
<option value="No">No</option>

</select>

</div>


<div class="boton-container">
<button type="submit" class="btn-agendar">Agendar Cita</button>
</div>

</form>
</div>


<script>

document.getElementById("tipoDonante").addEventListener("change", function(){

let tipo = this.value;

if(tipo == "altruista"){

let confirmar = confirm("Serás catalogado como Donador altruista.\n\nAgradecemos tu ayuda.\nDonar sangre es un regalo de vida.");

if(!confirmar){
this.value = "";
}

}

if(tipo == "reposicion"){

let confirmar = confirm("Serás catalogado como Donador de Reposición.\n\nTe recomendamos tener a la mano el volante de donación del paciente.");

if(!confirmar){
this.value = "";
}

}

});

</script>