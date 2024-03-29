<?php
$hoten = Session::get('hoten');
$makhachhang = Session::get('mauser');
// function count_ctgiohang()
// {
//     $makhachhang = Session::get('makhachhang');
//     $soluong = DB::table('tbl_giohang')
//         ->join('tbl_ctgiohang', 'tbl_giohang.magiohang', '=', 'tbl_ctgiohang.magiohang')
//         ->where('makhachhang', $makhachhang)
//         ->count();
//     return $soluong;
// }
?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('assetClient/img/logo.png') }}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href=""><i class="fa-solid fa-truck"></i></a></li>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{ asset('assetClient/img/language.png') }}" alt="">
            <div><?php if ($hoten) {
                echo $hoten;
            } ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>

        <div class="header__top__right__auth">
            <a href="{{ URL::to('/') }}"><i class="fa fa-user"></i> Logout</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ URL::to('/user/') }}">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">

                            <div><?php if ($hoten) {
                                echo $hoten;
                            }
                            ?></div>

                        </div>
                        @if ($hoten)
                            <div class="header__top__right__auth">
                                <a href="{{ URL::to('/user/logout') }}">
                                    <i class="fa fa-user"></i> Logout
                                </a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{ URL::to('/user/login') }}">
                                    <i class="fa fa-user"></i> Login
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{ asset('assetClient/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ URL::to('/user/') }}">Home</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ URL::to('user/order') }}"><i class="fa-solid fa-truck"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="{{ URL::to('/user/cart') }}">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
