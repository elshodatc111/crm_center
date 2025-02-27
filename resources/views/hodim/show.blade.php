@extends('layouts.app03')
@section('title','Hodim')
@section('content')
<div class="pagetitle">
    <h1>Hodim</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('compamy_hodim') }}">Hodimlar</a></li>
            <li class="breadcrumb-item">Hodim</li>
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

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title w-100 text-center mb-1 pb-0">{{ $user['user_name'] }}</h2>
                        <p class="m-0 p-0 w-100 text-center">{{ $user['email'] }}</p>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 label">Naqt to'lovlar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">
                                {{ number_format($user_chart['paymart_add_naqt'], 0, '.', ' ') }} so'm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 label">Plastik to'lovlar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">
                                {{ number_format($user_chart['paymart_add_plastik'], 0, '.', ' ') }} so'm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 label">Chegirmalar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">
                                {{ number_format($user_chart['chegirma_add'], 0, '.', ' ') }} so'm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 label">Qaytarilgan to'lovlar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">
                                {{ number_format($user_chart['qaytarildi_add'], 0, '.', ' ') }} so'm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 label">Yangi guruhlar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">{{ $user_chart['create_group'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 label">Yangi talabalar:</div>
                            <div class="col-lg-6 col-md-6" style="text-align:right">{{ $user_chart['create_student'] }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 col-md-6">
                                <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#clearChart">Statistika tozalash</button>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#paymartTulov">Ish haqi to'lash</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Profil taxrirlash</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Sozlamalar</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ish haqi to'lovlari</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profil</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 label">Telefon raqam: </div>
                                    <div class="col-lg-3 col-md-3"> {{ $user['phone1'] }}</div>
                                    <div class="col-lg-3 col-md-3 label">Telefon raqam: </div>
                                    <div class="col-lg-3 col-md-3"> {{ $user['phone2'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 label">Yashash manzili: </div>
                                    <div class="col-lg-3 col-md-3"> {{ $user['address'] }}</div>
                                    <div class="col-lg-3 col-md-3 label">Tug'ilgan kuni: </div>
                                    <div class="col-lg-3 col-md-3"> {{ $user['birthday'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 label">Lavozimi: </div>
                                    <div class="col-lg-3 col-md-3"> 
                                        @if($user['type']=='admin')
                                            Admin
                                        @else
                                            Meneger
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 label">Ish faoliyati: </div>
                                    <div class="col-lg-3 col-md-3"> 
                                        @if($user['status']=='true')
                                            Aktive
                                        @else
                                            Yakunlangan
                                        @endif
                                    </div>
                                </div>
                                <p class="small fst-italic">{{ $user['about'] }}</p>
                            </div>
                        <div class="tab-pane fade profile-edit" id="profile-edit">
                            <h5 class="card-title">Profil taxrirlash</h5>
                            <form action="{{ route('compamy_hodim_techer_update') }}" method="post">
                                @csrf 
                                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                                <label for="user_name">FIO</label>
                                <input type="text" name="user_name" value="{{ $user['user_name'] }}" required class="form-control">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="phone1" class="my-2">Telefon raqam</label>
                                        <input type="text" name="phone1" value="{{ $user['phone1'] }}" required class="form-control phone">
                                    </div>
                                    <div class="col-6">
                                        <label for="phone2" class="my-2">Telefon raqam</label>
                                        <input type="text" name="phone2" value="{{ $user['phone2'] }}" required class="form-control phone">
                                    </div>
                                    <div class="col-6">
                                        <label for="birthday" class="my-2">Tug'ilgan kuni</label>
                                        <input type="date" name="birthday" value="{{ $user['birthday'] }}" required class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="address" class="my-2">Yashash manzili</label>
                                        <input type="text" name="address" value="{{ $user['address'] }}" required class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="type" class="my-2">Lavozimi</label>
                                        <select name="type" required class="form-select">
                                            <option value="">Tanlang</option>
                                            <option value="meneger">Meneger</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="about" class="my-2">Hodim haqida</label>
                                        <input type="text" name="about" value="{{ $user['about'] }}" required class="form-control">
                                    </div>
                                    <div class="col-12 text-center pt-3">
                                        <button type="submit" class="btn btn-primary w-50">Saqlash</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile-settings">
                            <h5 class="card-title">Profil taxrirlash</h5>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Parolni yangilash</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateStatus">Ish faoliyatini taxrirlash</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-change-password">
                            <h5 class="card-title">To'langan ish haqi</h5>
                            <table class="table table-bordered text-center" style="font-size:14px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>To'langan ish haqi</th>
                                        <th>To'lov turi</th>
                                        <th>To'lov vaqti</th>
                                        <th>Menegre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
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
        </div>
    </section>
    
    <div class="modal fade" id="clearChart" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Statistikani tozalash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('compamy_hodim_chart_clear') }}" method="post">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Tozalash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymartTulov" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ish haqi to'lov</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center" style="font-size:14px">
                        <thead>
                            <tr>
                                <th colspan=2>Balansda mavjud</th>
                            </tr>
                            <tr>
                                <th>Naqt</th>
                                <th>Plastik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>150000</td>
                                <td>240000</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="#" method="post">
                        <label for="" class="mb-2">To'lov summasi</label>
                        <input type="text" class="form-control" id="paymentAmount01" required>
                        <script>
                            document.getElementById('paymentAmount01').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); 
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="" class="my-2">To'lov turi</label>
                        <select name="" required class="form-select">
                            <option value="">Tanlang</option>
                            <option value="naqt">Naqt</option>
                            <option value="plastik">Plastik</option>
                        </select>
                        <label for="" class="my-2">To'lov haqida</label>
                        <textarea name="" class="form-control" required></textarea>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary w-100">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePassword" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Parolni yangilash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <label for="" class="mb-2">Yangi parol: <b>password</b></label>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary w-100">Parolni yangilash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateStatus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Faoliyatini o'zgartirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('compamy_hodim_techer_update_status') }}" method="post">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                        <p>Joriy holatda: <b>@if($user['status']=='true')
                                            Aktive
                                        @else
                                            Yakunlangan
                                        @endif</b></p>
                        <label for="status" class="my-2">Hodim ish faoliyati</label>
                        <select name="status" required class="form-select">
                            <option value="">Tanlang</option>
                            <option value="true">Aktiv</option>
                            <option value="false">Yakunlash</option>
                        </select>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Faoliyatini o'zgartirish</button>
                            </div>
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
