<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf" content="{{ csrf_token() }}">

        <title inertia>CompanyInfo</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        @include('components.navbar')
        @yield('content')
        <script type="text/javascript">
            $( "#login-logout" ).click(function() {
                $( ".absolute" ).toggle( "slow", function() {

                });
            });
            $( "#buttonhidden" ).click(function() {
                $( ".form-company" ).toggle( "slow", function() {

                });
            });
            $( "#buttonhidden-1" ).click(function() {
                $( ".comment-title" ).toggle( "slow", function() {

                });
            });
            $( "#buttonhidden-2" ).click(function() {
                $( ".comment-inn" ).toggle( "slow", function() {

                });
            }); $( "#buttonhidden-3" ).click(function() {
                $( ".comment-description" ).toggle( "slow", function() {

                });
            }); $( "#buttonhidden-4" ).click(function() {
                $( ".comment-manager" ).toggle( "slow", function() {

                });
            }); $( "#buttonhidden-5" ).click(function() {
                $( ".comment-adress" ).toggle( "slow", function() {

                });
            }); $( "#buttonhidden-6" ).click(function() {
                $( ".comment-telephone" ).toggle( "slow", function() {

                });
            });

            {{--function addCompany() {--}}
            {{--    const title = document.getElementById('InputTitle').value;--}}
            {{--    const inn = document.getElementById('InputInn').value;--}}
            {{--    const description = document.getElementById('InputInfoDescription').value;--}}
            {{--    const manager = document.getElementById('InputGeneralManager').value;--}}
            {{--    const telephone = document.getElementById('InputTelephone').value;--}}
            {{--    const address = document.getElementById('InputAddress').value;--}}

            {{--    let formData = new FormData();--}}
            {{--    formData.append('title', title);--}}
            {{--    formData.append('inn', inn);--}}
            {{--    formData.append('description', description);--}}
            {{--    formData.append('manager', manager);--}}
            {{--    formData.append('telephone', telephone);--}}
            {{--    formData.append('address', address);--}}

            {{--    fetch('{{route('store')}}', {--}}
            {{--        method: "POST",--}}
            {{--        body: formData,--}}
            {{--        headers: {--}}
            {{--            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf"]').getAttribute('content')--}}
            {{--        },--}}
            {{--    });--}}
            {{--     // location.reload();--}}
            {{--}--}}
        </script>
    </body>
</html>
