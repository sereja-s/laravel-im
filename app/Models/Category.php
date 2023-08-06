<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	/** 
	 * Метод реализует связь категории с продуктами
	 */
	public function products()
	{

		return $this->hasMany(Product::class);
	}
}
