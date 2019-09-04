@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>addservice</span>



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

            {{--TODO BEGIN VENDOR DATA FORM--}}
            <div class="kt-portlet kt-portlet--responsive-mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="fa fa-project-diagram kt-font-success"></i>
                        </span>
                        <h3 class="kt-portlet__head-title kt-font-brand">
                            Add New Service
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Service Name:</label>
                            <div class="col-lg-3">
                                <textarea id="service_name" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Category:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="service_category">
                                    <option value="1" selected="selected">Communication</option>
                                    <option value="2" >Hardware</option>
                                    <option value="3" >Non Tech Service</option>
                                    <option value="4" >Professional Service Management</option>
                                </select>

                            </div>
                            <label class="col-lg-1 col-form-label">Sub Category:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="service_sub_category">
                                    <option value="1" selected="selected">Core</option>
                                    <option value="2" >Non Core</option>
                                    <option value="3" >Data</option>
                                    <option value="4" >Professional Certification</option>
                                    <option value="5" >Professional Service</option>
                                    <option value="6" >System Solution</option>
                                    <option value="7" >Rent</option>
                                    <option value="8" >Venue Management</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_name">
                                    <option value="ESL" selected="selected">ESL</option>
                                    <option value="CSL" >CSL</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Vendor Status</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_status">
                                    <option value="1" selected="selected">Active</option>
                                    <option value="2" >Inactive</option>
                                    <option value="2" >Blacklisted</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">User Department:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="service_user_department">
                                    <option value="SNI">SNI</option>
                                    <option value="DPM" >DPM</option>
                                    <option value="OST" >OST</option>
                                    <option value="BSS" >BSS</option>
                                    <option value="TECH" >TECH</option>
                                    <option value="ITGO" >ITGO</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">NDA Expiry:</label>
                            <div class="col-lg-3">
                                <input id="nda_expiry" type="text" class="form-control  date-picker"/>                            </div>
                            <label class="col-lg-1 col-form-label">Contract Date:</label>
                            <div class="col-lg-3">
                                <input id="contract_date" type="text" class="form-control  date-picker"/>

                            </div>

                            <label class="col-lg-1 col-form-label">Contract Expiry:</label>
                            <div class="col-lg-3">
                                <input id="contract_expiry" type="text" class="form-control  date-picker"/>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">SLA:</label>
                            <div class="col-lg-3">
                                <textarea id="sla" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">PR Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="pr_status">
                                    <option value="1" selected="selected">YES</option>
                                    <option value="0" >NO</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">PO Status</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="po_status">
                                    <option value="1" selected="selected">YES</option>
                                    <option value="0" >NO</option>
                                </select>
                            </div>

                        </div>

                    </div>

                </form>

                <!--end::Form-->
            </div>
            {{--TODO END PROJECT DATA FORM--}}



            {{--TODO BEGIN ACTION BUTTONS--}}
            <div class="kt-portlet kt-portlet--responsive-mobile">
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <div class="col-lg-10">

                            </div>

                            <div class="col-lg-1">
                                {{--<button type="button" class="btn btn-success" onclick="milestoneData();">Submit</button>--}}
                                <button type="reset" id="" class="btn btn-secondary float-right" onclick="testAlert();">Cancel</button>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-success float-right" onclick="confirmAddService();">Submit</button>
                                {{--<button type="reset" class="btn btn-secondary">Cancel</button>--}}
                            </div>
                        </div>

                    </div>
                </form>
                <!--end::Form-->
            </div>
            {{--TODO END ACTION BUTTONS--}}
        </div>

        <!-- end:: Content -->
    </div>
@stop