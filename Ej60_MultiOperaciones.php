<?php
// Ej60_MultiOperaciones.php

$numeros1 = ["", "", ""];
$numeros2 = ["", "", ""];
$suma = [];
$resta = [];
$multiplicacion = [];
$division = [];
$residuo = [];
$error = "";
$mostrar = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros1 = $_POST["numeros1"];
    $numeros2 = $_POST["numeros2"];
    $valido = true;

    // Condicion Numeros1: solo 51 al 99
    for ($i = 0; $i < 3; $i++) {
        if ($numeros1[$i] < 51 || $numeros1[$i] > 99) {
            $error = "ERROR en Numeros1 dato " . ($i + 1) . ": Solo se permiten datos del 51 al 99. Vuelve a teclearlo.";
            $valido = false;
            break;
        }
    }

    // Condicion Numeros2: solo -50 al -1
    if ($valido) {
        for ($i = 0; $i < 3; $i++) {
            if ($numeros2[$i] < -50 || $numeros2[$i] > -1) {
                $error = "ERROR en Numeros2 dato " . ($i + 1) . ": Solo se permiten datos del -50 al -1. Vuelve a teclearlo.";
                $valido = false;
                break;
            }
        }
    }

    // Solo si cumple las 2 condiciones, calcula y guarda
    if ($valido) {
        for ($i = 0; $i < 3; $i++) {
            $a = $numeros1[$i];
            $b = $numeros2[$i];

            $suma[$i] = $a + $b;
            $resta[$i] = $a - $b;
            $multiplicacion[$i] = $a * $b;
            $division[$i] = $a / $b;
            $residuo[$i] = $a % $b;
        }
        $mostrar = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej60_MultiOperaciones</title>
</head>
<body>
    <h2>Ej60 - MultiOperaciones</h2>

    <?php if ($error != ""): ?>
        <p style="color:red"><b><?php echo $error; ?></b></p>
    <?php endif; ?>

    <form method="post">
        <h3>Numeros1 (solo del 51 al 99)</h3>
        <?php for ($i = 0; $i < 3; $i++): ?>
            Dato <?php echo $i + 1; ?>:
            <input type="number" name="numeros1[]" min="51" max="99" value="<?php echo $numeros1[$i]; ?>" required><br>
        <?php endfor; ?>

        <h3>Numeros2 (solo del -50 al -1)</h3>
        <?php for ($i = 0; $i < 3; $i++): ?>
            Dato <?php echo $i + 1; ?>:
            <input type="number" name="numeros2[]" min="-50" max="-1" value="<?php echo $numeros2[$i]; ?>" required><br>
        <?php endfor; ?>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php if ($mostrar): ?>
    <h3>Resultados</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>Numeros1</th>
            <th>Numeros2</th>
            <th>Suma</th>
            <th>Resta</th>
            <th>Multiplicacion</th>
            <th>Division</th>
            <th>Residuo</th>
        </tr>
        <?php for ($i = 0; $i < 3; $i++): ?>
        <tr>
            <td><?php echo $numeros1[$i]; ?></td>
            <td><?php echo $numeros2[$i]; ?></td>
            <td><?php echo $suma[$i]; ?></td>
            <td><?php echo $resta[$i]; ?></td>
            <td><?php echo $multiplicacion[$i]; ?></td>
            <td><?php echo round($division[$i], 2); ?></td>
            <td><?php echo $residuo[$i]; ?></td>
        </tr>
        <?php endfor; ?>
    </table>
    <?php endif; ?>
</body>
</html>