<?php

namespace App\Application\Actions\Index;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class IndexAction extends Action
{
    protected function action(): Response
    {
        $result = $this->validator->make($this->request->getQueryParams(), ['username' => 'required'])->validate();

        return $this->respondWithData(['method' => $this->request->getMethod(), 'result' => $result]);
    }
}
