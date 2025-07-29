<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;  // Add this import
use Exception;  // Add this import


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::select('name','email')->Where('status', 1)->get();
       
       if (count($users) > 0 ){
        return response()->json([
            'message' => count($users) . ' users found',
            'data' => $users
        ]);
       }
       else{
        return response()->json([
            'message' => 'No users found'
        ]);
       }
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
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if($validation->fails()){
           return response()->json($validation->messages(), 400);
        }
        else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
            ];
            DB::beginTransaction();
            try{
                $user =  user::create($data);
                DB::commit();
            }
            catch(Exception $e){
                p($e->getMessage());
                $user = null;
            }
            if($user != null){
                return response()->json([
                    'message' => 'user created successfully',
                    'user' => $user
                ], 201);
                
            }else{
                return response()->json([
                    'message' => 'Internal server error '
                ] , 500);
            }
        }

        
    }

    /**
     * Display the specified resource.
     */
  public function show(string $id)
{
    $user = User::find($id);
    
    if (is_null($user)) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }
    
    return response()->json([
        'message' => 'User found',
        'data' => $user,
        'status' => 1
    ], 200);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user =  User::find($id);

       if(is_null($user)){
        return response()->json([
            'message' => 'user not found',
            'status' => 0
        ], 404);
    
       }
       else{
        DB::beginTransaction();
        try{
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            $user->contact = $request['contact'];
            $user->pincode = $request['pincode'];
            $user->status = $request['status'];
            $user->save();
            DB::commit();
        }
        catch(Exception $err){
            DB::rollback();
            $user = null;
        }
        if(is_null($user)){
            return response()->json([
                'message' => 'Internal server error',
                'status' => 0,
                'error_msg'=> $err->getMessage()
            ], 500);
        
        }
        else{
            return response()->json([
                'message' => 'user updated successfully',
                'status' => 1,
                'data' => $user
            ]);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(is_null($user)){
            $response = [
                'message' => 'user not found',
                'status' => 0
            ];
            $rescode = 404;
        }
        else{
            DB::beginTransaction();
            try{
                $user->delete();
                DB::commit();
                $response = [
                    'message' => 'user deleted successfully',
                    'status' => 1
                ];
                $rescode = 200;
            }
            catch(Exception $err){
                DB::rollback();
                $response= [
                    'message' => 'Internal server error',
                    'status' => 0
                    
                ];
                $rescode = 500;
            }

        }
        return response()->json($response, $rescode);
    }

   public function changepassword(Request $request, $id ){
    $user = User::find($id);
    if(is_null($user)){
        return response()->json([
            'message' => 'User not found', // Fixed typo
        ], 404);
    }
    else{
        // Use Hash::check() for password verification
        if(Hash::check($request['old_password'], $user->password)){
            if($request['new_password'] == $request['confirmation_password']){
                DB::beginTransaction();
                try{
                    $user->password = Hash::make($request['new_password']);
                    $user->save();
                    DB::commit();
                }
                catch(Exception $err){
                    DB::rollback();
                    $user = null;
                }
                if(is_null($user)){
                    return response()->json([
                        'message' => 'Internal server error',
                    ], 500);
                }
                else{
                    return response()->json([
                        'message' => 'password changed successfully',
                    ], 200);
                }
            }
            else{
                return response()->json([ // Fixed typo: respionse -> response
                    'message' => 'new password and confirmation password does not match',
                ], 400);
            }
        }
        else{
            return response()->json([
                'message' => 'old password does not match',
            ], 400);
        }
    }
}

}
