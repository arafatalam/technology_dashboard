@extends('tech_dashboard.layout.master')
@section('content')
    <span id="docid" hidden>createmodule</span>
    <span id="field_id" hidden></span>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Subheader -->
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
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
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
                        <div class="kt-grid__item">
                            <!--begin: Form Wizard Nav -->
                            <div class="kt-wizard-v3__nav">
                                <div class="kt-wizard-v3__nav-items">
                                    <a class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <span>1</span> Setup Module
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                    <a class="kt-wizard-v3__nav-item"  data-ktwizard-type="step">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <span>2</span> Create Fields
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                    <a class="kt-wizard-v3__nav-item"  data-ktwizard-type="step">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <span>3</span> Set Milestones
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                    <a class="kt-wizard-v3__nav-item"  data-ktwizard-type="step">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <span>4</span> Review and Submit
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end: Form Wizard Nav -->
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
                            <!--begin: Form Wizard Form-->
                            <form class="kt-form" id="kt_form" style="width: 80%; !important;">

                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-heading kt-heading--md">Setup Your New Module</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v3__form">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="kt-portlet kt-portlet--height-fluid kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">Module Entry Form</h3>
                                                            </div>
                                                        </div>
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
                                                                                    <option value="0" >Select Milestone Type</option>
                                                                                    <option value="Fixed Milestone" >Fixed Milestone</option>
                                                                                    <option value="Independent Milestone" selected="selected">Independent Milestone</option>
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
                                                                    <div class="col-xl-12">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-secondary" onclick="clearModuleEntryForm();">Clear</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6 kt-align-right">
                                                                                <div class="form-group">
                                                                                    <button id="button_add_module" type="button" class="btn btn-primary kt-align-right" onclick="addModule();">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="kt-portlet kt-portlet--mobile  kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder" >
                                                            <div class="kt-portlet__head-label">
                                                                    <span class="kt-portlet__head-icon">
                                                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                                                    </span>
                                                                <h3 class="kt-portlet__head-title">
                                                                    Module To Add
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <table class="table table-hover table-sm table-striped " id="module_table" style="text-align : center; !important;">
                                                                <thead>
                                                                <tr >
                                                                    <th><strong>Module Name</strong></th>
                                                                    <th><strong>Milestone Type</strong></th>
                                                                    <th><strong>Remarks</strong></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Setup your Additional Fields</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v3__form">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="kt-portlet kt-portlet--height-fluid kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">New Field Entry Form</h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-portlet__content">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Field Name</label>
                                                                            <textarea id="field_name" class="form-control form-control autoresize" rows="1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Data Type</label>
                                                                            <div>
                                                                                <select class="form-control kt-select2" id="field_data_type" style="width:100%; !important;">
                                                                                    <option value="TEXT">Text</option>
                                                                                    <option value="DROPDOWN">Drop Down</option>
                                                                                    <option value="DATE">Date</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Serial</label>
                                                                            <input id="field_serial" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Drop Down Value</label>
                                                                            <textarea id="field_dropdown_values" class="form-control form-control autoresize" rows="1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Remarks:</label>
                                                                            <textarea id="field_remarks" class="form-control form-control autoresize" rows="2"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-secondary" onclick="clearModuleFieldEntryForm();">Clear</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6 kt-align-right">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-primary kt-align-right" onclick="addField();">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="kt-portlet kt-portlet--mobile  kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder" >
                                                            <div class="kt-portlet__head-label">
                                                                <span class="kt-portlet__head-icon">
                                                                    <i class="kt-font-brand flaticon2-line-chart"></i>
                                                                </span>
                                                                <h3 class="kt-portlet__head-title">
                                                                    Scrollable Table
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <!--begin: Datatable -->
                                                            <table class="table table-hover table-sm table-striped " id="module_fields_table" style="text-align : center; !important;">
                                                                <thead>
                                                                    <tr >

                                                                        <th><strong>Field Name</strong></th>
                                                                        <th><strong>Data Type</strong></th>
                                                                        <th><strong>Serial</strong></th>
                                                                        <th><strong>DropDown Values</strong></th>
                                                                        <th><strong>Remarks</strong></th>
                                                                        <th><strong>Action</strong></th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{--<tr style="text-align: center; !important;">--}}

                                                                        {{--<td>Project Manager</td>--}}
                                                                        {{--<td>TEXT</td>--}}
                                                                        {{--<td></td>--}}
                                                                        {{--<td>2</td>--}}
                                                                        {{--<td>Test Remarks</td>--}}
                                                                        {{--<td>--}}
                                                                            {{--<a href="./rededitproject/' + row.id +' "class="btn btn-sm btn-clean btn-icon btn-icon-md " title="Edit details"><i class="la la-edit"></i></a>--}}
                                                                        {{--</td>--}}

                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}


                                                                        {{--<td>Start Date</td>--}}
                                                                        {{--<td>DATE</td>--}}
                                                                        {{--<td></td>--}}
                                                                        {{--<td>2</td>--}}
                                                                        {{--<td>Test Remarks</td>--}}

                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}

                                                                        {{--<td>Status</td>--}}
                                                                        {{--<td>DROPDOWN</td>--}}
                                                                        {{--<td>Initiated, InPipeline, Completed</td>--}}
                                                                        {{--<td>2</td>--}}
                                                                        {{--<td>Test Remarks</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}

                                                                        {{--<td>Status</td>--}}
                                                                        {{--<td>DROPDOWN</td>--}}
                                                                        {{--<td>Initiated, InPipeline, Completed</td>--}}
                                                                        {{--<td>2</td>--}}
                                                                        {{--<td>Test Remarks</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}


                                                                        {{--<td>Start Date</td>--}}
                                                                        {{--<td>DATE</td>--}}
                                                                        {{--<td></td>--}}
                                                                        {{--<td>2</td>--}}
                                                                        {{--<td>Test Remarks mela mela remarks</td>--}}

                                                                    {{--</tr>--}}
                                                                </tbody>
                                                            </table>
                                                            <!--end: Datatable -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 3-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Set Default Milestones</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v3__form">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="kt-portlet kt-portlet--height-fluid kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">Milestone Entry Form</h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-portlet__content">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group">
                                                                            <label>Milestone Name</label>
                                                                            <textarea id="milestone_name" class="form-control form-control autoresize" rows="1"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-secondary" onclick="clearMilestoneEntryForm();">Clear</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6 kt-align-right">
                                                                                <div class="form-group">
                                                                                    <button type="button" class="btn btn-primary kt-align-right" onclick="addMilestone();">Add</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="kt-portlet kt-portlet--mobile  kt-shape-bg-color-1">
                                                        <div class="kt-portlet__head kt-portlet__head--noborder" >
                                                            <div class="kt-portlet__head-label">
                                                                <span class="kt-portlet__head-icon">
                                                                    <i class="kt-font-brand flaticon2-line-chart"></i>
                                                                </span>
                                                                <h3 class="kt-portlet__head-title">
                                                                    Scrollable Table
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <!--begin: Datatable -->
                                                            <table class="table table-hover table-sm table-striped " id="module_milestone_table" style="text-align : center; !important;">
                                                                <thead>
                                                                    <tr >
                                                                        <th><strong>Milestone Name</strong></th>
                                                                        <th><strong>Action</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <!--end: Datatable -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 3-->

                                <!--begin: Form Wizard Step 4-->
                                <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                    <div class="kt-heading kt-heading--md">Please Review your Module Details Carefully and Submit</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v3__review">
                                            {{--<div class="kt-wizard-v3__review-item">--}}
                                                {{--<div class="kt-wizard-v3__review-title">--}}
                                                    {{--Current Address--}}
                                                {{--</div>--}}
                                                {{--<div class="kt-wizard-v3__review-content">--}}
                                                    {{--Address Line 1<br />--}}
                                                    {{--Address Line 2<br />--}}
                                                    {{--Melbourne 3000, VIC, Australia--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="kt-wizard-v3__review-item">--}}
                                                {{--<div class="kt-wizard-v3__review-title">--}}
                                                    {{--Delivery Details--}}
                                                {{--</div>--}}
                                                {{--<div class="kt-wizard-v3__review-content">--}}
                                                    {{--Package: Complete Workstation (Monitor, Computer, Keyboard & Mouse)<br />--}}
                                                    {{--Weight: 25kg<br />--}}
                                                    {{--Dimensions: 110cm (w) x 90cm (h) x 150cm (L)--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="kt-wizard-v3__review-item">--}}
                                                {{--<div class="kt-wizard-v3__review-title">--}}
                                                    {{--Delivery Service Type--}}
                                                {{--</div>--}}
                                                {{--<div class="kt-wizard-v3__review-content">--}}
                                                    {{--Overnight Delivery with Regular Packaging<br />--}}
                                                    {{--Preferred Morning (8:00AM - 11:00AM) Delivery--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="kt-wizard-v3__review-item">--}}
                                                {{--<div class="kt-wizard-v3__review-title">--}}
                                                    {{--Delivery Address--}}
                                                {{--</div>--}}
                                                {{--<div class="kt-wizard-v3__review-content">--}}
                                                    {{--Address Line 1<br />--}}
                                                    {{--Address Line 2<br />--}}
                                                    {{--Preston 3072, VIC, Australia--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 4-->



                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                        Previous
                                    </div>
                                    <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                        Submit
                                    </div>
                                    <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                        Next Step
                                    </div>
                                </div>

                                <!--end: Form Actions -->
                            </form>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
@stop