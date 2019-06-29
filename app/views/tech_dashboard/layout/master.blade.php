<!DOCTYPE html>

<html lang="en">

    {{--TODO BEGIN HEAD--}}
    <span id="header" hidden>{{ Session::get('HEADER') }}</span>
    @include('tech_dashboard.includes.head')
    {{--TODO END HEAD--}}

    @include('tech_dashboard.includes.scripts')

    <!-- begin::Body -->
    <body style="background-image: url(./assets/media/demos/demo4/header.jpg); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fluid kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="demo4/index.html">
                <img alt="Logo" src="./assets/media/logos/logo-4-sm.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                @include('tech_dashboard.includes.header')
                <!-- end:: Header -->

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                        {{-- TODO BEGIN SUBHEADER AND CONTECT--}}
                        @yield('content')
                        {{-- TODO END SUBHEADER AND CONTECT--}}
                    </div>
                </div>

                <!-- begin:: Footer -->
                @include('tech_dashboard.includes.footer')
                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Panel -->
    <!-- end::Quick Panel -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->

    <!-- begin::Sticky Toolbar -->
    <!-- end::Sticky Toolbar -->

    <!-- begin::Demo Panel -->
    <!-- end::Demo Panel -->

    <!--Begin:: Chat-->
    <!--ENd:: Chat-->

    {{-- TODO BEGIN SCRIPTS--}}
{{--    @include('tech_dashboard.includes.scripts')--}}
    {{-- TODO END SUBHEADER AND CONTECT--}}

    </body>
<!-- end::Body -->
</html>