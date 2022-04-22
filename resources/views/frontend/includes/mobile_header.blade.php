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
            <a href="#">
					<span class="icon">
						<i class="fa fa-heart" aria-hidden="true"></i>
					</span>
                Wishlist
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
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
