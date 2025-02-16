@extends('layouts.app02')
@section('title','To\'lov sozlamalari')
@section('content')
    <div class="pagetitle">
        <h1>To\'lov sozlamalari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">To'lov sozlamalari</li>
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
                    <h3 class="card-title">Yangi to'lov qo'shish</h3>
                    <form action="{{ route('settings_paymart_create') }}" method="POST">
                        @csrf 
                        <div class="mb-1">
                            <label for="amount" class="form-label">Miqdor (amount)</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="mb-1">
                            <label for="chegirma" class="form-label">Chegirma (chegirma)</label>
                            <input type="number" step="0.01" class="form-control" id="chegirma" name="chegirma">
                        </div>
                        <div class="mb-2">
                            <label for="admin_chegirma" class="form-label">Admin chegirma (admin_chegirma)</label>
                            <input type="number" step="0.01" class="form-control" id="admin_chegirma" name="admin_chegirma">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-50">Saqlash</button>
                        </div>
                    </form>     
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Aktiv to'lov summasi</h2>
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>To'lov summasi</th>
                                <th>Chegirma Summasi</th>
                                <th>Admin uchun chegirma</th>
                                <th>Admin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activPaymart as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ number_format($item['amount'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['chegirma'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['admin_chegirma'], 0, '.', ' ') }}</td>
                                <td>{{ $item['user_id'] }}</td>
                                <td>
                                    <form action="{{ route('settings_paymart_update') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button class="btn btn-danger px-1 py-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan=6>To'lovlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">O'chirilgan to'lov summasi</h2>
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>To'lov summasi</th>
                                <th>Chegirma Summasi</th>
                                <th>Admin uchun chegirma</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($deletePaymart as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ number_format($item['amount'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['chegirma'], 0, '.', ' ') }}</td>
                                <td>{{ number_format($item['admin_chegirma'], 0, '.', ' ') }}</td>
                                <td>{{ $item['user_id'] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan=5>O'chirilgan to'lovlar mavjud emas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
