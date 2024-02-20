<?php
$hoten = Session::get('hotenadmin');
$anh = Session::get('anhadmin');
?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" style="width:40px; height:40px" src="{{ asset('images/' . $anh) }}" alt="">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">
                        <?php
                        if ($hoten) {
                            echo $hoten;
                        }

                        ?>
                    </h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{ URL::to('/admin/show-dash-board') }}" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                <a href="{{ URL::to('/admin/order') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Đơn hàng</a>
                <a href="{{ URL::to('/admin/coupon') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Phiếu mua hàng</a>
                <a href="{{ URL::to('/admin/fee-ship') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Vận chuyển</a>

            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>

            <div class="navbar-nav align-items-center ms-auto">

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{ asset('images/' . $anh) }}"
                            alt=""style="width: 40px; height:40px;" alt="">
                        <span class="d-none d-lg-inline-flex">
                            <?php
                            if ($hoten) {
                                echo $hoten;
                            }
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>

                        <a href="{{ URL::to('/admin/logout') }}" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
