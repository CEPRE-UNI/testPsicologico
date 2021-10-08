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
		$shered=[
			'footer'=>false,
			'header'=>true
		];
		echo view('header',$shered);
		echo view('home');
		echo view('footer',$shered);
	}
}
