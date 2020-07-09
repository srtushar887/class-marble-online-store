<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
class FrontendFilterController extends Controller
{
    public function get_all_product(Request $request)
    {
        $query="SELECT * FROM products  ";
            $query_exe = DB::select($query);



        $products = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $products,
            'view' =>View::make('frontend.filter.product',compact('products'))->render(),
            'pagination'=> (string) $products->links()
        ]);
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page', 1);
        $perPage = 12;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);

    }
}
