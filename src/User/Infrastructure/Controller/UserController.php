<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\User\Application\UseCase\GetUsers;

class UserController extends Controller
{
    public function __construct(
        private GetUsers $getUsers
    ){
    }

    public function index()
    {
        $users = $this->getUsers->execute();
        return new JsonResponse($users);
    }
}
