<?php


namespace App\Mailer;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    /**
     * @var PHPMailer
     */
    private $mail;

    /**
     * Envoie les mail sur un serveur SMTP Local port 1025
     * http://danfarrelly.nyc/MailDev/
     */
    public function __construct()
    {
        $this->mail = new PHPMailer();
        //$this->mail->SMTPDebug = 2;
        $this->mail->SMTPSecure = false;
        $this->mail->SMTPAutoTLS = false;
        $this->mail->isSMTP();
        $this->mail->Host = 'localhost';

        $this->mail->Port = 1025;
    }

    /**
     * @return PHPMailer
     */
    public function getMail()
    {
        return $this->mail;
    }
}
