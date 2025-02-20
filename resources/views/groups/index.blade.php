@extends('layouts.app01')
@section('title','Guruhlar')
@section('content')
    <div class="pagetitle">
        <h1>Guruhlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Guruhlar</li>
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
        <div class="card-body">
            <div class="row card-title">
                <div class="col-6">Guruhlar</div>
                <div class="col-6" style="text-align:right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitModal"><i class="bi bi-plus"></i> Yangi Guruh</button>
                </div>
            </div>
            <div id="userTable">
                <table class="table table-bordered" style="font-size:14px;">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Guruh nomi</th>
                            <th>Boshlanish vaqati</th>
                            <th>Tugash vaqti</th>
                            <th>Talabalar soni</th>
                            <th>Guruh holati</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="addVisitModal" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Yangi guruh qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="visitForm">
                        @csrf
                        <label for="" class="mb-1">Yangi guruh nomi</label>
                        <input type="text" name="sss" required class="form-control">
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="" class="mb-1">Guruh uchun kurs</label>
                                <select name="" id="" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['cours'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['cours_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-1">Darslar soni</label>
                                <input type="number" name="sss" value="12" min=9 max=31 required class="form-control">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="" class="mb-1">Dars Xonasi</label>
                                <select name="" id="" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['rooms'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['room_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-1">Boshlanish vaqti</label>
                                <input type="date" id="dateInput" name="sss" required class="form-control" value="{{ date('Y-m-d') }}">
                                <div id="dateError" class="text-danger mt-2" style="display: none;">Boshlanish vaqti noto'g'ri</div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="" class="mb-1">Guruh turi</label>
                                <select name="" id="" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    <option value="">Haftaning toq kunlari</option>
                                    <option value="">Haftaning juft kunlari</option>
                                    <option value="">Har kuni</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-1">Dars vaqti</label>
                                <select name="" id="" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['time'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['time'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="" class="pt-2 mb-1">To'lov summasi</label>
                        <select name="" id="" class="form-select">
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($resours['paymarts'] as $item)
                                <option value="{{ $item['id'] }}">To'lov: {{ number_format($item['amount'], 0, '.', ' ') }} Chegirma: {{ number_format($item['chegirma'], 0, '.', ' ') }}</option>
                            @endforeach
                        </select>
                        <label for="" class="pt-2 mb-1">Guruh o'qituvchisi</label>
                        <select name="" id="" class="form-select">
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($resours['techers'] as $item)
                                <option value="{{ $item['id'] }}">{{ $item['user_name'] }}</option>
                            @endforeach
                        </select>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="" class="mb-1">O'qituvchiga bonus</label>
                                <input type="text" name="sss" value="0" id="paymentAmount" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="" class="mb-1">O'qituvchiga to'lov</label>
                                <input type="text" name="sss" value="0" id="paymentAmount1" required class="form-control">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">Yangi guruhni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
        $('#phone1').on('blur', function() {
            var phone1 = $(this).val();
            $.ajax({
                url: '{{ route('checkPhoneExist') }}',
                type: 'GET',
                data: { phone1: phone1 },
                success: function(response) {
                    if (response.exists) {
                        $('#phone1-error').show();
                        $('#phone1').addClass('is-invalid');
                    } else {
                        $('#phone1-error').hide();
                        $('#phone1').removeClass('is-invalid');
                    }
                }
            });
        });

        $('#birthday').on('change', function() {
            var birthday = $(this).val();
            var birthDate = new Date(birthday);
            var currentDate = new Date();
            var age = currentDate.getFullYear() - birthDate.getFullYear();
            var m = currentDate.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 10) {
                $('#birthday-error').show();
                $('#submit-btn').prop('disabled', true);
            } else {
                $('#birthday-error').hide();
                $('#submit-btn').prop('disabled', false);
            }
        });
        document.getElementById('paymentAmount').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); 
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            event.target.value = formatted;
        });
        document.getElementById('paymentAmount1').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); 
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); 
            event.target.value = formatted;
        });
        document.addEventListener("DOMContentLoaded", function() {
            let dateInput = document.getElementById('dateInput');
            let dateError = document.getElementById('dateError');
            let today = new Date();
            let yesterday = new Date();
            yesterday.setDate(today.getDate() - 1);
            let todayStr = today.toISOString().split('T')[0];
            let yesterdayStr = yesterday.toISOString().split('T')[0];
            dateInput.value = todayStr;
            dateInput.setAttribute('min', yesterdayStr);
            dateInput.addEventListener('change', function() {
                let selectedDate = new Date(dateInput.value);
                let minDate = new Date(yesterdayStr);
                if (selectedDate < minDate) {
                    dateError.style.display = "block";
                    dateInput.value = todayStr;
                } else {
                    dateError.style.display = "none";
                }
            });
        });
    </script>
@endsection
