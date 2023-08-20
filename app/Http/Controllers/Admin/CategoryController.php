<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
		// получим путь к файлу, который был загружен (в форме это input c type = "file" name = "image") с указанием имени 
		// папки в которой картинка будет сохранена (+ч.13: Storage)
		$path = $request->file('image')->store('categories');

		// сохраним запрос на сохранение категории в переменной
		$params = $request->all();

		// изменем данные в ячейке: image на полученные
		$params['image'] = $path;

		Category::create($params);

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
		// чтобы при редактировании категории загрузить новую картинку, старую нужно удалить (+ч.13: Storage)
		Storage::delete($category->image);

		$path = $request->file('image')->store('categories');

		$params = $request->all();

		$params['image'] = $path;

		$category->update($params);

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
