<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function index() {

        $orders = $this->repository->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id) {

        $list_status = ['0' => 'pendente', '1' => 'a caminho', '2' => 'entregue', '3' => 'cancelado'];
        $order = $this->repository->find($id);
        $deliverymen = $this->userRepository->getDeliverymen();

        return view('admin.orders.edit', compact('order','list_status', 'deliverymen'));
    }

    public function update(Request $request, $id)
    {

        $all = $request->all();

        $this->repository->update($all, $id);

        return redirect()->route('admin.orders.index');
    }
}
