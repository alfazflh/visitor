<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TamuExport;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        $start = $request->get('start') ?? date('Y-m-d');
        $end   = $request->get('end') ?? date('Y-m-d');

        return Excel::download(new TamuExport($start, $end), "Data_Tamu_{$start}_to_{$end}.xlsx");
    }
}
