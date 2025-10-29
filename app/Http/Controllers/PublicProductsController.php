<?php

namespace App\Http\Controllers;

class PublicProductsController extends Controller
{
    public function index()
    {
        return view('public.products');
    }
}