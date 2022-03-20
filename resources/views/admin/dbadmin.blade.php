<!DOCTYPE html>
<html lang="en">
@include('admin.master.header')
<!--begin::Body-->
<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    @include('admin.master.logo')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            @include('admin.master.sidebar')
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('admin.master.topbar')
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
                                <!--begin::Actions-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <!--begin::Dropdowns-->
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                                    data-placement="left">
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                                    </div>
                                </div>
                                <!--end::Dropdowns-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Dashboard-->
                            <div class="col-lg-14 col-xxl-4">
                                <!--begin::List Widget 9-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body pt-4">
                                        ini adalah isi dashboard
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end: List Widget 9-->
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                            </div>
                            <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
                                <!--begin::List Widget 1-->
                                <div class="card card-custom card-stretch gutter-b">
                                </div>
                                <!--end::List Widget 1-->
                            </div>
                            <div class="col-xxl-8 order-2 order-xxl-1">
                                <!--begin::Advance Table Widget 2-->
                                <div class="card card-custom card-stretch gutter-b">

                                </div>
                                <!--end::Advance Table Widget 2-->
                            </div>
                            <div class="col-lg-14 col-xxl-4 order-1 order-xxl-2">
                            </div>
                            <!--end::Dashboard-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('admin.master.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    @include('admin.master.itemtopbar')
</body>
<!--end::Body-->

</html>