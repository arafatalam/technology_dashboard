@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>addvendor</span>



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
                            Add New Vendor
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor Name:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_name" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Specialization:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_specialization" class="form-control form-control autoresize" rows="1"></textarea>

                            </div>
                            <label class="col-lg-1 col-form-label">Product Line:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_product_line" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Enlistment Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_enlistment_status">
                                    <option value="Potential" selected="selected">Potential</option>
                                    <option value="Enlisted" >Enlisted</option>

                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Enlistment Date:</label>
                            <div class="col-lg-3">
                                <input id="vendor_enlistment_date" type="text" class="form-control  date-picker"/>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Contact Person:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_contact_person" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Designation:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_contact_designation" class="form-control form-control autoresize" rows="1"></textarea>

                            </div>
                            <label class="col-lg-1 col-form-label">Contact person Phone:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_contact_phone" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Office Address:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_office_address" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Office Phone:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_office_phone" class="form-control form-control autoresize" rows="1"></textarea>

                            </div>


                        </div>
                        <div class="form-group row">


                            <label class="col-lg-1 col-form-label">Remarks:</label>
                            <div class="col-lg-11">
                                <textarea id="vendor_remarks" class="form-control form-control autoresize" rows="2"></textarea>

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
                                <button type="button" class="btn btn-success float-right" onclick="confirmSaveVendor();">Submit</button>
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