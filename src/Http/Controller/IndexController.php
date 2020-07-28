<?php

namespace App\Http\Controller;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {

      $result =  Validator::make(['username'=>'a'],['username'=>'required'])->validate();


        return ['method' => $request->getMethod(),'result'=>$result];
    }

    public function db()
    {
        $users = Capsule::table('users')->where('votes', '>', 100)->get()->toArray();

        return $users;
    }
}
