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

<div class="card">
    <div class="card-body pt-3">
        <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Mening haqimda</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Profilni tahrirlash</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-password">Parolni yangilash</button>
            </li>
        </ul>
        <div class="tab-content pt-3">

            <!-- Profile Overview -->
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                </div>
            </div>

            <!-- Profile Edit Form -->
            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>

            <!-- Password Update Form -->
            <div class="tab-pane fade profile-password pt-3" id="profile-password">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Joriy parol</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Yangi parol</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Parolni tasdiqlash</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" class="form-control" name="new_password_confirmation" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Yangilash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection