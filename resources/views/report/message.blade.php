@extends('layouts.app02')
@section('title','Yuborilgan smslar')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title w-100 text-center mb-0 pb-0">Yuborilgan smslar</h3>
        <form action="{{ route('report_message_next') }}" method="get" class="row">
            <div class="col-lg-4 col-12">
                <select name="type" required class="form-select my-2">
                    <option value="">Tanlang</option>
                    <option value="send_message">Yuborilgan smslar</option>
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
