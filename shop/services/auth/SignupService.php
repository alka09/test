<?php

namespace shop\services\auth;

use shop\access\Rbac;
use shop\entities\User\User;
use shop\forms\auth\SignupForm;
use shop\repositories\UserRepository;
use shop\services\manage\RoleManager;
use yii\mail\MailerInterface;

class SignupService
{
    private $mailer;
    private $users;
    private $roles;

    public function __construct(
        UserRepository $users,
        MailerInterface $mailer,
        RoleManager $roles
    )
    {
            $this->mailer = $mailer;
            $this->users = $users;
            $this->roles = $roles;
    }

    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->password
        );

        $this->users->save($user);
        $this->roles->assign($user->id, Rbac::ROLE_USER);

        $sent = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $user]
            )
            ->setTo($form->email)
            ->setSubject('Signup confirm for ' . \Yii::$app->name)
            ->send();
        if (!$sent) {
            throw new \RuntimeException('Email sending error.');
        }
    }

    public function confirm($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }
        $user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
    }
}