<!DOCTYPE html>
<html lang="en">
@include('admin.master.header')
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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

                    <form action="pelanggancreate" method="POST">

                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Profile ID</strong>
                                        <input type="number" name="profile_id" class="form-control" placeholder="Profil ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Lengkap</strong>
                                        <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nomor Telp</strong>
                                        <input type="number" name="telp" class="form-control" placeholder="Nomor Telp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Alamat</strong>
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nomor Sambungan</strong>
                                        <input type="number" name="nosambungan" class="form-control" placeholder="Nomor Sambungan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <strong>Bukti Pembayaran</strong>
                                <input type="file" class="form-control @error('buktipembayaran') is-invalid @enderror" name="buktipembayaran">

                                <!-- error message untuk title -->
                                @error('buktipembayaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                            <!--begin::Subheader-->
                            <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">

                                <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tambah Data
                                        Pelanggan</h5>
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center flex-wrap mr-2">
                                        <!--begin::Page Title-->

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

                    </form>
                    <!--end::Content-->
                </div>
                @include('admin.master.footer')
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        @include('admin.master.itemtopbar')
</body>
<!--end::Body-->

</html>