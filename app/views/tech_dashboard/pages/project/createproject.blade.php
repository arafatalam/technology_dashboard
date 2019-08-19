@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>createproject</span>
    <span id="module_id" hidden>{{ $module->id }}</span>


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
            <div class="kt-portlet kt-portlet--responsive-mobile ">
                <div class="kt-portlet__head kt-portlet__head--noborder">
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
                    <div class="kt-portlet__body" id="project_data_form_body">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>Status :</label>
                                <div class="input-group">
                                    <select class="form-control kt-select2" id="project_status">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            {{--TODO END PROJECT DATA FORM--}}

            {{--TODO BEGIN MILESTONE DATA FORM--}}

            <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="fa fa-chart-line kt-font-success"></i>
                            </span>
                            <h3 class="kt-portlet__head-title kt-font-brand">
                                Milestone Data
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" id="milestone_data_form">
                        <div class="kt-portlet__body">
                            <div class="kt-form__section kt-form__section--first">
                                @if( $module->module_milestone_type == "Fixed Milestone")
                                    <?php $counter = 0; ?>
                                    @foreach($module->default_milestones as $milestone)
                                        <div>
                                            <div class="form-group form-group-row">
                                                <div class="col-lg-12">
                                                    <div data-repeater-item class="form-group row align-items-center">
                                                        <div class="col-md-3">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__control">
                                                                    <textarea name="{{ '['.$counter.']' }}[milestone_name]" class="form-control form-control autoresize" id="milestone_name"  rows="1" readonly>{{ $milestone->milestone_name }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="kt-form__group--inline">
                                                                <select class="form-control kt-select2 milestone_status" name="{{ '['.$counter.']' }}[milestone_status]">
                                                                    @foreach($statuses as $status)
                                                                        <option value="{{ $status->id }}">{{ $status->status}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__control">
                                                                    <input name="{{ '['.$counter.']' }}[milestone_start_date]" type="text" class="form-control  date-picker" readonly id="milestone_start_date" placeholder="Enter Start Date"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__control">
                                                                    <input name="{{ '['.$counter.']' }}[milestone_end_date]" type="text" class="form-control  date-picker" readonly id="milestone_end_date" placeholder="Enter End Date"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="kt-form__group--inline">
                                                                <div class="kt-form__control">
                                                                    <div class="kt-form__control">

                                                                        <textarea name="{{ '['.$counter.']' }}[milestone_remarks]" class="form-control form-control autoresize" id="milestone_remarks"  rows="1" placeholder="Remarks"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $counter++;?>
                                    @endforeach
                                @else
                                    <div id="kt_repeater_2">
                                        <div class="form-group form-group-last row" id="kt_repeater_2">
                                            <div data-repeater-list="" class="col-lg-12">
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-md-2">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                {{--<input name="milestone_name" type="text" class="form-control" placeholder="Enter milestone name">--}}
                                                                <textarea name="milestone_name" class="form-control autoresize" id="milestone_name"  rows="1" placeholder="Enter milestone name"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="kt-form__group--inline">
                                                            <select class="form-control kt-select2 milestone_status" name="milestone_status">
                                                                @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}">{{ $status->status}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                <input name="milestone_start_date" type="text" class="form-control  date-picker" readonly id="" placeholder="Enter Milestone Start Date"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                <input name="milestone_end_date" type="text" class="form-control  date-picker" readonly id="" placeholder="Enter Milestone End Date"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                {{--<input name="milestone_name" type="text" class="form-control" placeholder="Enter milestone name">--}}
                                                                <textarea name="milestone_remarks" class="form-control autoresize" id="milestone_remarks"  rows="1" placeholder="Enter milestone remarks"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="kt-form__group--inline">
                                                            <div class="kt-form__control">
                                                                <a href="javascript:;" data-repeater-delete="" class=" btn btn-label-danger btn-bold">
                                                                    <i class="la la-trash-o"></i>
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-last row">
                                            <label class="col-lg-9 col-form-label"></label>
                                            <div class="col-lg-3">
                                                <a href="javascript:;" data-repeater-create="" class="btn btn-bold  btn-label-brand">
                                                    <i class="la la-plus"></i> Add
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

            {{--TODO END MILESTONE DATA FORM--}}






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