<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                    <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart">¥{{Cart::total()}} </h4>
                            <p class="subtitle">Please make your choice.</p>
                                <a href="{{route('cart')}}"class="btn btn-small btn--dark">
                                    <span class="text">view cart</span>
                                </a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>