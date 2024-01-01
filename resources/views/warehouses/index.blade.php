@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Warehouse List</h3>
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
                            @if(Session::get('success', false))
                            <?php $data = Session::get('success'); ?>
                            <li>
                                <div class="alert alert-success" role="alert">
                                  <i class="fa fa-check"></i>
                                  {{ $data }}
                              </div>
                          </li>
                          @endif
                          <li>
                            <a href="/warehouses/create">
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
                                                <th>Warehouse Name</th>
                                                <th>Address</th>
                                                <th style="width:200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($warehouses))  
                                            @foreach($warehouses as $warehouse)
                                            <tr>
                                                <td>{{$warehouse->warehouse_name}}</td>
                                                <td>{{$warehouse->address}}</td>
                                                <td style="display: flex;">
                                                    <a href="{{ route('warehouses.edit', $warehouse->warehouse_id) }}"><button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>

                                                    <form action="{{ route('warehouses.destroy', $warehouse->warehouse_id) }}" method="post">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                                        {!! method_field('delete') !!}
                                                        {!! csrf_field() !!}
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
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
@include('template.bottom')resources/views/warehouses/index.blade.php