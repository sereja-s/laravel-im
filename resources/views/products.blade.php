@extends('master')

@section('title', 'Все товары')

@section('content')

<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h2 class="text-center">Все товары</h2>
			</div>

			<div class="col-lg-3 col-md-12 mb-lg-0 mb-5">
				<!-- Filter section -->
				<div class="filter-conteiner">
					<div class="filter-trigger">
						<a href="#0"><i class="ri-filter-line"></i></a>
					</div>
					<div class="filter-content">
						<h3 class="filter-heading">Filter</h3>
						<ul class="filter-nav mt-3">
							<li class="nav-item has-child active">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Size</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<div class="size pt-0">
									<form action="" class="d-flex">
										<input type="radio" id="xl" name="size" checked />
										<label for="xl">XL</label>
										<input type="radio" id="l" name="size" />
										<label for="l">L</label>
										<input type="radio" id="m" name="size" />
										<label for="m">M</label>
										<input type="radio" id="s" name="size" />
										<label for="s">S</label>
									</form>
								</div>
							</li>
							<li class="nav-item has-child">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Color</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<div class="color mt-0 mb-0">
									<form action="" class="d-flex">
										<p>
											<input type="radio" id="tosca" name="color" />
											<label for="tosca" class="circle tosca"></label>
										</p>
										<p>
											<input type="radio" id="brown" name="color" />
											<label for="brown" class="circle brown"></label>
										</p>
										<p>
											<input type="radio" id="ocean" name="color" checked />
											<label for="ocean" class="circle ocean"></label>
										</p>
									</form>
								</div>
							</li>
							<li class="nav-item has-child active">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Category</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<ul class="sub-link pt-0">
									<li class="nav-item"><a href="#0" class="nav-link">Active Wear</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">beauty</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Candles</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Fashion</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Furniture</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Glasses</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Hat</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Nail Polishing</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Organic</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Backpack</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Bedding</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Coffee</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Living</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Plants</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Sneaker</a></li>
								</ul>
							</li>
							<li class="nav-item has-child">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Brands</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<ul class="sub-link pt-0">
									<li class="nav-item"><a href="#0" class="nav-link">Adidas</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Chanel</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Dolce & Gabbna</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Ganni</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Gucci</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Louis Vuitton</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Nike</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Panda</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Puma</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Zara</a></li>
								</ul>
							</li>
						</ul>
						<div class="range">
							<label for="customRange1" class="form-label">Price</label>
							<input type="range" class="form-range" id="customRange1" min="30" max="500" value="200" />
							<div class="d-flex justify-content-between align-items-center">
								<span class="">$30</span>
								<span class="">$500</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-12">
				<div class="category-product">
					<div class="row">
						<div class="col-12 mb-3">
							<div class="short-list float-end">
								<div class="">
									<ul class="short-menu d-flex flex-wrap gap-4 align-items-center">
										<li class="short-heading position-relative me-md-4">
											<a href="#0" class="heading-value">Default sorting</a>
											<span><i class="ri-arrow-down-s-line rotate"></i></span>
											<ul class="short-item">
												<li class="active"><a href="#0">Default sorting</a></li>
												<li><a href="#0">Popular</a></li>
												<li><a href="#0">Rating</a></li>
												<li><a href="#0">Latest</a></li>
												<li><a href="#0">Price: low to high</a></li>
												<li><a href="#0">Price: High to low</a></li>
											</ul>
										</li>
										<li>
											<a href="#0"><i class="ri-pause-line"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-list-check-2"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-layout-grid-line"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-layout-masonry-line"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						@foreach($products as $product)

						@include('card', compact('product'))

						@endforeach

						<!-- <div class="col-md-4 col-sm-6 col-12 mb-4">

							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>

						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_02.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_02b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_03.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_03b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_04.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_04b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_05.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_05b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_06.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_06b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_07.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_07b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_08.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_08b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_04.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_04b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_07.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_07b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_03.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_03b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_02.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_02b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div>
					
						<div class="col-md-4 col-sm-6 col-12 mb-4">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_06.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_06b.jpg" alt="" />
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection