<a href="{{ route('product', [$product->category->code, $product->code]) }}" class="thumbnail">

	<div class=" product-img">
		<img src="/images/product_01.jpg" class="" alt="" />
	</div>
	<div class="hoverable-img">
		<img src="/images/product_01b.jpg" alt="" />
	</div>
	<div class="label"><span>-32%</span></div>
	<div class="actions">
		<ul>
			<li class="nav-item">
				<a href="#0" class="nav-link"><i class="ri-star-line"></i></a>
			</li>
			<li class="nav-item">
				<a href="#0" class="nav-link"><i class="ri-arrow-left-right-line"></i></a>
			</li>
			<li class="nav-item">
				<a href="#0" class="nav-link"><i class="ri-eye-line"></i></a>
			</li>
		</ul>
	</div>
</a>
<div class="product-detalis text-center">
	<!-- вместо непосредственного получения сатегории, применим матод: category() в модели: Product реализующему связь таблиц и через продукт обратимся уже не к методу, а к одноимённму свойству -->
	<h4>{{ $product->name }}<br><!-- ( {{ $product->getCategory()->name }} ) -->( {{ $product->category->name }} )</h4>

	<!-- 	@isset($category)
	{{ $category->name }}
	@endisset -->

	<span class="discount">$63.00</span>
	<span class="current">{{$product->price}}руб.</span>
</div>