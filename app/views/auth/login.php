<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TecnoSoluciones' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/PROYECTO-tecnosoluciones-sgp/public/assets/css/login.css" rel="stylesheet">
</head>
<body>

    <!-- Video de fondo -->
    <video class="video-bg" autoplay muted loop playsinline>
        <source src="/PROYECTO-tecnosoluciones-sgp/public/assets/video/bg.mp4" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Card login -->
    <div class="login-card">

        <!-- Brand -->
        <div class="brand">
            <img src="/PROYECTO-tecnosoluciones-sgp/public/assets/img/logo.svg" alt="TecnoSoluciones">
            <h4>TecnoSoluciones</h4>
            <small>Sistema de Gestion de Proyectos</small>
        </div>

        <!-- Error oculto para JS -->
        <?php if (!empty($error)): ?>
            <div id="login-error" data-message="<?= htmlspecialchars($error) ?>"></div>
        <?php endif; ?>

        <!-- Formulario -->
        <form id="loginForm" method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/auth/login">

            <label for="email">Correo electronico</label>
            <div class="input-wrapper">
                <i class="bi bi-envelope icon-left"></i>
                <input type="email" id="email" name="email" placeholder="admin@tecnosoluciones.com" required>
            </div>

            <label for="password">Contrasena</label>
            <div class="input-wrapper">
                <i class="bi bi-lock icon-left"></i>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                <i class="bi bi-eye toggle-password" id="togglePassword"></i>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesion
            </button>

        </form>

        <div class="login-footer">
            TecnoSoluciones S.A. &copy; <?= date('Y') ?>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/PROYECTO-tecnosoluciones-sgp/public/assets/js/login.js"></script>
</body>
</html>
