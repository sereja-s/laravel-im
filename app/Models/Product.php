<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	public function getCategory()
	{
		// получаем все записи таблицы: Категории
		$categories = Category::where('id', $this->category_id)->get();


		// получаем одну запись таблицы: Категории:

		//$category = Category::where('id', $this->category_id)->first();

		// тоже самое можно записать так и сразу вернуть результат:
		return Category::find($this->category_id);
	}

	//====================================================================================================================//

	/** 
	 * Метод вернёт категорию товара
	 */
	public function category()
	{

		return $this->belongsTo(Category::class);
	}

	// +ч.7: Pivot table
	/** 
	 * Метод пересчитает общую цену за товар в корзине при изменении его кол-ва
	 */
	public function getPriceForCount()
	{
		if (!is_null($this->pivot)) {

			return $this->pivot->count * $this->price;
		}

		return $this->price;
	}
}
