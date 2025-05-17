<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thêm sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --gradient: linear-gradient(120deg, #10b981, #3b82f6);
            --bg-light: #f9fafb;
            --radius: 1rem;
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            background: var(--bg-light);
            padding-bottom: 20px; 
            box-sizing: border-box;
        }
        main {
            flex: 1 0 auto;
        }

        .header {
            background: var(--gradient);
            color: #fff;
            padding: 3.5rem 0 2.5rem;
            box-shadow: var(--shadow);
            position: relative;
            border-radius: 0 0 20px 20px;
            overflow: hidden;
        }
        .header h1 {
            font-size: 2.75rem;
        }
        .header::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -1px;
            height: 80px;
            background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'><path fill='%23f9fafb' fill-opacity='1' d='M0,224L1440,96L1440,320L0,320Z'></path></svg>") no-repeat center/cover;
        }

        .form-card {
            background: #fff;
            border: none;
            border-radius: var(--radius);
            padding: 3rem 2.5rem;
            box-shadow: var(--shadow);
            animation: fadeInUp 0.6s ease both;
        }
        @keyframes fadeInUp {
            from {
                transform: translateY(40px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .btn-custom {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            transition: transform 0.25s, box-shadow 0.25s, background 0.25s;
        }
        .btn-custom:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }
        .btn-outline-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            font-weight: 600;
            border-radius: 8px;
            transition: 0.25s;
        }
        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        label {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
        }
        footer {
            background: #1e3a8a;
            color: #fff;
            padding: 1.2rem 0;
            margin-top: 4rem;
            margin-bottom: 20px;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header class="header text-center">
        <div class="container position-relative z-1">
            <h1 class="fw-bold">Thêm sản phẩm mới</h1>
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="form-card">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger shadow-sm" role="alert">
                            <ul class="mb-0 small">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/nguyenthicamle/Product/add" onsubmit="return validateForm();" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" required />
                            <div class="invalid-feedback">Vui lòng nhập tên sản phẩm!</div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Mô tả:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Mô tả chi tiết sản phẩm" required></textarea>
                            <div class="invalid-feedback">Vui lòng nhập mô tả sản phẩm!</div>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label">Giá (VNĐ):</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="0.00" required />
                            <div class="invalid-feedback">Vui lòng nhập giá sản phẩm!</div>
                        </div>

                        <div class="d-flex flex-wrap gap-3">
                            <button type="submit" class="btn btn-custom flex-fill">
                                <i class="fa-solid fa-circle-plus me-1"></i>Thêm sản phẩm
                            </button>
                            <a href="/nguyenthicamle/Product/list" class="btn btn-outline-custom flex-fill">
                                <i class="fa-solid fa-arrow-left me-1"></i>Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center">
        <p class="mb-0 small">© 2025 - Quản lý sản phẩm</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value.trim();
            let price = parseFloat(document.getElementById('price').value);
            let errors = [];
            if (name.length < 10 || name.length > 100) errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            if (price <= 0 || isNaN(price)) errors.push('Giá phải là một số dương lớn hơn 0.');
            if (errors.length) {
                alert(errors.join('\n'));
                return false;
            }
            return true;
        }
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
