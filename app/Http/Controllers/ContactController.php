<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact');
    }

    public function contactUs(ContactRequest $request) {
        $subject = $request->input("title");
        $message = $request->input("content");
        $to = $request->session()->get('user')->email;

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'twentyfivekitchen@gmail.com';
            $mail->Password = '25Kitchen';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('twentyfivekitchen@gmail.com', 'Anotez');
            $mail->addAddress('twentyfivekitchen@gmail.com');
            $mail->addReplyTo($to, 'Visitor');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            return redirect("/contact")->with("message", "Message sent successfully.");
        } catch (Exception $e) {
            dd($e);
            return redirect("/contact")->with("message", "Message sending failed.");
        }
    }
}
