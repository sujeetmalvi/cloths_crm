<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();

        return view('shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shift_name' => 'required|max:100'
        ]);

        Shift::create($request->all());

        return redirect()->route('shifts.index')
            ->with('success', 'Shift created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shift = Shift::where('shift_id', $id)->first();

        return view('shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'shift_name' => 'required|max:100'
        ]);

        $shift = Shift::where('shift_id', $id)->first();
        Shift::where('shift_id', $id)->update(['shift_name' => $request->shift_name]);

        return redirect()->route('shifts.index')
            ->with('success', 'Shift updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::where('shift_id', $id)->first();
        Shift::where('shift_id', $id)->delete();

        return redirect()->route('shifts.index')
            ->with('success', 'Shift deleted successfully');
    }
}
