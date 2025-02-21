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
                    <h3 class="card-title w-100 text-center">{{ $response['group']['group'] }}</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Guruh narxi:</th>
                                        <td style="text-align:right">{{ number_format($response['group']['price'], 0, '.', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchi:</th>
                                        <td style="text-align:right">{{ $response['group']['techer'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchiga to'lov:</th>
                                        <td style="text-align:right">{{ number_format($response['group']['techer_paymart'], 0, '.', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <th>O'qituvchiga bonus:</th>
                                        <td style="text-align:right">{{ number_format($response['group']['techer_bonus'], 0, '.', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Darslar boshlanish sanasi:</th>
                                        <td style="text-align:right">{{ \Carbon\Carbon::parse($response['group']['start'])->format('Y-m-d') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Kurs:</th>
                                        <td style="text-align:right">{{ $response['group']['cours_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dars xonasi:</th>
                                        <td style="text-align:right">{{ $response['group']['room'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dars vaqti:</th>
                                        <td style="text-align:right">{{ $response['group']['time'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meneger:</th>
                                        <td style="text-align:right">{{ $response['group']['meneger'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Darslar tugash vaqti:</th>
                                        <td style="text-align:right">{{ \Carbon\Carbon::parse($response['group']['end'])->format('Y-m-d') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(auth()->user()->type=='admin' OR auth()->user()->type=='sAdmin')
                            @if($response['message_status']==1)
                                <div class="col-lg-3 mt-2">
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#sendmessage">Talabalarga SMS</button>
                                </div>
                                <div class="col-lg-3 mt-2">
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#debetsendmessage">Qarzdorlarga SMS</button>
                                </div>
                            @endif
                            <div class="col-lg-3 mt-2">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateGroups">Guruhni taxrirlash</button>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#deleteGroups">Guruhdan o'chirish</button>
                            </div>
                        @endif
                        @if($response['group']['next']=='new')
                            <div class="col-lg-3 mt-2">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#nextGroup">Guruhni davom ettirish</button>
                            </div>
                        @else 
                            <div class="col-lg-3 mt-2">
                                <a href="#" class="btn btn-primary w-100">Guruhning davomi</button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade pt-2" id="dars-kunlari" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="font-size:12px;">
                            <tbody>
                                @php
                                    $dates = $response['group_day'];
                                    $count = count($dates);
                                @endphp

                                @for ($i = 0; $i < $count; $i += 3)
                                    <tr>
                                        @for ($j = 0; $j < 3; $j++)
                                            @if(isset($dates[$i + $j]))  
                                                <th>{{ ($i + $j + 1) }}-dars</th>
                                                <td style="text-align:right">{{ \Carbon\Carbon::parse($dates[$i + $j])->format('d.m.Y') }}</td>
                                            @endif
                                        @endfor
                                    </tr>
                                @endfor
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
                                    <th>Status</th>
                                    <th>Balans</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($response['users'] as $item)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <th style="text-align:left"><a href="{{ route('student_show',$item['id']) }}">{{ $item['user_name'] }}</a></th>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['meneger'] }}</td>
                                    <td>{{ $item['start_discription'] }}</td>
                                    <td>
                                        @if($item['status']==1)
                                            Aktiv
                                        @else
                                            O'chirilgan
                                        @endif
                                    </td>
                                    <td>{{ $item['balans'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=7 class="text-center">Guruh talabalari mavjud emas!</td>
                                </tr>
                                @endforelse
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
                    <form action="{{ route('create_groups_update') }}" method="POST" id="visitForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $response['group']['id'] }}">
                        <label for="group_name">Guruhning nomi</label>
                        <input name="group_name" required value="{{ $response['group']['group'] }}" class="form-control mb-3 mt-2">
                        <label for="cours_id">Guruh Kursi</label>
                        <select name="cours_id" class="form-select mb-3 mt-2" required>
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($response['cours'] as $item)
                                <option value="{{ $item['id'] }}">{{ $item['cours_name'] }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteGroups" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Guruhdan o'chirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create_groups_remove_user') }}" method="POST" id="visitForm">
                        @csrf
                        <table class="table table-bordered text-center" style="font-size:14px;">
                            <tr>
                                <th>Guruh:</th>
                                <td>{{ $response['group']['group'] }}</td>
                            </tr>
                            <tr>
                                <th>Guruh narxi:</th>
                                <td>{{ number_format($response['group']['price'], 0, '.', ' ') }}</td>
                            </tr>
                        </table>
                        <input type="hidden" name="group_id" value="{{ $response['group']['id'] }}">
                        <label for="user_id">O'chiradigan talabani tanlang</label>
                        <select name="user_id" required class="form-select mb-3 mt-1">
                            <option value="">Tanlang</option>
                            @foreach($response['activ_user'] as $item)
                                <option value="{{ $item['user_id'] }}">{{ $item['user_name'] }} (Balans: {{ number_format($item['balans'], 0, '.', ' ') }})</option>
                            @endforeach
                        </select>
                        <label for="jarima">Jarima summasi</label>
                        <input type="text" name="jarima" value="0" id="paymentAmount" class="form-control mt-2 mb-3" required>
                        <label for="description">Guruhdan o'chirish sababi</label>
                        <textarea name="description"  required class="form-control mb-3 mt-2"></textarea>
                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">Guruhdan o'chirish</button>
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

        document.getElementById('paymentAmount2').addEventListener('input', function(event) {
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
