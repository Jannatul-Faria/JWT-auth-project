<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function InvoicePage():View
    {
        return view('Backend.Pages.dashboard.invoice-page');
    }

    public function SalePage():View
    {
        return view('Backend.Pages.dashboard.sale-page');
    }

    public function InvoiceCreate(Request $request)
    {
       
        DB::beginTransaction();
        
        try {
            //  dd($request->all());
            $user_id = $request->header('id');
            $total = $request->total;
            $discount = $request->discount;
            $vat = $request->vat;
            $payable = $request->payable;

            $customer_id = $request->customer_id;
             
            $invoice = Invoice::create([
                'total' => $total,
                'discount' => $discount,
                'vat' => $vat,
                'payable' => $payable,
                'user_id' => $user_id,
                'customer_id' => $customer_id,
            ]);
            
            $invoiceID = $invoice->id;
            $products = $request->input('products');

            foreach ($products as $EachProduct) {
                InvoiceProduct::create([
                    'invoice_id' => $invoiceID,
                    'user_id' => $user_id,
                    'product_id' => $EachProduct['product_id'],
                    'qty' => $EachProduct['qty'],
                    'sale_price' => $EachProduct['sale_price'],
                ]);
            }
           
            DB::commit();

            return 1;

        } catch (Exception $e) {
            DB::rollBack();
            
             return 0;
        }
    }

    public function InvoiceList(Request $request)
    {
        $user_id = $request->header('id');

        return Invoice::where('user_id', $user_id)->with('customer')->get();
    }

    public function InvoiceDetails(Request $request)
    {
        try {
        $user_id = $request->header('id');
        $customerDetails = Customer::where('user_id', $user_id)->where('id', $request->input('customer_id'))->first();

        $invoiceTotal = Invoice::where('user_id', $user_id)->where('id', $request->input('invoice_id'))->first();

        $invoiceProduct = InvoiceProduct::where('invoice_id', $request->input('invoice_id'))
            ->where('user_id', $user_id)->with('product')
                ->get();

        $rows=array (
            'customer' => $customerDetails,
            'invoice' => $invoiceTotal,
            'product' => $invoiceProduct,
        );
         return response()->json(['status' => 'success', 'rows' => $rows]);
         }
        catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function InvoiceDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->header('id');
            InvoiceProduct::where('invoice_id', $request->input('invoice_id'))
                ->where('user_id', $user_id)
                ->delete();
            Invoice::where('id', $request->input('invoice_id'))->delete();
            DB::commit();

            return 1;
        } catch (Exception $e) {
            DB::rollBack();

            return 0;
        }
    }
}
