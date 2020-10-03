<?php

namespace App\Http\Controllers;

use App\Prenotazioni;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/api/prenotazione",
 * summary="Crea  una prenotazione",
 * description="Crea una fattura con la fattura associata",
 * operationId="createPrenotazione",
 * tags={"prenotazione"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Dettagli prenotazione",
 *    @OA\JsonContent(
 *       required={"data_prenotazione", "note","status", "fattura_id"},
 *       @OA\Property(property="note", type="string", example="note..."),
 *       @OA\Property(property="data_prenotazione", type="string", format="date"),
 *       @OA\Property(property="status", type="string", example="S"),
 *       @OA\Property(property="fattura_id", type="number"),
 *
 *    ),
 * ),
 *     *   @OA\Response(
 *     response=201,
 *     description="Success",
 *     @OA\JsonContent(
 *        @OA\Property(property="message", type="string", example="Prenotazione creata"),
 *     )
 *  ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */
class PrenotazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = Prenotazioni::create($request->all());
        return response()->json($user, 201);
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
