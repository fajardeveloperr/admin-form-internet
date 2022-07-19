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
                <form action="{{ URL::to('new-member/bussiness') }}" method="POST" id="bussinessForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="smartwizard">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#person-in-charge">
                                    <div class="num"><i class="fa-solid fa-user"></i></div>
                                    Data Penanggung Jawab
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
                            <div id="person-in-charge" class="tab-pane" role="tabpanel" aria-labelledby="person-in-charge">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="uuid" value="{{ Request::segment(3) }}">
                                        <div class="mb-3">
                                            <label for="pic_name" class="form-label">Nama
                                                Lengkap <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('pic_name') is-invalid @enderror" id="pic_name"
                                                name="pic_name" placeholder="Masukkan Nama Lengkap Anda..."
                                                value="{{ old('pic_name') }}">
                                            @error('pic_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pic_identity_number" class="form-label">Nomor Identitas
                                                (KTP/SIM/KITAS) <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('pic_identity_number') is-invalid @enderror"
                                                id="pic_identity_number" name="pic_identity_number"
                                                placeholder="Masukkan Nomor Identitas Anda..."
                                                value="{{ old('pic_identity_number') }}">
                                            @error('pic_identity_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pic_email_address" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control @error('pic_email_address') is-invalid @enderror"
                                                id="pic_email_address" name="pic_email_address"
                                                placeholder="Masukkan Alamat E-Mail Anda..."
                                                value="{{ old('pic_email_address') }}">
                                            @error('pic_email_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pic_phone_number" class="form-label">Nomor HP/WA yang aktif
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('pic_phone_number') is-invalid @enderror"
                                                id="pic_phone_number" name="pic_phone_number"
                                                placeholder="Masukkan Nomor Handphone/Whatsapp Anda..."
                                                value="{{ old('pic_phone_number') }}">
                                            @error('pic_phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pic_address" class="form-label">Alamat Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control @error('pic_address') is-invalid @enderror" id="pic_address" name="pic_address"
                                                rows="4" placeholder="Masukkan Alamat Lengkap Anda...">{{ old('pic_address') }}</textarea>
                                            @error('pic_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Nama Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="company_name" name="company_name"
                                                placeholder="Masukkan Nama Perusahaan Anda..."
                                                value="{{ old('company_name') }}">
                                            @error('company_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_address" class="form-label">Alamat Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address"
                                                name="company_address" placeholder="Masukkan Alamat Perusahaan Anda..." rows="4">{{ old('company_address') }}</textarea>
                                            @error('company_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_npwp" class="form-label">No. NPWP Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_npwp') is-invalid @enderror"
                                                id="company_npwp" name="company_npwp"
                                                placeholder="Masukkan Nomor NPWP Perusahaan Anda..."
                                                value="{{ old('company_npwp') }}">
                                            @error('company_npwp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_phone_number" class="form-label">No. Telepon Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_phone_number') is-invalid @enderror"
                                                id="company_phone_number" name="company_phone_number"
                                                placeholder="Masukkan Nomor Telepon Perusahaan Anda..."
                                                value="{{ old('company_phone_number') }}">
                                            @error('company_phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_employees" class="form-label">Jumlah Karyawan <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_employees') is-invalid @enderror"
                                                id="company_employees" name="company_employees"
                                                placeholder="Masukkan Jumlah Karyawan di Perusahaan Anda..."
                                                value="{{ old('company_employees') }}">
                                            @error('company_employees')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="billing-info" class="tab-pane" role="tabpanel" aria-labelledby="billing-info">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="true"
                                                id="isdataBillersamewithdataPic" name="isdataBillersamewithdataPic">
                                            <label class="form-check-label" for="isdataBillersamewithdataPic"
                                                {{ old('isdataBillersamewithdataPic') == 'true' ? ' checked' : '' }}>
                                                Data biller sama dengan data penanggung jawab
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="billing_name" class="form-label">Nama
                                                Biller <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('billing_name') is-invalid @enderror"
                                                id="billing_name" name="billing_name"
                                                placeholder="Masukkan Nama Lengkap Anda..."
                                                value="{{ old('billing_name') }}">
                                            @error('billing-info')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="billing_phone" class="form-label">Nomor Handphone
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('billing_phone') is-invalid @enderror"
                                                id="billing_phone" name="billing_phone"
                                                placeholder="Masukkan Nomor Handphone Anda..."
                                                value="{{ old('billing_phone') }}">
                                            @error('billing_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="billing_email" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control @error('billing_email') is-invalid @enderror"
                                                id="billing_email" name="billing_email"
                                                placeholder="Masukkan Alamat E-Mail Anda..."
                                                value="{{ old('billing_email') }}">
                                            @error('billing_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="technical-info" class="tab-pane" role="tabpanel" aria-labelledby="technical-info">
                                <div class="container row">
                                    <div class="col-sm-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="true"
                                                id="isdataTechnicalsamewithdataPic" name="isdataTechnicalsamewithdataPic"
                                                {{ old('isdataTechnicalsamewithdataPic') == 'true' ? ' checked' : '' }}>
                                            <label class="form-check-label" for="isdataTechnicalsamewithdataPic">
                                                Data teknikal sama dengan data penanggung jawab
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fullname_technical" class="form-label">Nama Lengkap<span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('fullname_technical') is-invalid @enderror"
                                                id="fullname_technical" name="fullname_technical"
                                                placeholder="Masukkan Nama Lengkap Anda..."
                                                value="{{ old('fullname_technical') }}">
                                            @error('fullname_technical')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number_technical" class="form-label">Nomor Handphone
                                                <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('phone_number_technical') is-invalid @enderror"
                                                id="phone_number_technical" name="phone_number_technical"
                                                placeholder="Masukkan Nomor Handphone Anda..."
                                                value="{{ old('phone_number_technical') }}">
                                            @error('phone_number_technical')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="email_address_technical" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email"
                                                class="form-control @error('email_address_technical') is-invalid @enderror"
                                                id="email_address_technical" name="email_address_technical"
                                                placeholder="Masukkan Alamat E-Mail Anda..."
                                                value="{{ old('email_address_technical') }}">
                                            @error('email_address_technical')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="service-info" class="tab-pane" role="tabpanel" aria-labelledby="technical-info">
                                <div class="mb-3">
                                    <label for="service_product" class="form-label">Pilihan Layanan
                                        <span class="text-danger">*</span>
                                    </label>
                                    @php
                                        $servicesData = ['Dedicated Fiber Optic', 'Dedicated Wireless', 'Broadband Fiber Optic', 'Broadband Wireless'];
                                    @endphp
                                    <select class="form-select @error('service_product') is-invalid @enderror"
                                        name="service_product" id="service_product">
                                        <option disabled selected>Pilih Jenis Layanan...</option>
                                        @foreach ($servicesData as $service)
                                            @if (old('service_product') == $service)
                                                <option value="{{ $service }}" selected>{{ $service }}</option>
                                            @else
                                                <option value="{{ $service }}">{{ $service }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('service_product')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="technical_identity_photo" class="form-label">Upload Foto Identitas</label>
                                    <input class="form-control @error('technical_identity_photo') is-invalid @enderror"
                                        type="file" id="technical_identity_photo" name="technical_identity_photo">
                                    @error('technical_identity_photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="technical_selfie_photo" class="form-label">Upload Foto Selfie dengan
                                        Identitas</label>
                                    <input class="form-control @error('technical_selfie_photo') is-invalid @enderror"
                                        type="file" id="technical_selfie_photo" name="technical_selfie_photo">
                                    @error('technical_selfie_photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
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
    <script src="{{ URL::to('bin/js/newCustomer/bussiness/smartwizard.js') }}"></script>
    <script src="{{ URL::to('bin/js/newCustomer/bussiness/inputFilter.js') }}"></script>
    <script src="{{ URL::to('bin/js/newCustomer/bussiness/cboConfig.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            setInputFilter(document.getElementById("identity_personal_number"), function(value) {
                return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
            }, "Nomor Identitas harus berupa angka");
            setInputFilter(document.getElementById("billing_phone"), function(value) {
                return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
            }, "Nomor Handphone harus berupa angka");
        });

        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"]
            .forEach(function(event) {
                textbox.addEventListener(event, function(e) {
                    if (inputFilter(this.value)) {
                        // Accepted value
                        if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                            this.classList.remove("input-error");
                            this.setCustomValidity("");
                        }
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        // Rejected value - restore the previous one
                        this.classList.add("input-error");
                        this.setCustomValidity(errMsg);
                        this.reportValidity();
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        // Rejected value - nothing to restore
                        this.value = "";
                    }
                });
            });
        }
    </script> --}}
@endsection
