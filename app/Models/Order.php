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
		return $this->belongsToMany(Product::class);
	}
}
