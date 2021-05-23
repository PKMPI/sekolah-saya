<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		//kondisi
		if (session()->get('logged_in') != true) {
			session()->setFlashdata('pesan', "<div class='alert alert-danger' role='alert'>Anda belun melakukan login ...</div>");
			return redirect()->to(base_url('auth'));
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//kondisi
		if (session()->get('logged_in') == true) {
			return redirect()->to(base_url('home'));
		}
	}
}
