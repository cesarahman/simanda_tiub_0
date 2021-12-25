<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/LOGO TI-UB.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/LOGO TI-UB.png') }}">


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.css') }}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css')}}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

</head>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')


</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div>
                    <img src="{{ asset('img/LOGO TI-UB.png') }}" style="width: 50px !important; height: 50px !important;">
                </div>
                <div class="sidebar-brand-text mx-3">SIMANDA <sup>TIUB</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ url('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                @if (auth()->user()->role_id == 1)
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" id="DataPengguna">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPengguna" aria-expanded="true" aria-controls="collapseDataPengguna">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <div id="collapseDataPengguna" class="collapse" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Data Pengguna</h6>
                            <a class="collapse-item" href="/datapengguna">Data Staff Inti</a>
                            {{-- <a class="collapse-item" href="{{ url('StaffBidang') }}">Data Staff Bidang</a> --}}
                        </div>
                    </div>
                </li>
                <li class="nav-item" id="history">
                    <a class="nav-link" href="{{ url('history') }}">
                        <i class="fas fa-fw fa-history"></i>
                        <span>History</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 2)
                <li class="nav-item" id="DataPengguna">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPengguna" aria-expanded="true" aria-controls="collapseDataPengguna">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <div id="collapseDataPengguna" class="collapse" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Data Staff</h6>
                            <a class="collapse-item" href="/datapengguna">Data Staff Bidang</a>
                        </div>
                    </div>
                </li>
                @endif

                @if(auth()->user()->created_at == auth()->user()->updated_at && auth()->user()->id_role == 2 || 3)

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Bidang
                </div>

                <!-- Nav Item - Home Menu -->
                <li class="nav-item" id="bidang1">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHome" aria-expanded="true" aria-controls="collapseHome">
                        <i class="fas fa-tools"></i>
                        <span class="bold">Bidang 1</span>
                    </a>
                    <div id="collapseHome" class="collapse" aria-labelledby="headingHome" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Bidang 1</h6>
                            <a class="collapse-item" href="{{ url('barangRumahTangga') }}">Barang Rumah Tangga</a>
                            <a class="collapse-item" href="{{ url('alatLatihan') }}">Alat Latihan</a>
                            {{-- <a class="collapse-item" href="{{ url('berita') }}">Persewaan Alat Latihan</a> --}}
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Profile Menu -->
                <li class="nav-item" id="bidang2">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-medal"></i>
                        <span>Bidang 2</span>
                    </a>
                    <div id="collapseProfile" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Bidang 2</h6>
                            <a class="collapse-item" href="{{ url('prestasi') }}"> Data Prestasi</a>
                            {{-- <a class="collapse-item" href="{{ url('atlet') }}">Data Atlet</a> --}}
                        </div>
                    </li>

                    <!-- Nav Item - Akademik Menu -->
                    <li class="nav-item" id="bidang3">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik" aria-expanded="true" aria-controls="collapseAkademik">
                            {{-- <i class="fas fa-fw fa-graduation-cap"></i> --}}
                            <i class="far fa-address-book"></i>
                            <span>Bidang 3</span>
                        </a>
                        <div id="collapseAkademik" class="collapse" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Bidang 3</h6>
                                <a class="collapse-item" href="{{ url('anggota') }}">Data Anggota</a>
                            </div>
                        </div>
                    </li>

                    @endif

                    {{-- <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="side barToggle"></button>
                        </div> --}}

                    </ul>
                    <!-- End of Sidebar -->

                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>


                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    {{-- <!-- Dropdown - Messages -->
                                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav> --}}

            @if(auth()->user()->role_id == 1)
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter" id="jumlah_history_today"></span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" id="dm" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Changes History
                    </h6>
                    <div class="scroll-history">
                        <div id="list-alert-history"></div>
                    </div>
                    <a class="dropdown-item text-center small btn-all-history" href="{{url('history')}}">Show All History</a>
                </div>
            </li>
            @endif

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
                    @if(auth()->user()->gambar == !NULL)
                    <img class="img-profile rounded-circle" src="{{ asset('img/profile') }}/{{ auth()->user()->gambar }}">
                    @else
                    <img class="img-profile rounded-circle" src="{{ asset('img/no-image.png') }}">
                    @endif
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    @if(auth()->user()->created_at == auth()->user()->updated_at && auth()->user()->role_id == 2||3)

                    @endif
                    <a class="dropdown-item" href="{{ url('editprofile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Profile
                    </a>

                    <a class="dropdown-item" href="{{ url('editpassword') }}">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->

    @yield('content')


    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Taekwondo Indonesia Universitas Brawijaya <span id="y"></span></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda benar benar ingin meninggalkan Portal ini ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="{{ url('logout') }}">Iya</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap-show-password.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{asset('vendor/jquery-ui/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>

@yield('js-ajax')

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<!-- <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
{{-- <script src="{{ asset('js/search.js') }}"></script> --}}

<!-- script ajax -->

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('js/tinymce.js') }}"></script>

@yield('chart')

</body>
</html>
