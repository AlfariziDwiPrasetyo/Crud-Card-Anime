<?php

namespace App\Http\Controllers;


use App\Models\Waifu;
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

        return response()->json(["data" => Waifu::all()]);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:waifus|max:255',
            'description' => 'required',
            'slug' => 'required|unique:waifus|max:255',
            'image' => 'required|max:255',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        try {
        Waifu::create($validator->validated());
        }
        catch(\Exception $e){
            return response()->json(['error' => 'Some error occured!']);
        }
        return response()->json(['success' => 'Waifu has been added!']);
    }

    /**
     * Display the specified resource.
     *

     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function show(Waifu $waifu)
    {
        return response()->json(['data' => $waifu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function edit(Waifu $waifu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waifu $waifu)
    {

        $rules = ['name' => 'required|max:255',
        'description' => 'required',
        'slug' => 'required|max:255',
        'image' => 'required|max:255'];
        
       
        // unique:waifus|

        if($request->name !== $waifu->name){
            $rules['name'] = 'required|unique:waifus|max:255';
        }

        if($request->slug !== $waifu->slug){
            $rules['slug'] = 'required|unique:waifus|max:255';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        try {
        // Waifu::create($validator->validated());
            $p = Waifu::where('id', $request->id)->update($validator->validated());
            // return response()->json($p);
        }
        catch(\Exception $e){
            return response()->json(['error' => 'Some error occured!']);
        }

        if(!$p){
            return response()->json(['error' => 'Waifu failed update!']);
        }
        return response()->json(['success' => 'Waifu has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waifu  $waifu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waifu $waifu)
    {
        //
    }
}
