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
}
