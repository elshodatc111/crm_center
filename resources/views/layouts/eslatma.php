<?php
    use App\Models\Eslatma;
    echo count(Eslatma::where('status', 'true')->get());
?>