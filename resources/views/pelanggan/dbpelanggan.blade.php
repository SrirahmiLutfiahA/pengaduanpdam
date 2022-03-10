<!DOCTYPE html>
<html lang="en">
@include('pelanggan.master.header')
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('pelanggan.master.sidebar')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('pelanggan.master.topbar')

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div
                            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                                <!--end::Page Title-->

                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">

                                <!--begin::Daterange-->
                                {{-- <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2"
                                    id="kt_dashboard_daterangepicker" data-toggle="tooltip"
                                    title="Select dashboard daterange" data-placement="left">
                                    <span class="text-muted font-size-base font-weight-bold mr-2"
                                        id="kt_dashboard_daterangepicker_title">Today</span>
                                    <span class="text-primary font-size-base font-weight-bolder"
                                        id="kt_dashboard_daterangepicker_date">Aug 16</span>
                                </a> --}}
                                <!--end::Daterange-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                </div>
                <!--end::Content-->
                @include('pelanggan.master.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    @include('pelanggan.master.itemtopbar')
</body>
<!--end::Body-->

</html>