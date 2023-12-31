<!DOCTYPE html>
<lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="{{ asset('dashboard_asset/images/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('dashboard_asset/images/favicon.png') }}" type="image/x-icon">
        <title>Fastkart - Dashboard</title>

        <!-- Google font-->
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <!-- Linear Icon css -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset/css/linearicon.css') }}">
        <!-- fontawesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/font-awesome.css') }}">
        <!-- Themify icon css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/themify.css') }}">
        <!-- ratio css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/ratio.css') }}">
        <!-- remixicon css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/remixicon.css') }}">

        <!-- Select2 css -->
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

        {{-- <!--Dropzon css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset') }}/css/vendors/dropzone.css"> --}}
        <!-- Feather icon css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/feather-icon.css') }}">
        <!-- Plugins css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/scrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset') }}/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset') }}/css/vendors/chartist.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset') }}/css/vendors/date-picker.css">
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vendors/bootstrap.css') }}">
        <!-- vector map css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/vector-map.css') }}">
        <!-- Slick Slider Css -->
        <link rel="stylesheet" href="{{ asset('dashboard_asset/css/vendors/slick.css') }}">
        <!-- Data Table css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/datatables.css') }}">
        <!-- App css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/css/style.css') }}">
    </head>

    <body>
        <!-- tap on top start -->
        <div class="tap-top">
            <span class="lnr lnr-chevron-up"></span>
        </div>
        <!-- tap on tap end -->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            <div class="page-header">
                <div class="header-wrapper m-0">
                    <div class="header-logo-wrapper p-0">
                        <div class="logo-wrapper">
                            <a href="index.html">
                                <img class="img-fluid main-logo" src="{{ asset('dashboard_asset/images/logo/1.png') }}"
                                    alt="logo">
                                <img class="img-fluid white-logo"
                                    src="{{ asset('dashboard_asset/images/logo/1-white.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                            <a href="index.html">
                                <img src="{{ asset('dashboard_asset/images/logo/1.png') }}" class="img-fluid"
                                    alt="img">
                            </a>
                        </div>
                    </div>

                    <div class="nav-right col-6 pull-right right-header p-0">
                        <ul class="nav-menus">
                            <div>
                                <a href="{{ route('index') }}" target="_blank" class="btn btn-primary mx-3">Visit
                                    Site</a>
                            </div>

                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <i class="ri-notification-line"></i>
                                    <span class="badge rounded-pill badge-theme">4</span>
                                </div>
                                <ul class="notification-dropdown onhover-show-div">
                                    <li>
                                        <i class="ri-notification-line"></i>
                                        <h6 class="f-18 mb-0">Notitications</h6>
                                    </li>
                                    <li>
                                        <p>
                                            <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                                class="pull-right">3 hr</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                                class="pull-right"></span>
                                        </p>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary" href="javascript:void(0)">
                                            Check all
                                            notification
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="mode">
                                    <i class="ri-moon-line"></i>
                                </div>
                            </li>
                            <li class="profile-nav onhover-dropdown pe-0 me-0">
                                <div class="media profile-media">
                                    @if (auth()->user()->profile_photo)
                                        <img class="user-profile rounded-circle"
                                            src="{{ asset('uploads/avatar_photos') }}/{{ auth()->user()->profile_photo }}" />
                                    @else
                                        {{-- {!! Avatar::create(auth()->user()->name)->toSvg() !!} --}}
                                        <img class="user-profile rounded-circle"
                                            src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" />
                                    @endif


                                    <div class="user-name-hide media-body">
                                        <span>{{ auth()->user()->name }}</span> (<span
                                            class="text-success">{{ auth()->user()->role }}</span>)
                                        <p class="mb-0 font-roboto text-primary fw-bold">{{ auth()->user()->email }}
                                            <i class="middle ri-arrow-down-s-line"></i>
                                        </p>
                                    </div>
                                </div>
                                <ul class="profile-dropdown onhover-show-div">

                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <i data-feather="users"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="order-list.html">
                                            <i data-feather="archive"></i>
                                            <span>Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="profile-setting.html">
                                            <i data-feather="settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                <i data-feather="log-out"></i>
                                                <span>Log out</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Page Header Ends-->

            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                <div class="sidebar-wrapper">
                    <div id="sidebarEffect"></div>
                    <div>
                        <div class="logo-wrapper logo-wrapper-center">
                            <a href="" data-bs-original-title="" title="">
                                <img class="img-fluid for-white"
                                    src="{{ asset('dashboard_asset/images/logo/full-white.png') }}" alt="logo">
                            </a>
                            <div class="back-btn">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="toggle-sidebar">
                                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                            </div>
                        </div>
                        <div class="logo-icon-wrapper">
                            <a href="index.html">
                                <img class="img-fluid main-logo main-white"
                                    src="{{ asset('dashboard_asset/images/logo/logo.png') }}" alt="logo">
                                <img class="img-fluid main-logo main-dark"
                                    src="{{ asset('dashboard_asset/images/logo/logo-white.png') }}" alt="logo">
                            </a>
                        </div>
                        <nav class="sidebar-main">
                            <div class="left-arrow" id="left-arrow">
                                <i data-feather="arrow-left"></i>
                            </div>

                            <div id="sidebar-menu">
                                <ul class="sidebar-links" id="simple-bar">
                                    <li class="back-btn"></li>

                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title link-nav" href="{{ url('dashboard') }}">
                                            <i class="ri-home-line"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-store-3-line"></i>
                                            <span>Product</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('product.index') }}">Prodcts Lists</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('product.create') }}">New Products</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-check-2"></i>
                                            <span>Category</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ url('category') }}">Category List</a>
                                            </li>

                                            <li>
                                                <a href="{{ url('category/create') }}">Add New Category</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-list-settings-line"></i>
                                            <span>Attributes</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="attributes.html">Attributes</a>
                                            </li>

                                            <li>
                                                <a href="">Add Attributes</a>
                                            </li>
                                        </ul>
                                    </li>

                                    @if (auth()->user()->role == 'admin')
                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                <i class="ri-user-3-line"></i>
                                                <span>Users</span>
                                            </a>
                                            <ul class="sidebar-submenu">
                                                <li>
                                                    <a href="{{ url('user') }}">All users</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('user/create') }}">Add New User</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <i class="ri-archive-line"></i>
                                            <span>Orders</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="order-list.html">Order List</a>
                                            </li>
                                            <li>
                                                <a href="order-detail.html">Order Detail</a>
                                            </li>
                                            <li>
                                                <a href="order-tracking.html">Order Tracking</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-price-tag-3-line"></i>
                                            <span>Coupons</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="coupon-list.html">Coupon List</a>
                                            </li>

                                            <li>
                                                <a href="create-coupon.html">Create Coupon</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                            <i class="ri-star-line"></i>
                                            <span>Product Review</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-list">
                                        <a class="linear-icon-link sidebar-link sidebar-title"
                                            href="javascript:void(0)">
                                            <i class="ri-settings-line"></i>
                                            <span>Settings</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="profile-setting.html">Profile Setting</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                            <i class="ri-file-chart-line"></i>
                                            <span>Reports</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="right-arrow" id="right-arrow">
                                <i data-feather="arrow-right"></i>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Page Sidebar Ends-->

                @yield('content')

            </div>
            <!-- Page Body End -->
        </div>
        <!-- page-wrapper End-->

        <!-- Modal Start -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                        <p>Are you sure you want to log out?</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="button-box">
                            <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->

        <!-- latest js -->
        <script src="{{ asset('dashboard_asset/js/jquery-3.6.0.min.js') }}"></script>

        <!-- Bootstrap js -->
        <script src="{{ asset('dashboard_asset/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <!-- feather icon js -->
        <script src="{{ asset('dashboard_asset/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/icons/feather-icon/feather-icon.js') }}"></script>

        <!-- scrollbar simplebar js -->
        <script src="{{ asset('dashboard_asset/js/scrollbar/simplebar.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/scrollbar/custom.js') }}"></script>

        <!-- Data table js -->
        <script src="{{ asset('dashboard_asset/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/custom-data-table.js') }}"></script>


        <!-- Sidebar jquery -->
        <script src="{{ asset('dashboard_asset/js/config.js') }}"></script>

        <!-- tooltip init js -->
        <script src="{{ asset('dashboard_asset/js/tooltip-init.js') }}"></script>

        <!-- Plugins JS -->
        <script src="{{ asset('dashboard_asset/js/sidebar-menu.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/notify/index.js') }}"></script>

        <!-- Apexchar js -->
        <script src="{{ asset('dashboard_asset/js/chart/apex-chart/apex-chart1.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/chart/apex-chart/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/chart/apex-chart/apex-chart.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/chart/apex-chart/stock-prices.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/chart/apex-chart/chart-custom1.js') }}"></script>


        <!-- slick slider js -->
        <script src="{{ asset('dashboard_asset/js/slick.min.js') }}"></script>
        <script src="{{ asset('dashboard_asset/js/custom-slick.js') }}"></script>

        <!-- customizer js -->
        <script src="{{ asset('dashboard_asset/js/customizer.js') }}"></script>

        <!-- ratio js -->
        <script src="{{ asset('dashboard_asset/js/ratio.js') }}"></script>

        <!-- Sidebar js -->
        <script src="{{ asset('dashboard_asset') }}/js/config.js"></script>

        <!--Dropzon js -->
        <script src="{{ asset('dashboard_asset') }}/js/dropzone/dropzone.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/dropzone/dropzone-script.js"></script>

        <!-- sidebar effect -->
        <script src="{{ asset('dashboard_asset/js/sidebareffect.js') }}"></script>

        <!-- Theme js -->
        <script src="{{ asset('dashboard_asset/js/script.js') }}"></script>

        <!-- select2 js -->
        <script src="{{ asset('dashboard_asset') }}/js/select2.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/select2-custom.js"></script>

        <!-- ck editor js -->
        <script src="{{ asset('dashboard_asset') }}/js/ckeditor.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/ckeditor-custom.js"></script>

        <!-- Sweetalert2 js -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('footer_scripts')
    </body>

    </html>
