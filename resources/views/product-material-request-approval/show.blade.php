@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Material Request Details Approval</h3>
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
                            <a href="/product-material-request-approval">
                                <button class="btn btn-primary"><i class="glyphicon glyphicon-list"></i> List</button>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <?php 
                	$product_material_request = $details['product_material_request'];
                	$request_details = $details['request_details'];
            	?>
                <div class="x_content">
                	<div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <!-- <div>
                                 	<label>Order Number</label>
                                 	<span>{{$product_material_request->order_no}}</span>
                                </div>
                                <div>
                                 	<label>Requested By</label>
                                 	<span>{{$product_material_request->name}}</span>
                                </div>
                                <div>
                                 	<label>Requested Date</label>
                                 	<span>{{$product_material_request->created_at}}</span>
                                </div> -->
                                <table class="table" style="width:100%; margin-bottom: 30px;">
                                    <thead>
                                        <tr>
                                            <th style="border: 0;">Order Number</th>
                                            <th style="border: 0;">Requested By</th>
                                            <th style="border: 0;">Requested Date</th>
                                            <th style="border: 0;">Approved By</th>
                                            <th style="border: 0;">Approved Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $requested_date = '';
                                        if($product_material_request->created_at != '' && $product_material_request->created_at != null) {
                                            $dt = new DateTime($product_material_request->created_at);
                                            $dt->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                            $requested_date = $dt->format('d-m-Y H:i:s');
                                        }

                                        $approved_date = '';
                                        if($product_material_request->approved_date != '' && $product_material_request->approved_date != null) {
                                            $dt1 = new DateTime($product_material_request->approved_date);
                                            $dt1->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                            $approved_date = $dt1->format('d-m-Y H:i:s');
                                        }
                                        ?>
                                        <tr>
                                            <td style="border: 0;">{{$product_material_request->order_no}}</td>
                                            <td style="border: 0;">{{$product_material_request->name}}</td>
                                            <td style="border: 0;">{{$requested_date}}</td>
                                            <td style="border: 0;">{{$product_material_request->name}}</td>
                                            <td style="border: 0;">{{$approved_date}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                    <!-- <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                    </p> -->
                                    <form id="update_request" method="post" action="/product-material-request-approval" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
		                            {!! method_field('put') !!}
                                    {!! csrf_field() !!}
		                            	<input type="hidden" name="material_request_id" value="{{$product_material_request->material_request_id}}">
	                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
	                                        <thead>
	                                            <tr>
	                                                <th>Material Code</th>
	                                                <th>Description</th>
	                                                <th>Quantity</th>
	                                                <th>Unit</th>
	                                                <th>Approved Quantity</th>
	                                                <th>Approved Unit</th>
	                                                <!-- <th style="width:200px;">Action</th> -->
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            @if(!empty($request_details))  
	                                            @foreach($request_details as $request)
	                                            <tr>
	                                                <td>{{$request->material_code}}</td>
	                                                <td>{{$request->description}}</td>
	                                                <td>{{$request->quantity}}</td>
	                                                <td>{{$request->uom}}</td>
                                                    <?php 
                                                    if($request->issued_qty != '' && $request->issued_qty != null){
                                                    ?>
                                                        <td>{{$request->approved_qty}}</td>
                                                    <?php
                                                    }else {
                                                    ?>
                                                        <td><input type="number" name="approved_qty[]" required value="{{$request->approved_qty}}"></td>
                                                    <?php 
                                                    }
                                                    ?>
                                                    <td>{{$request->uom}}</td>
	                                                <input type="hidden" name="request_detail_id[]" value="{{$request->request_detail_id}}">
	                                                <!-- <td style="display: flex;">
	                                                    
	                                                </td> -->
	                                            </tr>
	                                            @endforeach
	                                            @endif
	                                        </tbody>
	                                    </table>
	                                    <button type="submit" class="btn btn-success">Submit</button>
	                                </form>
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