<?php

namespace App\Http\Controllers\Site;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $products = products::where('number', 'first')->get();
        $secondProducts = products::where('number', 'second')->get();
        return view('front.home', compact('products', 'secondProducts'));
    }

    public function productDetails($id)
    {
        $firstorsecondProductDetails = products::where(['id' => $id, 'number' => 'first'])->orwhere(['id' => $id, 'number' => 'second'])->first();

        if (isset($firstorsecondProductDetails)) {
            return view('front.edit', compact('firstorsecondProductDetails'));
        } else {
            return "There Is No Product You Can Add From Dashboard";
        }
    }

    public function First_product_buy(Request $request)
    {
        $product = products::where(['number' => 'first'])->first();
        $data = [];
        if (isset($product)) {

            if ($request->quantity == 1 || $request->quantity == 4) {
                $data = [
                    'total_price' => $product->price
                ];
            } elseif ($request->quantity == 5 || $request->quantity == 9) {
                $data = [
                    'total_price' => $product->price - 2
                ];
            } elseif ($request->quantity == 10) {
                $data = [
                    'total_price' => $product->price - 3
                ];

            }
        } else {
            return "There Is No Product You Can Add From Dashboard";
        }

        $product->update([
            'total_price' => $data['total_price'],
        ]);

        return back()->with('تم الخصم بنجاح');

    }

    public function Second_product_buy(Request $request)
    {
        $product = products::where(['number' => 'second'])->first();
        $data = [];
        if (isset($product)) {

            if ($request->quantity == 1 || $request->quantity == 4) {
                $data = [
                    'total_price' => $product->price
                ];
            } elseif ($request->quantity == 5 || $request->quantity == 9) {
                $data = [
                    'total_price' => $product->price - 5
                ];
            } elseif ($request->quantity == 10 || $request->quantity == 19) {
                $data = [
                    'total_price' => $product->price - 7
                ];

            }elseif ($request->quantity == 20) {
                $data = [
                    'total_price' => $product->price - 10
                ];

            }
        } else {
            return "There Is No Product You Can Add From Dashboard";
        }

        $product->update([
            'total_price' => $data['total_price'],
        ]);

        return back()->with('تم الخصم بنجاح');

    }


}
