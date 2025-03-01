<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Murojat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">

    <style>
        /* Kontentni to‘liq markazga joylashtirish */
        .full-height {
            height: 100vh; /* Butun ekranni egallaydi */
            display: flex;
            justify-content: center; /* Gorizontal markaz */
            align-items: center; /* Vertikal markaz */
        }
    </style>
</head>

<body>
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
<div class="container full-height">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-header"><h1>{{ env('APP_NAME') }} o'quv markazi</h1></div>

            <div class="card-body">
                <h2 class="card-title">Ro'yhatdan o'tish</h2>
                <form action="{{ route('user_varonka_varonka') }}" method="post">
                    @csrf 
                    <input type="hidden" name="visited" value="{{ $visited }}" >
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name" class="mt-2">Ismingiz</label>
                            <input type="text" name="name"  required class="form-control my-1">
                        </div>
                        <div class="col-lg-6">
                            <label for="surname" class="mt-2">Familyangiz</label>
                            <input type="text" name="surname"  required class="form-control my-1">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone1" class="mt-2">Telefon raqamingiz</label>
                            <input type="text" name="phone1"  required class="form-control my-1 phone" value="+998">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone2" class="mt-2">Qo'shimcha telefon raqamingiz</label>
                            <input type="text" name="phone2"  required class="form-control my-1 phone" value="+998">
                        </div>
                        <div class="col-lg-6">
                            <label for="address" class="mt-2">Yashash manzilingiz</label>
                            <select name="address" class="form-control my-1">
                                <option value="Tanlang">Tanlang</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="birth_date" class="mt-2">Tug'ilgan kuningiz</label>
                            <input type="date" name="birth_date"  required class="form-control my-1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Ro'yhatdan o'tish</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/chart.js/chart.umd.js"></script>
<script src="../../assets/vendor/echarts/echarts.min.js"></script>
<script src="../../assets/vendor/quill/quill.js"></script>
<script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
<script>
    $(".phone").inputmask("+998 99 999 9999");
</script>

</body>
</html>
