<?php

namespace App\Controller;

use App\Mailer\Mailer;
use App\Mailer\MailRenderer;
use App\Router\Router;
use App\Session\Session;

class TestController extends Controller
{

    public function displayHomeAction()
    {
        $this->view->render('index.twig');
    }

    public function addFlash()
    {
        Session::getInstance()->setFlash('test', 'uavitas quaedam oportet sermonum atque morum');
        Session::getInstance()->setFlash('test1', 'faeneramur sed natura propens');
        Session::getInstance()->setFlash('test2', 'ad solis ortum sublimius attolluntur');
        Session::getInstance()->setFlash('test3', 'ristitia autem et in omni ');
        Router::getInstance()->redirect('home', true);
    }

    public function sendMail()
    {
        $mailer = new Mailer();
        $mail = $mailer->getMail();
        $mail->setFrom('test@cefiidev.com', 'Cefii dev');
        $mail->addAddress('test@tes.com', 'Utilisateur test');

        $mail->isHTML(true);
        $mail->Subject = 'Email de test';
        $mail->Body = MailRenderer::renderMail('mail/mail.twig', [
            'nom' => 'PAUL'
        ]);


        if ($mail->send() !== false) {
            Session::getInstance()->setFlash('success', 'Le Mail a été envoyé avec succès');
        } else {
            Session::getInstance()->setFlash('error', 'Erreur lors de l\'envoi du mail');
        }

        Router::getInstance()->redirect('home', true);
    }
}
