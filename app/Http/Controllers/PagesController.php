<?php

namespace App\Http\Controllers;

class PagesController extends Controller{

	public function getIndex(){
		return view('pages.welcome');
	}

	public function getAbout(){
		$first = 'Clement';
		$last = 'Fernando';

		$full = $first.' '.$last;
		$email = "contact@mrclemrkz.com";
		return view('pages.about')->withFullname($full)->withEmail($email);
	}

	public function getContact(){
		return view('pages.contact');
	}
}