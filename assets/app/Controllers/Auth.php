<?php

namespace App\Controllers;
use App\Models\User;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        if (User::authenticate($this->request->getVar('nik'), $this->request->getVar('nama')))
        {
            Services::session()->set("nik", $this->request->getVar('nik'));
            return redirect()->to(base_url('/'));
        } else {
            Services::session()->setFlashdata("failed", "Login Failed");
            return redirect()->to(base_url('/login'));
        }
    }

    public function register() {
        if (User::create(
            $this->request->getVar("nik"), 
            $this->request->getVar("nama")
        )) {

        } else {
            
        }

    }

    public function logout()
    {
        Services::session()->destroy();
        return redirect()->to(base_url("/"));
    }
}