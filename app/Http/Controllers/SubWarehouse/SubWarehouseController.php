<?php

namespace App\Http\Controllers\SubWarehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubWarehouse;

class SubWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subWarehouse  = SubWarehouse::all();
        $subWarehouse = SubWarehouse::join('warehouses', 'warehouses.id', '=', 'sub_warehouses.id_warehouses')
                        ->select('sub_warehouses.id','nombre_sub_warehouses','warehouses.id', 'nombre_warehouses')
                        ->get();

        return response()->json(['data' => $subWarehouse], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'nombre_sub_warehouses' => 'required',
            'id_warehouses' => 'required',
        ];

        $this->validate($request,$reglas);

        $campos = $request->all();

        $subWarehouse = SubWarehouse::create($campos);

        return response()->json(['data' => $subWarehouse], 201);
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
