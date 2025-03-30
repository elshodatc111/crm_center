@extends('layouts.app02')
@section('title','Upload Users')
@section('content')
    <div class="pagetitle">
        <h1>Upload Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Upload Users</li>
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
                <div class="col-6">Upload Users</div>
                <div class="col-6" style="text-align:right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitModal"><i class="bi bi-plus"></i> Yangi Guruh</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fayl nomi</th>
                            <th>Yuklangan vaqt</th>
                            <th>Bajarilgan vaqt</th>
                            <th>Administrator</th>
                            <th>Holati</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($getFiles as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['file_name'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>{{ $item['updated_at'] }}</td>
                                <td>{{ $item['admin'] }}</td>
                                <td>{{ $item['commint'] }}</td>
                                <td>
                                    @if($item['status'] == 'false')
                                        <form action="{{ route('trash.excel') }}" method="post" style="display: inline-block; margin-right: 5px;">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button type="submit"  class="btn btn-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <form action="{{ route('run.excel') }}" method="post" style="display: inline-block;">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button type="submit"  class="btn btn-success p-0 px-1"><i class="bi bi-check"></i></button>
                                        </form>
                                    @else
                                        {{ $item['status'] }}
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Yuklangan fayllar mavjud emas.</td>
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
                    <h5 class="modal-title" id="addVisitModalLabel">Yangi guruh qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload.excel') }}" method="POST" id="visitForm" enctype="multipart/form-data">
                        @csrf
                        <label for="excel_file" class="mb-1">Excel faylini tanlang</label>
                        <input type="file" name="excel_file" accept=".xlsx, .xls" required class="form-control">
                        <hr>

                        <button type="submit" class="btn btn-primary w-100" id="submit-btn">Yangi guruhni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
