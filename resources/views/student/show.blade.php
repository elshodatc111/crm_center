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
                            <i class="bi bi-credit-card"></i> TO'LOV QILISH
                        </button>
                        <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#discountPaymentModal">
                            <i class="bi bi-percent"></i> CHEGIRMALI TO'LOV
                        </button>
                        <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#refundModal">
                            <i class="bi bi-arrow-counterclockwise"></i> To'lovni qaytarish
                        </button>
                        <button class="btn btn-info w-100 text-white mb-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                            <i class="bi bi-people"></i> GURUHGA QO'SHISH
                        </button>
                        <button class="btn btn-warning w-100 text-white mb-2" data-bs-toggle="modal" data-bs-target="#discountModal">
                            <i class="bi bi-tag"></i> GURUHDAN O'CHIRISH
                        </button>
                        @if(auth()->user()->type!='meneger')
                        <button class="btn btn-dark w-100 mb-2" data-bs-toggle="modal" data-bs-target="#adminDiscountModal">
                            <i class="bi bi-shield-lock"></i> ADMIN CHEGIRMA
                        </button>
                        @endif
                        <button class="btn btn-secondary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="bi bi-pencil"></i> TAXRIRLASH
                        </button>
                        <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">
                            <i class="bi bi-key"></i> PAROLNI YANGILASH
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
                                        <h5 class="card-title">{{ $student['user_name'] }}</h5>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h5 class="card-title">Balans: 
                                        @if($student['balans']==0)
                                            {{ number_format($student['balans'], 0, '.', ' ') }}
                                        @elseif($student['balans']>0)   
                                            <b class="text-success">{{ number_format($student['balans'], 0, '.', ' ') }}</b>
                                        @else
                                            <b class="text-danger">{{ number_format($student['balans'], 0, '.', ' ') }}</b>
                                        @endif
                                        so'm</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Telefon raqam:</div>
                                            <div class="col-lg-6 text-end">{{ $student['phone1'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Qo'shimcha telefon:</div>
                                            <div class="col-lg-6 text-end">{{ $student['phone2'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Yashash manzili:</div>
                                            <div class="col-lg-6 text-end">{{ $student['address'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Tug'ilgan kuni:</div>
                                            <div class="col-lg-6 text-end">{{ $student['birthday'] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Guruhlar soni:</div>
                                            <div class="col-lg-6 text-end">{{ $student['group_count'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Login:</div>
                                            <div class="col-lg-6 text-end">{{ $student['email'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Ro'yhatga olindi:</div>
                                            <div class="col-lg-6 text-end">{{ $student['created_at'] }}</div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-lg-6 label">Oxirgi yangilanish:</div>
                                            <div class="col-lg-6 text-end">{{ $student['updated_at'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <form id="studentAboutForm" action="{{ route('student_update_about') }}" method="post" class="mt-3">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $student['id'] }}">
                                    <textarea type="text" class="form-control" id="aboutInput" name="about" placeholder="Talaba haqida eslatma">{{ $student['about'] }}</textarea>
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
                                        @forelse($user_groups as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['add_plus'] }}</td>
                                                <td>{{ $item['meneger_add'] }}</td>
                                                <td>{{ $item['description'] }}</td>
                                                <td>
                                                    @if($item['status']==1)
                                                        Aktive
                                                    @else
                                                        O'chirildi: {{ $item['delete'] }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6">Ma'lumot mavjud emas</td>
                                        </tr>
                                        @endforelse
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

                            <div class="tab-pane fade" id="profile-history">
                                <h5 class="card-title">Talaba tarixi</h5>
                                <table class="table table-bordered text-center" style="font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hodisa vaqti</th>
                                            <th>Hodisa</th>
                                            <th>Hodisa haqida</th>
                                            <th>Meneger</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($history as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                            <td>{{ $item['type'] }}</td>
                                            <td>{{ $item['type_commit'] }}</td>
                                            <td>{{ $item['user_name'] }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">Ma'lumot mavjud emas.</td>
                                        </tr>
                                        @endforelse
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
                        <label for="paymentAmount" class="form-label mt-2">To'lov summa</label>
                        <input type="text" class="form-control" id="paymentAmount" required>

                        <label for="groupSelect" class="form-label">Guruhni tanlang</label>
                        <select class="form-select" name="about_me" id="groupSelect" required>
                            <option value="" disabled selected>Tanlang...</option>
                            <option value="social_telegram">Guruh nomi</option>
                        </select>

                        <label for="paymentInfo" class="form-label mt-2">To'lov haqida</label>
                        <textarea type="text" class="form-control" id="paymentInfo" required></textarea>

                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
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
                        <div class="row">
                            <div class="col-12 text-center">
                                <b>Chegirma nomi</b>
                            </div>
                            <div class="col-6">
                                <label for="editName" class="form-label">Chegirmali to'lov summasi</label>
                                <p class="form-control m-0">250 000<p>
                            </div>
                            <div class="col-6">
                                <label for="editName" class="form-label">To'lov chegirmasi</label>
                                <p class="form-control m-0">50 000<p>
                            </div>
                        </div>
                        <label for="editName" class="form-label">To'lov turi</label>
                        <select class="form-select" name="about_me" required>
                            <option value="" disabled selected>Tanlang...</option>
                            <option value="social_telegram">Naqt</option>
                            <option value="social_telegram">Plastik</option>
                        </select>
                        <label for="editName" class="form-label mt-2">To'lov haqida</label>
                        <textarea type="text" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
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
                        <label for="editName" class="form-label mt-2">Qaytariladigan summa</label>
                        <input type="text" class="form-control"  id="paymentAmount1" required>
                        <label for="editName" class="form-label mt-2">Qaytariladigan summa haqida</label>
                        <textarea type="text" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Qaytarish</button>
                            </div>
                        </div>
                    </form>
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
                    <form action="{{ route('student_add_group') }}" method="POST" id="addGroupForm">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <label for="group_id" class="form-label">Guruhni tanlang</label>
                        <select class="form-select" name="group_id" required>
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($addGroups as $item)  
                                <option value="{{ $item['id'] }}">{{ $item['group_name'].' ('.\Carbon\Carbon::parse($item['lessen_start'])->format('Y-m-d')." - ".$item['user_name'].")" }}</option>
                            @endforeach
                        </select>
                        <label for="start_discription" class="form-label mt-2">Guruhdan qo'shish haqida</label>
                        <textarea type="text" name="start_discription" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Chegirma Modal -->
    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discountModalLabel">Talabani guruhdan o'chirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="discountForm">
                        <label for="editName" class="form-label">Guruhni tanlang</label>
                        <select class="form-select" name="about_me" required>
                            <option value="" disabled selected>Tanlang...</option>
                            <option value="social_telegram">Guruh nomi</option>
                        </select>
                        <label for="editName" class="form-label mt-2">Jarima summasi</label>
                        <input type="text" class="form-control"  id="paymentAmount2" required>
                        <label for="editName" class="form-label mt-2">Guruhdan o'chirish haqida</label>
                        <textarea type="text" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
                            </div>
                        </div>
                    </form>
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
                        <label for="editName" class="form-label">Guruhni tanlang</label>
                        <select class="form-select" name="about_me" required>
                            <option value="" disabled selected>Tanlang...</option>
                            <option value="social_telegram">Guruh nomi</option>
                        </select>
                        <label for="paymentAmount2" class="form-label mt-2">Chegirma summasi</label>
                        <input type="text" class="form-control"  id="paymentAmount3" required>
                        <label for="editName" class="form-label mt-2">Chegirma haqida</label>
                        <textarea type="text" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
                            </div>
                        </div>
                    </form>
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
                    <form id="editForm" method="POST" action="{{ route('student_update') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <label for="user_name" class="form-label">FIO</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $student['user_name'] }}" required>
                        <label for="phone1" class="form-label mt-2">Telefon raqam</label>
                        <input type="text" id="phone1" name="phone1" class="form-control phone" value="{{ $student['phone1'] }}" required>
                        <label for="phone2" class="form-label mt-2">Qo‘shimcha telefon raqam</label>
                        <input type="text" id="phone2" name="phone2" class="form-control phone" value="{{ $student['phone2'] ?? '' }}">
                        <label for="birthday" class="form-label mt-2">Tug‘ilgan kun</label>
                        <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $student['birthday'] }}" required>
                        <label for="address" class="form-label mt-2">Manzil</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $student['address'] }}" required>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePasswordModalLabel">Talabaning parolini yangilamoqchimisiz?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatePasswordForm" action="{{ route('student_update_password') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <p>Talabaning yangi paroli : <b>password</b></p>
                        <div class="row">
                            <div class="col-6"><button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button></div>
                            <div class="col-6"><button type="submit" class="btn btn-primary w-100" id="updatePassword">Yangilash</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
        $(".phone").inputmask("+998 99 999 9999");
        $(document).ready(function() {
            $('#aboutInput').on('input', function() {
                let formData = $('#studentAboutForm').serialize(); // Form ma'lumotlarini olish

                $.ajax({
                    url: $('#studentAboutForm').attr('action'), // Form action URL
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log("Ma'lumot saqlandi:", response);
                    },
                    error: function(xhr) {
                        console.error("Xatolik:", xhr.responseText);
                    }
                });
            });
        });
        document.getElementById('paymentAmount').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); // Faqat raqamlarni olish
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // 3 xonadan bo‘lib chiqarish
            event.target.value = formatted;
        });
        document.getElementById('paymentAmount1').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); // Faqat raqamlarni olish
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // 3 xonadan bo‘lib chiqarish
            event.target.value = formatted;
        });
        document.getElementById('paymentAmount2').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); // Faqat raqamlarni olish
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // 3 xonadan bo‘lib chiqarish
            event.target.value = formatted;
        });
        document.getElementById('paymentAmount3').addEventListener('input', function(event) {
            let input = event.target.value.replace(/\D/g, ''); // Faqat raqamlarni olish
            let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " "); // 3 xonadan bo‘lib chiqarish
            event.target.value = formatted;
        });
    </script>
@endsection
