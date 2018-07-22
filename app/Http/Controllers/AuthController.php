<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
class AuthController extends Controller
{
//    public $successStatus = 200;
//    /**
//     * API Register
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function register(Request $request) 
//    { 
//        $validator = Validator::make($request->all(), [ 
//            'name' => 'required', 
//            'email' => 'required|email', 
//            'password' => 'required', 
//            'c_password' => 'required|same:password', 
//        ]);
//        if ($validator->fails()) { 
//                    return response()->json(['error'=>$validator->errors()], 401);            
//                }
//        $input = $request->all(); 
//                $input['password'] = bcrypt($input['password']); 
//                $user = User::create($input); 
//                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
//                $success['name'] =  $user->name;
//        return response()->json(['success'=>$success], $this-> successStatus); 
//    }
//    
//    
//    
//    /**
//     * API Login, on success return JWT Auth token
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function login(){ 
//        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
//            $user = Auth::user(); 
//            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
//            return response()->json(['success' => $success], $this-> successStatus); 
//        } 
//        else{ 
//            return response()->json(['error'=>'Unauthorised'], 401); 
//        } 
//    }
//    /**
//     * Log out
//     * Invalidate the token, so user cannot use it anymore
//     * They have to relogin to get a new token
//     *
//     * @param Request $request
//     */
//    public function logout(Request $request) {
//        $this->validate($request, ['token' => 'required']);
//        
//        try {
//            JWTAuth::invalidate($request->input('token'));
//            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
//        } catch (JWTException $e) {
//            // something went wrong whilst attempting to encode the token
//            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
//        }
//    }
}