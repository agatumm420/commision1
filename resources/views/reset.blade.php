<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .reset-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .reset-form {
            width: 300px;
        }
        .reset-form input {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<div class="reset-container">
    <form method="POST" action="/api/add-km/{{ $user }}" class="reset-form">
        @csrf
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password:</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="d-grid">
            <input type="submit" value="Reset Password" class="btn btn-primary">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
