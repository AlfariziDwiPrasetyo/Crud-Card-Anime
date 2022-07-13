<?php

namespace App\Http\Controllers;

use \App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WaifuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waifus = Waifu::all();
        return response()->json($waifus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:waifus|max:255',
            'slug' => 'required|unique:waifus|max:255',
            'description' => 'required',
            'image' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        try {
            Waifu::create($validator->validated());
        }catch(\Throwable $e){
            return response()->json(['error' => 'Failed to add data!']);
        }

        return response()->json(['success' => 'Waifu has been created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Waifu $waifu)
    {
        return response()->json($waifu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
