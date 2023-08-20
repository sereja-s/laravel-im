<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//получим категории из БД (ч.12: Resource Controller, REST, Spoofing)
		$categories = Category::get();

		return view('auth.categories.index', compact('categories'));
	}

	/**
	 * Метод показывает форму создания категории
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('auth.categories.form');
	}

	/**
	 * Метод сохраняет созданные в админке категории.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Category::create($request->all());

		return redirect()->route('categories.index');
	}

	/**
	 * Метод показывает информацию о товаре в админке
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		return view('auth.categories.show', compact('category'));
	}

	/**
	 * Метод показывает форму редактирования категории 
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category)
	{
		return view('auth.categories.form', compact('category'));
	}

	/**
	 * Метод редактирования категории
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Category $category)
	{
		$category->update($request->all());

		return redirect()->route('categories.index');
	}

	/**
	 * Метод удаления категории
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();

		return redirect()->route('categories.index');
	}
}
