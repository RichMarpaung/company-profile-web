<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-center">Verify Your Email Address</h1>
                        <p class="text-center">Thank you for registering! Please click the button below to verify your email address.</p>
                        {{-- <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">Verify Email Address</a> --}}
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">If you did not create an account, no further action is required.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
