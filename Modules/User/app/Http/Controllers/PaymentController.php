<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Services\PaymentService;
use Modules\User\Services\CartService;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected CartService $cartService
    ) {
    }

    public function getFormCustomers()
    {
        return view('user::formCustomer');
    }
    
    public function payment(CustomerRequest $request)
    {  
        $totalAmount = $this->cartService->getTotal();

        $customerData = [
                'customer_name' => $request->get('customer_name'),
            'customer_phone' => $request->get('customer_phone'),
            'customer_address' => $request->get('customer_address'),
            'customer_email' => $request->get('customer_email'),
        ];
        
        $this->paymentService->processPayment($customerData, $totalAmount);

        return view('user::paySuccess');
    }
    
    public function paySuccess()
    {
        $this->cartService->clearCart();
        Session::forget('redirect');
        
        return view('user::paySuccess');
    }
}

