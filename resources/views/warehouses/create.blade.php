@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Warehouse Create</h3>
            </div>

            <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>Plain Page</h2> -->
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="/warehouses">
                                    <button class="btn btn-primary"><i class="glyphicon glyphicon-list"></i> List</button>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="create_warehouse" method="post" action="/warehouses" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="warehouse_name">Warehouse Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="warehouse_name" name="warehouse_name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="address" name="address" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-primary" style="float: right;" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



@include('template.footer')
@include('template.common_js')
@include('template.bottom')