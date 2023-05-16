<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Activation</title>

    <!-- CSS only -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Activation</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>Thank you for registering! Please check your email to activate your account.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS, Popper.js, and jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

</body>
</html>
