<!DOCTYPE html>
<html lang="en">
@include('petugas.master.header')
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('petugas.master.sidebar')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('petugas.master.topbar')

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
                                    
                                    <tr>
                                        <td>35356-778</td>
                                        <td>Dodge</td>
                                        <td>Ram 2500</td>
                                        <td>Goldenrod</td>
                                        <td>$13569.00</td>
                                        <td>2016-03-22</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>48951-3040</td>
                                        <td>Mitsubishi</td>
                                        <td>Eclipse</td>
                                        <td>Aquamarine</td>
                                        <td>$22471.73</td>
                                        <td>2016-04-17</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>0487-9801</td>
                                        <td>Pontiac</td>
                                        <td>GTO</td>
                                        <td>Green</td>
                                        <td>$43149.39</td>
                                        <td>2016-05-27</td>
                                        <td class="text-right">4</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>54753-003</td>
                                        <td>Audi</td>
                                        <td>S4</td>
                                        <td>Turquoise</td>
                                        <td>$39286.74</td>
                                        <td>2016-07-23</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>34460-6006</td>
                                        <td>Audi</td>
                                        <td>Allroad</td>
                                        <td>Mauv</td>
                                        <td>$47394.02</td>
                                        <td>2016-06-21</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>62802-106</td>
                                        <td>GMC</td>
                                        <td>Sierra 1500</td>
                                        <td>Teal</td>
                                        <td>$47469.52</td>
                                        <td>2016-05-06</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>43269-664</td>
                                        <td>Buick</td>
                                        <td>Terraza</td>
                                        <td>Orange</td>
                                        <td>$94980.73</td>
                                        <td>2017-08-17</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>65862-602</td>
                                        <td>Ford</td>
                                        <td>Crown Victoria</td>
                                        <td>Green</td>
                                        <td>$36215.40</td>
                                        <td>2016-09-01</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>18527-119</td>
                                        <td>Toyota</td>
                                        <td>Sequoia</td>
                                        <td>Mauv</td>
                                        <td>$46000.92</td>
                                        <td>2016-05-17</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>55910-994</td>
                                        <td>Mercedes-Benz</td>
                                        <td>C-Class</td>
                                        <td>Turquoise</td>
                                        <td>$76272.22</td>
                                        <td>2016-01-10</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>49349-441</td>
                                        <td>Audi</td>
                                        <td>Cabriolet</td>
                                        <td>Red</td>
                                        <td>$33624.99</td>
                                        <td>2017-07-31</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>0573-0232</td>
                                        <td>Hyundai</td>
                                        <td>Tucson</td>
                                        <td>Puce</td>
                                        <td>$97796.98</td>
                                        <td>2017-02-10</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>49643-326</td>
                                        <td>Lexus</td>
                                        <td>IS</td>
                                        <td>Pink</td>
                                        <td>$88864.37</td>
                                        <td>2016-06-01</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>0944-2627</td>
                                        <td>Audi</td>
                                        <td>S4</td>
                                        <td>Maroon</td>
                                        <td>$25024.94</td>
                                        <td>2016-12-16</td>
                                        <td class="text-right">4</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>33992-1210</td>
                                        <td>BMW</td>
                                        <td>7 Series</td>
                                        <td>Green</td>
                                        <td>$89144.60</td>
                                        <td>2017-06-02</td>
                                        <td class="text-right">4</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>53808-0478</td>
                                        <td>Volkswagen</td>
                                        <td>Eurovan</td>
                                        <td>Red</td>
                                        <td>$69113.93</td>
                                        <td>2017-12-17</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>51531-0332</td>
                                        <td>Mitsubishi</td>
                                        <td>Tredia</td>
                                        <td>Aquamarine</td>
                                        <td>$28062.46</td>
                                        <td>2016-03-14</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>49852-181</td>
                                        <td>Ford</td>
                                        <td>Thunderbird</td>
                                        <td>Green</td>
                                        <td>$75325.45</td>
                                        <td>2016-12-12</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>49614-133</td>
                                        <td>Jeep</td>
                                        <td>Grand Cherokee</td>
                                        <td>Mauv</td>
                                        <td>$45865.14</td>
                                        <td>2017-01-11</td>
                                        <td class="text-right">2</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>0264-1800</td>
                                        <td>Hyundai</td>
                                        <td>XG350</td>
                                        <td>Khaki</td>
                                        <td>$82969.08</td>
                                        <td>2017-10-27</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>36987-2784</td>
                                        <td>Lexus</td>
                                        <td>LX</td>
                                        <td>Puce</td>
                                        <td>$50958.79</td>
                                        <td>2016-09-20</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>43319-050</td>
                                        <td>Lexus</td>
                                        <td>GS</td>
                                        <td>Orange</td>
                                        <td>$13672.91</td>
                                        <td>2017-11-23</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">1</td>
                                    </tr>
                                    <tr>
                                        <td>33261-026</td>
                                        <td>Chevrolet</td>
                                        <td>SSR</td>
                                        <td>Teal</td>
                                        <td>$25036.57</td>
                                        <td>2017-10-28</td>
                                        <td class="text-right">4</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>60505-0381</td>
                                        <td>Chrysler</td>
                                        <td>New Yorker</td>
                                        <td>Yellow</td>
                                        <td>$35660.00</td>
                                        <td>2017-01-21</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">3</td>
                                    </tr>
                                    <tr>
                                        <td>29500-2438</td>
                                        <td>Saturn</td>
                                        <td>S-Series</td>
                                        <td>Khaki</td>
                                        <td>$79451.58</td>
                                        <td>2017-09-24</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>21695-901</td>
                                        <td>Volvo</td>
                                        <td>XC70</td>
                                        <td>Goldenrod</td>
                                        <td>$34678.63</td>
                                        <td>2016-12-26</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right">2</td>
                                    </tr>
                                    <tr>
                                        <td>0187-0063</td>
                                        <td>Mercedes-Benz</td>
                                        <td>S-Class</td>
                                        <td>Goldenrod</td>
                                        <td>$97306.72</td>
                                        <td>2017-11-06</td>
                                        <td class="text-right">5</td>
                                        <td class="text-right">3</td>
                                    </tr>
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
                @include('petugas.master.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    @include('petugas.master.itemtopbar')

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