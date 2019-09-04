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

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach


                                </select>

                            </div>
                            <label class="col-lg-1 col-form-label">Sub Category:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="service_sub_category">
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_name">

                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" selected="selected">{{ $vendor->vendor_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Vendor Enlistment Status</label>
                            <div class="col-lg-3">
                                <textarea id="vendor_enlistment_status" class="form-control form-control autoresize" rows="1" readonly></textarea>
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

                            <label class="col-lg-1 col-form-label">Vendor Onboarding Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_onboarding_status">
                                    <option value="In Progress">In Progress</option>
                                    <option value="On Boarded">On Boarded</option>
                                    <option value="On Hold" >On Hold</option>
                                    <option value="Dropped" >Dropped</option>

                                </select>
                            </div>

                            <label class="col-lg-1 col-form-label">Vendor Onboarding Date:</label>
                            <div class="col-lg-3">
                                <input id="vendor_onboarding_date" type="text" class="form-control  date-picker"/>
                            </div>

                            <label class="col-lg-1 col-form-label">Vendor Communication:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_communication">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor Document Sharing:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_document_sharing">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <label class="col-lg-1 col-form-label">Vendor Technical Discussion:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_technical_discussion">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <label class="col-lg-1 col-form-label">Tech Feasibility Analysis:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="vendor_tech_feasibility_analysis">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Vendor Meeting Plan:</label>
                            <div class="col-lg-3">
                                <input id="vendor_meeting_plan" type="text" class="form-control  date-picker"/>
                            </div>

                            <label class="col-lg-1 col-form-label">Initial Meeting:</label>
                            <div class="col-lg-3">
                                <input id="vendor_initial_meeting_date" type="text" class="form-control  date-picker"/>
                            </div>

                            <label class="col-lg-1 col-form-label">Last Meeting:</label>
                            <div class="col-lg-3">
                                <input id="vendor_last_meeting_date" type="text" class="form-control  date-picker"/>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">NDA Expiry Date:</label>
                            <div class="col-lg-3">
                                <input id="service_nda_expiry_date" type="text" class="form-control  date-picker"/>
                            </div>

                            <label class="col-lg-1 col-form-label">Contract Date:</label>
                            <div class="col-lg-3">
                                <input id="service_contract_date" type="text" class="form-control  date-picker"/>
                            </div>

                            <label class="col-lg-1 col-form-label">Contract Expiry:</label>
                            <div class="col-lg-3">
                                <input id="contract_expiry_date" type="text" class="form-control  date-picker"/>
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
                                    <option value="Yes" selected="selected">Yes</option>
                                    <option value="No" >No</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">PO Status</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="po_status">
                                    <option value="Yes" selected="selected">Yes</option>
                                    <option value="No" >No</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-lg-1 col-form-label">Remarks:</label>
                            <div class="col-lg-11">
                                <textarea id="service_remarks" class="form-control form-control autoresize" rows="2"></textarea>

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