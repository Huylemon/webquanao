<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\Services\PaymentService;
use Modules\User\Services\CartService;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VnPayController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected CartService $cartService
    ) {
    }

    public function getFormCustomersVnPay()
    {
        return view('user::formCustomerVnPay');
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
            
        // Save total amount before processing payment (which clears cart)
        Session::put('vnpay_total', $totalAmount);
        
        $this->paymentService->processPayment($customerData, $totalAmount);
        Session::put('redirect', true);
        
        return redirect()->route('vnpay');
    }
    
    public function vnpay()
    {
        // Get total from session (saved before cart was cleared)
        $total = Session::get('vnpay_total', 0);
        
        // Validate amount
        if ($total < 5000 || $total > 1000000000) {
            Session::forget('vnpay_total');
            Session::forget('redirect');
            return redirect()->back()->with('error', 'Số tiền thanh toán không hợp lệ. Phạm vi từ 5.000 đến 1.000.000.000 VND.');
        }
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url('paySuccess');
        $vnp_TmnCode = "M14HRHT1";//Mã website tại VNPAY 
        $vnp_HashSecret = "ODAQ3K5EYJFEOLGNWLU6T8XGL9WXYFWL"; //Chuỗi bí mật
        
        $vnp_TxnRef = rand(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'web quan ao';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        // Check if this is an AJAX request
        if (request()->ajax() || request()->wantsJson()) {
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            Session::forget('redirect');
            Session::forget('vnpay_total');
            return response()->json($returnData);
        }
        
        // Normal redirect
        Session::forget('redirect');
        Session::forget('vnpay_total');
        return redirect($vnp_Url);
    }
}

