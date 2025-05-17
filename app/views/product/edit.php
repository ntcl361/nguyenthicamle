<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
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
            background: linear-gradient(120deg, #10b981, #3b82f6);
            color: white;
            padding: 2.5rem 1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 0 0 20px 20px;
            text-align: center;
            margin-bottom: 2rem;
        }
        .header h1 {
            font-size: 2.75rem;
        }
        .header p {
            font-size: 1.25rem;
            font-weight: 500;
            margin-top: 0.5rem;
        }
        .form-card {
            background: white;
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        label {
            font-weight: 600;
            color: #111827;
        }
        .form-control:focus, .form-control.is-valid {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
        }
        .btn-custom {
            background-color: #10b981;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.4);
        }
        .btn-secondary.btn-custom {
            background-color: #6b7280;
            color: white;
        }
        .btn-secondary.btn-custom:hover {
            background-color: #4b5563;
            box-shadow: 0 4px 12px rgba(75, 85, 99, 0.4);
        }
        footer {
            background-color: #1e3a8a;
            color: white;
            padding: 1rem 0;
            margin-top: auto;
            text-align: center;
            font-weight: 500;
            font-size: 0.95rem;
        }
        .invalid-feedback {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Sửa sản phẩm</h1>
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-card">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="/nguyenthicamle/Product/edit/<?php echo $product->getID(); ?>" class="needs-validation" novalidate onsubmit="return validateForm();">
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="bi bi-tag-fill me-2"></i>Tên sản phẩm:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required aria-describedby="nameFeedback" />
                                <div id="nameFeedback" class="invalid-feedback">Vui lòng nhập tên sản phẩm!</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"><i class="bi bi-text-paragraph me-2"></i>Mô tả:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required aria-describedby="descriptionFeedback"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                                <div id="descriptionFeedback" class="invalid-feedback">Vui lòng nhập mô tả sản phẩm!</div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label"><i class="bi bi-currency-dollar me-2"></i>Giá:</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required aria-describedby="priceFeedback" />
                                <div id="priceFeedback" class="invalid-feedback">Vui lòng nhập giá sản phẩm!</div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-custom"><i class="bi bi-save me-2"></i>Lưu thay đổi</button>
                                <a href="/nguyenthicamle/Product/list" class="btn btn-secondary btn-custom"><i class="bi bi-arrow-left me-2"></i>Quay lại</a>
                            </div>
                        </form>
                    </div>
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
            let price = document.getElementById('price').value.trim();
            let errors = [];
            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }
            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là một số dương lớn hơn 0.');
            }
            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }
            return true;
        }

        (function () {
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
