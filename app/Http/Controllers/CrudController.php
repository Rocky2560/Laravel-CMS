<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crud = crud::all();
        return view('crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
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
            'name' => 'required' ,
            'address' => 'required|max:30' ,
            'email' => 'required'
        ]);

        $crud = new crud([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email')
        ]);
        $crud->save();
        return redirect('/crud')->with('success','Contact has been added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud = crud::find($id);

        return view('crud.edit' , compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

        $crud = crud::find($id);
$crud->name = $request->get('name');
$crud->address = $request->get('address');
$crud->email = $request->get('email');
$crud->save();
return redirect('/crud')->with('success',"contact updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = crud::find($id);
        $crud->delete();
        return redirect('/crud')->with('success','Contact deleted');
    }
}
