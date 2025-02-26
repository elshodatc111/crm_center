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
                <form action="{{ route('techer_update') }}" method="post">
                    @csrf 
                    <input type="hidden" value="{{ $techer['id'] }}" name="techer_id">
                    <label for="user_name">O'qituvchi</label>
                    <input type="text" name="user_name" value="{{ $techer['user_name'] }}" required class="form-control">
                    <div class="row">
                        <div class="col-6">
                            <label for="phone1" class="mt-1">Telefon raqam 1</label>
                            <input type="text" name="phone1" value="{{ $techer['phone1'] }}" required class="form-control phone">
                        </div>
                        <div class="col-6">
                            <label for="phone2" class="mt-1">Telefon raqam 2</label>
                            <input type="text" name="phone2" value="{{ $techer['phone2'] }}" required class="form-control phone">
                        </div>
                        <div class="col-6">
                            <label for="birthday" class="mt-1">Tug'ilgan kuni</label>
                            <input type="date" name="birthday" value="{{ $techer['birthday'] }}" required class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="status" class="mt-1">Ish faoliyati</label>
                            <p class="form-control">
                                @if($techer['status']=='true')
                                    Aktive
                                @elseif($techer['status']=='false')
                                    Ishdan bo'shatildi
                                @else
                                    Vaqtinchalik bloklandi
                                @endif
                            </p>
                        </div>
                    </div>
                    <label for="email">Login</label>
                    <input type="text" name="email" value="{{ $techer['email'] }}" required class="form-control" disabled>
                    <label for="address" class="mt-1">Yashash manzili</label>
                    <textarea type="text" name="address" required class="form-control">{{ $techer['address'] }}</textarea>
                    <button class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-6">
                        @if($techer['status']=='true')
                            <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#dismissModal">Ishdan bo'shatish</button>
                        @else
                            <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#hireModal">Qaytadan ishga olish</button>
                        @endif
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
                <div class="modal-body">
                    <p class="w-100 text-center">
                        O'qituvchini ishdan bo'shatishga ishonchingiz komilmi?
                    </p>
                    <div class="row mt-4">
                        <div class="col-6" >
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('techer_status') }}" method="post"> 
                                @csrf 
                                <input type="hidden" value="{{ $techer['id'] }}" name="techer_id">
                                <button type="submit" class="btn btn-danger w-100">Ha, bo'shatish</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ishga olish Modal -->
    <div class="modal fade" id="hireModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Ishga olish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="w-100 text-center">
                        O'qituvchini qaytadan ishga qabul qilishni tasdiqlaysizmi?
                    </p>
                    <div class="row mt-4">
                        <div class="col-6" >
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('techer_status') }}" method="post"> 
                                @csrf 
                                <input type="hidden" value="{{ $techer['id'] }}" name="techer_id">
                                <button type="submit" class="btn btn-success w-100">Ha, Ishga qabul qilish</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Parolni yangilash Modal -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Parolni yangilash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="w-100 text-center">
                        Ushbu o'qituvchining parolini yangilashni xohlaysizmi?
                    </p>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <form action="#" method="post"> 
                                @csrf 
                                <input type="hidden" value="{{ $techer['id'] }}" name="techer_id">
                                <button type="submit" class="btn btn-warning w-100">Ha, parolni yangilash</button> 
                            </form>
                        </div>
                    </div>
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
                        @forelse($groups as $item)
                        <tr> 
                            <td>{{ $loop->index+1 }}</td>
                            <td><a href="{{ route('create_show',$item['group_id']) }}">{{ $item['group_name'] }}</a></td>
                            <td>
                                @if($item['status']=='active')
                                    <i class="text-success">Faol</i>
                                @elseif($item['status']=='end')
                                    <i class="text-danger">Yakunlangan</i>
                                @else
                                    <i class="text-warning">Kutilmoqda</i>
                                @endif
                            </td>
                            <td>{{ $item['users'] }}</td>
                            <td>{{ $item['bonus'] }}</td>
                            <td>{{ number_format($item['xisoblandi'], 0, '.', ' ') }}</td>
                            <td>{{ number_format($item['tulandi'], 0, '.', ' ') }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan=7 class="text-center">O'qituvchi guruhlari mavjud emas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="w-100 text-center">
                    <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#paySalaryModal">
                        Ish haqi to'lash
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="paySalaryModal" tabindex="-1" aria-labelledby="paySalaryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="paySalaryLabel">Ish haqi to'lash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <table class="table text-center table-bordered" style="font-size:12px;">
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
                                    <td>12 000</td>
                                    <td>25 000</td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" value="{{ $techer['id'] }}" name="techer_id">
                        <label for="amount" class="my-2">Guruhni tanlang</label>
                        <select name="" class="form-select" required>
                            <option value="">Tanlang</option>
                        </select>
                        <label for="amount" class="my-2">To'lov summasi</label>
                        <input type="text" name="amount" id="paymentAmount7" class="form-control" required>
                        <script>
                            document.getElementById('paymentAmount7').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="amount" class="my-2">To'lov turi</label>
                        <select name="" class="form-select" required>
                            <option value="">Tanlang</option>
                            <option value="naqt">Naqt</option>
                            <option value="plastik">Plastik</option>
                        </select>
                        <label for="amount" class="my-2">To'lov haqida</label>
                        <textarea name="" required class="form-control"></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">To'lash</button>
                            </div>
                        </div>
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
            

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
    </script>
@endsection
