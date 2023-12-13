<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

/**
 * @OA\Info(
 *     title="Authentication API",
 *     version="1.0",
 *     @OA\Contact(
 *         email="contact@yourapi.com",
 *         name="Your API Team"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * ),
 * @OA\Tag(
 *     name="Departments",
 *     description="API Endpoints for Departments"
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 */

class DepartmentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/departments",
     *     summary="Get all departments' data",
     *     tags={"Departments"},
     *     @OA\Response(
     *         response="200",
     *         description="Successful operation",
     *     )
     * )
     */
    public function index()
    {
        $departments = Department::with('users')->orderBy('created_at')->get();
    
        $formattedDepartments = $departments->map(function ($department) {
            return [
                'id' => $department->id,
                'depname' => $department->depname,
                'users' => $department->users->map(function ($user) {
                    return [
                        'name' => $user->name,
                        'email' => $user->email,
                    ];
                }),
            ];
        });
    
        return response()->json(['departments' => $formattedDepartments])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
 * @OA\Post(
 *     path="/api/departments",
 *     summary="Create a new department",
 *     tags={"Departments"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"depname"},
 *                 @OA\Property(
 *                     property="depname",
 *                     type="string",
 *                     description="Name of the department",
 *                     maxLength=255,
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Department created successfully",
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Validation error",
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 */
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'depname' => 'required|string|max:255|unique:departments',
        ]);

        $department = Department::create($validatedData);

        return response()->json(['department' => $department])
            ->setStatusCode(Response::HTTP_CREATED);
    }



    /**
     * @OA\Get(
     *     path="/api/departments/{id}",
     *     summary="Get information about a specific department",
     *     tags={"Departments"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Department ID",
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="integer"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Department information",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Department not found",
     *     )
     * )
     */
    public function show(Department $department)
    {
        // Eager load the users relationship
        $departmentWithUsers = $department->load('users');

        return response()->json(['department' => $departmentWithUsers])
            ->setStatusCode(Response::HTTP_OK);
    }

   /**
     * @OA\Put(
     *     path="/api/departments/{id}",
     *     summary="Update information about a specific department",
     *     tags={"Departments"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Department ID",
     *         @OA\Schema(type="integer")
     *     ),   
     *    @OA\RequestBody(
    *         required=true,
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 type="object",
    *                 required={"depname"},
    *                 @OA\Property(
    *                     property="depname",
    *                     type="string",
    *                     description="The updated department name",
    *                     maxLength=255,
    *                 )
    *             )
    *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Department updated successfully",
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Validation error",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Department not found",
     *     ),
     *      security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */

    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'depname' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments')->ignore($department->id),
            ],
        ]);

        $department->update($validatedData);

        return response()->json(['department' => $department])
            ->setStatusCode(Response::HTTP_OK);
    }


    /**
     * @OA\Delete(
     *     path="/api/departments/{id}",
     *     summary="Delete a specific department",
     *     tags={"Departments"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Department ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Department deleted successfully",
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized",
     *      ),
     *     @OA\Response(
     *         response="404",
     *         description="Department not found",
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */
        public function destroy(Department $department)
    {
        // Check for authentication (assuming Laravel Sanctum for API authentication)
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $department->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
