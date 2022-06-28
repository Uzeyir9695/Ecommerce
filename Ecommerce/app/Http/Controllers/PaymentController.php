<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public static function orderDetails()
    {
        $results = array_map(null, request('product_ids'), request('quantity'), request('price'), request('discount'));

        foreach ($results as $array){
            OrderDetail::create([
                'user_id' => auth()->id(),
                'product_id' => $array[0],
                'quantity' => $array[1],
                'price' => $array[2],
                'discount' => $array[3],
            ]);
        }
    }

    public static function validateOrderAddress(OrderRequest $request)
    {
        $request->validated();
    }

    public static function orderAddress(OrderRequest $request)
    {
        Order::create([
            'user_id' => auth()->id(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'city' => $request->city,
            'aptnumber' => $request->aptnumber,
            'zipcode' => $request->zipcode,
            'landmark' => $request->landmark,
        ]);
    }

    public function payment(Request $request)
    {
        $user = $request->user();
        $paymentMethod = $request->payment_method;

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($request->total_price * 100, $paymentMethod);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
        return back();
    }
}
