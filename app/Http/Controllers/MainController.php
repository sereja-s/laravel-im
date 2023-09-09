<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
	// (+ч.18: Pagination, QueryBuilder, Фильтры)
	public function index()
	{
		$products = Product::get();
		return view('index', compact('products'));
	}

	public function categories()
	{
		$categories = Category::get();

		return view('categories', compact('categories'));
	}

	public function category($code, Category $request)
	{
		$category = Category::where('code', $code)->first();

		// для использования в шаблоне: category.blade.php получим все продукты соответствующей категории
		//$products = Product::where('category_id', $category->id)->get();

		$productsAll = Product::query()->where('category_id', $category->id)->get();

		return view('category', compact('category', 'productsAll'));
	}

	public function product($category, $productCode)
	{
		// (+ч.22: Кол-во товара, Soft Delete)
		// добавим вызов метода показывать вместе с удалёнными
		// (+ч.24: Отправка Email)
		$product = Product::withTrashed()->where('code', $productCode)->firstOrFail();

		return view('product', compact('product'));
	}


	public function products(ProductsFilterRequest $request)
	{
		// посмотреть все методы класса для указаного объекта
		//dd(get_class_methods($request));

		//dd($request->all());
		//$productsQuery = Product::query();

		// ч.19: Log, Debugbar, Eager Load
		$productsQuery = Product::with('category');

		// Добавим обработку фильтров (+ч.18: Pagination, QueryBuilder, Фильтры): 
		if ($request->filled('min_price')) {

			$productsQuery->where('price', '>=', $request->min_price);
		}

		if ($request->filled('max_price')) {

			$productsQuery->where('price', '<=', $request->max_price);
		}

		foreach (['hit', 'new', 'recommend'] as $field) {

			if ($request->has($field)) {

				$productsQuery->where($field, 1);
			}
		}

		$productsAll = Product::get();
		//$products = Product::paginate(12);

		// Добавим пагинацию, (+ч.18: Pagination, QueryBuilder, Фильтры):
		// метод: withPath() сохраняет строку запрса с фильтрами в адресе при переходе со страницы на страницу		
		$products = $productsQuery->paginate(3)->withPath("?" . $request->getQueryString());

		return view('products', compact('products', 'productsAll'));
	}
}
