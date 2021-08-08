@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="company-comment-form">
                <h1 class="display-4">{{ $company->title }}</h1>
                <button id="buttonhidden-1" class="btn btn-primary mb-4" type="submit" name="button">Добавить комментарий</button>
                <form class="form-company comment-title" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldTitle" name="commentField" value="{{ $fields[0] }}" >
                    <div class="mb-3">
                    <label for="InputCommentTitle" class="form-label">Комментарий</label>
                    <input type="text" name="comment" class="form-control" id="InputCommentTitle" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                </form>
            </div>
            <div class="company-comment-form">
                <p>{{ $company->inn }}</p>
                <button id="buttonhidden-2" class="btn btn-primary mb-4" type="submit" name="button">Добавить комментарий</button>
                <form class="form-company comment-inn" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldInn" name="commentField" value="{{ $fields[1] }}" >
                    <div class="mb-3">
                    <label for="InputCommentInn" class="form-label">Комментарий</label>
                    <input type="text" name="comment" class="form-control" id="InputCommentInn" required>
                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                    </div>
                </form>
            </div>
            <div class="company-comment-form">
                <p>{{ $company->info_description }}</p>
                <button id="buttonhidden-3" class="btn btn-primary mb-4" type="submit" name="button">Добавить комментарий</button>
                <form class="form-company comment-description" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldDescription" name="commentField" value="{{ $fields[2] }}" >
                    <div class="mb-3">
                        <label for="InputCommentDescription" class="form-label">Комментарий</label>
                        <input type="text" name="comment" class="form-control" id="InputCommentDescription" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                </form>
            </div>
            <div class="company-comment-form">
                <div class="flex">
                    <p>{{ $company->general_manager }}</p>
                   <div class="comments-create flex ml-3"><img id="buttonhidden-4" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии</p></div>
                </div>

                <form class="form-company comment-manager" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldManager" name="commentField" value="{{ $fields[3] }}" >
                    <div class="mb-3">
                    <label for="InputCommentManager" class="form-label">Комментарий</label>
                    <input type="text" name="comment" class="form-control" id="InputCommentManager" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                </form>
            </div>
            <div class="company-comment-form">
                <p>{{ $company->address }}</p>
                <button id="buttonhidden-5" class="btn btn-primary mb-4" type="submit" name="button">Добавить комментарий</button>
                <form class="form-company comment-adress" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldAddress" name="commentField" value="{{ $fields[4] }}" >
                    <div class="mb-3">
                    <label for="InputCommentAddress" class="form-label">Комментарий</label>
                    <input type="text" name="comment" class="form-control" id="InputCommentAddress" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                </form>
            </div>
            <div class="company-comment-form">
                <p>{{ $company->telephone }}</p>
                <button id="buttonhidden-6" class="btn btn-primary mb-4" type="submit" name="button">Добавить комментарий</button>
                <form class="form-company comment-telephone" action="" method="post">
                    @csrf

                    <input type="hidden" id="fieldTelephone" name="commentField" value="{{ $fields[5] }}" >
                    <div class="mb-3">
                    <label for="InputCommentTelephone" class="form-label">Комментарий</label>
                    <input type="text" name="comment" class="form-control" id="InputCommentTelephone" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="saveComment" >Сохранить</button>
                </form>
            </div>

        </div>
    </div>

@endsection

