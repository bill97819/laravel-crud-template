<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pencil;

use Resource\Views;

class PencilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //get all pencils
        $pencils = Pencil::all();
        
        return view('pencils.index')
            ->with('pencils', $pencils);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //create a pencil
        return view('pencils.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'name'          => 'required',
            'length'        => 'required|numeric|max:300'
        ]);
        
        $pencil = new Pencil;
        $pencil->name = $request->name;
        $pencil->length = $request->length;
        $pencil->save();
        
        session()->flash('message', 'Successfully created Pencil!');
        
        return redirect ('pencil');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $pencil = Pencil::find($id);
        
        return view('pencils.show')->with('pencil',$pencil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pencil = Pencil::find($id);
        
        return view('pencils.edit')->with('pencil',$pencil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request,[
            'name'          => 'required',
            'length'        => 'required|numeric|max:300'
        ]);
        
        $pencil = Pencil::find($id);
        $pencil->name = $request->name;
        $pencil->length = $request->length;
        $pencil->save();
        
        session()->flash('message', 'Successfully updated '.$pencil->name.'!');
        
        return redirect ('pencil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pencil = Pencil::find($id);
        $pencil->delete();
        
        session()->flash('message','Successfully deleted the Pencil!');
        return redirect('pencil');
    }
}