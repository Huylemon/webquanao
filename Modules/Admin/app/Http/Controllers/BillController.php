<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use Modules\Admin\Services\OrderService;

class BillController extends Controller
{
    public function __construct(
        protected OrderService $orderService
    ) {
    }

    public function index()
    {
        $bills = $this->orderService->getOrdersPaginated(10);
        return view('admin::admin.bill.index', compact('bills'));
    }
    
    public function show($id)
    {
        $order = $this->orderService->getOrderWithDetails($id);
        $bill_detail = $this->orderService->formatOrderDetails($order);
        $bill_customer = $this->orderService->formatCustomerData($order);
        
        return view('admin::admin.bill.detail', compact('bill_detail', 'bill_customer', 'order'));
    }
    
    public function edit($id)
    {
        $bill = $this->orderService->getOrderWithDetails($id);
        $bill_detail = $this->orderService->formatOrderDetails($bill);
        $bill_customer = $this->orderService->formatCustomerData($bill);
        $bill_customer['bill_status'] = $bill->status;
        
        return view('admin::admin.bill.edit', compact('bill', 'bill_detail', 'bill_customer'));
    }
    
    public function update($id, BillRequest $request)
    {
        $data = [
            'customer_name' => $request->get('customer_name'),
            'customer_phone' => $request->get('customer_phone'),
            'customer_address' => $request->get('customer_address'),
            'customer_email' => $request->get('customer_email'),
            'bill_status' => $request->get('bill_status'),
        ];

        $this->orderService->updateOrder($id, $data);

        return redirect()->route('bill.index');
    }
}

