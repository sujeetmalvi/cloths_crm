<?php

namespace App\Http\Controllers;

use App\Models\ProductMaterialRequest;
use App\Models\ProductMaterialRequestDetail;
use Illuminate\Http\Request;

class ProductMaterialRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_material_request = ProductMaterialRequest::select('product_material_requests.*', 'users.name')->leftjoin('users', 'users.id', '=', 'product_material_requests.requested_by')->get();

        return view('product-material-request.index', compact('product_material_request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-material-request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'order_no' => 'required|max:100'
        // ]);

        $material_request = ProductMaterialRequest::create(['order_no' => $request->order_no, 'requested_by' => 1]);
        // print_r($request->id); die;

        for($i=0; $i<count($request->material_code); $i++) {
            ProductMaterialRequestDetail::create(['material_request_id' => $material_request->id, 'material_code' => $request->material_code[$i], 'description' => $request->description[$i], 'quantity' => $request->quantity[$i], 'unit' => $request->unit[$i]]);
        }

        return redirect()->route('product-material-request.index')
            ->with('success', 'Material request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_material_request = ProductMaterialRequest::select('product_material_requests.*', 'users.name')->leftjoin('users', 'users.id', '=', 'product_material_requests.requested_by')->where('material_request_id', $id)->first();

        $request_details = ProductMaterialRequestDetail::where('material_request_id', $id)->get();

        $details = array('product_material_request' => $product_material_request, 'request_details' => $request_details);

        return view('product-material-request.show', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_material_request = ProductMaterialRequest::where('material_request_id', $id)->first();

        return view('product-material-request.edit', compact('product_material_request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'uom' => 'required|max:100'
        ]);

        $product_material_request = ProductMaterialRequest::where('material_request_id', $id)->first();
        ProductMaterialRequest::where('unit_id', $id)->update(['uom' => $request->uom]);

        return redirect()->route('product-material-request.index')
            ->with('success', 'Material request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_material_request = ProductMaterialRequest::where('material_request_id', $id)->first();
        ProductMaterialRequest::where('unit_id', $id)->delete();

        return redirect()->route('product-material-request.index')
            ->with('success', 'Material request deleted successfully');
    }
}