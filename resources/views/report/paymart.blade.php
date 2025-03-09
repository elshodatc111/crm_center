@extends('layouts.app02')
@section('title','To\'lovlar')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title w-100 text-center mb-0 pb-0">To'lovlar</h3>
        <form action="{{ route('report_paymart_next') }}" method="get" class="row">
            <div class="col-lg-4 col-12">
                <select name="type" required class="form-select my-2">
                    <option value="">Tanlang</option>
                    <option value="paymart">Barcha to'lovlar</option>
                    <option value="kassa_chiqim">Kassadan chiqimlar</option>
                    <option value="moliya_chiqim">Balansdan chiqimlar</option>
                    <option value="hodim_paymart">Hodimlarga to'langan ish haqi</option>
                    <option value="texher_paymart">O'qituvchilarga to'langan ish haqi</option>
                </select>
            </div>
            <div class="col-lg-3 col-6">
                <input type="date" name="start" required class="form-control my-2">
            </div>
            <div class="col-lg-3 col-6">
                <input type="date" name="end" required class="form-control my-2">
            </div>
            <div class="col-lg-2 col-12">
                <button class="btn btn-primary my-2" type="submit">Qidruv</button>
            </div>
        </form>
    </div>
</div>

@endsection
