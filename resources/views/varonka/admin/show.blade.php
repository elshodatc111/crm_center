@extends('layouts.app03')
@section('title','Bekor qilindi')
@section('content')
    <div class="pagetitle">
        <h1>Bekor qilindi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('meneger_varonka') }}">Murojatlar</a></li>
                <li class="breadcrumb-item">Bekor qilindi</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <div class="d-grid gap-2">
                <a class="btn btn-danger d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-x-circle"></i> Bekor qilindi</span>
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
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                
            </div>

        </div>
    </div>
        




@endsection
