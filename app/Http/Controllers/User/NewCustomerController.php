<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Technical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewCustomerController extends Controller
{
    public function indexPersonal()
    {
        $datas = [
            'titlePage' => 'Form Registrasi Layanan Baru'
        ];

        return view('user.pages.newcustomer.personal', $datas);
    }

    public function storePersonal(Request $request)
    {
        $uuid = $request->get('uuid');
        $idPelanggan = 'PC' . date('YmdHis');

        // Personal Validation
        $validator1 = Validator::make(
            $request->all(),
            [
                'uuid' => 'required',
                'fullname_personal' => 'required',
                'id_number_personal' => 'required',
                'email_address_personal' => 'required|email',
                'phone_number_personal' => 'required',
                'address_personal' => 'required'
            ],
            [
                'fullname_personal.required' => 'Field Nama Lengkap Wajib Diisi',
                'id_number_personal.required' => 'Field Nomor Identitas Wajib Diisi',
                'email_address_personal.required' => 'Field Alamat Email Wajib Diisi',
                'email_address_personal.email' => 'Email Tidak Valid',
                'phone_number_personal.required' => 'Field Nomor HP/WA Wajib Diisi',
                'address_personal.required' => 'Field Alamat Lengkap Wajib Diisi'
            ]
        );

        if ($validator1->fails()) {
            return redirect('new-member/personal/' . $uuid . '#personal-info')
                ->withErrors($validator1)
                ->withInput();
        }

        // Billing Validation
        $validator2 = Validator::make(
            $request->all(),
            [
                'fullname_biller' => 'required',
                'phone_number_biller' => 'required',
                'email_address_biller' => 'required|email'
            ],
            [
                'fullname_biller.required' => 'Field Nama Lengkap Wajib Diisi',
                'phone_number_biller.required' => 'Field Nomor Handphone Wajib Diisi',
                'email_address_biller.required' => 'Field Alamat Email Wajib Diisi',
                'email_address_biller.email' => 'Email Tidak Valid'
            ]
        );

        if ($validator2->fails()) {
            return redirect('new-member/personal/' . $uuid . '#billing-info')
                ->withErrors($validator2)
                ->withInput();
        }

        // Technical Validation
        $validator3 = Validator::make(
            $request->all(),
            [
                'fullname_technical' => 'required',
                'phone_number_technical' => 'required',
                'email_address_technical' => 'required|email'
            ],
            [
                'fullname_technical.required' => 'Field Nama Lengkap Wajib Diisi',
                'phone_number_technical.required' => 'Field Nomor Handphone Wajib Diisi',
                'email_address_technical.required' => 'Field Alamat Email Wajib Diisi',
                'email_address_technical.email' => 'Email Tidak Valid'
            ]
        );

        if ($validator3->fails()) {
            return redirect('new-member/personal/' . $uuid . '#technical-info')
                ->withErrors($validator3)
                ->withInput();
        }

        // Service Validation
        $validator4 = Validator::make(
            $request->all(),
            [
                'service_product' => 'required',
                'technical_identity_photo' => 'required|mimes:jpeg,jpg,png|max:2048',
                'technical_selfie_photo' => 'required|mimes:jpeg,jpg,png|max:2048'
            ],
            [
                'service_product.required' => 'Field Pilihan Layanan Wajib Diisi',
                'technical_identity_photo.required' => 'Field Foto Identitas Wajib Diisi',
                'technical_identity_photo.mimes' => 'Field Foto Identitas harus berformat jpeg,jpg,png',
                'technical_identity_photo.max' => 'Field Foto Identitas harus berukuran min. 2 MB',
                'technical_selfie_photo.required' => 'Field Selfie dengan Foto Identitas Wajib Diisi',
                'technical_selfie_photo.mimes' => 'Field Selfie dengan Foto Identitas harus berformat jpeg,jpg,png',
                'technical_selfie_photo.max' => 'Field Selfie dengan Foto Identitas harus berukuran min. 2 MB'
            ]
        );

        if ($validator4->fails()) {
            return redirect('new-member/personal/' . $uuid . '#service-info')
                ->withErrors($validator4)
                ->withInput();
        }

        $fileIdentityPhoto = $request->file('technical_identity_photo');
        $tujuan_upload = 'bin/img/Personal/Identity';
        $fileIdentityPhoto->move($tujuan_upload, $fileIdentityPhoto->getClientOriginalName());

        $fileSelfiePhoto = $request->file('technical_selfie_photo');
        $tujuan_upload = 'bin/img/Personal/SelfieID';
        $fileSelfiePhoto->move($tujuan_upload, $fileSelfiePhoto->getClientOriginalName());

        // Checked Data
        $finder['customer'] = Customer::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['billing'] = Billing::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['technical'] = Technical::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['service'] = Service::find($validator1->validated()['uuid']) == null ? false : true;

        // Executed Process of Personal Forms
        $newCustomer = new Customer();
        $newCustomer->id = $validator1->validated()['uuid'];
        $newCustomer->id_pelanggan = $idPelanggan;
        $newCustomer->name = $validator1->validated()['fullname_personal'];
        $newCustomer->address = $validator1->validated()['address_personal'];
        $newCustomer->class = 'Personal';
        $newCustomer->email = $validator1->validated()['email_address_personal'];
        $newCustomer->phone_number = $validator1->validated()['phone_number_personal'];
        $newCustomer->identity_number = $validator1->validated()['id_number_personal'];
        $newCustomer->save();

        $newBilling = new Billing();
        $newBilling->id = $validator1->validated()['uuid'];
        $newBilling->billing_name = $validator2->validated()['fullname_biller'];
        $newBilling->billing_contact = $validator2->validated()['phone_number_biller'];
        $newBilling->billing_email = $validator2->validated()['email_address_biller'];
        $newBilling->save();

        $newBilling = new Technical();
        $newBilling->id = $validator1->validated()['uuid'];
        $newBilling->technicals_name = $validator3->validated()['fullname_technical'];
        $newBilling->technicals_contact = $validator3->validated()['phone_number_technical'];
        $newBilling->technicals_email = $validator3->validated()['email_address_technical'];
        $newBilling->save();

        $newTechnical = new Service();
        $newTechnical->id = $validator1->validated()['uuid'];
        $newTechnical->service_package = json_encode([$validator4->validated()['service_product']]);
        $newTechnical->id_photo_url = $tujuan_upload . '/' . $fileIdentityPhoto->getClientOriginalName();
        $newTechnical->selfie_id_photo_url = $tujuan_upload . '/' . $fileSelfiePhoto->getClientOriginalName();
        $newTechnical->save();

        return redirect()->to('new-member')->with('message', 'Selamat, Anda Berhasil Registrasi.');
    }

    public function indexBussiness()
    {
        $datas = [
            'titlePage' => 'Form Registrasi Layanan Baru'
        ];

        return view('user.pages.newcustomer.bussiness', $datas);
    }

    public function storeBussiness(Request $request)
    {
        $uuid = $request->get('uuid');
        $idPelanggan = 'BC' . date('YmdHis');

        // Personal Validation
        $validator1 = Validator::make(
            $request->all(),
            [
                'uuid' => 'required',
                'pic_name' => 'required',
                'pic_identity_number' => 'required',
                'pic_email_address' => 'required|email',
                'pic_phone_number' => 'required',
                'pic_address' => 'required',
                'company_name' => 'required',
                'company_address' => 'required',
                'company_npwp' => 'required',
                'company_phone_number' => 'required',
                'company_employees' => 'required'
            ],
            [
                'pic_name.required' => 'Field Nama Lengkap Wajib Diisi',
                'pic_identity_number.required' => 'Field Nomor Identitas Wajib Diisi',
                'pic_email_address.required' => 'Field Email Wajib Diisi',
                'pic_email_address.email' => 'Email Tidak Valid',
                'pic_phone_number.required' => 'Field Nomor HP/WA Wajib Diisi',
                'pic_address.required' => 'Field Alamat Wajib Diisi',
                'company_name.required' => 'Field Nama Perusahaan Wajib Diisi',
                'company_address.required' => 'Field Alamat Perusahaan Wajib Diisi',
                'company_npwp.required' => 'Field Nomor NPWP Perusahaan Wajib Diisi',
                'company_phone_number.required' => 'Field Nomor Telepon Perusahaan Wajib Diisi',
                'company_employees.required' => 'Field Jumlah Karyawan Wajib Diisi'
            ]
        );

        if ($validator1->fails()) {
            return redirect('new-member/bussiness/' . $uuid . '#personal-info')
                ->withErrors($validator1)
                ->withInput();
        }

        // Billing Validation
        $validator2 = Validator::make(
            $request->all(),
            [
                'billing_name' => 'required',
                'billing_phone' => 'required',
                'billing_email' => 'required|email'
            ],
            [
                'billing_name.required' => 'Field Nama Lengkap Wajib Diisi',
                'billing_phone.required' => 'Field Nomor Handphone Wajib Diisi',
                'billing_email.required' => 'Field Alamat Email Wajib Diisi',
                'billing_email.email' => 'Email Tidak Valid'
            ]
        );

        if ($validator2->fails()) {
            return redirect('new-member/bussiness/' . $uuid . '#billing-info')
                ->withErrors($validator2)
                ->withInput();
        }

        // Technical Validation
        $validator3 = Validator::make(
            $request->all(),
            [
                'fullname_technical' => 'required',
                'phone_number_technical' => 'required',
                'email_address_technical' => 'required|email'
            ],
            [
                'fullname_technical.required' => 'Field Nama Lengkap Wajib Diisi',
                'phone_number_technical.required' => 'Field Nomor Handphone Wajib Diisi',
                'email_address_technical.required' => 'Field Alamat Email Wajib Diisi',
                'email_address_technical.email' => 'Email Tidak Valid'
            ]
        );

        if ($validator3->fails()) {
            return redirect('new-member/bussiness/' . $uuid . '#technical-info')
                ->withErrors($validator3)
                ->withInput();
        }

        // Service Validation
        $validator4 = Validator::make(
            $request->all(),
            [
                'service_product' => 'required',
                'technical_identity_photo' => 'required|mimes:jpeg,jpg,png|max:2048',
                'technical_selfie_photo' => 'required|mimes:jpeg,jpg,png|max:2048'
            ],
            [
                'service_product.required' => 'Field Pilihan Layanan Wajib Diisi',
                'technical_identity_photo.required' => 'Field Foto Identitas Wajib Diisi',
                'technical_identity_photo.mimes' => 'Field Foto Identitas harus berformat jpeg,jpg,png',
                'technical_identity_photo.max' => 'Field Foto Identitas harus berukuran min. 2 MB',
                'technical_selfie_photo.required' => 'Field Selfie dengan Foto Identitas Wajib Diisi',
                'technical_selfie_photo.mimes' => 'Field Selfie dengan Foto Identitas harus berformat jpeg,jpg,png',
                'technical_selfie_photo.max' => 'Field Selfie dengan Foto Identitas harus berukuran min. 2 MB'
            ]
        );

        if ($validator4->fails()) {
            return redirect('new-member/bussiness/' . $uuid . '#service-info')
                ->withErrors($validator4)
                ->withInput();
        }

        $fileIdentityPhoto = $request->file('technical_identity_photo');
        $tujuan_upload = 'bin/img/Bussiness/Identity';
        $fileIdentityPhoto->move($tujuan_upload, $fileIdentityPhoto->getClientOriginalName());

        $fileSelfiePhoto = $request->file('technical_selfie_photo');
        $tujuan_upload = 'bin/img/Bussiness/SelfieID';
        $fileSelfiePhoto->move($tujuan_upload, $fileSelfiePhoto->getClientOriginalName());

        // Checked Data
        $finder['customer'] = Customer::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['billing'] = Billing::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['technical'] = Technical::find($validator1->validated()['uuid']) == null ? false : true;
        $finder['service'] = Technical::find($validator1->validated()['uuid']) == null ? false : true;

        // Executed Process of Personal Forms
        // Customer Part
        $newCustomer = new Customer();
        $newCustomer->id = $validator1->validated()['uuid'];
        $newCustomer->id_pelanggan = $idPelanggan;
        $newCustomer->class = 'Bussiness';
        $newCustomer->name = $validator1->validated()['pic_name'];
        $newCustomer->identity_number = $validator1->validated()['pic_identity_number'];
        $newCustomer->email = $validator1->validated()['pic_email_address'];
        $newCustomer->phone_number = $validator1->validated()['pic_phone_number'];
        $newCustomer->address = $validator1->validated()['pic_address'];
        $newCustomer->company_name = $validator1->validated()['company_name'];
        $newCustomer->company_address = $validator1->validated()['company_address'];
        $newCustomer->company_npwp = $validator1->validated()['company_npwp'];
        $newCustomer->company_phone_number = $validator1->validated()['company_phone_number'];
        $newCustomer->company_employees = $validator1->validated()['company_employees'];
        $newCustomer->save();

        $newBilling = new Billing();
        $newBilling->id = $validator1->validated()['uuid'];
        $newBilling->billing_name = $validator2->validated()['billing_name'];
        $newBilling->billing_contact = $validator2->validated()['billing_phone'];
        $newBilling->billing_email = $validator2->validated()['billing_email'];
        $newBilling->save();

        $newBilling = new Technical();
        $newBilling->id = $validator1->validated()['uuid'];
        $newBilling->technicals_name = $validator3->validated()['fullname_technical'];
        $newBilling->technicals_contact = $validator3->validated()['phone_number_technical'];
        $newBilling->technicals_email = $validator3->validated()['email_address_technical'];
        $newBilling->save();

        $newTechnical = new Service();
        $newTechnical->id = $validator1->validated()['uuid'];
        $newTechnical->service_package = json_encode([$validator4->validated()['service_product']]);
        $newTechnical->id_photo_url = $tujuan_upload . '/' . $fileIdentityPhoto->getClientOriginalName();
        $newTechnical->selfie_id_photo_url = $tujuan_upload . '/' . $fileSelfiePhoto->getClientOriginalName();
        $newTechnical->save();

        return redirect()->to('new-member')->with('message', 'Selamat, Anda Berhasil Registrasi.');
    }
}
