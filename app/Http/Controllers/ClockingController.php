<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class ClockingController extends Controller
{
    //
    public function Insert()
    {
       return view('register');
    }

    public function Login()
    {
        return view('login');
    }


    public function CheckLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Check if the user exists
        $user = DB::table('users')->where('email', $email)->where('password', $password)->first();

        // If the user exists and is offline, update their status to online and insert a new time-in record
        if ($user && $user->status === 'OFFLINE') {
            DB::table('users')->where('email', $email)->where('password', $password)->update(['status' => 'ONLINE']);
            
            $name = $user->name;

            $db_id = $user->user_id;
            date_default_timezone_set('Africa/Kampala');
            $time = date('h:i A', strtotime('+0 HOURS'));
            $date = date('M/d/y');

            $insert = DB::table('timein')->insert([
                'user_id' => $db_id,
                'time' => $time,
                'date' => $date,
            ]);

            // Set the session email regardless of the insertion outcome
            session(["email" => $email]);

            if ($insert) {
                if ($user->role === 'admin') {
                    return redirect('view-info');
                } elseif ($user->role === 'user') {
                    return redirect('view-user-info');
                }
            }
        }

        // If the user exists and is online, update their status to offline
        elseif ($user && $user->status === 'ONLINE') {
            date_default_timezone_set('Africa/Kampala');
            $time = date('h:i A', strtotime('+0 HOURS'));
            DB::table('users')->where('email', $email)->where('password', $password)->update(['status' => 'OFFLINE']);
            DB::table('timein')->where('out', null)->update(['out' => $time]);


            $user = DB::table('users')->where('email', $email)->where('password', $password)->first();

            // Fetch the updated user record with the updated status
            $login_user = DB::table('users')->where('email', $email)->where('password', $password)->first();

            // Pass the $time_btn variable to the view
            $time_btn = 'Time In';
            if ($login_user->status === 'ONLINE') {
                $time_btn = 'Time Out';
            }
            
            return view('login-dash')
            ->with('login_user', $login_user)
            ->with('time_btn', $time_btn)
            ->with('redirectTo', 'login');
        }

        // If the user does not exist, return an error message
        else {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }


    public function CheckLogin2()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Store email as a global variable
            Session::put('global_email', $email);

            // Retrieve the user by email
            $check_login_user = DB::table('users')->where('email', $email)->first();

            if ($check_login_user && Hash::check($password, $check_login_user->password)) {
                $user_email = $check_login_user->email;
                $user_password = $check_login_user->password;
                // Timein and timeout btns
                $check_login_btn = $check_login_user->status;
                $time_btn = ($check_login_btn == 'OFFLINE') ? 'Time In' : 'Time Out';

                return view('login-dash', [
                    'login_user' => $check_login_user,
                    'time_btn' => $time_btn
                ]);
            } else {
                session()->flash('success', 'Failed to login! Enter the correct email and password');
                return redirect('login');
            }
        }
    }

    // public function logout()
    // {
    //     return view('login-dash');
    // }


    public function Userboard()
    {
        return view('userboard');
    }

    public function MainDashboard()
    {
        $email = session('email'); // Retrieve the email from the session
        return view('login-dash')->with('email', $email);
    }


        //viewing the details of a single user
        public function SingleUser()
        {
            $email = session('email');
            $results = DB::table('timein')
            ->leftJoin('users', 'timein.user_id', '=', 'users.user_id')
            ->select('timein.time','timein.id','users.name','users.role', 'users.email')
            ->where('users.email', '$email')
            ->get(); 
            // echo $results;
            return view('single-user-data', [
                'results' => $results
            ]);
        }

    public function ListEmployee()
    {
        $email = session('email');
        $users = DB::table("users")->select("user_id","name", "email", "role","datehire", "id")->get();
        return view("list-employee",[
            "users"=>$users
        ])->with("email", $email);
    }

    //method for retrieving data of employees whose their role is user
    public function ListUser()
    {
       
        $users = DB::table('timein')
        ->leftJoin('users', 'timein.user_id', '=', 'users.user_id')
        ->select('timein.time','timein.out','timein.date','users.name','users.role', 'users.email')
        ->where('users.email', '$email')
        ->get(); 

        // echo $results;
        return view('user-page', [
            'users' => $users
        ]);
    }

    public function AdminListUser()
    {
        $email = session('email');
            $normal_user =DB::table('users')->select('name', 'email','user_id as id')->get();

        // $normal_user = DB::table("timein")->select("name", "email")->get();
        $users = DB::table("timein")->select("date","time", "out")->get();
        return view("report",[
            "users"=>$users,
            "normal_user" => $normal_user
        ])->with("email", $email);
        $email = session('email');
        return redirect('list-users');
    }

    public function NormalUser()
    {
        $email = session('email');
        $single_users = DB::table('users')->select("name","email")->where("email" , $email)->get();
        $users = DB::table('timein')->select("date","time","out")->where("email", $email)->get();
        return view("normal-user", [
            "users" => $users,
            "single_users" => $single_users
        ])->with("email", $email);
    }

    public function DeleteUser($user_id)
    {
        $deleteUser = DB::table('users')->where('user_id', $user_id)->delete();
        session()->flash('success', 'User deleted successfully');
        return redirect('list-employee');
    }
    //viewing the user profile details
    public function ViewEmployeeData($user_id)
    {
        $users = DB::table('users')->where('user_id', $user_id)->first();
        return view("update", [
            "users" => $users
        ]);
    }
    
    //Editing user details
    public function editEmployee(Request $request)
    {

         // Validate the request data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique' ,
        //     'role' => 'required|in:admin,user',
        //     'password' => 'nullable|string|min:6',
        // ]);

        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $password = $request->input('password');

        // update the users' record
        DB::table('users')
            ->where('user_id', $user_id)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ]);

        // Set a success flash message
        session()->flash("success", "User account successfully edited");

        return redirect("view-info");

    }

    //view each each user' details on clicking the email
    public  function ViewEachUser()
    {
        // $view_each_user = DB::table("timein")->select("date","time", "out")->where("id", $id)->get();
        return view("view_each");
    }
    public  function ViewEach($id)
    {
        $each_user = DB::table('timein')->where('user_id', $id)->first();
        return view("view_each", [
            "each_user" => $each_user
        ]);
    }
}
