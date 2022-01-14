<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Validator;

use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/user/index');
    }
    public function edit(Request $request)
    {
        if(!empty($request->id))
        {
            $user = User::find($request->id);
            return view('admin/user/edit',['user' => $user,'permission' => $user->getAllPermissions()]);
        }
    }
    public function view(Request $request)
    {
        if(!empty($request->id))
        {
            $user = User::find($request->id);
            return view('admin/user/view',['user' => $user]);
        }
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=256,height=256',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
        Helper::assignPermission($user->id,$input['role']);
   
        return $this->sendResponse($success, 'User created successfully.');
    }
    public function invite(Request $request)
    {
        if (Auth::check()) 
        {
            $user = auth()->user();

            // $role = array();
            // foreach ($user->getRoleNames() as $key => $value) {
            //     array_push($role,$value);
            // }
            // if(in_array($role,'Admin'))
            // {

            // }

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Error validation', $validator->errors());       
            }
            $data = $request->all();
            $message = "you are Invited to register link is <a herf='".url()->current()."?role=".$data['email']."'> Here </a>";
            $subject = "Invition For Registration";
            $to = $data['email'];
            Helper::invite_mail($to,$subject,$message);

            if(Helper::invite_mail($to,$subject,$message))
            {
                $success['status'] =  true;
                return $this->sendResponse($success, 'Invitation Send successfully.');
            }
            else
            {
                $success['status'] =  false;
                return $this->sendResponse($success, 'Invitation Send Fail. Please Try again Later');
            }
        }
        else
        {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    

    public function update_user(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $request_data = $request->all();
        $user_id = $request_data['user_id'];
        $user = User::find($user_id);
        $user->name = $request_data["name"];
        $user->email = $request_data["email"];
        $user->status = $request_data["status"];
        $user->approval = $request_data["approval"];
        $user->save();
        $role = $request_data["role"];

        $user->syncRoles([$role]);
            $test = array();
            $result = array();
        foreach(Permission::all()->toArray() as $value){
            if(isset($request_data[$value['name']])){
                if($request_data[$value['name']] == "true"){
                    $result[$value['name']] = Helper::assignPermission($user_id,$value['name']);
                    $test[$value['name']] = true;
                }
                else{
                    $result[$value['name']] = Helper::removePermission($user_id,$value['name']);
                    $test[$value['name']] = false;
                }
            }
        }
        return response()->json(['result'=> $result,'status' => $test],200);
    }

    public function role(Request $request)
    {
        return view('admin/user/role',['data' => Role::all()->toArray()]);
    }
    public function permission(Request $request)
    {
        return view('admin/user/permission',['data' => Permission::all()->toArray()]);
    }

    public function UserListDataTable(Request $request)
    {
        $data = User::all();
        $user_detail = array();
        $i = 0;
        foreach ($data as $user)
        {
            // $user->assignRole('admin');
            $user_detail[$i]['name'] = $user->name;
            $user_detail[$i]['email'] = $user->email;
            $role_list = array();
            $user_detail[$i]['role'] = $user->getRoleNames();
            $user_detail[$i]['id'] = $user->id;
            $user_detail[$i]['profile_photo_path'] = $user->profile_photo_path;
            $user_detail[$i]['created_at'] = $user->created_at;
            $user_detail[$i]['userID'] = $user->userID;
            $user_detail[$i]['status'] = $user->status;
            $user_detail[$i]['approval'] = $user->approval;
            $i++;
        }
        return response()->json(['data' => $user_detail],200);
    }
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
