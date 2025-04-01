<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'laravel'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="collapse navbar-collapse justify-content-start" id="navbarNavDropdown">
                <!-- Logo  -->
                <a class="navbar-brand order-last" href="{{ route('home') }}">
                    <img style="max-height: 50px;" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>
            <!-- Menu  -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Danh Sách
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ( $Categories as $Category )
                        <li>
                        <a class="dropdown-item" href="{{ route('category.show', $Category->id) }}">{{ $Category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <!-- Search Bar  -->
            <form action="{{ route('products.search') }}" method="GET" class="d-flex">
                <input type="text" name="q" class="form-control me-2" placeholder="Nhập tên sản phẩm..." required>
                <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
            </form>


        </div>
    </nav>

    <!-- main -->
    {{ $slot }}

    <!-- footer -->
    <footer class="bg-dark text-light py-4 mt-5 container-fluid">
        <div class="container-fluid  ">
            <div class="row text-center mx-auto ">
                <!-- Giới thiệu -->
                <div class="col-md-4">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img style="max-height: 50px;" src="{{ asset('images/logo-W.png') }}" alt="Logo">
                    </a>
                    <p>Chào mừng bạn đến với website của chúng tôi!</p>
                    <p>Chúng tôi cung cấp nội dung chất lượng cao và dịch vụ tốt nhất.</p>
                </div>

                <!-- Liên kết -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none"><i class="fas fa-home"></i>
                                Home</a></li>
                        <li><a href="#" class="text-light text-decoration-none"><i class="fas fa-info-circle"></i>
                                About</a></li>
                        <li><a href="#" class="text-light text-decoration-none"><i class="fas fa-envelope"></i>
                                Contact</a></li>
                        <li><a href="#" class="text-light text-decoration-none"><i class="fas fa-tags"></i>
                                Pricing</a></li>
                    </ul>
                </div>

                <!-- Mạng xã hội -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <h5>Info</h5>
                    <a href="https://www.facebook.com/thanh.phat.865487" class="text-light me-3">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <a href="#" class="text-light">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>


        </div>
        <!-- Dòng bản quyền -->
        <div class="text-center ">
            <p class="mb-0">&copy; 2025 Your Website. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>