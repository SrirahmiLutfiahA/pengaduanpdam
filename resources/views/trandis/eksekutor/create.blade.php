<!DOCTYPE html>
<html lang="en">
@include('trandis.master.header')
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            

            @include('trandis.master.sidebar')
         
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                
                @include('trandis.master.topbar')

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                   
                    <form action="teknisicreate" method="POST">
                    
                        @csrf

                    <div class="card-body">
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Teknisi</strong>
                                    <br><br>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama teknisi">
                                </div>
                                
                                <div class="form-group">
                                    <strong>Status Bekerja</strong>
                                    <select name="status_bekerja" class="form-control" id="">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                       
                        <br><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                               
                            <div
                                class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tambah Data Teknisi </h5>
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <!--begin::Page Title-->
                                   
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

                    </form>
                    <!--end::Content-->
                </div>
                @include('trandis.master.footer')
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        @include('trandis.master.itemtopbar')
</body>
<!--end::Body-->

</html>