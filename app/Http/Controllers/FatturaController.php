<?php

namespace App\Http\Controllers;

use App\Fattura;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/api/fattura",
 * summary="Crea una fattura",
 * description="Crea una fattura con il cliente associato",
 * operationId="createFattura",
 * tags={"fattura"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Dettagli fattura",
 *    @OA\JsonContent(
 *       required={"cliente", "data","iva", "totale"},
 *       @OA\Property(property="user_id", type="number", example="1"),
 *       @OA\Property(property="data", type="string", format="date"),
 *       @OA\Property(property="aliquota_iva", type="number"),
 *       @OA\Property(property="totale", type="number"),
 *
 *    ),
 * ),
 *     *   @OA\Response(
 *     response=201,
 *     description="Success",
 *     @OA\JsonContent(
 *        @OA\Property(property="message", type="string", example="Fattura creata"),
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

class FatturaController extends Controller
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
        $user = Fattura::create($request->all());
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
