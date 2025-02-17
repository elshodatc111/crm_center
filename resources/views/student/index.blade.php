@extends('layouts.app01')
@section('title','Tashriflar')
@section('content')

    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="card-title row">
                    <div class="col-6">
                        Tashriflar
                    </div>
                    <div class="col-6" style="text-align:right">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tashrifModal">
                            <i class="bi bi-plus"></i> Yangi tashrif
                        </button>
                    </div>
                </div>
                <table class="table text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tashrif nomi</th>
                            <th>Sana</th>
                            <th>Tavsif</th>
                            <th>Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ma'lumotlar bu yerda chiqariladi -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tashrifModal" tabindex="-1" aria-labelledby="tashrifModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tashrifModalLabel">Yangi tashrif qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tashrif nomi</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Sana</label>
                            <input type="date" class="form-control" id="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Tavsif</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="button" class="btn btn-primary">Saqlash</button>
                </div>
            </div>
        </div>
    </div>

@endsection

