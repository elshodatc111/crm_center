<?php
    use App\Models\RefundStatus;
    echo count(RefundStatus::where('status', false)->get());
?>