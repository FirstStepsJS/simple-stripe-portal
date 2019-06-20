<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Cartalyst\Stripe\Stripe;
use Stripe\Charge;


class StripeController extends Controller
{
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function stripe()
    {
        return view('stripe');
    }


    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function payStripe(Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvc' => 'required',
            'receipt_email' => 'required',
            'product' => 'required',
            'name' => 'required',
        ]);
        $input = $request->all();
        $products = implode(', ',$input['product']);

        $stripe = Stripe::make(env('STRIPE_SECRET'));
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number'    => $request->get('card_no'),
                    'exp_month' => $request->get('expiry_month'),
                    'exp_year'  => $request->get('expiry_year'),
                    'cvc'       => $request->get('cvc'),
                ],
            ]);
            if (!isset($token['id'])) {
                return Redirect::to('strips')->with('Token did not generate correctly');
            }
            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'USD',
                //"source" => $token,
                'amount'   => $input['amount'],
                'description' => implode(' - ', [$input['name'], $input['receipt_email'], $products]),
                'receipt_email' => $input['receipt_email'],
            ]);
           /* $charge = Charge::create(array(
                'amount' => $input['amount'],

                'currency' => 'usd',
                'receipt_email' => $input['receipt_email'],
            ));
*/
            return Redirect::to('success');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }
}

