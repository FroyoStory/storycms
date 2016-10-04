<?php

namespace App\Http\Controllers\Front;

class HomeController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home.index', $this->data);
    }
}
