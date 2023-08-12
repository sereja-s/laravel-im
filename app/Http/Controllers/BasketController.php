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

		// +ч.7: Pivot table
		// перед добавление продукта проверим есть ли он уже в корзине:
		if ($order->products->contains($productId)) {

			// Если товар есть, доберёмся к строке товара в связующей таблице: order_product и увеличим ей значение в поле: count:

			// (если бы обратились просто к products, то работали бы с коллекцией и запрос был бы не SQL-ный)
			// получим данные из таблицы: product для первого продукта в связующей таблице, соответствующего условию

			// В конце указали, что нам нужно добраться до самой строки товара в связующей таблице: order_product
			$pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;

			// увеличим значение поля: count товара на 1
			$pivotRow->count++;
			$pivotRow->update();
		} else {

			// найдём товар, используем связующий метод и положим товар в заказ (в связующую таблицу: order_product)
			$order->products()->attach($productId);
		}

		return redirect()->route('basket');
	}

	/** 
	 * Метод удаляет товар из корзины
	 * (ч.7: Pivot table)
	 */
	public function basketRemove($productId)
	{
		// получим id заказа из сессии
		$orderId = session('orderId');

		if (is_null($orderId)) {

			return redirect()->route('basket');
		}

		// найдём товар в корзине
		// 1) получим корзину:
		$order = Order::find($orderId);

		if ($order->products->contains($productId)) {

			$pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;

			if ($pivotRow->count < 2) {

				// 2) если товар с таким id есть, то мы его удаляем:
				// (обратимся к товаром из модели: Order через её метод: products())
				$order->products()->detach($productId);
			} else {

				$pivotRow->count--;
				$pivotRow->update();
			}
		}


		return redirect()->route('basket');
	}
}
