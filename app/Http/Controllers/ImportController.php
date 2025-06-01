<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importCustomers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customers_file' => 'required|file|mimes:xlsx,xls,csv',
            'transactions_file' => 'required|file|mimes:xlsx,xls,csv',
        ], [
            'customers_file.required' => 'لطفا فایل اطلاعات مشتریان را انتخاب کنید.',
            'customers_file.file' => 'فایل اطلاعات مشتریان نامعتبر است.',
            'customers_file.mimes' => 'فرمت فایل اطلاعات مشتریان باید Excel یا CSV باشد.',
            'transactions_file.required' => 'لطفا فایل تراکنش‌های مشتریان را انتخاب کنید.',
            'transactions_file.file' => 'فایل تراکنش‌های مشتریان نامعتبر است.',
            'transactions_file.mimes' => 'فرمت فایل تراکنش‌های مشتریان باید Excel یا CSV باشد.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Import customers
            $customersData = Excel::toArray([], $request->file('customers_file'))[0];
            $headers = array_shift($customersData); // Remove headers row

            foreach ($customersData as $row) {
                $customer = new Customer();
                $customer->first_name = $row[0] ?? null;
                $customer->last_name = $row[1] ?? null;
                $customer->birth_date = $row[2] ? date('Y-m-d', strtotime($row[2])) : null;
                $customer->register_date = $row[3] ? date('Y-m-d', strtotime($row[3])) : now();
                $customer->phone = $row[4] ?? null;
                $customer->province = $row[5] ?? null;
                $customer->city = $row[6] ?? null;
                $customer->gender = $row[7] ?? null;
                $customer->save();
            }

            // Import transactions
            $transactionsData = Excel::toArray([], $request->file('transactions_file'))[0];
            $headers = array_shift($transactionsData); // Remove headers row

            foreach ($transactionsData as $row) {
                // Find customer by phone number
                $customer = Customer::where('phone', $row[0])->first();
                if (!$customer) continue;

                // Find product by name
                $product = Product::where('name', $row[1])->first();
                if (!$product) continue;

                $transaction = new Transaction();
                $transaction->invoice_id = $row[2] ?? null;
                $transaction->quantity = $row[3] ?? 1;
                $transaction->product_price = $row[4] ?? $product->price;
                $transaction->sale_type = $row[5] ?? 'normal';
                $transaction->transaction_date = $row[6] ? date('Y-m-d', strtotime($row[6])) : now();
                $transaction->customer_id = $customer->id;
                $transaction->product_id = $product->id;
                $transaction->save();
            }

            DB::commit();
            return back()->with('success', 'اطلاعات با موفقیت وارد شد.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطا در وارد کردن اطلاعات: ' . $e->getMessage());
        }
    }
} 