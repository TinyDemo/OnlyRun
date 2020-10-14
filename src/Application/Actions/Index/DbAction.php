<?php

namespace App\Application\Actions\Index;

use App\Application\Actions\Action;
use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Http\Message\ResponseInterface as Response;

class DbAction extends Action
{
    protected function action(): Response
    {
        $users = Capsule::table('users')->where('votes', '>', 100)->get()->toArray();

        return $this->respondWithData($users);
    }
}
