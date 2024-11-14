<?php
class PHP_Email_Form {
    public $to = 'ezramendrofa@apps.ipb.ac.id';              // Alamat email tujuan
    public $from_name = 'AgriScan';       // Nama pengirim
    public $from_email = 'ezramnd@gmail.com';      // Email pengirim
    public $subject = 'Contact';         // Subjek email
    public $smtp = [];            // Konfigurasi SMTP jika diperlukan
    public $messages = [];        // Array untuk pesan
    public $ajax = false;         // Flag untuk pengiriman AJAX

    // Menambahkan pesan ke dalam email
    public function add_message($message, $label, $priority = 10) {
        $this->messages[] = [
            'message' => $message,
            'label' => $label,
            'priority' => $priority
        ];
    }

    // Mengirim email
    public function send() {
        // Jika menggunakan SMTP, cek dan gunakan PHPMailer
        if (!empty($this->smtp)) {
            return $this->send_via_smtp();
        }

        // Membuat header email
        $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
        $headers .= "Reply-To: {$this->from_email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Membuat isi email dari pesan yang ditambahkan
        $body = '';
        foreach ($this->messages as $msg) {
            $body .= "{$msg['label']}: {$msg['message']}\n";
        }

        // Mengirim email menggunakan fungsi mail()
        if (mail($this->to, $this->subject, $body, $headers)) {
            return 'OK';
        } else {
            return 'Failed to send email.';
        }
    }

    // Fungsi untuk mengirim email via SMTP menggunakan PHPMailer
    private function send_via_smtp() {
        require 'path/to/PHPMailer/src/PHPMailer.php';   // Ganti dengan path ke PHPMailer Anda
        require 'path/to/PHPMailer/src/SMTP.php';
        require 'path/to/PHPMailer/src/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = $this->smtp['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $this->smtp['username'];
            $mail->Password = $this->smtp['password'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $this->smtp['port'];

            // Menentukan alamat pengirim dan penerima
            $mail->setFrom($this->from_email, $this->from_name);
            $mail->addAddress($this->to);

            // Isi email
            $mail->isHTML(false);
            $mail->Subject = $this->subject;
            $body = '';
            foreach ($this->messages as $msg) {
                $body .= "{$msg['label']}: {$msg['message']}\n";
            }
            $mail->Body = $body;

            // Mengirim email
            if ($mail->send()) {
                return 'OK';
            } else {
                return 'Failed to send email: ' . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
