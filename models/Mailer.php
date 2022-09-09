<?php


use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    protected $mailer;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable('./');
        $dotenv->load();

        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug= 2;
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = $_ENV['EMAIL_HOST'];
        $this->mail->CharSet = "UTF-8";
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = $_ENV['port'] ;
        $this->mail->Username = $_ENV['MAIL_USERNAME'];
        $this->mail->Password = $_ENV["MAIL_PASSWORD"];
        $this->mail->From = $_ENV["MAIL_USERNAME"];
        $this->mail->FromName = "Gestion Documental - Noticias";
    }

    public function sendNewsletter($subject, $body, $recipients)
    {
        $this->mail->addAddress($recipients[0]);
        foreach(array_slice($recipients[0], 1) as $recipient)
        {
            $this->mail->AddCC($recipient->email);
        }
        $this->mail->addReplyTo($_ENV["MAIL_USERNAME"], 'Gestion Documental - Noticias');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        try{
            $this->mail->send();
            return true;
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
}