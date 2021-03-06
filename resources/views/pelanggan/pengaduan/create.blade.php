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
                   
                    <form action="pengaduancreate" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                    <div class="card-body">
                    @php 
                        $namalengkap = $pelanggan->namalengkap;
                        $telepon = $pelanggan->telp;
                        $alamat = $pelanggan->alamat;
                        $nosambungan = $pelanggan->nosambungan;
                    @endphp
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Lengkap</strong>
                                    <input type="text" name="namalengkap" class="form-control" value="{{ $namalengkap }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No Telepon</strong>
                                    <input type="text" name="telepon" class="form-control" value="{{ $telepon }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Alamat</strong>
                                    <input type="text" name="alamat" class="form-control" value="{{ $alamat }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No Sambungan</strong>
                                    <input type="text" name="nosambungan" class="form-control" value="{{ $nosambungan }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kategori Aduan</strong>
                                    <select name="kategori" class="form-control" required>
                                        
                                        <option value="">-- Pilih Kategori Aduan --</option>
                                        @foreach ( $kategori AS $kt )
                                        
                                        <option value="{{ $kt->id }}">{{ $kt->namakategori }}</option>

                                        @endforeach
                                    </select>
                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Keterangan Keluhan</strong>
                                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan">
                                    @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                <strong>Bukti Foto</strong>
                                <input type="file" class="form-control @error('fotoaduan') is-invalid @enderror" name="fotoaduan">

                                <!-- error message untuk title -->
                                @error('fotoaduan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <br><br>
                        <button type="submit" class="btn btn-primary">Kirim</button>

                         <!--begin::Subheader-->
                         <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                             <div
                                 class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                 <!--begin::Info-->
                                 <div class="d-flex align-items-center flex-wrap mr-2">
                                     <!--begin::Page Title-->
                                     <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tulis Pengaduan</h5>
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
                @include('pelanggan.master.footer')
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        @include('pelanggan.master.itemtopbar')
</body>
<!--end::Body-->

</html>