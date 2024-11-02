<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customers;
use App\Exports\CustomerExports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $customerslist= Customers::where('deleted_at',0)
        ->orderByDesc('id')
        ->get();
        // dd($customerslist);
        return view('admin.dashboard.index',compact('customerslist'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.create');
    }
    public function store(Request $request)
    {
        $values = $request->all();
        // dd($values);
        $form = new Customers();
        
        $form->name=$values['name'];
        $form->email=$values['email'];
        $form->phonenumber=$values['number'];
        $form->premiumamount=$values['premiumamount'];
        $form->gstpercent=$values['gstpercent'];
        $form->gstamount=$values['gstamount'];
        $form->totalpremiumcollected=$values['totalpremiumamount'];
        $form->save();
        // dd($form);
        return redirect()->route('customers.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customers::findOrFail($id);
        return view('admin.dashboard.edit', compact('customers'));
    }
    public function update(Request $request, string $id)
    {
        $values = $request->all();
        // dd($values);
        $form = Customers::findOrFail($id);
        
        $form->name=$values['name'];
        $form->email=$values['email'];
        $form->phonenumber=$values['number'];
        $form->premiumamount=$values['premiumamount'];
        $form->gstpercent=$values['gstpercent'];
        $form->gstamount=$values['gstamount'];
        $form->totalpremiumcollected=$values['totalpremiumamount'];
        $form->update();
        // dd($form);
        return redirect()->route('customers.index');
    }
    public function destroy(string $id)
    {
        $customer = Customers::findOrFail($id);
        // $customer->delete();
        $customer->deleted_at=1;
        $customer->update();

        return response(['status' => 'success', 'Deleted Successfully!']);
    } 
    public function csv() {
        $allcustomer = DB::table('customers')
        ->where('deleted_at', 0)
        ->get();
        // dd($allcustomer);
        $export = new CustomerExports($allcustomer);
        return Excel::download($export, 'Export-customer' . time() . rand(99, 9999) . '.csv');
    }

}
