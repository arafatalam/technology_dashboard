@extends('tech_dashboard.layout.master')
@section('content')
    <span id="field_id" hidden xmlns="http://www.w3.org/1999/html"></span>
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
                                    Common Fields
                                    <small>applied for all modules</small>
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
                            <div class="kt-datatable" id="table_common_fields"></div>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
                <div id="common_field_entry_form" class="col-xl-4">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--head-noborder kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-success flaticon2-calendar-6 "></i>
                                </span>

                                <h3 class="kt-portlet__head-title kt-font-brand">
                                    <span id="entry_form_name" >Add New Field</span>
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->

                        <div class="kt-portlet__body">
                            <form class="kt-form kt-form--label-right">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Field Name :</label>
                                        <textarea id="field_name" class="form-control form-control autoresize"
                                                  rows="1"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Data Type</label>
                                        <div>
                                            <select class="form-control kt-select2" id="field_data_type">
                                                @foreach($fieldDataTypes as $fieldDataType)
                                                    <option value="{{ $fieldDataType->id }}">{{ $fieldDataType->name }}</option>
                                                @endforeach
                                            </select>
                                            <script>
                                                select2dropdown();
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Serial :</label>

                                            <input id="serial" type="text" class="form-control">

                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">Drop Down Values :</label>
                                        <textarea id="dropdown_values" class="form-control form-control autoresize"
                                                  rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Remarks:</label>
                                        <textarea id="remarks" class="form-control form-control autoresize" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="kt-portlet__foot kt-portlet__foot--no-border">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary" onclick="saveField();">Save</button>
                                    <button type="button" class="btn btn-secondary" onclick="clearFieldEntryForm();">Cancel</button>
                                </div>
                                <div class="col-lg-6 kt-align-right">
                                    <button id="delete_field_button" type="button" class="btn btn-danger kt-hidden" onclick="deleteField();">Delete</button>
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