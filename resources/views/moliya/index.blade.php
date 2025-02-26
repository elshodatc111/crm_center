@extends('layouts.app01')
@section('title','Moliya')
@section('content')
<div class="pagetitle">
    <h1>Moliya</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Moliya</li>
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
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body" style="height:220px;">
                <h3 class="card-title text-center text-primary">
                    <i class="bi bi-wallet2 me-1"></i> Kassada mavjud summa
                </h3>
                <div class="row">
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="bi bi-cash-coin text-success me-1"></i> Naqt: <b>150 000</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-credit-card text-primary me-1"></i> Plastik: <b>250 000</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-arrow-down-circle text-warning me-1"></i> Naqt chiqim: <b>45 000</b> so'm
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="bi bi-arrow-down-circle text-warning me-1"></i> Plastik chiqim: <b>25 000</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-exclamation-circle text-danger me-1"></i> Naqt xarajat: <b>50 000</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-exclamation-circle text-danger me-1"></i> Plastik xarajat: <b>50 000</b> so'm
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-3">
        <div class="card shadow-sm border-0">
            <div class="card-body" style="height:220px;">
                <h3 class="card-title text-center text-success">
                    <i class="bi bi-bank me-1"></i> Balansda mavjud
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-cash-coin text-success me-1"></i> Naqt: <b>150 000</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card text-primary me-1"></i> Plastik: <b>250 000</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-heart text-danger me-1"></i> Exson: <b>45 000</b> so'm
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card shadow-sm border-0">
            <div class="card-body" style="height:220px;">
                <h3 class="card-title text-center text-danger">
                    <i class="bi bi-gift me-1"></i> Exson ulushi
                </h3>
                <form action="" method="post">
                    <label for="exsonPercent" class="fw-bold">Exson foizi (%)</label>
                    <input type="number" name="exson_percent" id="exsonPercent" required class="form-control">
                    <button class="btn btn-danger w-100 mt-3">
                        <i class="bi bi-save me-1"></i> Exsonni saqlash
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <button class="btn btn-primary w-100 mt-2 rounded shadow-sm">
            <i class="bi bi-arrow-down-circle me-1"></i> Balansdan chiqim
        </button>
    </div>
    <div class="col-lg-4">
        <button class="btn btn-danger w-100 mt-2 rounded shadow-sm">
            <i class="bi bi-cash-coin me-1"></i> Balansdan xarajatlar
        </button>
    </div>
    <div class="col-lg-4">
        <button class="btn btn-success w-100 mt-2 rounded shadow-sm">
            <i class="bi bi-heart me-1"></i> Exson uchun chiqim
        </button>
    </div>

    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body pt-3">
                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Kassadan chiqim tarixi (oxirgi 3 oy)</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Balansdan chiqim tarixi (oxirgi 3 oy)</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table text-center table-bordered" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meneger</th>
                                    <th>Chiqim turi</th>
                                    <th>Chiqim summasi</th>
                                    <th>Chiqim vaqti</th>
                                    <th>Chiqim haqida</th>
                                    <th>Tasdiqladi</th>
                                    <th>Chiqim tasdiqlandi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table text-center table-bordered" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chiqim turi</th>
                                    <th>Chiqim summasi</th>
                                    <th>Chiqim haqida</th>
                                    <th>Admin</th>
                                    <th>Chiqim vaqti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection
