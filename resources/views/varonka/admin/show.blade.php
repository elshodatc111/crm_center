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

<div class="row">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card profile-card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2 class="text-primary"><i class="bi bi-person"></i> Kevin Anderson</h2>
                    <ul class="list-group w-100 mt-3">
                        <li class="list-group-item"><i class="bi bi-telephone"></i> <strong>Telefon 1:</strong> +998 90 123 45 67</li>
                        <li class="list-group-item"><i class="bi bi-telephone"></i> <strong>Telefon 2:</strong> +998 91 765 43 21</li>
                        <li class="list-group-item"><i class="bi bi-geo-alt"></i> <strong>Manzil:</strong> Toshkent, Chilonzor tumani</li>
                        <li class="list-group-item"><i class="bi bi-calendar"></i> <strong>Tug‘ilgan sana:</strong> 1995-07-21</li>
                        <li class="list-group-item"><i class="bi bi-check-circle"></i> <strong>Status:</strong> New/Return/Pending/Success/Cancel</li>
                        <li class="list-group-item"><i class="bi bi-clock"></i> <strong>Murojaat vaqti:</strong> 12:34:56</li>
                        <li class="list-group-item"><i class="bi bi-globe"></i> <strong>Ijtimoiy tarmoq turi:</strong> Instagram</li>
                    </ul>
                </div>
            </div>
            <div class="row mb-2 px-2">
                <div class="col-6">
                    <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#cancelModal">
                        <i class="bi bi-x-circle"></i> Bekor qilish
                    </button>
                </div>
                <div class="col-6">
                    <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="bi bi-check-circle"></i> Ro'yxatga olish
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body chat-box p-3" id="chatBox" style="height: 400px; overflow-y: auto; background: #f8f9fa;">
                <h5 class="card-title w-100 text-center bg-white"><i class="bi bi-chat-dots"></i> Murojat haqida</h5>
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-start mb-2">
                        <div class="p-3 bg-light border rounded shadow">
                            <strong>Meneger (meneger123):</strong> <i class="text-muted">2025-01-01 15:22</i>
                            <div class="small">Assalomu alaykum! Bu boshqa xabar.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <form action="#" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Xabar yozing..." required>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                    </div>
                </form>
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
                Ishonchingiz komilmi? Ushbu murojaatni bekor qilmoqchimisiz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yo‘q</button>
                <button type="button" class="btn btn-danger">Ha, bekor qilish</button>
            </div>
        </div>
    </div>
</div>

<!-- Ro‘yxatga olish modali -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="registerModalLabel">Ro‘yxatga olish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ushbu murojaatni ro‘yxatga olishga ishonchingiz komilmi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                <button type="button" class="btn btn-success">Ha, ro‘yxatga olish</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
</script>
@endsection
