<?php

namespace App\Exports;

use App\Models\Tamu;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TamuExport implements FromCollection, WithHeadings, WithMapping
{
    protected $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function collection()
    {
        return Tamu::whereDate('created_at', '>=', $this->start)
            ->whereDate('created_at', '<=', $this->end)
            ->get([
                'nama_tamu', 'perusahaan', 'unit', 'pegawai', 'keperluan', 'status', 'created_at', 'jam_checkout'
            ]);
    }

    public function headings(): array
    {
        return [
            'Nama Tamu',
            'Perusahaan',
            'Unit',
            'Pegawai',
            'Keperluan',
            'Status',
            'Waktu Check-in',
            'Waktu Check-out'
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama_tamu,
            $row->perusahaan,
            $row->unit,
            $row->pegawai,
            $row->keperluan,
            ucfirst($row->status),
            optional($row->created_at)->format('Y-m-d H:i:s'),
            $row->jam_checkout ? Carbon::parse($row->jam_checkout)->format('Y-m-d H:i:s') : '-'
        ];
    }
}
