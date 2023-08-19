<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;
	/** 
	 * Метод реализует связь заказов с продуктами
	 */
	public function products()
	{
		// обращаемся к модели: Product (реализуем связь: многие-ко-многим через связующую таблицу: order_product) 
		// Далее обращаемся к полю связующей таблицы: count (теперь сможем работать с этим полем в контроллере: BasketController)
		// Также укажем что в связующей таблице нужно обновлять поля: created_at, updated_at
		return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
	}

	/** 
	 * Метод реализует связь заказa с пользователем
	 * (ч.10: Middleware Авторизации)
	 */
	/* public function user()
	{
		return $this->belongsTo(User::class);
	} */

	/** 
	 * Метод вернёт полную стоимость заказа в корзине за все продукты
	 * (ч.7: Pivot table)
	 */
	public function getFullPrice()
	{
		$sum = 0;

		foreach ($this->products as $prodct) {

			$sum += $prodct->getPriceForCount();
		}

		return $sum;
	}

	/** 
	 * Метод сохранения заказа
	 */
	public function saveOrder($name, $phone)
	{
		if ($this->status == 0) {

			// когда заказ найден в БД, необходимо к нему обратиться и обновить его параметры(значения полей таблицы: orders)
			// (эти параметры получим из запроса поданного на вход):
			$this->name = $name;
			$this->phone = $phone;
			$this->status = 1;

			// сохраним заказ с внесёнными изменениями:
			$this->save();
			// затем его нужно удалить из сессии:
			session()->forget('orderId');
			return true;
		} else {
			return false;
		}
	}
}
