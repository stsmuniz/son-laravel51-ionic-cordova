<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Models\User;
use \CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientController extends Controller
{

    /**
     * @var User
     */
    private $userRepository;

    public function __construct(User $user)
    {

        $this->userRepository = $user;
    }

    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        return $this->userRepository
            ->find($id)
            ->client;
    }
}
