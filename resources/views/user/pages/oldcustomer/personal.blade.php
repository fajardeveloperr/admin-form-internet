@extends('user.layouts.main')

@section('CSS')
    <!-- Smart Wizard -->
    <link href="{{ URL::to('lib/jquery-smartwizard/dist/css/smart_wizard_dots.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content-wrapper')
    <div class="container p-5">
        <div class="card mx-5">
            <div class="card-body">
                <h2 class="text-center fw-bold mt-2 mb-4">Form Registrasi Layanan Baru</h2>
                <!-- SmartWizard html -->
                <form action="{{ URL::to('old-member/personal/' . $_GET['id']) }}" method="POST" id="personalForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="smartwizard">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#personal-info">
                                    <div class="num"><i class="fa-solid fa-user"></i></div>
                                    Data Personal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#billing-info">
                                    <span class="num"><i class="fa-solid fa-money-bill-wave"></i></span>
                                    Data Billing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#technical-info">
                                    <span class="num"><i class="fa-solid fa-list-check"></i></span>
                                    Data Teknis
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#service-info">
                                    <span class="num"><i class="fas fa-people-carry"></i></span>
                                    Data Layanan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#terms-info">
                                    <span class="num"><i class="fas fa-scroll"></i></span>
                                    Syarat & Ketentuan
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="personal-info" class="tab-pane" role="tabpanel" aria-labelledby="personal-info">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="uuid" value="{{ Request::segment(3) }}">
                                        <div class="mb-3">
                                            <label for="fullname_personal" class="form-label">Nama
                                                Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="fullname_personal"
                                                name="fullname_personal" value="{{ $oldDataCustomer['name'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_number_personal" class="form-label">Nomor Identitas
                                                (KTP/SIM/KITAS) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="id_number_personal"
                                                name="id_number_personal"
                                                value="{{ $oldDataCustomer['identity_number'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_address_personal" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control-plaintext" id="email_address_personal"
                                                name="email_address_personal" value="{{ $oldDataCustomer['email'] }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="phone_number_personal" class="form-label">Nomor HP/WA yang aktif
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="phone_number_personal"
                                                name="phone_number_personal"
                                                value="{{ $oldDataCustomer['phone_number'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address_personal" class="form-label">Alamat Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control-plaintext" id="address_personal" name="address_personal" rows="5"
                                                placeholder="Masukkan Alamat Lengkap Anda..." readonly>{{ $oldDataCustomer['address'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="billing-info" class="tab-pane" role="tabpanel" aria-labelledby="billing-info">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="fullname_biller" class="form-label">Nama
                                                Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="fullname_biller"
                                                name="fullname_biller" value="{{ $oldDataCustomer['billing_name'] }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number_biller" class="form-label">Nomor Handphone
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="phone_number_biller"
                                                name="phone_number_biller"
                                                value="{{ $oldDataCustomer['billing_contact'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="email_address_biller" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control-plaintext"
                                                id="email_address_biller" name="email_address_biller"
                                                value="{{ $oldDataCustomer['billing_email'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="technical-info" class="tab-pane" role="tabpanel" aria-labelledby="technical-info">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="fullname_technical" class="form-label">Nama Lengkap<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="fullname_technical"
                                                name="fullname_technical"
                                                value="{{ $oldDataCustomer['technicals_name'] }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number_technical" class="form-label">Nomor Handphone
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext"
                                                id="phone_number_technical" name="phone_number_technical"
                                                value="{{ $oldDataCustomer['technicals_contact'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="email_address_technical" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control-plaintext"
                                                id="email_address_technical" name="email_address_technical"
                                                value="{{ $oldDataCustomer['technicals_email'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="service-info" class="tab-pane" role="tabpanel" aria-labelledby="technical-info">
                                <div class="mb-3">
                                    <label for="service_product" class="form-label">Daftar Layanan Terdaftar<span
                                            class="text-danger">*</span></label>
                                    <ol id="service_product">
                                        @foreach (json_decode($oldDataCustomer['service_package']) as $service)
                                            <li style="margin-left: -15px;">{{ $service }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="mb-3">
                                    <label for="new_service_product" class="form-label">Pilihan Layanan Baru
                                        <span class="text-danger">*</span>
                                    </label>
                                    @php
                                        $servicesData = ['Dedicated Fiber Optic', 'Dedicated Wireless', 'Broadband Fiber Optic', 'Broadband Wireless'];
                                    @endphp
                                    <select
                                        class="form-select @error('new_service_product') is-invalid @else @if (session()->has('errMessages')) is-invalid @endif @enderror"
                                        name="new_service_product" id="new_service_product">
                                        <option disabled selected>Pilih Jenis Layanan...</option>
                                        @foreach ($servicesData as $service)
                                            @if (old('new_service_product') == $service)
                                                <option value="{{ $service }}" selected>{{ $service }}
                                                </option>
                                            @else
                                                <option value="{{ $service }}">{{ $service }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('new_service_product')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @else
                                        @if (session()->has('errMessages'))
                                            <div class="d-block invalid-feedback">
                                                {{ session('errMessages') }}
                                            </div>
                                        @endif
                                    @enderror
                                </div>
                            </div>
                            <div id="terms-info" class="tab-pane" role="tabpanel" aria-labelledby="terms-info">
                                <iframe
                                    src="https://docs.google.com/document/d/e/2PACX-1vTj32yhGrASZFiwRmOEs4ZudnKnSn3vUxST3rgx96ox7LVCS-7wR-DXmoAC9TuQBZU00TcBTgP5WFz6/pub?embedded=true"
                                    style="width: 100%; height: 500px;"></iframe>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCbo" name="termsCbo">
                                    <label class="form-check-label" for="termsCbo">Saya menyetujui syarat dan
                                        ketentuan yang berlaku</label>
                                </div>
                            </div>
                        </div>

                        <!-- Include optional progressbar HTML -->
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('JS')
    <!-- Bootstrap 5.1 -->
    <script src="{{ URL::to('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Smart Wizard -->
    <script src="{{ URL::to('lib/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>
    <!-- Custom Script JS -->
    <script src="{{ URL::to('bin/js/newCustomer/personal/smartwizard.js') }}"></script>
    <script src="{{ URL::to('bin/js/newCustomer/personal/inputFilter.js') }}"></script>
    <script src="{{ URL::to('bin/js/newCustomer/personal/cboConfig.js') }}"></script>
@endsection
