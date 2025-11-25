<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;

class AdminController extends Controller
{
    public function index() {
        //month
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $revenueMonth = Order::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');

        $startSubMonth = Carbon::now()->subMonth()->startOfMonth();
        $endSuvMonth = Carbon::now()->subMonth()->endOfMonth();
    
        $revenueSubMonth = Order::whereBetween('created_at', [$startSubMonth, $endSuvMonth])
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');
            
        if($revenueSubMonth == 0){
            $revenueMonthPercent = 1;
        }
        else{
            $revenueMonthPercent = $revenueMonth/$revenueSubMonth;
        }

        //week
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        $startSubWeek = Carbon::now()->subWeek()->startOfWeek();
        $endSubWeek = Carbon::now()->subWeek()->endOfWeek();
        
        $revenueWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');

        $revenueSubWeek = Order::whereBetween('created_at', [$startSubWeek, $endSubWeek])
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');
            
        if($revenueSubWeek == 0){
            $revenueWeekPercent = 1;
        }
        else{
            $revenueWeekPercent = $revenueWeek/$revenueSubWeek;
        }

        //day
        $today = Carbon::today();

        $revenueDay = Order::whereDate('created_at', $today)
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');

        $yesterday = Carbon::yesterday();
        $revenueSubDay = Order::whereDate('created_at', $yesterday)
            ->where('status', '<>', 'Hủy đơn')
            ->sum('total_amount');
            
        if($revenueSubDay == 0){
            $revenueDayPercent = 1;
        }
        else{
            $revenueDayPercent = $revenueDay/$revenueSubDay;
        }
        
        return view('admin::admin.dashboard', compact(
            'revenueWeek', 
            'revenueWeekPercent', 
            'revenueMonth',
            'revenueMonthPercent',
            'revenueDay',
            'revenueDayPercent'
        ));
    }
}
