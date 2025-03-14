@extends('layouts.app03')
@section('title','Murojat haqida')
@section('content')
<div class="pagetitle">
    <h1>Murojat haqida</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('meneger_varonka') }}">Murojatlar</a></li>
            <li class="breadcrumb-item active">Murojat haqida</li>
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

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card profile-card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2 class="text-primary">{{ $user['user_name'] }}</h2>
                    <ul class="list-group w-100 mt-3">
                        <li class="list-group-item"><i class="bi bi-telephone"></i> <strong>Telefon 1:</strong> {{ $user['phone1'] }}</li>
                        <li class="list-group-item"><i class="bi bi-telephone"></i> <strong>Telefon 2:</strong> {{ $user['phone2'] }}</li>
                        <li class="list-group-item"><i class="bi bi-geo-alt"></i> <strong>Manzil:</strong> {{ $user['address'] }}</li>
                        <li class="list-group-item"><i class="bi bi-calendar"></i> <strong>Tug‘ilgan sana:</strong> {{ $user['birthday'] }}</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Status:</strong> {{ $user['status2'] }}</li>
                        <li class="list-group-item"><i class="bi bi-clock"></i> <strong>Murojaat vaqti:</strong> {{ $user['created_at'] }}</li>
                        <li class="list-group-item"><i class="bi bi-globe"></i> <strong>Ijtimoiy tarmoq turi:</strong> {{ $user['type_social'] }}</li>
                    </ul>
                </div> 
            </div>
            @if($user['status']!='cancel')
            <div class="row mb-2 px-2">
                <div class="col-12">
                    @if($user['register_id'] == 0)
                    <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#cancelModal">
                        <i class="bi bi-x-circle"></i> Bekor qilish
                    </button>
                    @endif
                </div>
                <div class="col-12">
                    @if(!$check)
                        @if($user['register_id'] == 0)
                            @if(!$status)
                            <button class="btn btn-success mt-2 w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                                <i class="bi bi-check-circle"></i> Ro'yxatga olish
                            </button>
                            @endif
                        @else
                        <a class="btn btn-info text-white w-100 mt-2" href="{{ route('student_show', $user['register_id']) }}">
                            <i class="bi bi-person"></i> Ro'yxatga olingan
                        </a>
                        @endif
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body chat-box p-3" id="chatBox" style="height: 400px; overflow-y: auto; background: #f8f9fa;">
                <h5 class="card-title w-100 text-center bg-white"><i class="bi bi-chat-dots"></i> Murojat haqida</h5>
                <div class="d-flex flex-column">
                    @if($check)
                        <div class="d-flex justify-content-start mb-2">
                            <div class="p-3 bg-light border rounded shadow">
                                <strong>Ro'yhatdan o'tgan</strong> <i class="text-muted">{{ $check['created_at'] }}</i>
                                <div class="small"><a href="{{ route('student_show',$check['id']) }}">{{ $check['user_name'] }}</a> bu murojatchi oldin ro'yhatdan o'tgan.</div>
                            </div>
                        </div>
                    @endif
                    @forelse($comment as $item)
                    <div class="d-flex justify-content-start mb-2">
                        <div class="p-3 bg-light border rounded shadow">
                            <strong>{{ $item['user_name'] }}</strong> <i class="text-muted">{{ $item['created_at'] }}</i>
                            <div class="small">{{ $item['comment'] }}</div>
                        </div>
                    </div>
                    @empty
                        <div class="d-flex justify-content-start mb-2">
                            <div class="p-3 bg-light border rounded shadow">
                                <strong>Admin</strong></i>
                                <div class="small">Murojatchi haqida malumotlarni saqlab qo'yish uchun joy.</div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="card-footer">
                @if(!$check)
                    @if($user['status']!='cancel')
                        <form action="{{ route('meneger_varonka_comments_post') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="id" value="{{ $user['id'] }}">
                                <input type="text" name="comment" class="form-control" placeholder="Eslatma qoldiring..." required>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="cancelModalLabel">Bekor qilish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('meneger_varonka_cancel_post') }}" method="post">
                    @csrf 
                    Ishonchingiz komilmi? Ushbu murojaatni bekor qilmoqchimisiz?
                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-6"><button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Yo‘q</button></div>
                        <div class="col-6"><button type="submit" class="btn btn-danger w-100">Ha, bekor qilish</button></div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="registerModalLabel">Ro‘yxatga olish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('meneger_varonka_register_post') }}" method="post">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                    <label for="about">Ro'yhatga olish haqida</label>
                    <textarea name="about" required class="form-control mb-3"></textarea>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100">Ro‘yxatga olish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
</script>
@endsection
