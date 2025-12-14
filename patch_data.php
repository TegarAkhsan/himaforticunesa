<?php

use App\Models\Himafortic;
use App\Models\Departemen;

try {
    $period = Himafortic::latest('id')->first();
    if ($period) {
        $period->update(['is_active' => true]);
        echo "Set Active Period: " . $period->tahun_periode . "\n";

        $count = Departemen::whereNull('himafortic_id')->count();
        if ($count > 0) {
            Departemen::whereNull('himafortic_id')->update(['himafortic_id' => $period->id]);
            echo "Updated $count departments to belong to period " . $period->tahun_periode . "\n";
        } else {
            echo "All departments already assigned.\n";
        }
    } else {
        echo "No period found to activate.\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
