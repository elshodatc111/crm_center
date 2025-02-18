@extends('layouts.app03')
@section('title','Tashriflar')
@section('content')
    <div class="pagetitle">
        <h1>Tashriflar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('all_student') }}">Tashriflar</a></li>
                <li class="breadcrumb-item">Tashrif</li>
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


    <section class="section profile">
        <div class="row">
            <!-- Chap tomondagi tugmalar -->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <button class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#paymentModal">
                            <i class="bi bi-credit-card"></i> To'lov qilish
                        </button>
                        <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#discountPaymentModal">
                            <i class="bi bi-percent"></i> Chegirmali to'lov
                        </button>
                        <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#refundModal">
                            <i class="bi bi-arrow-counterclockwise"></i> To'lovni qaytarish
                        </button>
                        <button class="btn btn-info w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                            <i class="bi bi-people"></i> Guruhga qo'shish
                        </button>
                        <button class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#discountModal">
                            <i class="bi bi-tag"></i> Chegirma
                        </button>
                        <button class="btn btn-dark w-100 mb-2" data-bs-toggle="modal" data-bs-target="#adminDiscountModal">
                            <i class="bi bi-shield-lock"></i> Admin chegirma
                        </button>
                        <button class="btn btn-secondary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="bi bi-pencil"></i> Tahrirlash
                        </button>
                        <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">
                            <i class="bi bi-key"></i> Parolni yangilash
                        </button>
                    </div>
                </div>
            </div>

            <!-- O'ng tomondagi ma'lumotlar -->
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Nav-tablari -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex justify-content-between w-100">
                            <li class="nav-item flex-grow-1 text-center">
                                <button class="nav-link active w-100" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    <i class="bi bi-person-badge"></i> Talaba haqida
                                </button>
                            </li>
                            <li class="nav-item flex-grow-1 text-center">
                                <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#profile-groups">
                                    <i class="bi bi-people"></i> Talaba guruhlari
                                </button>
                            </li>
                            <li class="nav-item flex-grow-1 text-center">
                                <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#profile-payments">
                                    <i class="bi bi-credit-card"></i> Talaba to'lovlari
                                </button>
                            </li>
                            <li class="nav-item flex-grow-1 text-center">
                                <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#profile-history">
                                    <i class="bi bi-clock-history"></i> Talaba tarixi
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <!-- Talaba haqida -->
                            <div class="tab-pane fade show active" id="profile-overview">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h5 class="card-title">Elshod Musurmonov</h5>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h5 class="card-title">Balans: 154 000 so'm</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Telefon raqam:</div>
                                            <div class="col-lg-6 text-end">+998 90 123 45 67</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Qo'shimcha telefon:</div>
                                            <div class="col-lg-6 text-end">+998 91 234 56 78</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Yashash manzili:</div>
                                            <div class="col-lg-6 text-end">Toshkent, Yunusobod</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Tug'ilgan kuni:</div>
                                            <div class="col-lg-6 text-end">2000-01-01</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Guruhlar soni:</div>
                                            <div class="col-lg-6 text-end">+998 90 123 45 67</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Login:</div>
                                            <div class="col-lg-6 text-end">+998 91 234 56 78</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Ro'yhatga olindi:</div>
                                            <div class="col-lg-6 text-end">Toshkent, Yunusobod</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Meneger:</div>
                                            <div class="col-lg-6 text-end">2000-01-01</div>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" class="row mt-3">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Talaba haqida eslatma" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-primary w-100">Saqlash</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Talaba guruhlari -->
                            <div class="tab-pane fade" id="profile-groups">
                                <h5 class="card-title">Talaba guruhlari</h5>
                                <table class="table table-bordered text-center" style="font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Guruh nomi</th>
                                            <th>Qo'shildi</th>
                                            <th>Meneger</th>
                                            <th>Haqida</th>
                                            <th>O'chirildi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6">Ma'lumot mavjud emas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Talaba to'lovlari -->
                            <div class="tab-pane fade" id="profile-payments">
                                <h5 class="card-title">Talaba to'lovlari</h5>
                                <table class="table table-bordered text-center" style="font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>To'lov summasi</th>
                                            <th>To'lov turi</th>
                                            <th>To'lov haqida</th>
                                            <th>To'lov vaqti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5">Ma'lumot mavjud emas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Talaba tarixi -->
                            <div class="tab-pane fade" id="profile-history">
                                <h5 class="card-title">Talaba tarixi</h5>
                                <table class="table table-bordered text-center" style="font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hodisa vaqti</th>
                                            <th>Hodisa</th>
                                            <th>Hodisa haqida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4">Ma'lumot mavjud emas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">To'lov qilish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label>To'lov summasi:</label>
                        <input type="number" class="form-control" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">To'lov qilish</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Chegirmali to'lov Modal -->
    <div class="modal fade" id="discountPaymentModal" tabindex="-1" aria-labelledby="discountPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discountPaymentModalLabel">Chegirmali to'lov</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="discountPaymentForm">
                        <div class="mb-3">
                            <label for="paymentAmount" class="form-label">To'lov summasi</label>
                            <input type="number" class="form-control" id="paymentAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="discountAmount" class="form-label">Chegirma miqdori (%)</label>
                            <input type="number" class="form-control" id="discountAmount" min="0" max="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="finalAmount" class="form-label">Chegirmadan keyin to'lov</label>
                            <input type="text" class="form-control" id="finalAmount" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary" id="applyDiscount">Tasdiqlash</button>
                </div>
            </div>
        </div>
    </div>
    <!-- To'lovni qaytarish Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="refundModalLabel">To'lovni qaytarish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="refundForm">
                        <div class="mb-3">
                            <label for="refundAmount" class="form-label">Qaytarish summasi</label>
                            <input type="number" class="form-control" id="refundAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="refundReason" class="form-label">Qaytarish sababi</label>
                            <textarea class="form-control" id="refundReason" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-danger" id="processRefund">Qaytarish</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Guruhga qo'shish Modal -->
    <div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGroupModalLabel">Guruhga qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addGroupForm">
                        <div class="mb-3">
                            <label for="groupSelect" class="form-label">Guruhni tanlang</label>
                            <select class="form-select" id="groupSelect" required>
                                <option value="">Guruhni tanlang...</option>
                                <option value="group1">1-guruh</option>
                                <option value="group2">2-guruh</option>
                                <option value="group3">3-guruh</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userName" class="form-label">Foydalanuvchi nomi</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary" id="addToGroup">Qo'shish</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Chegirma Modal -->
    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discountModalLabel">Chegirma qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="discountForm">
                        <div class="mb-3">
                            <label for="discountAmount" class="form-label">Chegirma foizi (%)</label>
                            <input type="number" class="form-control" id="discountAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="discountReason" class="form-label">Chegirma sababi</label>
                            <textarea class="form-control" id="discountReason" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary" id="applyDiscount">Qo'llash</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin chegirma Modal -->
    <div class="modal fade" id="adminDiscountModal" tabindex="-1" aria-labelledby="adminDiscountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDiscountModalLabel">Admin chegirma qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adminDiscountForm">
                        <div class="mb-3">
                            <label for="adminDiscountAmount" class="form-label">Chegirma foizi (%)</label>
                            <input type="number" class="form-control" id="adminDiscountAmount" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminDiscountReason" class="form-label">Chegirma sababi</label>
                            <textarea class="form-control" id="adminDiscountReason" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Admin paroli</label>
                            <input type="password" class="form-control" id="adminPassword" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-danger" id="applyAdminDiscount">Qo'llash</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ma'lumotlarni tahrirlash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Ism</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary" id="saveEdit">Saqlash</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePasswordModalLabel">Parolni yangilash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatePasswordForm">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Joriy parol</label>
                            <input type="password" class="form-control" id="currentPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Yangi parol</label>
                            <input type="password" class="form-control" id="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Yangi parolni tasdiqlash</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary" id="updatePassword">Yangilash</button>
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
