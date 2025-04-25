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
            <form action="{{ route('all_groups') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Guruh nomini kiriting..." value="{{ request('search') }}">
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Guruh nomi</th>
                            <th>Boshlanish vaqti</th>
                            <th>Tugash vaqti</th>
                            <th>Talabalar soni</th>
                            <th>Guruh holati</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($resours['groups'] as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($resours['groups']->currentPage() - 1) * $resours['groups']->perPage() }}</td>
                            <td style="text-align:left"><a href="{{ route('create_show', $item->id) }}">{{ $item->group_name }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($item->lessen_start)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->lessen_end)->format('Y-m-d') }}</td>
                            <td>{{ $item->group_users_count }}</td>
                            <td>
                                @if (now()->between(\Carbon\Carbon::parse($item->lessen_start), \Carbon\Carbon::parse($item->lessen_end)))
                                    <span class="badge bg-success">Aktiv</span>
                                @elseif (now()->gt(\Carbon\Carbon::parse($item->lessen_end)))
                                    <span class="badge bg-danger">Yakunlangan</span>
                                @else
                                    <span class="badge bg-primary">Yangi</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Guruhlar mavjud emas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $resours['groups']->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
            </div>

                
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
                    <form action="{{ route('create_groups') }}" method="POST" id="visitForm">
                        @csrf
                        <label for="group_name" class="mb-1">Yangi guruh nomi</label>
                        <input type="text" name="group_name" required class="form-control">
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="cours_id" class="mb-1">Guruh uchun kurs</label>
                                <select name="cours_id" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['cours'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['cours_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="lessen_count" class="mb-1">Darslar soni</label>
                                <input type="number" name="lessen_count" value="12" min=9 max=31 required class="form-control">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="setting_rooms_id" class="mb-1">Dars Xonasi</label>
                                <select name="setting_rooms_id" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['rooms'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['room_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="lessen_start" class="mb-1">Boshlanish vaqti</label>
                                <input type="date" id="dateInput" name="lessen_start" required class="form-control" value="{{ date('Y-m-d') }}">
                                <div id="dateError" class="text-danger mt-2" style="display: none;">Boshlanish vaqti noto'g'ri</div>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="weekday" class="mb-1">Guruh turi</label>
                                <select name="weekday" id="" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    <option value="tok_kun">Haftaning toq kunlari</option>
                                    <option value="juft_kun">Haftaning juft kunlari</option>
                                    <option value="har_kun">Har kuni</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="lessen_times_id" class="mb-1">Dars vaqti</label>
                                <select name="lessen_times_id" class="form-select">
                                    <option value="" disabled selected>Tanlang...</option>
                                    @foreach($resours['time'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['time'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="setting_paymarts" class="pt-2 mb-1">To'lov summasi</label>
                        <select name="setting_paymarts" class="form-select">
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($resours['paymarts'] as $item)
                                <option value="{{ $item['id'] }}">To'lov: {{ number_format($item['amount'], 0, '.', ' ') }} so'm Chegirma: {{ number_format($item['chegirma'], 0, '.', ' ') }} so'm</option>
                            @endforeach
                        </select>
                        <label for="techer_id" class="pt-2 mb-1">Guruh o'qituvchisi</label>
                        <select name="techer_id" class="form-select">
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($resours['techers'] as $item)
                                <option value="{{ $item['id'] }}">{{ $item['user_name'] }}</option>
                            @endforeach
                        </select>
                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="techer_paymart" class="mb-1">O'qituvchiga to'lov</label>
                                <input type="text" name="techer_paymart" value="0" id="paymentAmount1" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="techer_bonus" class="mb-1">O'qituvchiga bonus</label>
                                <input type="text" name="techer_bonus" value="0" id="paymentAmount" required class="form-control">
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
