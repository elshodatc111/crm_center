@extends('layouts.app01')
@section('title','Tizim sozlamalari')
@section('content')
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
                <h3 class="card-title">Markaz nomini yangilash</h3>
                <form action="{{ route('sadmin_update_name') }}" method="post">
                    @csrf
                    <label for="name">Markaz nomi</label>
                    <input type="text" name="name" value="{{ $Setting['name'] }}" required class="form-control">
                    <button type="submit" class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Markaz holati ({{ $Setting['status']=='true'?'Aktive':'Block' }})</h3>
                <form action="{{ route('sadmin_update_status') }}" method="post">
                    @csrf
                    <label for="status">Markaz holatini tanlang</label>
                    <select type="text" name="status" required class="form-select">
                        <option value="">Tanlang</option>
                        <option value="true">Aktiv</option>
                        <option value="false">Block</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100 mt-2">O'zgarishlarni saqlash</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
