<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TecnoSoluciones' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e2a3a 0%, #2d3f55 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .login-card .brand {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-card .brand i {
            font-size: 2.5rem;
            color: #0d6efd;
        }
        .login-card .brand h4 {
            font-weight: 700;
            margin-top: 10px;
            color: #1e2a3a;
        }
        .login-card .brand small {
            color: #8a9bb0;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13,110,253,0.1);
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
        }
        .input-group-text {
            border-radius: 8px 0 0 8px;
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-right: none;
        }
        .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <i class="bi bi-hexagon-fill"></i>
            <h4>TecnoSoluciones</h4>
            <small>Sistema de Gestion de Proyectos</small>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2">
                <i class="bi bi-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/auth/login">
            <div class="mb-3">
                <label class="form-label fw-semibold">Correo electronico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="admin@tecnosoluciones.com" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Contrasena</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesion
            </button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">TecnoSoluciones S.A. &copy; <?= date('Y') ?></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
