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
{{--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">--}}
        <!-- Scripts -->
{{--        <script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--        <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>--}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

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

            $.ajax({
                url: "/api/comment/{{ $company->id }}",
                type: "GET",
                dataType: "json",
                success(data) {
                    for (let index in data) {
                        $('.comments_manager').append(`
                            <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data[index].user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data[index].comment}</div>
                        `)
                    }
                }
            })

            function storeCommentsManager() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldManager").value;
                const comment = document.getElementById("InputCommentManager").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                            $('.comments_manager').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                        },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentManager`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeCommentsTitle() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldManager").value;
                const comment = document.getElementById("InputCommentManager").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                        $('.comments_title').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentTitle`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeDescription() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldDescription").value;
                const comment = document.getElementById("InputCommentDescription").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                        $('.comments_description').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentDescription`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeCommentsInn() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldInn").value;
                const comment = document.getElementById("InputCommentInn").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                        $('.comments_inn').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentInn`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeCommentsAddress() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldAddress").value;
                const comment = document.getElementById("InputCommentAddress").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                        $('.comments_address').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentAddress`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeCommentsTelephone() {
                const user = document.querySelector("input[name='user']").value;
                const id_field = document.getElementById("fieldTelephone").value;
                const comment = document.getElementById("InputCommentTelephone").value;
                const id_company = document.querySelector("input[name='id_company']").value;
                $.ajax({
                    url: "/api/comment",
                    method: "POST",
                    dataType: "json",
                    data: {
                        user: user,
                        comment: comment,
                        id_field: id_field,
                        id_company: id_company
                    },
                    success(data) {
                        $('.comments_telephone').append(`
        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                        <a href="#">
                        <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                        </a>
                        </div>
                        <div class="media-body">
                        <div class="media-heading">
                        <div class="author">${data.comment.user}</div>
                        <div class="metadata">
                        <span class="date">16 ноября 2015, 13:43</span>
                        </div>
                        </div>
                        <div class="media-text text-justify">${data.comment.comment}</div>
                        `);
                        $(`.comments`).removeClass('d-none').text("Комментарий был успешно добавлен")
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#CommentTelephone`).removeClass('d-none').text("Поле не должно быть пустым");
                        }
                    }
                });
            }
            function storeCompany() {
                const company_title = document.getElementById("InputTitle").value;
                const company_inn = document.getElementById("InputInn").value;
                const company_description = document.getElementById("InputInfoDescription").value;
                const company_manager = document.getElementById("InputGeneralManager").value;
                const company_address = document.getElementById("InputAddress").value;
                const company_telephone = document.getElementById("InputTelephone").value;
                $.ajax({
                    url: "/api/company",
                    type: "POST",
                    dataType: "json",
                    data: {
                        title: company_title,
                        inn: company_inn,
                        info_description: company_description,
                        general_manager: company_manager,
                        address: company_address,
                        telephone: company_telephone
                    },
                    success(data) {
                        $('.card-orientation').append(`
                            <div class="col-md-3 col-md-offset-1 card card-company">
                    <a class="company-info" href="/company/${data.company.id }">
                        <div class="justify-content-between">
                            <h5 class="mb2">${data.company.title }</h5>
                        </div>
                        <p class="description-company-card-text mb-1">${data.company.info_description}</p>
                    </a>
                </div>
                        `)
                    },
                    error(err) {
                        const data = err.responseJSON;
                        for (let key in err.responseJSON.errors) {
                            let error_text = err.responseJSON.errors[key][0];
                            $(`#${key}-error`).removeClass('d-none').text(error_text);
                        }
                    }
                })
            }
        </script>
    </body>
</html>
