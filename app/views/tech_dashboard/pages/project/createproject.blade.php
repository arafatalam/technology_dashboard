@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>createproject</span>
    {{--<span id="project_type_id" hidden>{{ $projectCategory->id }}</span>--}}


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

            {{--TODO BEGIN PROJECT DATA FORM--}}
            <div class="kt-portlet kt-portlet--responsive-mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="fa fa-project-diagram kt-font-success"></i>
                        </span>
                        <h3 class="kt-portlet__head-title kt-font-brand">
                            Project Data
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form id="project_data_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body" id="project_form_body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Project Name :</label>
                                <input id="project_name" type="text" class="form-control " placeholder="">
                            </div>
                            <div class="col-lg-4">
                                <label class="">Project Manager Name :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                    <input id="project_manager_name" type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Status :</label>
                                <select class="form-control kt-select2" id="project_status" >
                                    <option value="0">####</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Initiation Date :</label>
                                <input id="project_initiation_date" type="text" class="form-control  date-picker" readonly id="" />
                            </div>
                            <div class="col-lg-4">
                                <label class="">Requestor Name :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                    </div>
                                    <input id="project_requestor_name" type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Requestor Division :</label>
                                <div class="input-group">
                                    <select class="form-control kt-select2" id="requestor_division" >
                                        <option value="0">Requestor Division</option>
                                        {{--@foreach($requestorDivisions as $division)--}}
                                            {{--<option value="{{ $division->id }}">{{ $division->division}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Schedule Start Date :</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                    <input id="project_schedule_start_date" type="text" class="form-control  date-picker" readonly id="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Schedule End Date :</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                    <input id="project_schedule_end_date" type="text" class="form-control  date-picker" readonly id="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Remarks</label>
                                <textarea id="project_remarks" class="form-control form-control autoresize" id="project_remarks" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Actual Start Date :</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                    <input id="project_actual_start_date" type="text" class="form-control  date-picker" readonly id="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Actual End Date :</label>
                                <div class="input-group date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                    <input id="project_actual_end_date" type="text" class="form-control  date-picker" readonly id="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            @foreach($common_fields as $common_field)
                                <div class="col-lg-4">
                                    <label>{{ $common_field->field_name }} :</label>
                                    <textarea id="common_field_{{ $common_field->id }}" class="form-control form-control autoresize" rows="1"></textarea>
                                </div>
                            @endforeach
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
                                <button type="button" class="btn btn-success float-right" onclick="createProject();">Submit</button>
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