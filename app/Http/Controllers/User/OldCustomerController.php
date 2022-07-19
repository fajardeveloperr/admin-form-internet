<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Billing;
use App\Models\Service;
use App\Models\Technical;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OldCustomerController extends Controller
{
    public function index()
    {
        if (isset($_GET['id'])) {
            $custID = $_GET['id'];
            $uuidCust = Customer::where('id_pelanggan', $custID)->first()->id;
            $CustClass = Customer::where('id_pelanggan', $custID)->first()->class;

            if ($CustClass === "Personal") {
                $oldDataCustomer = [];

                foreach (Customer::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Billing::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Technical::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Service::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }

                $datas = [
                    'titlePage' => 'Form Registrasi Layanan Baru - Kategori Personal',
                    'oldDataCustomer' => $oldDataCustomer
                ];

                return view('user.pages.oldcustomer.personal', $datas);
            } elseif ($CustClass === "Bussiness") {
                $oldDataCustomer = [];

                foreach (Customer::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Billing::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Technical::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }
                foreach (Service::find($uuidCust)->toArray() as $key => $value) {
                    $oldDataCustomer[$key] = $value;
                }

                $datas = [
                    'titlePage' => 'Form Registrasi Layanan Baru - Kategori Bisnis',
                    'oldDataCustomer' => $oldDataCustomer
                ];

                return view('user.pages.oldcustomer.bussiness', $datas);
            }
        } else {
            $datas = [
                'titlePage' => 'Customer Lama'
            ];
            return view('user.pages.oldcustomer.indexcust', $datas);
        }
    }

    public function showDataCustomer(Request $request, $class_customer, $id_customer)
    {
        $uuidCust = Customer::where('id_pelanggan', $id_customer)->first()->id;

        // Service Validation
        $validator4 = Validator::make(
            $request->all(),
            [
                'new_service_product' => 'required'
            ],
            [
                'new_service_product.required' => 'Field Pilihan Layanan Baru Wajib Diisi'
            ]
        );

        if ($validator4->fails()) {
            return redirect('old-member?id=' . $id_customer . '#service-info')
                ->withErrors($validator4)
                ->withInput();
        }

        // Checking Same Data
        $duplicateChecker = in_array($validator4->validated()['new_service_product'], json_decode(Service::find($uuidCust)->service_package));

        if ($duplicateChecker) {
            return redirect('old-member?id=' . $id_customer . '#service-info')
                ->withInput($request->input())
                ->with('errMessages', 'Nilai field layanan baru tidak boleh sama dengan yang lama');
        }

        $oldArray = json_decode(Service::find($uuidCust)->service_package);
        array_push($oldArray, $validator4->validated()['new_service_product']);

        $updatedData = Service::find($uuidCust);
        $updatedData->service_package = json_encode($oldArray);
        $updatedData->save();

        return redirect()->to('old-member')->with('message', 'Selamat, Anda Berhasil Update Data Layanan.');
    }
}
