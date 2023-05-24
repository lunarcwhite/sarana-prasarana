<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
    <title>Admin</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.partial.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('layouts.admin.partial.navbar')

                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('pageTitle')</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url()->current() }}">@yield('pageLink')</a></li>
                            <li class="breadcrumb-item">@yield('pageNow')</li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('pageActive')</li>
                        </ol>
                    </div>
                    @yield('content')

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            @include('layouts.admin.partial.footer')
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

    @include('layouts.scripts.sweetalert')
    @stack('js')
    <script>
        function clearInput(formId, label = "", action = "") {
            document.getElementById(formId).reset();
            $(".file").val("");
            $(`#labelModal`).text(label);
            $(`#btn-submit`).text('Simpan');
            document.getElementById(formId).action =
                `{{ url('${action}') }}`;
            $("#update").empty();
            $('.image-preview').empty();
            $(".kapilih").removeAttr('selected');
        }

        function formConfirmation(message) {
            var form = event.target.form;
            Swal.fire({
                title: message,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }

        function updateConfirmation(id, message) {
            var formUpdate = $(`${id}`);
            console.log();
            Swal.fire({
                title: message,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    formUpdate.submit();
                }
            })
        }
    </script>
</body>

</html>
