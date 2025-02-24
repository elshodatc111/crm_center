@extends('layouts.app03')
@section('title','O\'qituvchi')
@section('content')
<div class="pagetitle">
    <h1>O'qituvchi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all_techer') }}">O'qituvchilar</a></li>
            <li class="breadcrumb-item">O'qituvchi</li>
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
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title w-100 text-center">O'qituvchi haqida</h3>
                <form action="#" method="post">
                    <label for="">O'qituvchi</label>
                    <input type="text" name="" required class="form-control">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="mt-1">Telefon raqam 1</label>
                            <input type="text" name="" required class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mt-1">Telefon raqam 2</label>
                            <input type="text" name="" required class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mt-1">Tug'ilgan kuni</label>
                            <input type="text" name="" required class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="" class="mt-1">Ish faoliyati</label>
                            <input type="text" name="" required class="form-control">
                        </div>
                    </div>
                    <label for="" class="mt-1">Login</label>
                    <input type="text" name="" required class="form-control">
                    <label for="" class="mt-1">Yashash manzili</label>
                    <input type="text" name="" required class="form-control">
                    <label for="" class="mt-1">O'qituvchi haqida</label>
                    <textarea type="text" name="" required class="form-control"></textarea>
                    <button class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#dismissModal">Ishdan bo'shatish</button>
                        <button class="btn btn-success w-100 mt-2" data-bs-toggle="modal" data-bs-target="#hireModal">Ishga olish</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">Parolni yangilash</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dismissModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ishdan bo'shatish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">O'qituvchini ishdan bo'shatishga ishonchingiz komilmi?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <form action="#" method="post"> @csrf <button type="submit" class="btn btn-danger">Ha, bo'shatish</button> </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ishga olish Modal -->
    <div class="modal fade" id="hireModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ishga olish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">O'qituvchini ishga qabul qilishni tasdiqlaysizmi?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <form action="#" method="post"> @csrf <button type="submit" class="btn btn-success">Ha, ishga olish</button> </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Parolni yangilash Modal -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Parolni yangilash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Ushbu o'qituvchining parolini yangilashni xohlaysizmi?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <form action="#" method="post"> @csrf <button type="submit" class="btn btn-warning">Ha, parolni yangilash</button> </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title w-100 text-center">Guruhlar (Guruh yakunlanganiga 30 kundan kiyin o'chiriladi)</h3>
                <table class="table table-bordered text-center" style="font-size:14px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Guruh</th>
                            <th>Guruh holati</th>
                            <th>Talabalar</th>
                            <th>Bonus talaba</th>
                            <th>Ish haqi</th>
                            <th>To'langan ish haqi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="#">Guruh nomi</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
                <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#paySalaryModal">
                    Ish haqi to'lash
                </button>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="paySalaryModal" tabindex="-1" aria-labelledby="paySalaryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paySalaryLabel">Ish haqi to'lash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="amount">To'lov summasi</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">To'lash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title w-100 text-center">Ish haqi to'lovlari (Oxirgi 3 oylik to'lovlar tarixi)</h3>
                <table class="table table-bordered text-center" style="font-size:14px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Guruh</th>
                            <th>To'langan summa</th>
                            <th>To'lov turi</th>
                            <th>To'lov haqida</th>
                            <th>To'landi</th>
                            <th>Meneger</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Guruh nomi</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            

@endsection
