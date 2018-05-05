<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
   
    public function index(){
        
    	$all_published_product = DB::table('tbl_products')
   		                   ->join('tbl_category','tbl_products.category_id','=', 'tbl_category.category_id')
   		                   ->join('tbl_manufacture','tbl_products.manufacture_id','=', 'tbl_manufacture.manufacture_id')
                         ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                         ->where('tbl_products.publication_status',1)
                         ->limit(3)
   		                   ->get();
        $manage_published_product   = view('pages.home_content')
                            ->with('all_published_product',$all_published_product);
                            return view('layout')
                            ->with('admin.home_content',$manage_published_product);


    	

    	//return view('pages/home_content');
    }

    public function Show_product_by_category($category_id){

        $category_product = DB::table('tbl_products')
                           ->join('tbl_category','tbl_products.category_id','=', 'tbl_category.category_id')
                          
                         ->select('tbl_products.*','tbl_category.category_name')
                         ->where('tbl_category.category_id',$category_id)
                         ->where('tbl_products.publication_status',1)
                         ->limit(18)
                         ->get();
        $manage_category_product   = view('pages.product_by_category')
                            ->with('category_product',$category_product);
                            return view('layout')
                            ->with('pages.product_by_category',$manage_category_product);

    }


    public function Show_product_by_manufacture($manufacture_id){

        $manufacture_product = DB::table('tbl_products')
                           ->join('tbl_manufacture','tbl_products.manufacture_id','=', 'tbl_manufacture.manufacture_id')
                          
                         ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                         ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                         ->where('tbl_products.publication_status',1)
                         ->limit(18)
                         ->get();
        $manage_manufacture_product   = view('pages.product_by_manufacture')
                            ->with('manufacture_product',$manufacture_product);
                            return view('layout')
                            ->with('pages.product_by_manufacture',$manage_manufacture_product);

    }

    public function product_details($product_id){


        $details_product_by_id = DB::table('tbl_products')
                           ->join('tbl_category','tbl_products.category_id','=', 'tbl_category.category_id')
                           ->join('tbl_manufacture','tbl_products.manufacture_id','=', 'tbl_manufacture.manufacture_id')
                          
                         ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                         ->where('tbl_products.product_id',$product_id)
                         ->where('tbl_products.publication_status',1)
                         ->first();
        $manage_product_by_id   = view('pages.product_details')
                            ->with('details_product_by_id',$details_product_by_id);
                            return view('layout')
                            ->with('pages.product_details',$manage_product_by_id);


    }

    
}
