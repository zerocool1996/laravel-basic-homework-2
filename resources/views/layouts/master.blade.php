<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/all.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    @include('layouts.menu')
    @yield('content')

    @include('layouts.modal')
    @include('layouts.show_active_modal_error')

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function (){
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $(this).prev();
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
    @if ( session()->has('success_msg') || session()->has('error_msg') )
        <script type="text/javascript">
            $(document).ready(function () {
            @if (session()->has('success_msg'))
                toastr.success("Notification", "{{ session('success_msg') }}", "success", 1000);
            @endif
            @if (session()->has('error_msg'))
                toastr.error("Notification", "{{ session('error_msg') }}", "error", "success", 1000);
            @endif
            });
        </script>
    @endif
</body>
</html>
