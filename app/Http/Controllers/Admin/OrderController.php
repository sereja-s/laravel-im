<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use League\CommonMark\Node\Query\OrExpr;

class OrderController extends Controller

{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 * 
	 * (ч.10: Middleware Авторизации)
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$orders = Order::get()->where('status', 1);

		return view('auth.orders.index', compact('orders'));
	}

	/** 
	 * Метод покажет таблицу одного заказа
	 * (+ч.15: Blade Custom Directive)
	 */
	public function show(Order $order)
	{
		return view('auth.orders.show', compact('order'));
	}
}
