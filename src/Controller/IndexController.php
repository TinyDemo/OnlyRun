<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return ['method'=>$request->getMethod()];
    }
}
