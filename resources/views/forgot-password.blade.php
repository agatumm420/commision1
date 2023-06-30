<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .forgot-password-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .forgot-password-form {
            width: 300px;
        }
        .forgot-password-form input {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<div class="forgot-password-container">
    <form method="POST" action="/api/send-reset-link" class="forgot-password-form">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Podaj email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="d-grid">
            <input type="submit" value="Send Reset Link" class="btn btn-primary">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
