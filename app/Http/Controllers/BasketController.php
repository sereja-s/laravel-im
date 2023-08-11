<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
	public function basket()
	{
		// идентификатор заказа берём из сессии если заказ там есть:
		$orderId = session('orderId');

		if (!is_null('orderId')) {

			$order = Order::findOrFail($orderId);
		}

		return view('basket', compact('order'));
	}

	public function basketPlace()
	{
		return view('order');
	}

	/** 
	 * Метод добавления тоаров в корзину
	 * (ч.6: Многие-ко-многим, Сессия)
	 */
	public function basketAdd($productId)
	{
		$orderId = session('orderId');

		if (is_null($orderId)) {

			// cоздадим заказ и положим в сессию
			$order = Order::create();

			session(['orderId' => $order->id]);
		} else {

			$order = Order::find($orderId);
		}

		// найдём товар, используем связующий метод и положим товар в заказ (в связующую таблицу: order_products)
		$order->products()->attach($productId);

		return view('basket', compact('order'));
	}
}
