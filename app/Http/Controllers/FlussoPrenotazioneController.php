<?php

namespace App\Http\Controllers;

use App\Fattura;
use App\Prenotazioni;
use App\User;
use Illuminate\Http\Request;


/**
 * @OA\Post(
 * path="/api/flusso-prenotazione",
 * summary="Create an user",
 * description="Crea un utente, una fattura ed una prenotazione tutti collegati",
 * operationId="flussoPrenotazione",
 * tags={"flussoPrenotazione"},
 * @OA\RequestBody(
 *    required=true,
 *    description="User info",
 *    @OA\JsonContent(
 *       required={"name", "email","password"},
 *       @OA\Property(property="name", type="string", example="roberto"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *      @OA\Property(property="data", type="date", format="date", example="2020-09-28 10:00:00"),
 *      @OA\Property(property="aliquota_iva", type="number", format="number", example="22"),
 *      @OA\Property(property="totale", type="number", format="number", example="1000"),
 *      @OA\Property(property="data_prenotazione", type="string", format="string", example="2020-09-28 10:00:00"),
 *      @OA\Property(property="data_da", type="string", format="string", example="2020-09-28 10:00:00"),
 *      @OA\Property(property="data_a", type="string", format="string", example="2020-09-28 10:00:00"),
 *      @OA\Property(property="note", type="string", format="string", example="note"),
 *      @OA\Property(property="status", type="string", format="string", example="S"),
 *
 *    ),
 * ),
 *     *   @OA\Response(
 *     response=201,
 *     description="Successo",
 *     @OA\JsonContent(
 *        @OA\Property(property="message", type="string", example="Prenotazione avvenuta con successo"),
 *     )
 *  ),
 * @OA\Response(
 *    response=422,
 *    description="Errore",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Prenotazione non effettuata")
 *        )
 *     )
 * )
 */
class FlussoPrenotazioneController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function flussoPrenotazione(Request $request)
    {
        $user = User::create($request->all());

        $lastUserId = $user->id;

        $dataFattura = $request->all();
        $dataFattura['user_id'] = $lastUserId;
        $fattura = Fattura::create($dataFattura);

        $lastFatturaId = $fattura->id;

        $dataPrenotazione = $request->all();
        $dataPrenotazione['fattura_id'] = $lastFatturaId;
        $prenotazione = Prenotazioni::create($dataPrenotazione);

        return response()->json([$user, $fattura, $prenotazione], 201);

    }
}
