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
                <form action="{{ URL::to('old-member/bussiness/' . $_GET['id']) }}" method="POST" id="bussinessForm"
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
                                        <div class="mb-3">
                                            <label for="personal_name" class="form-label">Nama
                                                Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="personal_name"
                                                name="personal_name" value="{{ $oldDataCustomer['name'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="identity_number" class="form-label">Nomor Identitas
                                                (KTP/SIM/KITAS) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="identity_number"
                                                name="identity_number" value="{{ $oldDataCustomer['identity_number'] }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_address" class="form-label">Alamat Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control-plaintext" id="email_address"
                                                name="email_address" value="{{ $oldDataCustomer['email'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="personal_address" class="form-label">Alamat Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control-plaintext" id="personal_address" name="personal_address" rows="3" readonly>{{ $oldDataCustomer['address'] }}</textarea>
                                            @error('personal_address')
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
                                            <input type="text" class="form-control-plaintext" id="company_name"
                                                name="company_name" value="{{ $oldDataCustomer['company_name'] }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_address" class="form-label">Alamat Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="company_address"
                                                name="company_address" value="{{ $oldDataCustomer['company_address'] }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_npwp" class="form-label">No. NPWP Perusahaan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="company_npwp"
                                                name="company_npwp" value="{{ $oldDataCustomer['company_npwp'] }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_employees" class="form-label">Jumlah Karyawan <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control-plaintext" id="company_employees"
                                                name="company_employees"
                                                value="{{ $oldDataCustomer['company_employees'] }}" readonly>
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
    <script src="{{ URL::to('lib/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}" type="text/javascript">
    </script>
    <script>
        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0, // Initial selected step, 0 = first step
                theme: 'dots', // theme for the wizard, related css need to include for other than default theme
                justified: true, // Nav menu justification. true/false
                autoAdjustHeight: true, // Automatically adjust content height
                backButtonSupport: true, // Enable the back button support
                enableUrlHash: true, // Enable selection of the step based on url hash
                transition: {
                    animation: 'fade', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                    speed: '400', // Animation speed. Not used if animation is 'css'
                },
                toolbar: {
                    position: 'bottom', // none|top|bottom|both
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true,
                    extraHtml: '<button class="btn btn-success" id="btnSubmitBussinessForms" type="submit"><i class="fas fa-save me-1"></i> Submit Form</button>' // show/hide a Previous button
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
                keyboard: {
                    keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                    keyLeft: [37], // Left key code
                    keyRight: [39] // Right key code
                },
                lang: { // Language variables for button
                    next: 'Selanjutnya >>',
                    previous: '<< Sebelumnya'
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Array Steps error
                warningSteps: [], // Array Steps warning
                hiddenSteps: [], // Hidden steps
                getContent: null // Callback function for content loading
            });

            $("#btnSubmitBussinessForms").toggle(false);

            $('#termsCbo').click(function() {
                $("#btnSubmitBussinessForms").toggle(this.checked);
            });

            setInputFilter(document.getElementById("identity_personal_number"), function(value) {
                return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
            }, "Nomor Identitas harus berupa angka");
            setInputFilter(document.getElementById("billing_phone"), function(value) {
                return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
            }, "Nomor Handphone harus berupa angka");

            $("#btnSubmitBussinessForms").on('click', () => {
                $("#bussinessForm").trigger('submit');
            })
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
    </script>
@endsection
