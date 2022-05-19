<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Installer;

class ReportController extends Controller
{

    public function sales(Request $request){
    	return view('backend.report.sales');
    }
    public function grossMargin(Request $request){
        return view('backend.report.grossMargin');
    }
    public function salesByProduct(Request $request){
        return view('backend.report.salesByProduct');
    }
    public function soa(Request $request){
        $suppliers = json_encode(Supplier::all());
        $installers = json_encode(Installer::all());

        // dd($suppliers);
        return view('backend.report.soa', compact('suppliers', 'installers'));
    }
    public function vendor(Request $request){
        return view('backend.report.vendor');
    }
    public function soaPdf(Request $request){
        $data = json_encode($request->all());
        // dd($data);

        // generate pdf 
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('backend.report.soaPdf', compact('data'));

        return $pdf->download('SOA.pdf');
    }
    public function customer(Request $request){
        return view('backend.report.customer');
    }
    public function purchaseOrder(Request $request){
        return view('backend.report.purchaseOrder');
    }

}
