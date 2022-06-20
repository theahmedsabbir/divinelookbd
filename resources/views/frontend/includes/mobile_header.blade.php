<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="{{ url('/') }}">
					<span class="icon">
						<i class="fa fa-home" aria-hidden="true"></i>
					</span>
                Home
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-wishlist">
            <a href="{{ url('product/wishlist') }}">
					<span class="icon">
						<i class="fa fa-heart" aria-hidden="true"></i>
					</span>
                Wishlist
            </a>
        </div>

        <div class="footer-device-mobile-item device-home device-cart" style="position: relative;">

            <img src="{{ asset('order/add_to_cart.gif') }}" class="add_to_cart_animation_mobile" alt="">
            <a href="{{ url('/shopping/cart') }}">
					<span class="icon">
						<i class="fa fa-shopping-basket" aria-hidden="true"></i>
						<span class="count-icon">
							{{ count($productCount) }}
						</span>
					</span>
                <span class="text">Cart</span>
            </a>
        </div>


        {{-- hide add-to-cart-animation for mobile after 2-3 second --}}
        <script type="text/javascript">
        @if (Session::has('show_cart_animation'))

            setTimeout(function () {
                document.querySelectorAll('.add_to_cart_animation_mobile').forEach((animation)=>{
                    animation.style.display= 'none';
                });
                document.querySelector('.add_to_cart_animation').style.display= 'none';
            }, 3000);
        @endif
        </script>

        <div class="footer-device-mobile-item device-home device-user">
            @if(!auth()->check())
            <a href="{{ url('/register') }}">
					<span class="icon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
                Account
            </a>
            @else
                <a style="cursor: pointer;" onclick="document.querySelector('#logout').submit()">
                    <i class="fa fa-power-off" aria-hidden="true" style="font-size: 25px;"></i>
                </a>
                <form action="{{ url('logout') }}" id="logout" method="POST" class="d-none">
                    @csrf
                </form>
            @endif
        </div>
    </div>
</div>
