<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

/**
 * @OA\Tag(
 *     name="Authentication",
 *     description="API Endpoints for Auth"
 * )
 */

class AuthController extends Controller
{   

/**
 * @OA\Post(
 *     path="/api/register",
 *     summary="Register a new user",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "password", "department_id"},
 *             @OA\Property(property="name", type="string", description="User's name"),
 *             @OA\Property(property="email", type="string", format="email", description="User's email"),
 *             @OA\Property(property="password", type="string", format="password", description="User's password"),
 *             @OA\Property(property="department_id", type="integer", description="ID of the user's department"),
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="User registered successfully"
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Validation error"
 *     )
 * )
 */
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'department_id' => 'required|int|between:1,3',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'department_id' => $validatedData['department_id'],
            ]);

            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'department_id' => $user->department_id,
            ])->setStatusCode(Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ])->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


/**
 * @OA\Post(
 *     path="/api/login",
 *     summary="log with user",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password", "device_name"},
 *             @OA\Property(property="email", type="string", format="email", description="User's email"),
 *             @OA\Property(property="password", type="string", format="password", description="User's password"),
 *             @OA\Property(property="device_name", type="string", description="Name of the user's device"),
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Logged in successfully"
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Invalid credentials"
 *     )
 *     @OA\Response(
 *         response="404",
 *         description="Not Found"
 *     )
 * )
 */
    public function login(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Username or password incorrect',
            ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name,
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ]);
    }

     /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="Logout user and revoke access token",
     *     tags={"Authentication"},
     *     @OA\Response(
     *         response="200",
     *         description="User logged out successfully"
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully',
        ])->setStatusCode(Response::HTTP_OK);
    }
}