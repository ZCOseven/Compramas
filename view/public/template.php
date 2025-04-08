<?php
session_start();
require '../../model/database.php';

// Definir la variable $resultadoDeConsulta
$resultadoDeConsulta = null;

// Comprobar si el usuario está logueado
if (isset($_SESSION['user'])) {
    // Obtener el ID del usuario de la sesión
    $userId = $_SESSION['user']['id'];

    // Realizar la consulta
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $resultadoDeConsulta = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Compramas - Tu tienda de confianza para productos de calidad. Encuentra lo que necesitas al mejor precio.">
    <meta name="keywords" content="Compramas, jardineria, accesorios, diseño de interiores, plantas, ecologico, fertilizantes">
    <meta name="author" content="Daniel Calderón - Frontend Developer">

    <link rel="shortcut icon" href="../assets/img/general/logo-compramas.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Links Css Generales -->
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/template.css">

    <title><?= $title ?></title>


</head>

<body>
    <header class="header">
        <div class="header__container">
            <a href="../public/index.php">
                <img src="../assets/img/general/logo-compramas.png" alt="Logo" class="header__logo">
            </a>

            <!-- Menú desktop (visible en pantallas grandes) -->
            <nav class="header__nav" aria-label="Menú header">
                <a href="../public/index.php" class="header__nav-link <?= $activePage === 'inicio' ? 'header__nav-link--active' : '' ?>">Inicio</a>
                <a href="../public/productos.php" class="header__nav-link <?= $activePage === 'productos' ? 'header__nav-link--active' : '' ?>">Productos</a>
                <a href="../public/servicios.php" class="header__nav-link <?= $activePage === 'servicios' ? 'header__nav-link--active' : '' ?>">Servicios</a>
                <a href="../public/soporte.php" class="header__nav-link <?= $activePage === 'soporte' ? 'header__nav-link--active' : '' ?>">Soporte</a>
                <a href="../public/encuentranos.php" class="header__nav-link <?= $activePage === 'encuentranos' ? 'header__nav-link--active' : '' ?>">Encuéntranos</a>
                <a href="../public/login.php" class="header__nav-link <?= $activePage === 'login' ? 'header__nav-link--active' : '' ?>">
                    <?php if (isset($_SESSION['user'])): ?>
                        <i class="fas fa-user"></i> <?= $_SESSION['user']['nombre']; ?>
                    <?php else: ?>
                        Iniciar sesión
                    <?php endif; ?>


                </a>

            </nav>

            <!-- Botón hamburguesa (solo visible en móviles) -->
            <button class="header__hamburger" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Menú móvil (fuera del container, oculto por defecto) -->
        <div class="mobile-menu" id="mobileMenu">
            <button class="mobile-menu__close" onclick="toggleMenu()">
                <i class="fas fa-times"></i>
            </button>

            <nav class="mobile-menu__nav">
                <a href="../public/index.php" class="mobile-menu__link <?= $activePage === 'inicio' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Inicio</a>
                <a href="../public/productos.php" class="mobile-menu__link <?= $activePage === 'productos' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Productos</a>
                <a href="../public/servicios.php" class="mobile-menu__link <?= $activePage === 'servicios' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Servicios</a>
                <a href="../public/soporte.php" class="mobile-menu__link <?= $activePage === 'soporte' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Soporte</a>
                <a href="../public/encuentranos.php" class="mobile-menu__link <?= $activePage === 'encuentranos' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Encuéntranos</a>
            </nav>
        </div>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer class="footer" id="footer">
        <div class="footer__container">
            <!-- Columnas principales -->
            <div class="footer__cols">
                <!-- Columna 1 - Contacto y redes -->
                <div class="footer__col">
                    <h4 class="footer__title">Contacto y Redes</h4>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <i class="fas fa-envelope footer__icon"></i>
                            contacto@compramasjardin.com
                        </li>
                        <li class="footer__item">
                            <i class="fab fa-whatsapp footer__icon"></i>
                            +52 55 1234 5678
                        </li>
                        <li class="footer__item">
                            <i class="fab fa-instagram footer__icon"></i>
                            @comp.ramas
                        </li>
                        <li class="footer__item">
                            <i class="fab fa-facebook footer__icon"></i>
                            /compramasjardin
                        </li>
                        <li class="footer__item">
                            <i class="fab fa-twitter footer__icon"></i>
                            @comp_ramas
                        </li>
                    </ul>
                </div>

                <!-- Columna 2 - Ubicación y horarios -->
                <div class="footer__col">
                    <h4 class="footer__title">Ubicación</h4>
                    <div class="footer__info">
                        <p>Av. Jardín Verde #123<br>
                            Col. Plantas Felices</p>

                        <h5 class="footer__subtitle">Horarios:</h5>
                        <p>Lunes a Viernes: 9:00 AM - 7:00 PM<br>
                            Sábado y Domingo: 10:00 AM - 5:00 PM</p>

                        <p class="footer__phone">
                            <i class="fas fa-phone footer__icon"></i>
                            +52 55 9876 5432
                        </p>
                    </div>
                </div>

                <!-- Columna 3 - Métodos de pago -->
                <div class="footer__col">
                    <h4 class="footer__title">Métodos de Pago</h4>
                    <div class="footer__payments">
                        <i class="fab fa-cc-visa footer__payment-icon"></i>
                        <i class="fab fa-cc-mastercard footer__payment-icon"></i>
                        <i class="fab fa-cc-paypal footer__payment-icon"></i>
                        <i class="fas fa-credit-card footer__payment-icon"></i>
                    </div>
                    <a href="#" class="footer__complaint-link">
                        <i class="fas fa-book footer__icon"></i>
                        Libro de Reclamaciones
                    </a>
                </div>
            </div>

            <!-- Fila inferior de copyright -->
            <div class="footer__copyright">
                <p>&copy; 2025 Daniel Calderón - "Derechos a quien le corresponda"</p>
            </div>
        </div>
    </footer>

    <script src="../assets/js/menuDesplegable.js"></script>
</body>

</html>