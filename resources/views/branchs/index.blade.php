@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Branch List</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <!-- <h2>Plain Page</h2> -->
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="/branchs/create">
                                    <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <!-- <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                    </p> -->
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th style="width:200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>
                                                    <a href="/branchs/edit"><button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>
                                                    <a href="/branchs/edit"><button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>
                                                    <a href="/branchs/edit"><button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                    <button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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