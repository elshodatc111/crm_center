@extends('layouts.app02')
@section('title','Chegirmali to\'lovlar')
@section('content')
    <div class="pagetitle">
        <h1>Chegirmali to'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Chegirmali to'lovlar</li>
            </ol>
            <p class="text-danger">Chegirmali to'lov faqat bittasi aktiv bo'lishi mumkun</p>
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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi chegirmali to'liv</h3>
                    <form action="{{ route('setting_chegirma_create') }}" method="post">
                        @csrf 
                        <label for="amount" class="mb-1">Chegirmali to'lov summasi</label>
                        <input type="text" id="paymentAmount" name="amount" required class="form-control">
                        <label for="chegirma" class="my-1">To'lov uchun chegirma</label>
                        <input type="text" id="paymentAmount1" name="chegirma" required class="form-control">
                        <label for="comment" class="my-1">To'lov haqida</label>
                        <textarea type="text" name="comment" required class="form-control"></textarea>
                        <button class="btn btn-primary w-100 mt-2">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Chegirmali to'lovlar</h3>
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>To'lov summasi</th>
                                <th>Chegirmas summasi</th>
                                <th>Chegirma haqida</th>
                                <th>Status</th>
                                <th>Sozlama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($chegirma as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ number_format($item['amount'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['chegirma'], 0, '.', ' ') }}</td>
                                <td>{{ $item['comment'] }}</td>
                                <td>@if($item['status']=='true')
                                        <span class="badge bg-success">Aktiv</span>
                                    @else
                                        <span class="badge bg-danger">Delete</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item['status']=='true')
                                        <form action="{{ route('setting_chegirma_update') }}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=6 class="text-center">Chegirmalar mavjud emas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
    </div>
<script>
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
</script>
@endsection
