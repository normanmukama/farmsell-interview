<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{

    //inserting data into the database
    public function SaveEmployee(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must be not more than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be a valid email address.',
            'email.unique' => 'The email field has already been taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password field must be at least 6 characters long.',
            'role.required' => 'The role field is required.',
            'role.in' => 'The role field must be either admin or user.',
        ]);
    
        // Save the data using the query builder
        try {
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            // Set a flash message for successful insertion
            $request->session()->flash('success', 'Data inserted successfully');
            return redirect('view-info');
        } catch (\Exception $e) {
            // Handle any errors during the insertion
            return redirect()->back()->with('error', 'An error occurred while inserting data: ' . $e->getMessage());
        }
    }

    //fetching users from the database
    public function GetUsers()
    {
        $results = DB::table('users')
        ->select('name','role','datehire', 'email','user_id')
        ->get();
        // $results = DB::table('users')->get();
        return view('get-data',[
            'results' => $results
        ]);
    }

    //fetching all users and their logs from the database
    public function GetData()
    {
        $results = DB::table('users')
        ->select('name','role','datehire', 'email','user_id')
        ->get();
        
        // echo $results;
        return view('report',[
            'results' => $results
        ]);
    }


    // viewing the details of a single user
    public function ListUser()
    {
        $email = Session::get('global_email');
       
        $users = DB::table('timein')
        ->leftJoin('users', 'timein.user_id', '=', 'users.user_id')
        ->select('timein.time','timein.out','timein.date')
        ->where('users.email', $email)
        ->get(); 
        return view('user-page', [
            'users' => $users
        ]);
    }
    
    //method for deleting a user
    public function DeleteUser($user_id)
    {
        $deleteUser = DB::table('users')->where('user_id', $user_id)->delete();
        session()->flash('success', 'User deleted successfully');
        return redirect('view-info');
    }

    //viewing log details of each user
    public function InitializeTable($user_id)
    {
        $data = DB::table('timein')
            ->leftJoin('users', 'timein.user_id', '=', 'users.user_id')
            ->select('timein.time','timein.out','timein.date','users.name','users.role', 'users.email','users.status')
            ->where('users.user_id', $user_id)
            ->get();
        return view('report2', [
            'data' => $data
        ]);
    }
    
    //method for logout
    public function LogOut()
    {
        return redirect('login-user2');
    }

}
