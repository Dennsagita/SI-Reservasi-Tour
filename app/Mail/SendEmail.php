<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    // Properti untuk menyimpan data yang akan digunakan dalam view email
    public $nomor_pesanan;
    public $pelanggan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // Assign data ke dalam properti
        $this->nomor_pesanan = $data['nomor_pesanan'];
        $this->pelanggan = $data['pelanggan'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Menggunakan view 'konfirmasi_pesanan' dan mengirimkan data ke dalam view
        return $this->view('emails.konfirmasi_pesanan');
    }
}

