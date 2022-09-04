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
        $ret = User::where('name', '=', $username)->where('password', '=', $password)->first();
        // return empty($ret);
        // return $ret['id'];
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

    public function main_method(Request $req)
    {
        $req = $req->all();
        define('TASK', $req['task']);
        /* now I have to give the response */
        $return_from_function = null;
        if (TASK === 'check_user') {
            $return_from_function = $this->check_user($req['username'], $req['password']);
            // return User::where('name', '=', 'new')->first();
        }
        return $return_from_function;
    }
}
