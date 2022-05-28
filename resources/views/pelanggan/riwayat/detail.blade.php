<!DOCTYPE html>
<html lang="en">


@if (session('level') == "admin")

    @include('admin.master.header')


@elseif (session('level') == "petugas")

    @include('trandis.master.header')

@else

    @include('pelanggan.master.header')

@endif
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            

            @if (session('level') == "admin")

                @include('admin.master.sidebar')


            @elseif (session('level') == "petugas")

                @include('trandis.master.sidebar')

            @else

                @include('pelanggan.master.sidebar')

            @endif

            
         
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                
                @if (session('level') == "admin")

                    @include('admin.master.topbar')


                @elseif (session('level') == "petugas")

                    @include('trandis.master.topbar')

                @else

                    @include('pelanggan.master.topbar')

                @endif
                

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-11">


                            <div class="card-header ribbon ribbon-right">
                                @php 
                                    $color = "warning";
                                    $text = "Menunggu";

                                    if ( $pengaduan->status == 0 ) {

                                        $color = "warning";
                                        $text = "Menunggu";

                                    } else if ( $pengaduan->status == 1 ) {

                                        $color = "danger";
                                        $text = "Pengaduan Ditolak";
                                    
                                    } else if ( $pengaduan->status == 2 ) {

                                        $color = "warning";
                                        $text = "Diajukan ke Petugas";
   
                                    } else if ( $pengaduan->status == 3 ) {

                                        $color = "info";
                                        $text = "Diperbaiki";
                                    } else if ( $pengaduan->status == 4 ) {

                                        $color = "info";
                                        $text = "Selesai Perbaikan";
                                    } else {

                                        $color = "success";
                                        $text = "Pengaduan Selesai";
                                    }


                                @endphp

                                <div class="ribbon-target bg-{{ $color }}" style="top: 10px; right: -2px;">{{ $text }}</div>
                            </div>

                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <small>Nama Lengkap</small>
                                        <h4>{{ $pelanggan->namalengkap }}</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <small>Telepon</small>
                                        <h4>{{ $pelanggan->telp }}</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <small>Alamat</small>
                                        <h4>{{ $pelanggan->alamat }}</h4><br>
                                    </div>
                                    <div class="col-md-3">
                                        <small>Pendaftaran</small>
                                        <h4>{{ date('d F Y', strtotime($pelanggan->created_at)) }}</h4>
                                    </div>
                                </div>

                                <hr>

                                <b>Nomor Sambungan</b>
                                <h2>#{{ $pelanggan->nosambungan }}</h2>

                                <div class="row">

                                    <div class="col-md-5" style="border-right: 1px solid #e0e0e0">
                                        <br>
                                        <p>Tanggal Pengaduan : <b>{{ date('d F Y H.i A', strtotime($pengaduan->created_at)) }}</b></p>
                                        
                                        <small>Kategori Pengaduan</small>
                                        <h5>{{ $pengaduan->namakategori }}</h5>

                                        <br>
                                        <small>Keterangan Pengaduan</small>
                                        <div class="card card-body" style="background-color: #f5f5f5">
                                            <p>"{{ $pengaduan->keterangan }}"</p>
                                        </div>

                                        <br>
                                        @php 
                                            $direktori = 'lampiran_pengaduan/'. $pengaduan->fotoaduan;

                                        @endphp

                                        <b>Lampiran Foto</b><br>
                                        <img src="{{ asset($direktori) }}" alt="Foto Pengaduan" style="width: 300px; height: 200px; border-radius: 5px"><br>
                                        <small>{{ $pengaduan->fotoaduan }}</small>


                                        @if ( $pengaduan->status == "selesai" ) 
                                        <hr>


                                        <small>Status Pengaduan</small>
                                        <h4>Selesai</h4> <br>


                                        <small>Teknisi yang bekerja</small>
                                        
                                        @php 

                                            $nama_teknisi = [];

                                            foreach ( $teknisi AS $tk ) :

                                                array_push( $nama_teknisi, $tk->nama );
                                            endforeach;

                                        @endphp
                                        
                                        <h4>{{ implode(', ', $nama_teknisi) }}</h4>

                                        <br>

                                        <small>Total Pengerjaan</small>

                                        @php 

                                            $dimulai = $pengaduan->laporan_diperbaiki;
                                            $berakhir = $pengaduan->laporan_selesai_perbaikan;

                                        @endphp

                                        <h4>{{ time_elapsed_string($dimulai, $berakhir, true); }}</h4>


                                        @endif
                                    </div>
                                    <div class="col-md-6">

                                        <h4>Proses Pengajuan</h4>
                                        <div class="timeline timeline-5">
                                            <div class="timeline-items">
                                                <!--begin::Item-->
                                                <div class="timeline-item">
                                                    <!--begin::Icon-->
                                                    <div class="timeline-media bg-light-primary">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </div>
                                                    <!--end::Icon-->
                                        
                                                    <!--begin::Info-->
                                                    <div class="timeline-desc timeline-desc-light-primary">
                                                        <span class="font-weight-bolder text-primary">{{ date('d M Y H.i A', strtotime($pengaduan->created_at)) }}</span>
                                                        <p class="font-weight-normal text-dark-50 pb-2">
                                                            Pembuatan Pengaduan Baru
                                                        </p>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->
                                        
                                                <!--begin::Item Admin -->
                                                @php 

                                                    $colorPersetujuanAdmin = "warning";
                                                    $textPersetujuanAdmin = "Sedang diperiksa";
                                                    $tglPersetujuanAdmin = "-";



                                                    if ( $pengaduan->status == 2 || $pengaduan->status == 3 || $pengaduan->status == 4 || $pengaduan->status == 5 ) {

                                                        $colorPersetujuanAdmin = "success";
                                                        $textPersetujuanAdmin  = $pengaduan->balasanadmin;
                                                        $tglPersetujuanAdmin = date('d M Y H.i A', strtotime( $pengaduan->laporan_tanggal_admin	 ));

                                                    } else if ( $pengaduan->status == 1 ) {

                                                        $colorPersetujuanAdmin = "danger";
                                                        $textPersetujuanAdmin  = $pengaduan->balasanadmin;
                                                        $tglPersetujuanAdmin = date('d M Y H.i A', strtotime( $pengaduan->laporan_tanggal_admin	 ));
                                                    }

                                                @endphp
                                                <div class="timeline-item">
                                                    <!--begin::Icon-->
                                                    <div class="timeline-media bg-light-{{ $colorPersetujuanAdmin }}">
                                                        <span class="svg-icon-warning svg-icon-md">
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Outgoing-mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" fill="#000000"/>
                                                                    <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-90.000000) translate(-11.959697, -3.661508) "/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                        </span>
                                                    </div>
                                                    <!--end::Icon-->
                                        
                                                    <!--begin::Info-->
                                                    <div class="timeline-desc timeline-desc-light-{{ $colorPersetujuanAdmin }}">
                                    
                                                        <span class="font-weight-bolder text-{{ $colorPersetujuanAdmin }}">Verifikasi Admin : {{ $tglPersetujuanAdmin }}</span>
                                                        
                                                        <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                                            {{ $textPersetujuanAdmin }}
                                                        </p>


                                                        @if ( session('level') == "admin" )

                                                        {{-- Aktivitas Untuk Level : Admin --}}

                                                            @if ( empty($pengaduan->laporan_tanggal_admin) ) 

                                                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-warning">Tambahkan Persetujuan</button>
                                                            
                                                            @else 
                                                                <button class="btn btn-sm btn-warning disabled">Tambahkan Persetujuan</button>

                                                            @endif
                                                        
                                                        <!-- Modal-->
                                                        <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    

                                                                    <form action="{{ url('konfirmasipengaduan/'. $pengaduan->id) }}" method="POST">

                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>

                                                                        <h3>Verifikasi Pengaduan</h3>
                                                                        <p> Konfirmasi pengaduan oleh admin hubungan langganan </p>


                                                                        <div class="form-group">
                                                                            <div class="radio-inline">
                                                                                <label class="radio">
                                                                                    <input type="radio" name="status_admin" value="1"/>
                                                                                    <span></span>
                                                                                    Ditolak
                                                                                </label>
                                                                                <label class="radio">
                                                                                    <input type="radio" name="status_admin" value="2"/>
                                                                                    <span></span>
                                                                                    Diajukan
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        
                                                                        <div class="form-group" id="form-penolakan-admin" style="display: none">
                                                                            <label for="">Keterangan</label>
                                                                            <textarea name="keterangan" class="form-control" id="" placeholder="Masukkan alasan ..."></textarea>
                                                                            <small>Keterangan penolakan dari admin</small>
                                                                        </div>

                                                                        <div class="well well-sm" id="pemberitahuan-admin" style="display: none; background-color: #f5f5f5; padding: 5px; border-radius: 5px">
                                                                            <b>Pemberitahuan</b><br>
                                                                            <small>Pengaduan anda sudah diajukan ke petugas untuk perbaikan</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary font-weight-bold">Simpan Perubahan</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End : Activity for userlevel admin --}}
                                                       
                                                        @elseif ( session('level') == "petugas" )
                                                            {{-- Aktivitas Untuk Level : Petugas --}}

                                                            {{-- End : Activity for userlevel Petugas --}}

                                                        @endif













                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->
                                                

                                                @if ($pengaduan->fotosebelum)


                                                @php 

                                                    $colorSebelum = "warning";

                                                    if ( $pengaduan->fotoselesai ) {

                                                        $colorSebelum = "success";
                                                    }

                                                @endphp
                                                <!--begin::Item-->
                                                <div class="timeline-item">
                                                    <!--begin::Icon-->
                                                    <div class="timeline-media bg-light-{{ $colorSebelum }}">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </div>
                                                    <!--end::Icon-->
                                        
                                                    <!--begin::Info-->
                                                    <div class="timeline-desc timeline-desc-light-{{ $colorSebelum }}">
                                                        <span class="font-weight-bolder text-{{ $colorSebelum }}">Pengerjaan Trandis : {{ date('d M Y H.i A'  , strtotime( $pengaduan->laporan_diperbaiki )) }}</span>
                                                        <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                                            <label>Dokumentasi Sebelum diperbaiki</label><br>
                                                            @php 
                                                                $direktori = 'lampiran_pengerjaan/'. $pengaduan->fotosebelum;
                                                            @endphp
                                                            <img src="{{ asset($direktori) }}" alt="Doumentasi" style="width: 200px; height: 120px; object-fit: cover" /><br>
                                                            <small><b>{{ $pengaduan->fotosebelum }}</b></small>
                                                        </p>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->
                                                
                                                @if ($pengaduan->fotoselesai)
                                                <!--begin::Item-->
                                                <div class="timeline-item">
                                                    <!--begin::Icon-->
                                                    <div class="timeline-media bg-light-success">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                    </div>
                                                    <!--end::Icon-->
                                        
                                                    <!--begin::Info-->
                                                    <div class="timeline-desc timeline-desc-light-success">
                                                        <span class="font-weight-bolder text-success">Pengerjaan Trandis Selesai : {{ date('d M Y H.i A', strtotime( $pengaduan->laporan_selesai_perbaikan )) }}</span>
                                                        <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                                            <label>Setelah Selesai diperbaiki</label><br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @php 
                                                                        $direktori = 'lampiran_pengerjaan/'. $pengaduan->fotoproses;
                                                                    @endphp
                                                                    <p>Proses Pengerjaan</p>
                                                                    <img src="{{ asset($direktori) }}" alt="Doumentasi" style="width: 200px; height: 120px; object-fit: cover" /><br>
                                                                    <small><b>{{ $pengaduan->fotoproses }}</b></small>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    @php 
                                                                        $direktori = 'lampiran_pengerjaan/'. $pengaduan->fotoselesai;
                                                                    @endphp
                                                                    <p>Perbaikkan Selesai</p>
                                                                    <img src="{{ asset($direktori) }}" alt="Doumentasi" style="width: 200px; height: 120px; object-fit: cover" /><br>
                                                                    <small><b>{{ $pengaduan->fotoselesai }}</b></small>
                                                                </div>
                                                            </div>
                                                            
                                                        </p>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->
                                                @endif 
                                                {{-- End if berakhir foto sesudah diperbaiki --}}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            
                        </div>
                    </div>

                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div
                            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Riwayat Pengaduan</h5>
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
                    <!--end::Content-->
                </div>
                @include('pelanggan.master.footer')
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        @include('pelanggan.master.itemtopbar')


    <!--begin::Page Scripts(used by this page)-->
	<script src="{{asset('assets1/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>


<script>


    $(function() {


        $('input[name="status_admin"]').on('change', function() {

            let nilai = $(this).val();

            if ( nilai == 1 ) {

                $('#form-penolakan-admin').hide().show(500);
                $('#pemberitahuan-admin').hide(500);

            } else if ( nilai == 2 ) {

                $('#pemberitahuan-admin').hide().show(500);
                $('#form-penolakan-admin').hide(500);
            }
        })
    })
</script>




<?php 

function time_elapsed_string($start, $end, $full = false) {
    $now = new DateTime($start);
    $ago = new DateTime($end);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
}

?>