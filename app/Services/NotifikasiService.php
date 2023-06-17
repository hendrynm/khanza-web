<?php

namespace App\Services;

use stdClass;
use Twilio\Rest\Client;

class NotifikasiService
{
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
}
