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
                                <i class="bi bi-cash-coin text-success me-1"></i> Naqt: <b>{{ number_format($kassa['naqt'], 0, '.', ' ') }}</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-credit-card text-primary me-1"></i> Plastik: <b>{{ number_format($kassa['plastik'], 0, '.', ' ') }}</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-arrow-down-circle text-warning me-1"></i> Naqt chiqim: <b>{{ number_format($kassa['naqt_chiq_pedding'], 0, '.', ' ') }}</b> so'm
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="bi bi-arrow-down-circle text-warning me-1"></i> Plastik chiqim: <b>{{ number_format($kassa['plastik_chiq_pedding'], 0, '.', ' ') }}</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-exclamation-circle text-danger me-1"></i> Naqt xarajat: <b>{{ number_format($kassa['naqt_xar_pedding'], 0, '.', ' ') }}</b> so'm
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-exclamation-circle text-danger me-1"></i> Plastik xarajat: <b>{{ number_format($kassa['plastik_xar_pedding'], 0, '.', ' ') }}</b> so'm
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
                        <i class="bi bi-cash-coin text-success me-1"></i> Naqt: <b>{{ number_format($service['balans_naqt'], 0, '.', ' ') }}</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card text-primary me-1"></i> Plastik: <b>{{ number_format($service['balans_plastik'], 0, '.', ' ') }}</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-heart text-danger me-1"></i> Exson: <b>{{ number_format($service['balans_exson'], 0, '.', ' ') }}</b> so'm
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
                <form action="{{ route('compamy_updateExson') }}" method="post">
                    @csrf 
                    <label for="exsonPercent" class="fw-bold">Exson foizi (%)</label>
                    <input type="number" name="exson_percent" value="{{ intval($service['exson_foiz']) }}" id="exsonPercent" required class="form-control">
                    <button class="btn btn-danger w-100 mt-3">
                        <i class="bi bi-save me-1"></i> Exsonni saqlash
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <button class="btn btn-primary w-100 mt-2 rounded shadow-sm" data-bs-toggle="modal" data-bs-target="#balansChiqimModal">
            <i class="bi bi-arrow-down-circle me-1"></i> Balansdan chiqim
        </button>
    </div>
    <div class="col-lg-6">
        <button class="btn btn-danger w-100 mt-2 rounded shadow-sm" data-bs-toggle="modal" data-bs-target="#balansXarajatModal">
            <i class="bi bi-cash-coin me-1"></i> Balansdan xarajatlar
        </button>
    </div>

    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body pt-3">
                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#chiqimlar-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Kassadan chiqim tarixi (oxirgi 3 oy)</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#balans-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Balansdan chiqim tarixi (oxirgi 3 oy)</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#ishhaqi-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">To'langan ish haqi (oxirgi 3 oy)</button>
                    </li>
                </ul>
                
                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="chiqimlar-justified" role="tabpanel" aria-labelledby="home-tab">
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
                                @forelse($chiqim as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['meneger'] }}</td>
                                    <td>
                                        @if($item['type']=='naqt_xar')
                                            <i class="text-danger">Xarajat (Naqt)</i>
                                        @elseif($item['type']=='naqt_chiq')
                                            <i class="text-success">Balansga kirim (Naqt)</i>
                                        @elseif($item['type']=='plastik_xar')
                                            <i class="text-danger">Xarajat (Plastik)</i>
                                        @elseif($item['type']=='plastik_chiq')
                                            <i class="text-success">Balansga kirim (Plastik)</i>
                                        @endif
                                    </td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>{{ $item['create_time'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['succes_time'] }}</td>
                                    <td>{{ $item['admin'] }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan=8 class="text-center">Oxirgi 3 oyda chiqimlar tarixi mavjud emas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="balans-justified" role="tabpanel" aria-labelledby="profile-tab">
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
                                @forelse($moliya as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            @if($item['type']=='chiq_plastik')
                                                <i class="text-primary">Daromad (Plastik)</i>
                                            @elseif($item['type']=='chiq_naqt')
                                                <i class="text-primary">Daromad (Naqt)</i>
                                            @elseif($item['type']=='chiq_exson')
                                                <i class="text-success">Exson</i>
                                            @elseif($item['type']=='xar_naqt')
                                                <i class="text-danger">Xarajat (Naqt)</i>
                                            @else
                                                <i class="text-danger">Xarajat (Plastik)</i>
                                            @endif
                                        </td>
                                        <td>{{ number_format($item['amount'], 0, '.', ' ') }}</td>
                                        <td>{{ $item['comment'] }}</td>
                                        <td>{{ $item['user_name'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan=6 class="text-center"></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="ishhaqi-justified" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table text-center table-bordered" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ish haqi</th>
                                    <th>Chiqim summasi</th>
                                    <th>Chiqim haqida</th>
                                    <th>Admin</th>
                                    <th>Chiqim vaqti</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="balansChiqimModal" tabindex="-1" aria-labelledby="balansChiqimLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balansChiqimLabel">Balansdan chiqim (Daromad, Exson)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th colspan=3 class="text-center">Balanda mavjud</th>
                        </tr>
                        <tr>
                            <th>Naqt</th>
                            <th>Plastik</th>
                            <th>Exson uchun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($service['balans_naqt'], 0, '.', ' ') }} so'm</td>
                            <td>{{ number_format($service['balans_plastik'], 0, '.', ' ') }} so'm</td>
                            <td>{{ number_format($service['balans_exson'], 0, '.', ' ') }} so'm</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('compamy_moliya_chiqim') }}" method="post">
                    @csrf 
                    <input type="hidden" name="naqt" value="{{ $service['balans_naqt'] }}">
                    <input type="hidden" name="plastik" value="{{ $service['balans_plastik'] }}">
                    <input type="hidden" name="exson" value="{{ $service['balans_exson'] }}">
                    <label for="amount" class="mb-1">Chiqim summasi:</label>
                    <input type="text" name="amount" class="form-control" id="amount" required>
                    <script>
                        document.getElementById('amount').addEventListener('input', function(event) {
                            let input = event.target.value.replace(/\D/g, ''); 
                            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); 
                            event.target.value = formatted;
                        });
                    </script>
                    <label for="type" class="mt-2 mb-1">Chiqim turi:</label>
                    <select name="type" required class="form-select">
                        <option value="">Tanlang...</option>
                        <option value="naqt">Naqt (Daromad)</option>
                        <option value="plastik">Plastik (Daromad)</option>
                        <option value="exson">Exson uchun</option>
                    </select>
                    <label for="discription" class="mt-2 mb-1">Chiqim haqida:</label>
                    <textarea name="discription" class="form-control" required></textarea>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary w-100">Tasdiqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="balansXarajatModal" tabindex="-1" aria-labelledby="balansXarajatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balansXarajatLabel">Balansdan xarajatlar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th colspan=2 class="text-center">Balanda mavjud</th>
                        </tr>
                        <tr>
                            <th>Naqt</th>
                            <th>Plastik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($service['balans_naqt'], 0, '.', ' ') }} so'm</td>
                            <td>{{ number_format($service['balans_plastik'], 0, '.', ' ') }} so'm</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('compamy_moliya_xarajat') }}" method="post">
                    @csrf 
                    <input type="hidden" name="naqt" value="{{ $service['balans_naqt'] }}">
                    <input type="hidden" name="plastik" value="{{ $service['balans_plastik'] }}">
                    <label for="amount" class="mb-1">Xarajat summasi:</label>
                    <input type="text" name="amount" class="form-control" id="amount1" required>
                    <script>
                        document.getElementById('amount1').addEventListener('input', function(event) {
                            let input = event.target.value.replace(/\D/g, ''); 
                            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); 
                            event.target.value = formatted;
                        });
                    </script>
                    <label for="type" class="mt-2 mb-1">Xarajat turi:</label>
                    <select name="type" required class="form-select">
                        <option value="">Tanlang...</option>
                        <option value="naqt">Naqt (Xarajat)</option>
                        <option value="plastik">Plastik (Xarajat)</option>
                    </select>
                    <label for="discription" class="mt-2 mb-1">Xarajat haqida:</label>
                    <textarea name="discription" class="form-control" required></textarea>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary w-100">Tasdiqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
