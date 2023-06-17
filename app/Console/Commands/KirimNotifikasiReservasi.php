<?php

namespace App\Console\Commands;

use App\Http\Controllers\Notifikasi;
use App\Services\NotifikasiService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class KirimNotifikasiReservasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kirim-notifikasi-reservasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = DB::table('web_plus_reservasi')
            ->whereTime('waktu', '<=', now()->addHours())
            ->whereTime('waktu', '>=', now()->subHours())
            ->get();

        foreach($data as $d)
        {
            $nomor_tujuan = $d->no_hp;
            $nama_pasien = $d->nama_pasien;
            $tanggal = $d->tanggal;
            $waktu = $d->waktu;
            $lokasi = $d->lokasi;
            $tautan = '-';

            NotifikasiService::class->kirimNotifikasiReservasi($d->uuid);
        }
    }
}
