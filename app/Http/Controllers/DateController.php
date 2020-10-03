<?php

namespace App\Http\Controllers;

use App\Date;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 * path="/api/date",
 * summary="Mostra date disponibili per prenotazioni frontend",
 * description="Mostra date disponibili per prenotazioni frontend",
 * operationId="showAvailableDates",
 * tags={"dateDisponibili"},
 * @OA\RequestBody(
 *    required=false,
 *
 * ),
 *     *   @OA\Response(
 *     response=201,
 *     description="Success",
 *
 *  ),
 * @OA\Response(
 *    response=422,
 *    description="No dates available",
 *
 *     )
 * )
 */

class DateController extends Controller
{

    public function index()
    {
        return Date::where('reserved', 0)->select('date')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
