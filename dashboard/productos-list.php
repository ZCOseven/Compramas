<?php
include '../../model/database.php';

$sql = "SELECT * FROM producto";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Obtener la categoría (asegúrate de que 'categoria' es la columna correcta)
        $categoria = strtolower($row["categoria"]);

        echo '
        <div class="producto-card categoria-<?php echo strtolower($row["categoria"]); ?>
            <img src="../' . htmlspecialchars($row["imagen"]) . '" alt="' . htmlspecialchars($row["nom_pro"]) . '">
            <h3>' . htmlspecialchars($row["nom_pro"]) . '</h3>
            <span>Precio: S/' . number_format($row["costo"], 2) . '</span><br>
        </div>';
    }
} else {
    echo "No hay productos disponibles.";
}

$conn = null;
?>