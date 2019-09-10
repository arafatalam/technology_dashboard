@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>addissue</span>
    <span id="vendor_id" hidden>{{ $service->vendor_id }}</span>
    <span id="service_id" hidden>{{ $service->id }}</span>



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
                <div class="kt-portlet__head  kt-portlet__head--noborder">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="fa fa-project-diagram kt-font-success"></i>
                        </span>
                        <h3 class="kt-portlet__head-title kt-font-brand">
                            Add New Issue
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor Name:</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_name" class="form-control form-control autoresize" rows="1" readonly>{{ $service->vendor->vendor_name }}</textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Service Name:</label>
                            <div class="col-lg-3">
                                <textarea id="service_name" class="form-control form-control autoresize" rows="1" readonly>{{ $service->service_name }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Issue Name:</label>
                            <div class="col-lg-3">
                                <textarea id="issue_name" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Issue Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="issue_status">
                                    <option value="Pending" >Pending</option>
                                    <option value="Escalated" >Escalated</option>
                                    <option value="Parked" >Parked</option>
                                </select>

                            </div>
                            <label class="col-lg-1 col-form-label">Responsible Name:</label>
                            <div class="col-lg-3">
                                <textarea id="responsible_name" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>

                        </div>


                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">SLA:</label>
                            <div class="col-lg-3">
                                <textarea id="sla" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">SLA Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="sla_status">
                                    <option value="Within SLA">Within SLA</option>
                                    <option value="SLA Violated" >SLA Violated</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Remarks</label>
                            <div class="col-lg-3">
                                <textarea id="remarks" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">SLA:</label>
                            <div class="col-lg-3">
                                <textarea id="sla" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">SLA Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="sla_status">
                                    <option value="Within SLA">Within SLA</option>
                                    <option value="SLA Violated" >SLA Violated</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Remarks</label>
                            <div class="col-lg-3">
                                <textarea id="remarks" class="form-control form-control autoresize" rows="1"></textarea>
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
                                <button type="button" class="btn btn-success float-right" onclick="confirmAddIssue();">Submit</button>
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