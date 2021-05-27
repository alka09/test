<?php

namespace shop\services;

use shop\forms\ContactForm;

class ContactService
{

    private $supportEmail;
    private $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(ContactForm $form): void
    {
        $sent = \Yii::$app->mailer->compose()
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }

}