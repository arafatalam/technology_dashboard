@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>modulelist</span>
    <span id="module_id" hidden></span>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
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
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content kt-grid__item kt-grid__item--fluid">

            <!--Begin::Dashboard 2-->
            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-8">
                    <div class="kt-portlet kt-portlet--mobile kt-portlet--head-noborder kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-success flaticon2-line-chart"></i>
                                </span>
                                <h3 class="kt-portlet__head-title kt-font-brand">
                                    Module List
                                    <small>currently available modules</small>
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin: Search Form -->
                            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 order-2 order-xl-1">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search Form -->
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <!--begin: Datatable -->
                            <div class="kt-datatable" id="table_module_list"></div>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
                <div id="module_entry_form" class="col-xl-4">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--head-noborder kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-success la la-edit "></i>
                                </span>

                                <h3 class="kt-portlet__head-title kt-font-brand">
                                    <span id="entry_form_name" >Edit Module</span>
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->

                        <div class="kt-portlet__body">
                            <div class="kt-portlet__content">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label>Module Name</label>
                                            <textarea id="module_name" class="form-control form-control autoresize" rows="1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label>Milestone Type</label>
                                            <div>
                                                <select class="form-control kt-select2" id="module_milestone_type">
                                                    <option value="Fixed Milestone">Fixed Milestone</option>
                                                    <option value="Independent Milestone">Independent Milestone</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label>Remarks:</label>
                                            <textarea id="module_remarks" class="form-control form-control autoresize" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary" onclick="saveModule();">Save</button>
                                        <button type="button" class="btn btn-secondary" onclick="clearModuleEditForm();">Cancel</button>
                                    </div>
                                    <div class="col-lg-6 kt-align-right">
                                        <button id="delete_module_button" type="button" class="btn btn-danger kt-hidden" onclick="deleteModule();">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>

            <!--End::Section-->
            <!--End::Dashboard 2-->
        </div>
        <!-- end:: Content -->
    </div>
@stop