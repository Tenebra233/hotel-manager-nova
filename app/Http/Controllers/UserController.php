<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/api/users",
 * summary="Create an user",
 * description="Create an user with name, email and password",
 * operationId="registerUser",
 * tags={"register"},
 * @OA\RequestBody(
 *    required=true,
 *    description="User info",
 *    @OA\JsonContent(
 *       required={"name", "email","password"},
 *       @OA\Property(property="name", type="string", example="roberto"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *
 *    ),
 * ),
 *     *   @OA\Response(
 *     response=201,
 *     description="Success",
 *     @OA\JsonContent(
 *        @OA\Property(property="message", type="string", example="User created"),
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
class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        $user = User::create($request->all());
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
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }


    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
