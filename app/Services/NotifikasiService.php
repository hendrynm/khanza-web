<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Twilio\Rest\Client;

class NotifikasiService
{
    public function setNomorHP(Request $request): bool
    {
        $nomor_hp = $request->get('nomor_hp');
        $aktivasi = $request->get('aktivasi');

        return DB::table('web_plus_notifikasi')
            ->where('id_pengguna','=','1')
            ->update([
                'nomor_wa' => $nomor_hp,
                'is_aktif' => $aktivasi
            ]);
    }

    public function setKirimPengingatReservasi(string $nomor_tujuan, string $nama_pasien, string $tanggal, string $waktu, string $lokasi, string $tautan)
    {
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');
        $message_sid = getenv('TWILIO_MESSAGE_SID');

        $client = new Client($account_sid, $auth_token);

        $pesan =
            "Kepada:\n".
            "Yth. Pasien,\n\n".
            "Anda telah melakukan RESERVASI pengobatan melalui aplikasi dengan detail berikut:\n\n".
            "Nama Pasien: " . $nama_pasien ."\n".
            "Tanggal: " . $tanggal . "\n".
            "Waktu: " . $waktu . "\n".
            "Lokasi: " . $lokasi . "\n\n".
            "Anda juga dapat memantau status reservasi melalui: " . $tautan . "\n\n".
            "Dimohon Pasien dapat hadir tepat waktu. Terima kasih atas perhatiannya. Kesehatan Anda adalah prioritas kami.\n\n".
            "[Ini adalah pesan otomatis, jangan dibalas]";

        $messages = $client->messages->create(
            'whatsapp:+62'.$nomor_tujuan,
            [
                'from' => 'whatsapp:'.$twilio_number,
                'body' => $pesan,
                'messagingServiceSid' => $message_sid,
            ]
        );

        return $messages->sid;
    }

    public function setKirimRekapPengobatan(string $nomor_tujuan, string $nama_pasien, string $tanggal, string $waktu, string $lokasi, string $diagnosa, string $tindakan, string $tautan)
    {
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');
        $message_sid = getenv('TWILIO_MESSAGE_SID');

        $client = new Client($account_sid, $auth_token);

        $pesan =
            "Kepada:\n".
            "Yth. Pasien,\n\n".
            "Anda telah melakukan KUNJUNGAN untuk pemeriksaan dan pengobatan pada hari ini dengan detail berikut:\n\n".
            "Nama Pasien: " . $nama_pasien ."\n".
            "Waktu Kunjungan: " . $tanggal . " " . $waktu . "\n".
            "Lokasi: " . $lokasi . "\n".
            "Diagnosa: " . $diagnosa . "\n" .
            "Tindakan: " . $tindakan . "\n\n".
            "Anda juga dapat melihat berkas rekam medis melalui: " . $tautan . "\n\n".
            "Terima kasih atas kunjungan Anda. Kesehatan Anda adalah prioritas kami.\n\n".
            "[Ini adalah pesan otomatis, jangan dibalas]";

        $messages = $client->messages->create(
            'whatsapp:+62'.$nomor_tujuan,
            [
                'from' => 'whatsapp:'.$twilio_number,
                'body' => $pesan,
                'messagingServiceSid' => $message_sid,
            ]
        );

        return $messages->sid;
    }
}
