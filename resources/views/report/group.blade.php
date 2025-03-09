@extends('layouts.app02')
@section('title','Guruhlar')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title w-100 text-center mb-0 pb-0">Guruhlar</h3>
        <form action="{{ route('report_group_next') }}" method="get" class="row">
            <div class="col-lg-3 col-12"></div>
            <div class="col-lg-4 col-9">
                <select name="type" required class="form-select my-2">
                    <option value="">Tanlang</option>
                    <option value="all">Barcha guruhlar</option>
                    <option value="test">Test natijasi</option>
                </select>
            </div>
            <div class="col-lg-2 col-3">
                <button class="btn btn-primary my-2" type="submit">Qidruv</button>
            </div>
        </form>
    </div>
</div>

@endsection
