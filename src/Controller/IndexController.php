<?php

namespace App\Controller;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return ['method' => $request->getMethod()];
    }

    public function db()
    {
        $users = Capsule::table('users')->where('votes', '>', 100)->get()->toArray();

        return $users;
    }
}
