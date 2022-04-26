@php
$user = Auth::user();
$avatar = substr(Auth::user()->name, 0, 2);
@endphp

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 07:33:19 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard Ruang Nelayan</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/logo.png') }}"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/vendors.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/charts/apexcharts.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/vendors.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}>
    <!-- END: Vendor CSS-->

    {{-- BEGIN: Vendor DataTables --}}
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}>
    {{-- END: Vendor DataTables --}}

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/bootstrap-extended.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/colors.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/components.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/themes/dark-layout.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/themes/bordered-layout.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/themes/semi-dark-layout.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}>

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/pages/dashboard-ecommerce.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/plugins/charts/chart-apex.min.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/plugins/forms/form-validation.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('app-assets/css/pages/app-user.min.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css') }}>
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/style.css') }}>


    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name fw-bolder">{{ $user->name }}</span><span
                                class="user-status">{{ $user->role }}</span></div><span
                            class="avatar bg-light-primary">
                            <div class="avatar-content">{{ $avatar }}</div>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a
                            class="dropdown-item" href=''><i class="me-50" data-feather="user"></i>
                            Profile</a>
                        <div class="dropdown-divider">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                        </div><button type="submit" class="dropdown-item" href="page-account-settings.html">
                            <i class="me-50" data-feather="power"></i> Logout</a>
                            </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('home') }}"><span
                            class="brand-logo">
                            {{-- <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" srcset=""></span> --}}
                        <h2 class="brand-text">Ruang Nelayan</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content mt-2">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i
                            data-feather="home"></i><span class="menu-title text-truncate"
                            data-i18n="Dashboards">Dashboards</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('/*') ? 'active' : '' }}"><a class="d-flex align-items-center"
                                href="{{ route('home') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="eCommerce">Ruang Nelayan</span></a></li>
                    </ul>
                    @if (Auth::user()->role == 'Admin')
                        <ul class="menu-content">
                            <li class="{{ request()->is('home*') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="{{ route('home') }}"><i
                                        data-feather="circle"></i><span class="menu-item text-truncate"
                                        data-i18n="eCommerce">Dashboard</span></a></li>
                        </ul>
                    @endif
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">User Management</span><i
                        data-feather="more-horizontal"></i>
                </li>

                {{-- User Management Begin --}}
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="User">User</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('show-nelayan*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-nelayan') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Nelayan</span></a>
                        </li>
                        <li class="{{ request()->is('show-costumer*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-costumer') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="View">Daftar Costumer</span></a>
                        </li>
                    </ul>
                </li>



                {{-- Kurir Management Begin --}}
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Pegawai Management</span><i
                        data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="User">Kurir</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('show-kurir/pengantaran*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-kurir') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Kurir</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="User">Pengerjaan Ikan</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('show-kurir/jasa-pengerjaan*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-jasa-pengerjaan') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Pengerjaan Ikan</span></a>
                        </li>
                    </ul>
                </li>

                {{-- Kurir Management End --}}

                {{-- Ikan Management Begin --}}
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Ikan Management</span><i
                        data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="User">Jenis Ikan</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('show-ikan/jenis*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-jenis-ikan') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Jenis Ikan</span></a>
                        </li>
                        <li class="{{ request()->is('show-ikan/air-tawar*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-air-tawar') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Ikan Air Tawar</span></a>
                        </li>
                        <li class="{{ request()->is('show-ikan/air-laut*') ? 'active' : '' }}"><a
                                class="d-flex align-items-center" href="{{ route('show-air-laut') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Daftar Ikan Air Laut</span></a>
                        </li>
                    </ul>
                </li>

                {{-- Kurir Management End --}}
            </ul>

        </div>
    </div>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                @yield('content')


                <!-- BEGIN: Footer-->
                <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                        data-feather="arrow-up"></i></button>
                <!-- END: Footer-->


                <!-- BEGIN: Vendor JS-->
                <script src={{ asset('app-assets/vendors/js/vendors.min.js') }}></script>
                <!-- BEGIN Vendor JS-->


                <!-- BEGIN: Page Vendor JS-->
                <script src={{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}></script>

                <script src={{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}></script>
                <script src={{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}></script>

                <script src={{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}></script>





                <!-- END: Page Vendor JS-->

                <!-- BEGIN: Theme JS-->
                <script src={{ asset('app-assets/js/core/app-menu.min.js') }}></script>
                <script src={{ asset('app-assets/js/core/app.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/customizer.min.js') }}></script>
                <!-- END: Theme JS-->


                <!-- BEGIN: Page JS-->

                <script src={{ asset('app-assets/js/scripts/cards/card-analytics.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/forms/form-select2.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/pages/app-user-list.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/tables/table-datatables-advanced.min.js') }}></script>
                <script src={{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}></script>

                <!-- END: Page JS-->



                <script>
                    $(window).on('load', function() {
                        if (feather) {
                            feather.replace({
                                width: 14,
                                height: 14
                            });
                        }
                    })
                </script>
</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 07:33:55 GMT -->

</html>
