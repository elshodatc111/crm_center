@extends('layouts.app02')
@section('title','SMS sozlamalari')
@section('content')
    <div class="pagetitle">
        <h1>SMS sozlamalari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">SMS sozlamalari</li>
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
            <h3 class="card-title">Sozlamalar</h3>
            <form action="{{ route('settings_sms_update') }}" method="post">
                @csrf 
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="new_student_sms" name="new_student_sms" {{ $setting['new_student_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="new_student_sms">Yangi qo'shilgan tashrifga sms yuborish</label>
                </div>
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="new_hodim_sms" name="new_hodim_sms" {{ $setting['new_hodim_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="new_hodim_sms">Yangi hodimga sms yuborish</label>
                </div>
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="pay_student_sms" name="pay_student_sms" {{ $setting['pay_student_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="pay_student_sms">To'lov amalga oshirganda to'lov haqida sms yuborish</label>
                </div>
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="pay_hodim_sms" name="pay_hodim_sms" {{ $setting['pay_hodim_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="pay_hodim_sms">Hodimlarga ish haqi to'langanda to'lov haqida sms yuborish</label>
                </div>
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="update_pass_sms" name="update_pass_sms" {{ $setting['update_pass_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="update_pass_sms">Parolni yangilanganda yangilanish haqida sms habar yuborish</label>
                </div>
                <div class="form-check form-switch my-1">
                    <input class="form-check-input" type="checkbox" id="birthday_sms" name="birthday_sms" {{ $setting['birthday_sms']==1?'checked':'' }}>
                    <label class="form-check-label" for="birthday_sms">Tug'ilgan kunni nishonlayotganlarga sms habar yuborish</label>
                </div>
                <button class="btn btn-primary mt-2" type="submit"><i class="bi bi-card-checklist"></i> O'zgarishlarni saqlash</button>
            </form>        
        </div>
    </div>

@endsection
