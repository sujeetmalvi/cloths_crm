@include('template.top')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product Material Request Create</h3>
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
                                <a href="/product-material-request">
                                    <button class="btn btn-primary"><i class="glyphicon glyphicon-list"></i> List</button>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="create_request" method="post" action="/product-material-request" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="uom">Order Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="order_no" name="order_no" required>
										<option value="">Choose option</option>
										<option value="one">Option one</option>
										<option value="two">Option two</option>
										<option value="three">Option three</option>
										<option value="four">Option four</option>
									</select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <h2>Material Request Details</h2>
                            <table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Material Name</th>
										<th>Description</th>
										<th>Quantity</th>
										<th>Unit</th>
										<th>Add/Remove</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<tr id="1">
										<th scope="row">1</th>
										<td>
											<select class="form-control" id="material_code_1" name="material_code[]" required>
												<option value="">Choose option</option>
												<option value="one">Option one</option>
												<option value="two">Option two</option>
												<option value="three">Option three</option>
												<option value="four">Option four</option>
											</select>
										</td>
										<td>
											<textarea id="description_1" name="description[]" required="required" class="form-control "></textarea>
										</td>
										<td>
											<input type="text" id="quantity_1" name="quantity[]" required="required" class="form-control ">
										</td>
										<td>
											<input type="text" id="unit_1" name="unit[]" required="required" class="form-control ">
										</td>
										<td>
											
										</td>
									</tr>
								</tbody>
							</table>
							<button class="btn btn-md btn-primary" id="addBtn" type="button">
					            Add New Row
					        </button>
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