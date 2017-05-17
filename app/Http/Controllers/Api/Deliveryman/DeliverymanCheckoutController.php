<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;


use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        OrderService $service
    )
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository->with(['items'])->scopeQuery(function ($query) use($id) {
            return $query->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }

    public function show($id)
    {
        $order = $this->orderRepository->with(['client', 'items', 'cupom'])->find($id);
        $order->items->each(function($item) {
            $item->product;
        });

        return $order;
    }

}
