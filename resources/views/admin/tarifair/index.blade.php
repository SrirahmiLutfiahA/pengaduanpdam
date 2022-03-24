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
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('tarifair.create')}}" class="btn btn-primary font-weight-bolder">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                                <path
                                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>Tambah Data</a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Search..."
                                                        id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th title="Field #1">Kelompok Pelanggan</th>
                                        <th title="Field #2">Harga Pemakaian</th>
                                        <th title="Field #3">Biaya Pemeliharaan</th>
                                        <th title="Field #4">Biaya Administrasi</th>
                                        <th title="Field #5">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $nomor = 1;

                                    @endphp 


                                    @foreach ( $tarifairs AS $row )
                                    <tr>
                                        <td>{{ $row->kelompok_pelanggan }}</td>
                                        <td>{{ number_format($row->hargapemakaian, 2) }}</td>
                                        <td>{{ $row->biayapemeliharaan }}</td>
                                        <td>{{ $row->biayaadministrasi }}</td>
                                        <td>
                                            <a href="javascript:;"  data-toggle="modal" data-target="#edit" class="btn btn-sm btn-light-warning">Sunting</a>
                                            <a href="tarif/delete/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $row->kelompokpelanggan }}')" class="btn btn-sm btn-light-danger">Hapus</a>
                                        
                                        
                                            <!-- Modal-->
                                            <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1"
                                                role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">


                                                        <form action="tarif/edit/{{ $row->id }}" method="post">

                                                            @csrf
                                                            <div class="modal-body">
                                                                <h3>Pengubahan Informasi</h3>
                                                                <p>Sunting data {{ $row->kelompok_pelanggan }}</p>

                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <strong>Kelompok Pelanggan</strong>
                                                                            <select name="kelompokpelanggan"
                                                                                class="form-control" id="">
                                                                                <option value="Sosial" {{ $row->kelompok_pelanggan == "Sosial" ? 'selected="selected"' : '' }}>Sosial</option>
                                                                                <option value="Rumah Tangga A" {{ $row->kelompok_pelanggan == "Rumah Tangga A" ? 'selected="selected"' : '' }}>Rumah
                                                                                    Tangga A</option>
                                                                                <option value="Rumah Tangga B" {{ $row->kelompok_pelanggan == "Rumah Tangga B" ? 'selected="selected"' : '' }}>Rumah
                                                                                    Tangga B</option>
                                                                                <option value="Dinas Instansi" {{ $row->kelompok_pelanggan == "Dinas Instansi" ? 'selected="selected"' : '' }}>Dinas
                                                                                    Instansi</option>
                                                                                <option value="Niaga" {{ $row->kelompok_pelanggan == "Niaga" ? 'selected="selected"' : '' }}>Niaga</option>
                                                                                <option value="Industri" {{ $row->kelompok_pelanggan == "Industri" ? 'selected="selected"' : '' }}>Industri
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <strong>Harga Pemakaian</strong>
                                                                            <input type="number" name="hargapemakaian" value="{{ $row->hargapemakaian }}"
                                                                                class="form-control"
                                                                                placeholder="Harga Pemakaian">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <strong>Biaya Pemeliharaan</strong>
                                                                            <input type="number"
                                                                                name="biayapemeliharaan" value="{{ $row->biayapemeliharaan }}"
                                                                                class="form-control"
                                                                                placeholder="Biaya Pemeliharaan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <strong>Biaya Administrasi</strong>
                                                                            <input type="number"
                                                                                name="biayaadministrasi" value="{{ $row->biayaadministrasi }}"
                                                                                class="form-control"
                                                                                placeholder="Biaya Administrasi">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>




                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-light-primary btn-sm font-weight-bold"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-warning btn-sm font-weight-bold">Simpan dan Perbarui</button>
                                                        </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $nomor++;
                                    @endphp

                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
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
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Tarif Air Minum</h5>
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

    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets1/plugins/global/plugins.bundle.js"></script>
		<script src="assets1/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets1/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets1/js/pages/crud/ktdatatable/base/html-table.js"></script>
		<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>