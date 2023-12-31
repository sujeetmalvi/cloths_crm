<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::all();

        return view('branchs.index', compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branchs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|max:100'
        ]);

        Branch::create($request->all());

        return redirect()->route('branchs.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $branch = Branch::where('branch_id', $id)->first();

    //     return view('branchs.show', compact('branch'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::where('branch_id', $id)->first();

        return view('branchs.show', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'branch_name' => 'required|max:100'
        ]);

        $branch = Branch::where('branch_id', $id)->first();
        // $branch->update($request->all());
        Branch::where('branch_id', $id)->update(['branch_name' => $request->branch_name]);

        return redirect()->route('branchs.index')
            ->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::where('branch_id', $id)->first();
        // $branch->delete();
        Branch::where('branch_id', $id)->delete();

        return redirect()->route('branchs.index')
            ->with('success', 'Branch deleted successfully');
    }
}
