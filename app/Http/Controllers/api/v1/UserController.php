<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = bcrypt($request->get('password'));
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $password,
        ]);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
       return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if($userData = new UserResource($user)) {
            return $userData;
        }

        response()->json([
            'message' => 'Usuário não encontrado!'
        ], 404);
    }

    function update(Request $request, User $user){
        $user->update([
            'first_name' => $request->data['firstName'],
            'last_name' => $request->data['lastName'],
            'email' => $request->data['email']
        ]);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
