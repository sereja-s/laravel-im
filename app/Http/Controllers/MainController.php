<?php

namespace App\Http\Controllers;

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

	public function category($code)
	{
		$category = Category::where('code', $code)->first();

		// для использования в шаблоне: category.blade.php получим все продукты соответствующей категории
		//$products = Product::where('category_id', $category->id)->get();

		//dd($category);

		return view('category', compact('category'/* , 'products' */));
	}

	public function product($category, $product = null)
	{
		return view('product', ['product' => $product]);

		//$a = 1;
	}

	// 
	public function products(Request $request)
	{
		//dd($request->all());

		// Добавим пагинацию (+ч.18: Pagination, QueryBuilder, Фильтры): 
		//$products = Product::get();
		$products = Product::paginate(12);

		return view('products', compact('products'));
	}
}
