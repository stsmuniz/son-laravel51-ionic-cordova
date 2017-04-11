<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {

        $orders = $this->repository->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }
}
