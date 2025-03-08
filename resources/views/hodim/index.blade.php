@extends('layouts.app01')
@section('title','Hodimlar')
@section('content')
<div class="pagetitle">
    <h1>Hodimlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Hodimlar</li>
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
                <div class="row card-title">
                    <div class="col-6">Hodimlar</div>
                    <div class="col-6" style="text-align:right">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitModal"><i class="bi bi-plus"></i> Yangi hodim</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hodim</th>
                                <th>Telefon raqam</th>
                                <th>Yashash manzil</th>
                                <th>Lavozim</th>
                                <th>Login</th>
                                <th>Ish faoliyati</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><a href="{{ route('compamy_hodim_show',$item['id']) }}">{{ $item['user_name'] }}</a></td>
                                <td>{{ $item['phone1'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>
                                    @if($item['status']=='true')
                                        <i class="text-success">Aktive</i>
                                    @else
                                        <i class="text-danger">Block</i>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=6 class="text-center">Hodimlar mavjud emas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addVisitModal" tabindex="-1" aria-labelledby="addVisitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisitModalLabel">Yangi hodim qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('compamy_hodim_create') }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="user_name" class="form-label">Hodim FIO</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                        <div class="mb-2 row">
                            <div class="col-6">
                                <label for="phone1" class="form-label">Telefon raqam</label>
                                <input type="text" class="form-control phone" value="+998" id="phone1" name="phone1" required>
                            </div>
                            <div class="col-6">
                                <label for="phone2" class="form-label">Telefon raqam 2</label>
                                <input type="text" class="form-control phone" value="+998" id="phone2" name="phone2" required>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-6">
                                <label for="birthday" class="form-label">Tug'ilgan kuni</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" required>
                            </div>
                            <div class="col-6">
                                <label for="address_id" class="form-label">Yashash manzili</label>
                                <select name="address_id"  class="form-select">
                                    <option value="">Tanlang</option>
                                    @foreach($addres as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="type" class="form-label">Hodim lavozimi</label>
                            <select name="type"  class="form-select">
                                <option value="">Tanlang</option>
                                <option value="admin">Admin</option>
                                <option value="meneger">Meneger</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="about" class="form-label">Hodim haqida</label>
                            <textarea name="about" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
    </script>
@endsection
