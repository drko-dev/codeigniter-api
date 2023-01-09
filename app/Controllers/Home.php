<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        $data = [
            'username'  => $session->get('username'),
            'email'     => $session->get('email'),
            'logged_in' => $session->get('logged_in'),
            'hash'      => $session->get('hash'),
            'id'        => session_id(),
            'path'      => session_save_path(),
        ];

        return $this->response->setJSON($data);
    }

    public function setVars()
    {
        $session = session();

        $newdata = [
            'username'  => 'gustavito',
            'email'     => 'gmarcon@sidom.com',
            'logged_in' => true,
            'hash'      => substr(md5(openssl_random_pseudo_bytes(20)),-20)
        ];

        $session->set($newdata);
    }

    public function info()
    {
        return phpinfo();
    }
}
