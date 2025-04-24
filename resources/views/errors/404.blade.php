<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

    <div class="text-center p-4">
        <h1 class="display-4 text-danger fw-bold">404</h1>
        <p class="lead text-secondary">Oops! The page you're looking for doesn't exist.</p>
        <p class="text-muted mb-4">It might have been moved or deleted. Let's get you back on track.</p>
        
        <a href="{{route('home')}}" class="btn btn-primary btn-lg shadow">Go to Homepage</a>
    </div>

    <!-- Bootstrap JS Bundle (for interactivity if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
