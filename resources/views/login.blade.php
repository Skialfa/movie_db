@extends('layouts.template')
@section('content')

<style>
    body {
        background: linear-gradient(to bottom right, #010301, #0451eb, #010301);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        margin-top: -50px; /* Geser sedikit ke atas */
    }

    .card-form {
        width: 100%;
        max-width: 500px; /* Lebih besar dari sebelumnya */
        background: #fff;
        border-radius: 16px;
        padding: 40px 30px;
        box-shadow: 0 12px 35px rgba(34,139,34,0.2);
        border: 1px solid #000;
        transition: 0.3s;
    }

    .card-form:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(34,139,34,0.25);
    }

    .card-form h3 {
        text-align: center;
        margin-bottom: 25px;
        color: #6f9cf7;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
        color: #6f9cf7;
        margin-bottom: 4px;
    }

    .form-control {
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #6f9cf7;
        box-shadow: 0 0 0 0.2rem rgba(102,187,106,0.25);
        outline: none;
    }

    .btn-primary {
        background-color: #07006c;
        border: none;
        font-weight: 600;
        padding: 12px 0;
        border-radius: 8px;
        font-size: 1.05rem;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #6f9cf7;
    }

    .form-check-label {
        color: #4b6f52;
        font-size: 0.9rem;
    }

    .form-text {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 2px;
    }

    .text-danger {
        font-size: 0.8rem;
        margin-top: 3px;
    }
</style>

<div class="login-wrapper">
    <div class="card-form">
        <h3>Login</h3>
        <form action="/login" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       aria-describedby="emailHelp" required autofocus>
                <div id="emailHelp" class="form-text">Email kamu aman bersama kami 🍃</div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya 🌿</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>
</div>

@endsection
