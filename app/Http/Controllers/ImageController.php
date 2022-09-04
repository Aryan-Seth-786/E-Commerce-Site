<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /* public function get_slider_img()
    {
        return asset('/app/public/images/sliderImg');
        return (storage_path('/app/public/images/sliderImg'));
    } */
    public function getImages(Request $request)
    {
        $req = $request->all();
        // return $req;
        // return $req;
        $name = $req['search_by_name'];
        if ($name === null){
            $name = '';
        }
        $order = $req['order_by'];
        $filter_heat = $req['filter_by_heat'];
        if ($filter_heat !== 'all') {
            if ($filter_heat == 'mild') {
                $filter_heat  =  1;
            } else if ($filter_heat == 'medium') {
                $filter_heat = 2;
            } else if ($filter_heat == 'hot') {
                $filter_heat = 3;
            } else {
                throw new Error('conditions wrong');
            }
        }else {
            $filter_heat = '';
        }
        // return 'here ' . $filter_heat;
        $order_col = '';
        $order_asc = '';
        if ($order !== 'none') {
            if (str_contains($order, 'Heat')) {
                $order_col = 'heat';
            } else if (str_contains($order, 'Price')) {
                $order_col = 'price';
            } else {
                throw new Error('unmatching conditions');
            }
            // return 'ehre';
            if (str_contains($order, 'Mild')) {
                $order_asc = true;
            } else if (str_contains($order, 'Hot')) {
                $order_asc = false;
            } else if (str_contains($order, 'Low')) {
                $order_asc = true;
            } else if (str_contains($order, 'High')) {
                $order_asc = false;
            } else {
                throw new Error('unmatching conditions');
            }
            // return $order_col . $order_asc;
        }else {
            $order_col = 'name';
            $order_asc = true;
        }
        $table_name =  app(Images::class)->getTable();
        if ($order_asc){
            $order_asc = 'asc';
        }else {
            $order_asc = 'desc';
        }
        // $sql = "SELECT * FROM images WHERE name LIKE '%$name%' AND heat LIKE '$filter_heat%'" . "ORDER BY $order_col $order_asc;";
        // return DB::select(DB::raw($sql));
        
        /* now doing with query builder */
        // return DB::table('images')->where('name','like',"%$name%")->where('heat','like',"%$filter_heat%")->orderBy($order_col,$order_asc)->get();

        /* now with model */
        return Images::where('name','like',"%$name%")->where('heat','like',"%$filter_heat%")->orderBy($order_col,$order_asc)->get();
    }
}
