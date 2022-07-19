<script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Charts JS -->
<script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/index-charts.js') }}"></script>
    <!-- Page Specific JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>
<script>"https://cdn.jsdelivr.net/npm/sweetalert2@9"</script>
<script src="{{ asset('vendor/sweetalert/sweetalert2.all.js')}}"></script>


 
{{-- <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Smart Wizard -->
<script src="{{ asset('lib/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>
<!-- Custom Script JS -->
<script src="{{ asset('bin/js/newCustomer/personal/smartwizard.js') }}"></script>
<script src="{{ asset('bin/js/newCustomer/personal/inputFilter.js') }}"></script>
<script src="{{ asset('bin/js/newCustomer/personal/cboConfig.js') }}"></script> --}}

<script>
    window.addEventListener('swal',function(e){
        Swal.fire(e.detail);
    });
</script>
@livewireScripts
