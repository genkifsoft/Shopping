<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__."/PHPMailer/PHPMailer.php";
require_once __DIR__."/PHPMailer/SMTP.php";
require_once __DIR__."/PHPMailer/Exception.php";


class PHPMail {

    public $mail;
    public $sendTo;
    public $sendFrom;
    public $subject;
    public $fromName;
    public $message;
    public $USERNAME;
    public $PASSWORD;
    public $error = [];

    public function __construct($username, $password, $sendFrom, $sendTo, $fromName) {
        $this->mail     = new PHPMailer();
        $this->USERNAME = $username;
        $this->PASSWORD = $password;
        $this->sendFrom = $sendFrom;
        $this->sendTo   = $sendTo;
        $this->fromName = $fromName;
    }

    public function smtMailer($subject, $body) {
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';    
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 587;
        $this->mail->Username = $this->USERNAME;
        $this->mail->Password = $this->PASSWORD;
        $this->mail->CharSet  = 'UTF-8';
        $this->mail->SetFrom($this->sendFrom, $this->fromName);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AddAddress($this->sendTo);

        if (!$this->mail->Send()) {
            $this->mail->ErrorInfo;
            $this->message = 'Gửi mail bị lỗi: '. $this->mail->ErrorInfo;
            return false;
        } else {
            $this->message = 'Gửi mail thành công';
        }
    }
}

?>
