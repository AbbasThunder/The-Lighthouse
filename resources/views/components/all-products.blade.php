@forelse($products as $product)
    <div class="item-slick2 p-l-15 p-r-15">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative{{$product->created_at->diffInDays(now()) <= 1 ? " block2-labelnew" :''}}">
                <img src="{{asset("storage/" . ($product->image ?? env("NO_IMAGE_NAME")))}}" alt="IMG-PRODUCT">

                <div class="block2-overlay trans-0-4">
                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <form action="{{route("cart.add")}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <!-- Button -->
                            <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                Add to Cart
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                    {{$product->name}}
                </a>
                <a href="{{route("products.by-category",['categoryId' => $product->category_id])}}" class="block2-name dis-block s-text3 p-b-5">
                    {{$product->category->name}}
                </a>
                <span class="block2-price m-text6 p-r-5">
									${{$product->price}}
								</span>
            </div>
        </div>
    </div>
@empty
    <h1>No Products</h1>
@endforelse
