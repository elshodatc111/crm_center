@extends('layouts.app02')
@section('title','Guruh haqida')
@section('content')
    <div class="pagetitle">
        <h1>Guruh haqida</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('all_groups') }}">Guruhlar</a></li>
                <li class="breadcrumb-item">Guruh haqida</li>
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
        <div class="card-body pt-4">
            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="home-tab" 
                    data-bs-toggle="tab" data-bs-target="#guruh-haqida" 
                    type="button" role="tab" aria-controls="home" aria-selected="true">Guruh haqida</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" 
                    data-bs-target="#dars-kunlari" type="button" role="tab" aria-controls="profile" aria-selected="false">Dars kunlari</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#guruh_talabalari" 
                    type="button" role="tab" aria-controls="contact" aria-selected="false">Guruh talabalari</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#test-natija" 
                    type="button" role="tab" aria-controls="contact" aria-selected="false">Test natijalari</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#davomat" 
                    type="button" role="tab" aria-controls="contact" aria-selected="false">Davomad</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active pt-2" id="guruh-haqida" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="card-title w-100 text-center">Guruhning nomi</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Guruh narxi:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchi:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchiga to'lov:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchiga bonus:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>Darslar boshlanish sanasi:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Kurs:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>Dars xonasi:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>Dars vaqti:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>Meneger:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                    <tr>
                                        <th>Darslar tugash vaqti:</th>
                                        <td style="text-align:right">15.01.2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(auth()->user()->type=='admin' OR auth()->user()->type=='sAdmin')
                        <div class="col-lg-3 mt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#sendmessage">Talabalarga SMS</button>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#debetsendmessage">Qarzdorlaega SMS</button>
                        </div>
                        <div class="col-lg-3 mt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateGroups">Guruhni taxrirlash</button>
                        </div>
                        @endif
                        <div class="col-lg-3 mt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#nextGroup">Guruhni davom ettirish</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade pt-2" id="dars-kunlari" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="font-size:12px;">
                            <tbody>
                                <tr>
                                    <th>1-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>2-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>1-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                </tr>
                                <tr>
                                    <th>4-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>5-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>6-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                </tr>
                                <tr>
                                    <th>7-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>8-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                    <th>9-dars</th>
                                    <td style="text-align:right">15.01.2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade pt-2" id="guruh_talabalari" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Talaba</th>
                                    <th>Guruhga qo'shildi</th>
                                    <th>Meneger</th>
                                    <th>Izoh</th>
                                    <th>Guruhdan o'chirildi</th>
                                    <th>Meneger</th>
                                    <th>Izoh</th>
                                    <th>Balans</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>@</th>
                                    <th><a href="#">FIO</a></th>
                                    <td>15</td>
                                    <td>10</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade pt-2" id="test-natija" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th>Talaba</th>
                                    <th>Urinishlar soni</th>
                                    <th>Testlar soni</th>
                                    <th>To'g'ri javoblar</th>
                                    <th>Ball</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>FIO</th>
                                    <th>2</th>
                                    <th>15</th>
                                    <th>10</th>
                                    <th>20</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade pt-2" id="davomat" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th>Talaba / Dars kunlari</th>
                                    <th>20.02.2025</th>
                                    <th>21.02.2025</th>
                                    <th>22.02.2025</th>
                                    <th>23.02.2025</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Davomad</th>
                                    <td><b class="text-success" style="font-size:20px"><i class="bi bi-check-all"></i></b></td>
                                    <td><b class="text-danger" style="font-size:20px"><i class="bi bi-exclamation"></i></b></td>
                                    <td><b class="text-warning" style="font-size:20px"><i class="bi bi-exclamation-diamond"></i></b></td>
                                    <td><b class="text-info" style="font-size:20px"><i class="bi bi-eye-slash"></i></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center">
                        <div class="col-3"><b class="text-success" style="font-size:20px"><i class="bi bi-check-all"></i></b> Darsga qatnashdi</div>
                        <div class="col-3"><b class="text-success" style="font-size:20px"><i class="bi bi-exclamation"></i></b> Darsga qatnashmadi</div>
                        <div class="col-3"><b class="text-success" style="font-size:20px"><i class="bi bi-exclamation-diamond"></i></b> Davomad olinmadi</div>
                        <div class="col-3"><b class="text-success" style="font-size:20px"><i class="bi bi-eye-slash"></i></b> Davomad kutilmoqda</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="sendmessage" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Barcha talabalarga sms yuborish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="visitForm">
                        @csrf
                        <label for="">SMS matni</label>
                        <textarea name="" required class="form-control mb-3 mt-2"></textarea>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">SMS yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="debetsendmessage" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Barcha qarzdorlarga SMS yuborish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="visitForm">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">SMS yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateGroups" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Guruhni taxrirlash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="@" method="POST" id="visitForm">
                        @csrf
                        <label for="">SMS matni</label>
                        <textarea name="" required class="form-control mb-3 mt-2"></textarea>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">SMS yuborish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nextGroup" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Guruhni davom etish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="visitForm">
                        @csrf
                        <div id="first">
                            <label for="">SMS matni</label>
                            <textarea name="sms1" required class="form-control mb-3 mt-2"></textarea>
                            <button type="button" class="btn btn-primary w-100" id="next-btn">Kiyingi</button>
                        </div>
                        <div id="seccond" style="display: none;">
                            <label for="">SMS matni</label>
                            <textarea name="sms2" required class="form-control mb-3 mt-2"></textarea>
                            <button type="button" class="btn btn-secondary w-100" id="back-btn">Orqaga</button>
                            <button type="submit" class="btn btn-primary w-100">Saqlash</button>
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
        document.getElementById("next-btn").addEventListener("click", function() {
            document.getElementById("first").style.display = "none";
            document.getElementById("seccond").style.display = "block";
        });

        document.getElementById("back-btn").addEventListener("click", function() {
            document.getElementById("seccond").style.display = "none";
            document.getElementById("first").style.display = "block";
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
