@extends('layouts.app02')
@section('title','Yangi Murojatlar')
@section('content')
    <div class="pagetitle">
        <h1>Yangi murojatlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('meneger_varonka') }}">Murojatlar</a></li>
                <li class="breadcrumb-item">Yangi murojatlar</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <div class="d-grid gap-2">
                <a class="btn btn-success d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-people"></i> Talabalarinizdan murojatlar</span>
                    <span class="badge bg-white text-primary">{{ $count }}</span>
                </a>
            </div>
            <table class="table table-bordered mt-2 text-center" style="font-size:14px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Murojaatchi</th>
                        <th>Murojaatchi manzil</th>
                        <th>Murojaatchi telefon raqami</th>
                        <th>Murojaatchi ro‘yxatdan o‘tdi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($Varonka->count() > 0)
                        @foreach($Varonka as $index => $item)
                            <tr>
                                <td>{{ $Varonka->firstItem() + $index }}</td>
                                <td><a href="{{ route('meneger_varonka_show',$item->id ) }}">{{ $item->user_name }}</a></td>
                                <td>{{ $item->address ?? 'Mavjud emas' }}</td>
                                <td>{{ $item->phone1 ?? 'Mavjud emas' }}</td>
                                <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Murojaatlar mavjud emas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $Varonka->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
        




@endsection
