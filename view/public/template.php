<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo '<!-- Debug: ' . print_r($_SESSION, true) . ' -->';

// Redirección automática si es usuario interno
if (isset($_SESSION['user'])) {
    header('Location: ../admin/dashboard.php');
    exit;
}

// Solo si necesitas datos adicionales del cliente (opcional)
require_once '../controller/controlador_clientes.php'; // Ajusta la ruta si es necesario

$clienteInfo = null;
if (isset($_SESSION['cliente'])) {
    // Puedes crear una función en tu controlador/modelo para obtener los datos completos del cliente
    $clienteId = $_SESSION['cliente']['id_cliente'];
    $clienteInfo = $controladorCliente->obtenerPorId($clienteId); // Implementa este método en tu controlador/modelo
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Links Css Generales -->
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/template.css">

    <title><?= $title ?></title>


</head>

<body>
    <header class="header">
        <!-- Contenedor principal del header -->
        <div class="header__container">

            <!-- Logo que enlaza a la página de inicio -->
            <a href="../public/index.php">
                <img src="../assets/img/general/logo-compramas.png" alt="Logo" class="header__logo">
            </a>

            <!-- Menú de navegación para pantallas grandes (versión de escritorio) -->
            <nav class="header__nav" aria-label="Menú header">

                <!-- Enlace a "Inicio" con clase activa si $activePage es 'inicio' -->
                <a href="../public/index.php" class="header__nav-link <?= $activePage === 'inicio' ? 'header__nav-link--active' : '' ?>">Inicio</a>

                <!-- Enlace a "Productos", activa si $activePage es 'productos' -->
                <a href="../public/productos.php" class="header__nav-link <?= $activePage === 'productos' ? 'header__nav-link--active' : '' ?>">Productos</a>

                <!-- Enlace a "Servicios", activa si $activePage es 'servicios' -->
                <a href="../public/servicios.php" class="header__nav-link <?= $activePage === 'servicios' ? 'header__nav-link--active' : '' ?>">Servicios</a>

                <!-- Enlaces comentados que podrían usarse en el futuro -->
                <!--
    <a href="../public/soporte.php" class="header__nav-link <?= $activePage === 'soporte' ? 'header__nav-link--active' : '' ?>">Soporte</a>
    <a href="../public/encuentranos.php" class="header__nav-link <?= $activePage === 'encuentranos' ? 'header__nav-link--active' : '' ?>">Encuéntranos</a>
    -->

                <!-- Enlace a "Contactos", activa si $activePage es 'contactos' -->
                <a href="../public/contactos.php" class="header__nav-link <?= $activePage === 'contactos' ? 'header__nav-link--active' : '' ?>">Contactos</a>

                <!-- Enlace de login o perfil del usuario, dependiendo de si está logueado -->
                <?php if (isset($_SESSION['cliente'])): ?>
                    <a href="#" class="header__nav-link <?= $activePage === 'login' ? 'header__nav-link--active' : '' ?> header__nav-user" id="userMenuBtn">
                        <i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['cliente']['nombre']); ?>
                        <span class="header__nav-caret"><i class="fas fa-caret-down"></i></span>
                        <div class="header__nav-dropdown" id="userMenuDropdown">
                            <a href="cliente_perfil.php">Mi perfil</a>
                            <a href="cliente_pedidos.php">Mis pedidos</a>
                            <a href="logout.php">Cerrar sesión</a>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="header__nav-link <?= $activePage === 'login' ? 'header__nav-link--active' : '' ?>">
                        Iniciar sesión
                    </a>
                <?php endif; ?>

            </nav>

            <!-- Botón hamburguesa (menú desplegable en versión móvil) -->
            <button class="header__hamburger" onclick="toggleMenu()">
                <i class="fas fa-bars"></i> <!-- Ícono de barras (hamburguesa) -->
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

                <!--     <a href="../public/servicios.php" class="mobile-menu__link <?= $activePage === 'servicios' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Servicios</a>
                <a href="../public/soporte.php" class="mobile-menu__link <?= $activePage === 'soporte' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Soporte</a> -->

                <a href="../public/encuentranos.php" class="mobile-menu__link <?= $activePage === 'encuentranos' ? 'header__nav-link--active' : '' ?>" onclick="toggleMenu()">Encuéntranos</a>
                <?php if (!isset($_SESSION['cliente'])): ?>
                    <a href="login.php" class="mobile-menu__link" onclick="toggleMenu()">Iniciar sesión</a>
                <?php endif; ?>
            </nav>

            <?php if (isset($_SESSION['cliente'])): ?>
                <div class="mobile-menu__user">
                    <i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['cliente']['nombre']); ?>
                    <a href="cliente_perfil.php" class="mobile-menu__link" onclick="toggleMenu()">Mi perfil</a>
                    <a href="cliente_pedidos.php" class="mobile-menu__link" onclick="toggleMenu()">Mis pedidos</a>
                    <a href="logout.php" class="mobile-menu__link" onclick="toggleMenu()">Cerrar sesión</a>
                </div>
            <?php endif; ?>
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

    <!-- Botón flotante de carrito -->
    <button id="btnCarrito" class="carrito-flotante" aria-label="Ver carrito">
        <i class="fas fa-shopping-cart"></i>
    </button>

    <!-- Overlay y contenedor del carrito -->
    <div id="carritoOverlay" class="carrito-overlay"></div>
    <aside id="carritoContenedor" class="carrito-contenedor">
        <div class="carrito-header">
            <h2 class="carrito-titulo"><i class="fas fa-shopping-cart"></i> Carrito de Compramas</h2>
            <button class="carrito-cerrar" id="cerrarCarritoBtn" aria-label="Cerrar carrito">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="carrito-productos" id="carritoProductos">
            <div id="carritoVacio" class="carrito-vacio" style="display:none;">
                <i class="fas fa-shopping-basket"></i>
                <p>Tu carrito está vacío.<br>¡Añade productos para comenzar!</p>
            </div>
            <!-- Los productos se renderizan aquí por JS -->
        </div>
        <div class="carrito-footer">
            <div class="carrito-totales">
                <div><span>Subtotal:</span><span id="carritoSubtotal">S/ 0.00</span></div>
                <div><span>IGV (18%):</span><span id="carritoIGV">S/ 0.00</span></div>
                <div class="carrito-total"><span>Total:</span><span id="carritoTotal">S/ 0.00</span></div>
            </div>
            <div class="carrito-acciones">
                <a href="./carrito.php" class="carrito-btn carrito-btn-ver">Ver carrito</a>
                <a href="./checkout.php" class="carrito-btn carrito-btn-comprar">Procesar compra</a>
            </div>
        </div>
    </aside>

    <!-- Mensaje temporal de producto añadido -->
    <div id="carritoNotificacion" class="carrito-notificacion">
        <i class="fas fa-check-circle"></i>
        <span id="carritoNotificacionTexto">¡Producto añadido al carrito!</span>
    </div>

    <script src="../assets/js/menuDesplegable.js"></script>
    <script src="../assets/js/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnCarrito = document.getElementById('btnCarrito');
            const overlay = document.getElementById('carritoOverlay');
            const contenedor = document.getElementById('carritoContenedor');
            const cerrarCarritoBtn = document.getElementById('cerrarCarritoBtn');

            function abrirCarrito() {
                const scrollBarWidth = window.innerWidth - document.documentElement.clientWidth;
                document.body.style.overflow = 'hidden';
                document.body.style.paddingRight = scrollBarWidth + 'px';
                overlay.classList.add('activo');
                contenedor.classList.add('activo');
            }

            function cerrarCarrito() {
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
                overlay.classList.remove('activo');
                contenedor.classList.remove('activo');
            }

            btnCarrito.addEventListener('click', abrirCarrito);
            overlay.addEventListener('click', cerrarCarrito);
            if (cerrarCarritoBtn) {
                cerrarCarritoBtn.addEventListener('click', cerrarCarrito);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuBtn = document.getElementById('userMenuBtn');
            const userMenuDropdown = document.getElementById('userMenuDropdown');

            if (userMenuBtn && userMenuDropdown) {
                userMenuBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    userMenuDropdown.classList.toggle('activo');
                });

                // Cierra el menú si haces click fuera
                document.addEventListener('click', function(e) {
                    if (!userMenuBtn.contains(e.target)) {
                        userMenuDropdown.classList.remove('activo');
                    }
                });
            }
        });
    </script>
</body>

</html>