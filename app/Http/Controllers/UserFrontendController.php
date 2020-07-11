<?php

namespace App\Http\Controllers;

use App\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class UserFrontendController extends Controller
{
    public function all_products()
    {
        $products = product::orderBy('id','desc')->paginate(12);
        return view('frontend.allProducts',compact('products'));
    }

    public function category_products($id)
    {
        $products = product::where('category_id',$id)->orderBy('id','desc')->paginate(12);
        return view('frontend.allProducts',compact('products'));
    }


    public function product_details($id)
    {
        $product = product::where('id',$id)->first();
        $fetaurent_pro = product::where('is_featured',1)
            ->where('id','!=',$product->id)
            ->where('category_id',$product->category_id)
            ->inRandomOrder()->limit(10)->get();
        return view('frontend.productDetails',compact('product','fetaurent_pro'));
    }

    public function add_cart_single($id)
    {
        $product = product::where('id',$id)->first();

        $data['qty'] = 1;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = 0;
        $data['weight'] = 550;
        $data['options']['image'] = $product->image;

        Cart::add($data);
        return back()->with('success','Product Add To Cart');
    }

    public function remove_cart_single($id)
    {
        Cart::remove($id);
        return back()->with('success','Product Removed From Cart');
    }


    public function add_cart_multiple(Request $request)
    {
        $product = product::where('id',$request->product_id)->first();

        $data['qty'] = $request->qty;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = 0;
        $data['weight'] = 550;
        $data['options']['image'] = $product->image;

        Cart::add($data);
        return back()->with('success','Product Add To Cart');
    }


    public function cart_update(Request $request)
    {
        $rowId = $request->row_id;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return back()->with('success','cart Updated');
    }


    public function view_cart()
    {
        return view('frontend.viewCart');
    }


    public function load_more(Request $request)
    {
        $output = '';
        $id = $request->id;


        $posts = product::where('id','<',$id)->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success" data-id="'.$post->id.'" id="loadmore">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }


    public function category_product($id)
    {
        $products = product::where('category_id',$id)->orderBy('id','desc')->paginate(12);
        $cat_id = $id;
        return view('frontend.categoryProducts',compact('products','cat_id'));
    }


    public function load_more_category(Request $request)
    {
        $output = '';
        $id = $request->id;
        $cat_id = $request->catid;


        $posts = product::where('id','<',$id)
            ->where('category_id',$cat_id)
            ->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success" data-id="'.$post->id.'" id="loadmore">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }



    public function get_product_by_category(Request $request)
    {
        $output = '';
        $cat_id = $request->cat_id;


        $posts = product::where('category_id',$cat_id)
            ->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success normalloadmore" data-id="'.$post->id.'" id="normalloadmore">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }



    public function category_searcg_load_more(Request $request)
    {
        $output = '';
        $cat_id = $request->cat_id;


        $posts = product::where('category_id',$cat_id)
            ->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success normalloadmore" data-id="'.$post->id.'" id="normalloadmore">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }



    public function get_product_by_tag(Request $request)
    {
        $output = '';
        $tag_id = $request->tag_id;


        $posts = product::where('tag_id',$tag_id)
            ->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success normalloadmore" data-id="'.$post->id.'" id="normalloadmoretag">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }


    public function get_product_by_tag_load_more(Request $request)
    {
        $output = '';
        $tag_id = $request->tag_id;


        $posts = product::where('tag_id',$tag_id)
            ->orderBy('id','desc')->limit(12)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $url1 = route('front');
                $url = route('product.details',$post->id);
                $image = $post->image;
                $name = $post->product_name;
                $des = $post->long_desc;
                $body = substr(strip_tags($post->long_desc),0,250);
                $body .= strlen(strip_tags($post->long_desc))>250?".........":"";

                $output .= '<div class="item col-sm-6 col-md-6 col-lg-4">
        <div class="thumbnail card border-0 shadow-sm">
            <a href="'.$url.'" class="img-event">
                <img class="group list-group-image img-fluid" src="'.$url1.'/'.$image.'" style="width: 100%" alt="" />
            </a>
            <div class="caption card-body">
                <a href="'.$url.'" class="group card-title inner list-group-item-heading">
                   '.$name.'</a>
                <p class="group inner list-group-item-text">
                    '.$body.'
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-6">
                        <p class="lead">

                    </div>
                    <div class="col-xs-12 col-md-6 text-right">
                        <a class="btn btn-main btn-sm" href="'.$url.'"><i class="fab fa-opencart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
            }

            $output .= '<div class="col-md-12 remove-row">
                <div class="zui-pager mb-5 mt-3">
                    <button class="btn btn-success normalloadmore" data-id="'.$post->id.'" id="normalloadmoretag">Load More</button>
                </div>
            </div>';

            echo $output;
        }
    }




}
