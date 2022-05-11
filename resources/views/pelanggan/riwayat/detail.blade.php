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
                    
                    <div class="row justify-content-center">
                        <div class="col-md-11">


                            <div class="card-header ribbon ribbon-right">
                                @php 
                                    $color = "warning";
                                    $text = "Menunggu";

                                    if ( $pengaduan->status == "menunggu" ) {

                                        $color = "warning";
                                        $text = "Menunggu";

                                    } else if ( $pengaduan->status == "ditolak" ) {

                                        $color = "danger";
                                        $text = "Pengaduan Ditolak";
                                    
                                    } else if ( $pengaduan->status == "diajukan" ) {

                                        $color = "danger";
                                        $text = "Pengaduan Ditolak";
   
                                    } else if ( $pengaduan->status == "diperbaiki" ) {

                                        $color = "info";
                                        $text = "Diperbaiki";
                                    } else if ( $pengaduan->status == "selesai_perbaikan" ) {

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
                                                        <span class="svg-icon-primary svg-icon-md">
                                                        ...
                                                        </span>
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



                                                    if ( $pengaduan->status == "diajukan" || $pengaduan->status == "diperbaiki" || $pengaduan->status == "selesai_perbaikan" || $pengaduan->status == "selesai"  ) {

                                                        $colorPersetujuanAdmin = "success";
                                                        $textPersetujuanAdmin  = $pengaduan->balasanadmin;
                                                        $tglPersetujuanAdmin = date('d M Y H.i A', strtotime( $pengaduan->laporan_tanggal_admin	 ));

                                                    } else if ( $pengaduan->status == "ditolak" ) {

                                                        $colorPersetujuanAdmin = "danger";
                                                        $textPersetujuanAdmin  = $pengaduan->balasanadmin;
                                                        $tglPersetujuanAdmin = date('d M Y H.i A', strtotime( $pengaduan->laporan_tanggal_admin	 ));
                                                    }

                                                @endphp
                                                <div class="timeline-item">
                                                    <!--begin::Icon-->
                                                    <div class="timeline-media bg-light-{{ $colorPersetujuanAdmin }}">
                                                        <span class="svg-icon-warning svg-icon-md">
                                                        ...
                                                        </span>
                                                    </div>
                                                    <!--end::Icon-->
                                        
                                                    <!--begin::Info-->
                                                    <div class="timeline-desc timeline-desc-light-{{ $colorPersetujuanAdmin }}">
                                                        <span class="font-weight-bolder text-{{ $colorPersetujuanAdmin }}">Verifikasi Admin : {{ $tglPersetujuanAdmin }}</span>
                                                        <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                                            {{ $textPersetujuanAdmin }}
                                                        </p>
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
                                                        <span class="svg-icon-success svg-icon-md">
                                                        ...
                                                        </span>
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
                                                        <span class="svg-icon-danger svg-icon-md">
                                                        ...
                                                        </span>
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
	<script src="assets1/js/pages/crud/ktdatatable/base/html-table.js"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>




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