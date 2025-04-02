@extends('layouts.app01')
@section('title','Kassa')
@section('content')
<div class="pagetitle">
    <h1>Kassa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Kassa</li>
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
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-cash-coin me-1 text-success"></i> Kassada mavjud summa
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-cash-stack me-1 text-success"></i> Naqt: <b>{{ number_format($getKassa['naqt'], 0, '.', ' ') }}</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card-2-front me-1 text-primary"></i> Plastik: <b>{{ number_format($getKassa['plastik'], 0, '.', ' ') }}</b> so'm
                    </li>
                </ul>
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#refundModal">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Qaytarilgan to'lovlar
                </button>
            </div>
        </div>
    </div> 

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-arrow-down-circle me-1 text-danger"></i> Chiqim kutilmoqda
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-box-arrow-down me-1 text-danger"></i> Naqt: <b>{{ number_format($getKassa['naqt_chiq_pedding'], 0, '.', ' ') }}</b> so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card me-1 text-warning"></i> Plastik: <b>{{ number_format($getKassa['plastik_chiq_pedding'], 0, '.', ' ') }}</b> so'm
                    </li>
                </ul>
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#expenseModal">
                    <i class="bi bi-box-arrow-right me-1"></i> Kassadan chiqim
                </button>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-cart-check me-1 text-warning"></i> Tasdiqlanmagan chiqimlar
                </h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="font-size:14px">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>Meneger</th>
                                <th>Chiqim turi</th>
                                <th>Chimim summasi</th>
                                <th>Chiqim vaqti</th>
                                <th>Chiqim haqida</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pedding as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['user_name'] }}</td>
                                    <td>
                                        @if($item['type']=='naqt_chiq')
                                            <i class="text-primary">Kassadan chiqim (Naqt)</i>
                                        @elseif($item['type']=='plastik_chiq')
                                            <i class="text-primary">Kassadan chiqim (Plastik)</i>
                                        @elseif($item['type']=='naqt_xar')
                                            <i class="text-danger">Kassadan xarajat (Naqt)</i>
                                        @elseif($item['type']=='plastik_xar')
                                            <i class="text-danger">Kassadan xarajat (Plastik)</i>
                                        @endif
                                    </td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>{{ $item['create_time'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>
                                        <div class="d-flex gap-2 text-center">
                                            @if(auth()->user()->type != 'meneger')
                                                <form action="{{ route('compamy_kassa_success') }}" method="post" class="d-inline-block">
                                                    @csrf 
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                    <button type="submit" class="btn btn-success px-1 py-0"><i class="bi bi-check"></i></button>
                                                </form>
                                            @endif
                                            <form action="{{ route('compamy_kassa_delete') }}" method="post" class="d-inline-block">
                                                @csrf 
                                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                <button type="submit" class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">Tasdiqlanmagan chiqim va xarajatlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    To'lovlar (oxirgi 7 kun)
                </h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba</th>
                                <th>To'lov summasi</th>
                                <th>To'lov turi</th>
                                <th>To'lov vaqti</th>
                                <th>To'lov haqida</th>
                                <th>Meneger</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($paymarts as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><a href="{{ route('student_show',$item['user_id']) }}">{{ $item['user'] }}</a></td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>{{ $item['paymart_type'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['admin'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center">To'lovlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg kengroq variant -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundModalLabel">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Qaytarilgan to'lovlar (oxirgi 7 kun)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Talaba</th>
                                <th>Qaytarilgan</th>
                                <th>Qaytarish sababi</th>
                                <th>Qaytarilgan vaqt</th>
                                <th>Meneger</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($returnPaymart as $item)
                                <tr>
                                    <td class="td">{{ $loop->index+1 }}</td>
                                    <td><a href="{{ route('student_show',$item['user_id']) }}">{{ $item['user_name'] }}</a></td>
                                    <td class="td">{{ $item['amount'] }}</td>
                                    <td class="td">{{ $item['description'] }}</td>
                                    <td class="td">{{ $item['created_at'] }}</td>
                                    <td class="td">{{ $item['admin'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=5 class="text-center">Oxirgi 7 kunda qaytarilgan to'lovlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expenseModalLabel">
                    <i class="bi bi-box-arrow-right me-1"></i> Kassadan chiqim
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th colspan=2>Kassada mavjud</th>
                        </tr>
                        <tr>
                            <th>Naqt</th>
                            <th>Plastik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($getKassa['naqt'], 0, '.', ' ') }} so'm</td>
                            <td>{{ number_format($getKassa['plastik'], 0, '.', ' ') }} so'm</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('compamy_kassa_chiqim') }}" method="post">
                    @csrf
                    <input type="hidden" name="naqt" value="{{ $getKassa['naqt'] }}">
                    <input type="hidden" name="plastik" value="{{ $getKassa['plastik'] }}">
                    <label for="amount" class="my-2">Chiqim summasi</label>
                    <input type="text" name="amount" id="paymentAmount01" required class="form-control">
                    <script>
                        document.getElementById('paymentAmount01').addEventListener('input', function(event) {
                            let input = event.target.value.replace(/\D/g, ''); 
                            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); 
                            event.target.value = formatted;
                        });
                    </script>
                    <label for="type" class="my-2">Chiqim turi</label>
                    <select name="type" required class="form-select">
                        <option value="naqt">Naqt</option>
                        <option value="plastik">Plastik</option>
                    </select>
                    <label for="description" class="my-2">Chiqim haqida</label>
                    <textarea name="description" class="form-control mb-2" required></textarea>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary w-100" data-bs-dismiss="modal">Saqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
