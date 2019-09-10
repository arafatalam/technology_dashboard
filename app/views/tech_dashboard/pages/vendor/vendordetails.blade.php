@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>vendordetails</span>
    <span id="vendor_id" hidden>{{ Session::get('VENDOR_ID') }}</span>


    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{ $vendor->vendor_name }}</h3>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Fluid Dashboard </a>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-secondary">
                        Reports
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
                        <a href="#" class="btn btn-danger kt-subheader__btn-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Product</a>
                            <a class="dropdown-item" href="#"><i class="la la-user"></i> New Order</a>
                            <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New Download</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content kt-grid__item kt-grid__item--fluid">
            <!-- begin:: Content -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="kt-portlet kt-portlet--mobile kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                <h3 class="kt-portlet__head-title">
                                    Current Engagements
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">

                            <!--begin: Datatable -->
                            <div class="kt-datatable" id="current_engagement_table"></div>

                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="kt-portlet kt-portlet--mobile kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                <h3 class="kt-portlet__head-title">
                                    Issue Tracker
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body kt-portlet__body--fit">

                            <!--begin: Datatable -->
                            <div class="kt-datatable" id="issue_tracker_table"></div>

                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="kt-portlet kt-portlet--mobile kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                <h3 class="kt-portlet__head-title">
                                    CR Tracker
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">

                            <!--begin: Datatable -->
                            <div class="kt-datatable" id="cr_tracker_table"></div>

                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>

            </div>





        </div>

        <!-- end:: Content -->
    </div>
@stop