<?php

namespace App\Controllers;

class Home extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->session=session();
	}

	public function index()
	{
		if (isset($this->session->dni)){
			return redirect()->to(base_url()."/alumno/");
		}
		$footer=[
            'docente'=>true
        ];
		echo view('header');
		echo view('home');
		echo view('footer',$footer);
	}
}
