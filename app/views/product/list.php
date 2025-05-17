<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Danh sách sản phẩm</title>
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
            background: linear-gradient(120deg, #10b981, #3b82f6);
            color: white;
            padding: 2.5rem 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            position: relative;
            border-radius: 0 0 20px 20px;
        }

        .header h1 {
            font-size: 2.75rem;
        }

        .product-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }

        .btn-custom {
            background-color: #10b981;
            border: none;
            color: white;
            font-weight: 600;
            transition: 0.3s;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-action {
            border-radius: 8px;
        }

        .search-bar input {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
        }

        footer {
            background: #1e3a8a;
            color: #fff;
            padding: 1.2rem 0;
            margin-top: 4rem;
            margin-bottom: 20px;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            color: #111827;
        }

        .card-text {
            font-size: 0.95rem;
            color: #6b7280;
        }

        .price {
            font-size: 1.1rem;
            color: #16a34a;
        }
    </style>
</head>
<body>
    <header class="header text-center">
        <h1 class="fw-bold">Danh sách sản phẩm</h1>
    </header>

    <main>
        <div class="container">
            <div class="search-bar mb-4">
                <input type="text" class="form-control shadow-sm" placeholder="🔍 Tìm kiếm sản phẩm..." id="searchInput" />
            </div>

            <div class="d-flex justify-content-end mb-4">
                <a href="/nguyenthicamle/Product/add" class="btn btn-custom px-4 py-2">
                    <i class="fa-solid fa-plus me-2"></i>Thêm sản phẩm
                </a>
            </div>

            <div class="row" id="productList">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4 product-item">
                        <div class="card product-card">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">
                                    <?php echo htmlspecialchars((string)$product->getName(), ENT_QUOTES, 'UTF-8'); ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo htmlspecialchars((string)$product->getDescription(), ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                                <p class="price fw-bold">Giá: <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?> VNĐ</p>
                                <div class="d-flex gap-2">
                                    <a href="/nguyenthicamle/Product/edit/<?php echo $product->getID(); ?>"
                                       class="btn btn-outline-warning btn-sm btn-action">
                                       <i class="fa-solid fa-pen-to-square me-1"></i>Sửa
                                    </a>
                                    <a href="/nguyenthicamle/Product/delete/<?php echo $product->getID(); ?>"
                                       class="btn btn-outline-danger btn-sm btn-action"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                       <i class="fa-solid fa-trash me-1"></i>Xóa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer class="text-center">
        <p class="mb-0 small">© 2025 - Quản lý sản phẩm</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const searchInput = document.getElementById('searchInput');
        const productItems = document.querySelectorAll('.product-item');

        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            productItems.forEach(item => {
                const title = item.querySelector('.card-title').textContent.toLowerCase();
                const description = item.querySelector('.card-text').textContent.toLowerCase();
                item.style.display = (title.includes(searchTerm) || description.includes(searchTerm)) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
