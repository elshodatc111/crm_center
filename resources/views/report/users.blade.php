@extends('layouts.app02')
@section('title','Talabalar')
@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title w-100 text-center mb-0 pb-0">Talabalar</h3>
            <form action="{{ route('report_users_next') }}" method="get" class="row">
                <div class="col-lg-3 col-12"></div>
                <div class="col-lg-4 col-9">
                    <select name="type" required class="form-select my-2">
                        <option value="">Tanlang</option>
                        <option value="all">Barcha talabalar</option>
                        <option value="debet">Qarzdor talabalar</option>
                        <option value="active">Aktiv talabalar</option>
                    </select>
                </div>
                <div class="col-lg-2 col-3">
                    <button class="btn btn-primary my-2" type="submit">Qidruv</button>
                </div>
            </form>
        </div>
    </div>
    

@endsection
