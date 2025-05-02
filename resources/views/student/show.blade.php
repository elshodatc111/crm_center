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

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                        @if($holidayDiscount['status'] == 'true')
                        <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#discountPaymentModal">
                            <i class="bi bi-percent"></i> CHEGIRMALI TO'LOV
                        </button>
                        @endif
                        @if($student['balans']>0)
                        <button class="btn btn-danger w-100 mb-2" data-bs-toggle="modal" data-bs-target="#refundModal">
                            <i class="bi bi-arrow-counterclockwise"></i> To'lovni qaytarish
                        </button>
                        @endif
                        @if($student['balans']>=0)
                        <button class="btn btn-info w-100 text-white mb-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                            <i class="bi bi-people"></i> GURUHGA QO'SHISH
                        </button>
                        @elseif(auth()->user()->type=='sAdmin' || auth()->user()->type=='admin')
                        <button class="btn btn-info w-100 text-white mb-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                            <i class="bi bi-people"></i> GURUHGA QO'SHISH
                        </button>
                        @endif
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
                        <button class="btn btn-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#eslatma">
                            <i class="bi bi-exclamation-triangle"></i> Eslatma qoldirish
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
                                                <td style="text-align:left"><a href="{{ route('create_show',$item['group_id']) }}">{{ $item['name'] }} <b>({{ $item['create'] }})</b></a></td>
                                                <td>{{ $item['add_plus'] }}</td>
                                                <td>{{ $item['meneger_add'] }}</td>
                                                <td>{{ $item['description'] }}</td>
                                                <td>
                                                    @if($item['status']==1)
                                                        Aktive
                                                    @else
                                                        <b class="p-0 m-0 text-danger">O'chirildi: {{ $item['delete'] }}<b>
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
                                            <th>Meneger</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paymarts as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ number_format($item['amount'], 0, '.', ' ') }}</td>
                                                <td>{{ $item['paymart_type'] }}</td>
                                                <td style="text-align:left">{{ $item['description'] }}</td>
                                                <td>{{ $item['created_at'] }}</td>
                                                <td>{{ $item['user_name'] }}</td>
                                            </tr>
                                        @empty  
                                        <tr>
                                            <td colspan="6">To'lovlar mavjud emas</td>
                                        </tr>
                                        @endforelse
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
                                            <td>
                                                @if($item['type']=='visited')
                                                    <span class="badge bg-primary">Tashrif</span>
                                                @elseif($item['type']=='paymart_add')
                                                    <span class="badge bg-success">To'lov</span>        
                                                @elseif($item['type']=='paymart_return')
                                                    <span class="badge bg-danger">To'lov qaytarish</span>
                                                @elseif($item['type']=='paymart_jarima')
                                                    <span class="badge bg-warning">Jarima</span>        
                                                @elseif($item['type']=='chegirma_add')
                                                    <span class="badge bg-info">Chegirma</span> 
                                                @elseif($item['type']=='group_add') 
                                                    <span class="badge bg-secondary">Guruhga qo'shildi</span>   
                                                @elseif($item['type']=='group_delete')
                                                    <span class="badge bg-dark">Guruhdan o'chirildi</span>  
                                                @elseif($item['type']=='password_update')
                                                    <span class="badge bg-light text-dark">Parol o'zgartirildi</span>       
                                                @else
                                                    <span class="badge bg-secondary">Boshqa</span>      
                                                @endif
                                            </td>
                                            <td style="text-align:left">{{ $item['type_commit'] }}</td>
                                            <td>{{ $item['user_name'] }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">Ma'lumot mavjud emas.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card px-4">
                    <h2 class="card-title">Eslatmalar tarixi</h2>
                    <table class="table table-bordered text-center" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Eslatma matni</th>
                                <th>Eslatma vaqti</th>
                                <th>Meneger</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($eslatma as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="text-align:left">{{ $item['message'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>{{ $item['user_name'] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=4 class="text-center">Eslatmalar mavjud emas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="eslatma" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eslatma qoldirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_eslatma') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <label for="message" class="form-label mt-2">Eslatma matni</label>
                        <textarea type="text" class="form-control" id="message" name="message" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" id="saveEdit">Eslatmani saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">To'lov qilish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_add_paymart') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <label for="amount_naqt" class="form-label mt-2">Naqt to'lov summasi</label>
                        <input type="text" name="amount_naqt" value="0" class="form-control" id="paymentAmount4" required>
                        <script>
                            document.getElementById('paymentAmount4').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="amount_plastik" class="form-label mt-2">Plastik to'lov summasi</label>
                        <input type="text" name="amount_plastik" value="0" class="form-control" id="paymentAmount5" required>
                        <script>
                            document.getElementById('paymentAmount5').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="group_id" class="form-label mt-2">Chegurma uchun guruh</label>
                        <select class="form-select" name="group_id" id="groupSelect" required>
                            <option value="null">Chegirmasiz to'lov</option>
                            @foreach($chegirma_groups as $item)
                            <option value="{{ $item['id'] }}">
                                {{ $item['group_name'] }}
                                (To'lov: {{ number_format(floatval($item['tulov']), 0, '.', ' ') }} so'm, 
                                Chegirma: {{ number_format(floatval($item['chegirma']), 0, '.', ' ') }} so'm)</option>
                            @endforeach
                        </select>
                        <label for="payment_info" class="form-label mt-2">To'lov haqida</label>
                        <textarea type="text" class="form-control" id="payment_info" name="payment_info" required>...</textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" onclick="this.style.display='none'" id="saveEdit">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="discountPaymentModal" tabindex="-1" aria-labelledby="discountPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="discountPaymentModalLabel">Chegirmali to'lov</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="discountPaymentForm" action="{{ route('student_bayram_chegirma') }}" method="POST">
                        @csrf 
                        <div class="row">
                            <div class="col-12 text-center">
                                <b>{{ $holidayDiscount['comment'] }}</b>
                            </div>
                            <div class="col-6">
                                <label for="editName" class="form-label">Chegirmali to'lov summasi</label>
                                <p class="form-control m-0">{{ $holidayDiscount['amount'] }}<p>
                            </div>
                            <div class="col-6">
                                <label for="editName" class="form-label">Chegirmasi</label>
                                <p class="form-control m-0">{{ $holidayDiscount['chegirma'] }}<p>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <input type="hidden" name="amount" value="{{ $holidayDiscount['amount'] }}">
                        <input type="hidden" name="chegirma" value="{{ $holidayDiscount['chegirma'] }}">
                        <label for="type" class="form-label">To'lov turi</label>
                        <select class="form-select" name="type" required>
                            <option value="" disabled selected>Tanlang...</option>
                            <option value="naqt">Naqt</option>
                            <option value="plastik">Plastik</option>
                        </select>
                        <label for="discription" class="form-label mt-2">To'lov haqida</label>
                        <textarea type="text" name="discription" class="form-control" required>...</textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" onclick="this.style.display='none'" id="saveEdit">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="refundModalLabel">To'lovni qaytarish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_return_paymart') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <input type="hidden" name="kassa_amount" value="{{ $kassa['naqt'] }}">
                        <label for="amount" class="form-label mt-2">Qaytariladigan summa <i class="text-danger">(Kassada mavjud: {{ number_format($kassa['naqt'], 0, '.', ' ') }} so'm)</i></label>
                        <input type="text" name="amount" class="form-control" id="paymentAmount7" required>
                        <script>
                            document.getElementById('paymentAmount7').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="description" class="form-label mt-2">Qaytariladigan to'lov haqida</label>
                        <textarea type="text" name="description" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" onclick="this.style.display='none'" id="saveEdit">Qaytarish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
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
                        <textarea type="text" name="start_discription" class="form-control" required>...</textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" onclick="this.style.display='none'" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="adminDiscountModal" tabindex="-1" aria-labelledby="adminDiscountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminDiscountModalLabel">Admin chegirma qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_admin_chegirma') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $student['id'] }}">
                        <label for="guruh_id" class="form-label">Guruhni tanlang</label>
                        <select class="form-select" name="guruh_id" required>
                            <option value="" disabled selected>Tanlang...</option>
                            @foreach($adminChegirmaGroup as $item)
                            <option value="{{ $item['guruh_id'] }}">{{ $item['guruh_name']." (Maksimal chegirma: ".number_format($item['admin_chegirma'], 0, '.', ' ')." so'm)" }}</option>
                            @endforeach
                        </select>
                        <label for="chegirma" class="form-label mt-2">Chegirma summasi</label>
                        <input type="text" class="form-control" name="chegirma" id="paymentAmount17" required>
                        <script>
                            document.getElementById('paymentAmount17').addEventListener('input', function(event) {
                                let input = event.target.value.replace(/\D/g, ''); 
                                let formatted = input.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                                event.target.value = formatted;
                            });
                        </script>
                        <label for="description" class="form-label mt-2">Chegirma haqida</label>
                        <textarea type="text" name="description" class="form-control" required></textarea>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" onclick="this.style.display='none'" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
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
                                <button type="submit" onclick="this.style.display='none'" class="btn btn-primary w-100" id="saveEdit">Saqlash</button>
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
