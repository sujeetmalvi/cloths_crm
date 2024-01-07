@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Material Request Issued</h3>
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
                          <!-- <li>
                            <a href="/product-material-request-issued/create">
                                <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></button>
                            </a>
                        </li> -->
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
                                                <th>Order Number</th>
                                                <th>Requested By</th>
                                                <th>Requested Date</th>
                                                <th>Approved By</th>
                                                <th>Approved Date</th>
                                                <th>Issued By</th>
                                                <th>Issued Date</th>
                                                <th style="width:200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($product_material_request))  
                                            @foreach($product_material_request as $request)

                                            <?php
                                            $requested_date = '';
							                if($request->created_at != '' && $request->created_at != null) {
	                                            $dt = new DateTime($request->created_at);
								                $dt->setTimezone(new DateTimeZone('Asia/Kolkata'));
								                $requested_date = $dt->format('d-m-Y H:i:s');
								            }

							                $approved_date = '';
                                            $approved_by = '';
							                if($request->approved_date != '' && $request->approved_date != null) {
	                                            $dt1 = new DateTime($request->approved_date);
								                $dt1->setTimezone(new DateTimeZone('Asia/Kolkata'));
								                $approved_date = $dt1->format('d-m-Y H:i:s');
                                                $approved_by = $request->name;
								            }

								            $issued_date = '';
                                            $issued_by = '';
								            if($request->issued_date != '' && $request->issued_date != null) {
								                $dt2 = new DateTime($request->issued_date);
								                $dt2->setTimezone(new DateTimeZone('Asia/Kolkata'));
								                $issued_date = $dt2->format('d-m-Y H:i:s');
                                                $issued_by = $request->name; 
								            }
                                            ?>
                                            <tr>
                                                <td>{{$request->order_no}}</td>
                                                <td>{{$request->name}}</td>
                                                <td>{{$requested_date}}</td>
                                                <td>{{$approved_by}}</td>
                                                <td>{{$approved_date}}</td>
                                                <td>{{$issued_by}}</td>
                                                <td>{{$issued_date}}</td>
                                                <td style="display: flex;">
                                                    <form action="{{ route('product-material-request-issued.show', $request->material_request_id) }}" method="post">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-eye-open"></i></button>
                                                        {!! method_field('get') !!}
                                                        {!! csrf_field() !!}
                                                    </form>
                                                    
                                                    <!-- <a href=""><button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>

                                                    <form action="" method="post">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                                                        {!! method_field('delete') !!}
                                                        {!! csrf_field() !!}
                                                    </form> -->
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
@include('template.bottom')