@extends('layouts.app01')
@section('title','Profile')
@section('content')
<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Profile</li>
        </ol>
    </nav>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body pt-3">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="card-title">Profile</h4>
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <form action="{{route('profile-update') }}" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                        <label for="user_name">FIO</label>
                        <input type="text" name="user_name" value="{{ $user['user_name'] }}" class="form-control mt-1" required>
                        <label for="phone1" class="mt-2">Telefon raqam</label>
                        <input type="text" name="phone1" value="{{ $user['phone1'] }}" class="form-control mt-1" disabled>
                        <label for="phone2" class="mt-2">Qo'shimcha telefon raqam</label>
                        <input type="text" name="phone2" value="{{ $user['phone2'] }}" class="form-control mt-1 phone" required>
                        <label for="address" class="mt-2">Yashash manzil</label>
                        <input type="text" name="address" value="{{ $user['address'] }}" class="form-control mt-1" required>
                        <label for="birthday" class="mt-2">Tug'ilgan kun</label>
                        <input type="text" name="birthday" value="{{ $user['birthday'] }}" class="form-control mt-1" required>
                        <label for="email" class="mt-2">Login</label>
                        <input type="text" name="email" value="{{ $user['email'] }}" class="form-control mt-1" disabled>
                        <div class="w-100 text-center">
                            <button class="btn btn-primary w-50 mt-2">O'zgarishlarni saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="card-title">Parolni yangilash</h4>
                <form action="{{ route('password-update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                    <label for="current_password">Joriy parol</label>
                    <input type="password" name="current_password" class="form-control mt-1" required>
                    <label for="new_password" class="mt-2">Yangi parol</label>
                    <input type="password" name="new_password" class="form-control mt-1" required>
                    <label for="new_password_confirmation" class="mt-2">Yangi parolni takrorlang</label>
                    <input type="password" name="new_password_confirmation" class="form-control mt-1" required>
                    <div class="w-100 text-center">
                        <button class="btn btn-primary w-50 mt-2">Parolni yangilash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
    </script>
@endsection