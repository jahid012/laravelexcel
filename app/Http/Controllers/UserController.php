<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Maatwebsite\Excel\Excel;
class UserController extends Controller
{
    public function exportUser(){
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function importUser(Request $request){
        Excel::import(new UsersImport, $request->file('file'));
        return['msg','success'];
    }

    public function getUser(Request $request){
       $users = User::all()->toArray();
       dd($users);
        return['user', $users];
    }

    public function storeUser(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt( $request ->password);
        $user->email = $request -> email;
        $user->save();

        return ['msg', 'success'];
     }

     public function notification(Request $request){
        
        if(auth()->check()){
            $first_user = User::whereId(7)->first();
            auth()->user()->notify( new UserFollowNotification($first_user));
        }

        dd('done');
     }

     public function markasread($id){
        
        if($id){
            
            auth()->user()->notifications->where('id', $id)->markasread();
        }

        return back();
     }

     //branchA function
     public function branchAfunction($id){
        
        if($id){
            
            auth()->user()->notifications->where('id', $id)->markasread();
        }

        return back();
     }
}
