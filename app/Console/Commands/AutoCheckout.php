<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tamu;
use Carbon\Carbon;

class AutoCheckout extends Command
{
    protected $signature = 'tamu:autocheckout';

    protected $description = 'Otomatis checkout semua tamu dengan status check-in setiap jam 16:00 WIB';

    public function handle()
    {
        $now = Carbon::now('Asia/Jakarta');

        $tamu = Tamu::where('status', 'check-in')
            ->whereDate('created_at', $now->toDateString())
            ->get();

        foreach ($tamu as $t) {
            $t->update([
                'status' => 'check-out',
                'jam_checkout' => $now,
            ]);
        }

        $this->info('Semua tamu berhasil checkout otomatis pada ' . $now->format('H:i'));
    }
}
