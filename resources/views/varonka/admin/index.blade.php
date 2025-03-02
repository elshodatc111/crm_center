@extends('layouts.app02')
@section('title','Murojatlar')
@section('content')
    <div class="pagetitle">
        <h1>Murojatlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                <li class="breadcrumb-item">Murojatlar</li>
            </ol>
        </nav>
    </div>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body pt-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('meneger_varonka_new') }}" class="btn btn-outline-primary d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-envelope"></i> Yangi murojatlar</span>
                        <span class="badge bg-white text-primary">{{ $charts['new'] }}</span>
                    </a>
                    <a href="{{ route('meneger_varonka_pedding') }}" class="btn btn-outline-warning d-flex justify-content-between align-items-center text-dark">
                        <span><i class="bi bi-eye"></i> Ko‘rib chiqilmoqda</span>
                        <span class="badge bg-white text-warning">{{ $charts['pedding'] }}</span>
                    </a>
                    <a href="{{ route('meneger_varonka_success') }}" class="btn btn-outline-info d-flex justify-content-between align-items-center text-success">
                        <span><i class="bi bi-check-circle"></i> Qabul qilindi</span>
                        <span class="badge bg-white text-info">{{ $charts['success'] }}</span>
                    </a>
                    <a href="{{ route('meneger_varonka_cancel') }}" class="btn btn-outline-danger d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-x-circle"></i> Bekor qilindi</span>
                        <span class="badge bg-white text-danger">{{ $charts['cancel'] }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover justify-content-center" style="font-size:12px;">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Tarmoq</th>
                                <th class="text-center">Havola</th>
                                <th class="text-center">Nusxalash</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><i class="bi bi-telegram text-primary"></i> Telegram</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_telegram' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard('{{ env('APP_URL').'/social_telegram' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-instagram text-danger"></i> Instagram</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_instagram' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-danger" onclick="copyToClipboard('{{ env('APP_URL').'/social_instagram' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-facebook text-primary"></i> Facebook</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_facebook' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard('{{ env('APP_URL').'/social_facebook' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-youtube text-danger"></i> YouTube</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_youtube' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-danger" onclick="copyToClipboard('{{ env('APP_URL').'/social_youtube' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-image text-warning"></i> Bannerlar</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_banner' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-warning" onclick="copyToClipboard('{{ env('APP_URL').'/social_banner' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-people text-success"></i> Tanishlar</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_tanish' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-success" onclick="copyToClipboard('{{ env('APP_URL').'/social_tanish' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="bi bi-link-45deg text-secondary"></i> Boshqalar</td>
                                <td><input type="text" class="form-control" value="{{ env('APP_URL').'/social_boshqa' }}" readonly></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-secondary" onclick="copyToClipboard('{{ env('APP_URL').'/social_boshqa' }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        alert('Havola nusxalandi: ' + text);
                    }).catch(err => {
                        console.error('Nusxalashda xatolik yuz berdi: ', err);
                    });
                }
            </script>
        </div>
    </div>
</div>




@endsection
