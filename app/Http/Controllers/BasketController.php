<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

		// +ч.11: Создание Middleware, Auth
		// если мы авторизованы, нужно добавить поле: user_id к заказу
		if (Auth::check()) {

			$order->user_id = Auth::id();

			// сохраняем заказ с id пользователя, который делал заказ 
			$order->save();
		}

		// +ч.8: Request, Flash
		// чтобы добавить сообщение об обуспешном добавлении товара получим эдесь этот продукт(товар) по его id
		$product = Product::find($productId);

		// (+ч.20: Scope, Оптимизация запросов к БД)
		// Увеличиваем стоимость заказа в сессии
		Order::changeFullSum($product->price);

		session()->flash('success', 'товар: ' . $product->name . ' добавлен в корзину');

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

		$product = Product::find($productId);

		// (+ч.20: Scope, Оптимизация запросов к БД)
		// Уменьщаем стоимость заказа в сессии
		Order::changeFullSum(-$product->price);

		session()->flash('warning', 'товар: ' . $product->name . ' удалён из корзины');

		return redirect()->route('basket');
	}

	/** 
	 * Метод оформления заказа
	 * (+ч.8: Request, Flash)
	 */
	public function basketPlace()
	{
		$orderId = session('orderId');

		if (is_null($orderId)) {

			return redirect()->route('index');
		}

		$order = Order::find($orderId);

		return view('order', compact('order'));
	}

	/** 
	 * Метод потверждения(сохранения) заказа
	 * На вход: HTTP-запрос с данными из формы (при назатии на кнопку: сделать заказ)
	 * (ч.8: Request, Flash)
	 */
	public function basketConfirm(Request $request)
	{
		$orderId = session('orderId');

		if (is_null($orderId)) {

			return redirect()->route('index');
		}

		$order = Order::find($orderId);

		// когда заказ найден в БД, необходимо к нему обратиться и обновить его параметры(значения полей таблицы: orders)
		// (эти параметры получим из запроса поданного на вход):
		//dd($request->all());
		//$order->name = $request->name;
		//$order->phone = $request->phone;
		//$order->status = 1;

		// сохраним заказ с внесёнными изменениями:
		//$order->save();

		// весь описанный функционал перенесли в модель: Order
		$success = $order->saveOrder($request->name, $request->phone);

		if ($success) {

			// для показа сообщений используем функционал Flash (переменные внутри сессии, которые позволяют опсле первого отображения их удалять)
			session()->flash('success', 'Ваш заказ принят в обработку');
		} else {

			session()->flash('warning', 'Ошибка при формировании заказа');
		}

		// затем его нужно удалить из сессии:
		//session()->forget('orderId');

		// ч.20: Scope, Оптимизация запросов к БД
		Order::eraseOrderSum();

		return redirect()->route('index');
	}
}
