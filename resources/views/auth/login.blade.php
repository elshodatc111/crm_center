@extends('layouts.login')
@section('title','Kirish')
@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <span class="d-block d-lg-none">CRM</span>
                                <span class="d-none d-lg-block">CRM Center</span>
                            </a>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Kirish</h5>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Login</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="email" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                value="{{ old('email') }}" id="yourUsername" required autofocus>
                                            <div class="invalid-feedback">Login kiritish majburiy.</div>
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Parol</label>
                                        <input type="password" name="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            id="yourPassword" required autocomplete="current-password">
                                        <div class="invalid-feedback">Parol kiritish majburiy</div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rememberMe">Eslab qolish</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Kirish</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger mt-3 w-100 text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
