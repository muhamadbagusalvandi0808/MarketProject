<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
    $productCount = Product::count();
    $orderCount = Order::count();
    $revenue = Order::where('status','!=', 'cancelled')->sum('total_amount');
    // $orderCount= Order::count();

        return view('admin.dashboard', compact('productCount', 'orderCount', 'revenue'));
    }


    public function salesReport(Request $request){
        $query = Order::query();
        $period = $request->get('period', 'all');
        $date = $request->get('date', now()->format('Y-m-d'));


        switch($period){
            case 'daily':
                $query->whereDate('created_at',$date);
                $title = "Dalily Report(" .Carbon::parse($date)->format('d M Y').")";
                break;
            case 'weekly':
                $startOFweek = Carbon::parse($date)->startOfweek();
                $endOFweek = Carbon::parse($date)->endOfweek();
                $query->whereBetween('created_at', [$startOFweek,$endOFweek]);
                $title = "Weekly Report(".$startOFweek->format('d M Y')."-".$endOFweek->format('d M Y').")";
                break;
            case 'monthly':
                $query->whereMonth('created_at', Carbon::parse($date)->month)->whereYear('created_at', Carbon::parse($date)->year);
                $title = "Monthly Report(".Carbon::parse($date)->format('F Y'). ")";
                break;
            default:
            $title = "All Time Report";
            break; 
        }
            $orders = $query->orderBy('created_at', 'desc')->get();
            $totalOrders = $orders->count();
            $totalRevenue = $orders->where('status','!=', 'cancelled')->sum('total_amount');
            $successfulOrder = $orders->where('status','!=', 'cancelled')->sum('total_amount');

            return view('admin.sales.index', compact(
                'orders',
                'totalOrders',
                'totalRevenue',
                'successfulOrder',
                'period',
                'date',
                'title',
            ));
    }
}
