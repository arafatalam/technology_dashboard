@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>addcr</span>
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



            {{--TODO BEGIN ISSUE DATA FORM--}}
            <div class="kt-portlet kt-portlet--responsive-mobile">
                <div class="kt-portlet__head  kt-portlet__head--noborder">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="fa fa-project-diagram kt-font-success"></i>
                        </span>
                        <h3 class="kt-portlet__head-title kt-font-brand">
                            Raise New CR
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
                            <label class="col-lg-1 col-form-label">CR No:</label>
                            <div class="col-lg-3">
                                <textarea id="cr_no" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">CR Name:</label>
                            <div class="col-lg-3">
                                <textarea id="cr_name" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">CR Owner:</label>
                            <div class="col-lg-3">
                                <textarea id="cr_owner" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Raising Date:</label>
                            <div class="col-lg-3">
                                <input id="cr_raising_date" type="text" class="form-control  date-picker"/>

                            </div>
                            <label class="col-lg-1 col-form-label">Activity Status:</label>
                            <div class="col-lg-3">
                                <textarea id="activity_status" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">CR Description:</label>
                            <div class="col-lg-3">
                                <textarea id="cr_description" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Summary Status:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="sla_status">
                                    <option value="Requirement Placed">Requirement Placed</option>
                                    <option value="BRD Shared" >BRD Shared</option>
                                    <option value="Feasibility Check">Feasibility Check</option>
                                    <option value="RAT Analysis" >RAT Analysis</option>
                                    <option value="Refer FRS">Refer FRS</option>
                                    <option value="FRS Locked" >FRS Locked</option>
                                    <option value="Man Day Calculation">Man Day Calculation</option>
                                    <option value="Delivery Pending" >Delivery Pending</option>
                                    <option value="Testing">Testing</option>
                                    <option value="UAT Done" >UAT Done</option>
                                    <option value="Go Live" >Go Live</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Aging:</label>
                            <div class="col-lg-3">
                                <textarea id="aging" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Detailed Status:</label>
                            <div class="col-lg-3">
                                <textarea id="detailed_status" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                            <label class="col-lg-1 col-form-label">Deadline:</label>
                            <div class="col-lg-3">
                                <input id="cr_deadline" type="text" class="form-control  date-picker"/>
                            </div>
                            <label class="col-lg-1 col-form-label">Risk/Dependency</label>
                            <div class="col-lg-3">
                                <textarea id="cr_risk" class="form-control form-control autoresize" rows="1"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">CR Requirement:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="cr_requirement">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label id="cr_requirement_label" class="col-lg-1 col-form-label kt-hidden">CR Requirement Date:</label>
                            <div class="col-lg-3">
                                <input id="cr_requirement_date" type="text" class="form-control  date-picker kt-hidden"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">BRD:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="brd">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">BRD Date:</label>
                            <div class="col-lg-3">
                                <input id="brd_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Feasibility Check:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="feasibility_check">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Feasibility Check Date:</label>
                            <div class="col-lg-3">
                                <input id="feasibility_check_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">RAT Analysist:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="rat_analysis">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">RAT Analysis Date:</label>
                            <div class="col-lg-3">
                                <input id="rat_analysis_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Configurable:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="configurable">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Configurable Date:</label>
                            <div class="col-lg-3">
                                <input id="configurable_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Refer FRS:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="refer_frs">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Refer FRS Date:</label>
                            <div class="col-lg-3">
                                <input id="refer_frs_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">FRS Lock:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="frs_lock">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">FRS Lock Date:</label>
                            <div class="col-lg-3">
                                <input id="frs_lock_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Man Day Calculation:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="man_day_calculation">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">CR Requirement Date:</label>
                            <div class="col-lg-3">
                                <input id="solving_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Procurement Process:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="procurement_process">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Procurement Process Date:</label>
                            <div class="col-lg-3">
                                <input id="procurement_process_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Declaration of Delivery Date:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="delivery_date_decaration">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Delivery Date:</label>
                            <div class="col-lg-3">
                                <input id="delivery_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Tech OAT/SIT:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="issue_status">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Tech OAT/SIT Date:</label>
                            <div class="col-lg-3">
                                <input id="oat_sit_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Business UAT:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="business_uat">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Business UAT Date:</label>
                            <div class="col-lg-3">
                                <input id="business_uat_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Deployment Introduction</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="deployment_introduction">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Deployment Introduction Date:</label>
                            <div class="col-lg-3">
                                <input id="deployment_introduction_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Operational Handover:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="operational_handover">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Operational Handover Date:</label>
                            <div class="col-lg-3">
                                <input id="operational_handover_date" type="text" class="form-control  date-picker"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label">Go Live:</label>
                            <div class="col-lg-3">
                                <select class="form-control kt-select2" id="go_live">
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="N\A" selected >N\A</option>
                                </select>
                            </div>
                            <label class="col-lg-1 col-form-label">Go Live Date:</label>
                            <div class="col-lg-3">
                                <input id="go_live_date" type="text" class="form-control  date-picker"/>
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