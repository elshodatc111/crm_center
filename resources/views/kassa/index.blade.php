@extends('layouts.app01')
@section('title','Kassa')
@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-cash-coin me-1 text-success"></i> Kassada mavjud summa
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-cash-stack me-1 text-success"></i> Naqt: 150 000 so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card-2-front me-1 text-primary"></i> Plastik: 200 000 so'm
                    </li>
                </ul>
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#refundModal">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Qaytarilgan to'lovlar
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-arrow-down-circle me-1 text-danger"></i> Chiqim kutilmoqda
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-box-arrow-down me-1 text-danger"></i> Naqt: 150 000 so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-credit-card me-1 text-warning"></i> Plastik: 200 000 so'm
                    </li>
                </ul>
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#expenseModal">
                    <i class="bi bi-box-arrow-right me-1"></i> Kassadan chiqim
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-cart-check me-1 text-warning"></i> Xarajat kutilmoqda
                </h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="bi bi-cart me-1 text-danger"></i> Naqt: 150 000 so'm
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-wallet2 me-1 text-warning"></i> Plastik: 200 000 so'm
                    </li>
                </ul>
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#spendingModal">
                    <i class="bi bi-receipt me-1"></i> Xarajatlar uchun chiqim
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center w-100">
                    <i class="bi bi-cart-check me-1 text-warning"></i> Tasdiqlanmagan xarajatlar va chiqimlar
                </h3>
                <table class="table table-bordered text-center" style="font-size:14px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Qaytarilgan to'lov summasi</th>
                            <th>Qaytarilgan sababi</th>
                            <th>Qaytarilgan vaqt</th>
                            <th>Qaytardi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($returnPaymart as $item)
                        <tr>
                            <td class="td">#</td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                            <td class="td"></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=5 class="text-center">Oxirgi 7 kunda qaytarilgan to'lovlar mavjud emas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Qaytarilgan to'lovlar Modal -->
<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg kengroq variant -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundModalLabel">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Qaytarilgan to'lovlar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Qaytarilgan to‘lovlar ro‘yxati bu yerda bo‘ladi.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            </div>
        </div>
    </div>
</div>


<!-- Kassadan chiqim Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expenseModalLabel">
                    <i class="bi bi-box-arrow-right me-1"></i> Kassadan chiqim
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Kassadan chiqim uchun tafsilotlar bu yerda ko‘rsatiladi.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            </div>
        </div>
    </div>
</div>

<!-- Xarajatlar uchun chiqim Modal -->
<div class="modal fade" id="spendingModal" tabindex="-1" aria-labelledby="spendingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spendingModalLabel">
                    <i class="bi bi-receipt me-1"></i> Xarajatlar uchun chiqim
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Xarajatlar uchun sarf tafsilotlari bu yerda ko‘rsatiladi.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            </div>
        </div>
    </div>
</div>



@endsection
