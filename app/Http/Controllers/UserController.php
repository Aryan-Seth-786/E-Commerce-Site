<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hamcrest\Arrays\IsArray;
use Hamcrest\Type\IsObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;

class UserController extends Controller
{
    // public function get_cart()
    // {
    //     //
    // }
    // public function add_to_cart(Request $request)
    // {
    //     $req = $request->all();
    //     //now add to cart
    // }
    // public function remove_from_cart(Request $request)
    // {
    //     $req = $request->all();
    //     //remove from the cart
    // }

    private function check_user($username, $password)
    {
        /* here we have to check if the user exists */
        $password = crypt($password,'salt');
        $ret = User::where('name', '=', $username)->where('password', '=', $password)->first();
        // return empty($ret);
        // return $ret['id'];
        // return [
        //     'username' => $username,
        //     'pass' => $password
        // ];
        if (!empty($ret)) {
            return [
                'reply' => 'valid user',
                'user_id' => $ret['id']
            ];
        } else {
            return [
                'reply' => 'invalid user'
            ];
        }
    }

    public function create_user($username, $password,$email)
    {
        $check_user = $this->check_user($username, $password);
        if ($check_user['reply'] !== 'invalid user') {
            return [
                'reply' => 'username exists'
            ];
        }
        // $ret_query = User::insert([
        //     'name' => $username,
        //     'password' => bcrypt($password)
        // ]);

        // return $ret_query;
        $ret = DB::table('users')->insert([
            'name' => $username,
            'password' => crypt($password,'salt'),
            'email' => $email
        ]);
        if (!empty($ret)){
            return [
                'reply' => 'done'
            ];
        }
    }
    public function main_method(Request $req)
    {
        $req = $req->all();
        define('TASK', $req['task']);
        /* now I have to give the response */
        $return_from_function = null;
        if (TASK === 'check_user') {
            $return_from_function = $this->check_user($req['username'], $req['password']);
            // return User::where('name', '=', 'new')->first();
        } elseif (TASK === 'create_user') {
            $return_from_function = $this->create_user($req['username'], $req['password'],$req['email']);
        }
        return $return_from_function;
    }
}
