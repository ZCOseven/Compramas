<?php
include '../../model/database.php';

$sql = "SELECT id_categoria, cat_nom FROM categoria";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = 'cat-' . strtolower(preg_replace('/\s+/', '-', $row["cat_nom"]));
        $nombre = htmlspecialchars($row["cat_nom"]);
        $valor = strtolower($nombre);

        echo '
        <li class="c-filtros__item">
            <input type="checkbox" id="' . $id . '" class="c-filtros__checkbox" name="categoria" value="' . $valor . '">
            <label for="' . $id . '" class="c-filtros__label">' . $nombre . '</label>
        </li>';
    }
} else {
    echo '<li class="c-filtros__item">No hay categorías disponibles.</li>';
}

$conn = null;
?>
