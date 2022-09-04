<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function get_cart(Request $req)
    {
        $req = $req->all();
        $all_entries = Cart::where('user','=',$req['user_id'])->get();
        /* now we have all the entries we have to get the name of the image  */
        $all_images_id = [];
        foreach ($all_entries as $elem) {
            array_push($all_images_id,$elem['image']);
        }
        /* now we have all the image ids time to get the image name from them */
        return $all_images_id;
    }
    public function add_to_cart(Request $req)
    {
        $req = $req->all();
        $user_id = $req['user_id'];
        $image_id = $req['image_id'];

        return DB::table('cart')->insert([
            'user' => $user_id,
            'image' => $image_id
        ]);
    }
    public function remove_from_cart(Request $req)
    {
        $req = $req->all();
        $user_id = $req['user_id'];
        // $image_id = $req['image_id'];
        return Cart::where('user','=',$user_id)->where('image','=',$req['image_id'])->delete();
    }
}
