<div class="col-md-4 col-sm-6 col-12 mb-4" style="position: relative;">

	<a href="{{ route('product', [$product->category->code, $product->code]) }}" class="thumbnail">

		<div class=" product-img">
			<img src="{{ Storage::url($product->image) }}" class="" alt="{{ $product->name }}" />
		</div>
		<!-- <div class="hoverable-img">
			<img src="/images/product_01b.jpg" alt="" />
		</div> -->
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

	<!-- в action в route 2-ым параметром укажем $product, который по умолчанию возмёт поле id (т.е. $product->id можно не указывать) -->
	<form action="{{ route('basket-add', $product) }}" method="POST">

		<div class="addcart" style="display: flex; justify-content: center; position: absolute; bottom: 77px;
    left: 15px; z-index: 10">
			<button type="submit" class="btn-addcart" style="border-radius: 5px;  padding: 5px 10px; background-color: var(--primary-color); border: none; color: white;">В корзину</button>
		</div>

		@csrf

	</form>
	<div class="product-detalis text-center">
		<!-- вместо непосредственного получения сатегории, применим матод: category() в модели: Product реализующему связь таблиц и через продукт обратимся уже не к методу, а к одноимённму свойству -->
		<h4>{{ $product->name }}<br><!-- ( {{ $product->getCategory()->name }} ) -->( {{ $product->category->name }} )</h4>

		<!-- 	@isset($category)
	{{ $category->name }}
	@endisset -->

		<span class="discount">$63.00</span>
		<span class="current">{{$product->price}}руб.</span>
	</div>

</div>