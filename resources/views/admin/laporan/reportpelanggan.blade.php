<!DOCTYPE html>
<html lang="en">
@include('admin.master.header')
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('admin.master.sidebar')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('admin.master.topbar')

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{-- <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Tarif Air Minum</h5> --}}

                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">

                            </div>
                        </div>
                        <div class="card-body">

                            <!--begin: Content-->
                            <div class="content">
                                <div class="card card-info card outline">
                                    <div class="card-header">
                                        <h3>Cetak Laporan Data Pelanggan</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <label for="label">Tanggal Awal</label>
                                            <input type="date" name="tglAwal" id="tglAwal" class="form-control"/>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="label">Tanggal Akhir</label>
                                            <input type="date" name="tglAkhir" id="tglAkhir" class="form-control"/>
                                        </div>
                                        <div class="input-group mb-3">
                                            <a href="" 
                                            onclick="this.href = '/print-pelanggan/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value" 
                                            target="_blank" class="btn btn-primary col-md-12">Cetak Laporan
                                                <i class="fas fa-print"></i>    
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Content-->
                        </div>
                    </div>
                    <!--end::Card-->

                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div
                            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Laporan Pengaduan</h5>
                                <!--end::Page Title-->

                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">


                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                </div>
                <!--end::Content-->
                @include('admin.master.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    @include('admin.master.itemtopbar')

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{asset('assets1/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets1/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
    <script src="{{asset('assets1/js/scripts.bundle.js')}}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this  page)-->
    <script src="{{asset('assets1/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>