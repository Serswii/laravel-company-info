@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <span class="success" style="color: green; margin-top: 10px; margin-bottom: 10px"></span>
            @guest
                <span class="alert alert-info info-{{ $fields[0] }}">Только авторизованный пользователь может смотреть и оставлять комментарии</span>
            @endguest
            <div class="comments alert alert-success d-none"></div>
            <div class="company-comment-form mb-4">
                <div class="flex align-items-center">
                <h1 class="display-4">{{ $company->title }}</h1>
                <div class="comments-create flex ml-3"><img id="buttonhidden-1" class="disclosure" src="{{asset('images/disclosure.png')}} " alt=""><p>Комментарии @auth{{ $count_id1 }}@endauth</p></div>
                </div>
                @auth
                <form class="form-company comment-title" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldTitle" name="commentField" value="{{ $fields[0] }}" >
                    <div class="mb-3">
                        <label for="InputCommentTitle" class="form-label">Комментарий</label>
                        <textarea type="text" name="comment" class="form-control" id="InputCommentTitle"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentTitle"></div>
                    </div>

                    <button type="button" class="btn btn-primary" name="saveComment" onclick="storeCommentsTitle()">Сохранить</button>
                </form>

                    <div class="comments_title">
                        @foreach($comments as $comment)
                    @if($comment->id_field == $fields[0])
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">{{ Auth::user()->name }}</div>
                                    <div class="metadata">
                                        <span class="date">16 ноября 2015, 13:43</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">{{ $comment->comment }}</div>
                            </div>
                        </li>
                    </ul>
                    @endif
                        @endforeach
                </div>
                @endauth
            <div class="company-comment-form mb-4">
                <div class="flex align-items-center">
                <p>{{ $company->inn }}</p>
                <div class="comments-create flex ml-3"><img id="buttonhidden-2" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии @auth{{ $count_id2 }}@endauth</p></div>
                </div>
                @auth
                <form class="form-company comment-inn" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldInn" name="commentField" value="{{ $fields[1] }}" >
                    <div class="mb-3">
                        <label for="InputCommentInn" class="form-label">Комментарий</label>
                        <textarea type="text" name="comment" class="form-control" id="InputCommentInn"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentInn"></div>
                    </div>
                    <button type="button" class="btn btn-primary" name="saveCommentInn" onclick="storeCommentsInn()">Сохранить</button>
                </form>

                    <div class="comments_inn">
                        @foreach($comments as $comment)
                    @if($comment->id_field == $fields[1])
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">{{ Auth::user()->name }}</div>
                                            <div class="metadata">
                                                <span class="date">16 ноября 2015, 13:43</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                    @endif
                        @endforeach
                        </div>
                @endauth
            </div>
            <div class="company-comment-form mb-4">
                <div class="mobile-company">
                <p class="description-company-width">{{ $company->info_description }}</p>
                <div class="comments-create flex ml-3"><img id="buttonhidden-3" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии @auth{{ $count_id3 }}@endauth</p></div>
                </div>
                @auth
                <form class="form-company comment-description" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldDescription" name="commentField" value="{{ $fields[2] }}" >
                    <div class="mb-3">
                        <label for="InputCommentDescription" class="form-label">Комментарий</label>
                        <textarea type="text" name="comment" class="form-control" id="InputCommentDescription"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentDescription"></div>
                    </div>
                    <button type="button" class="btn btn-primary" name="saveCommentDescription" onclick="storeCommentsDescription()">Сохранить</button>
                </form>


                    <div class="comments_description">
                        @foreach($comments as $comment)
                    @if($comment->id_field == $fields[2])
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">{{ Auth::user()->name }}</div>
                                            <div class="metadata">
                                                <span class="date">16 ноября 2015, 13:43</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                    @endif
                        @endforeach
                    </div>
                @endauth
            </div>
            <div class="company-comment-form mb-4">
                <div class="mobile-company">
                    <p>{{ $company->general_manager }}</p>
                   <div class="comments-create flex ml-3"><img id="buttonhidden-4" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии @auth{{ $count_id4 }}@endauth</p></div>
                </div>
                @auth
                <form class="form-company comment-manager mb-4" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldManager" name="commentField" value="{{ $fields[3] }}" >
                    <div class="mb-3">
                        <label for="InputCommentManager" class="form-label">Комментарий</label>
                        <textarea name="comment" class="form-control" id="InputCommentManager"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentManager"></div>
                    </div>
                    <button type="button" class="btn btn-primary" name="saveCommentManager" onclick="storeCommentsManager()">Сохранить</button>
                </form>


                    <div class="comments_manager">
                        @foreach($comments as $comment)
                        @if($comment->id_field == $fields[3])
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">{{ Auth::user()->name }}</div>
                                            <div class="metadata">
                                                <span class="date">16 ноября 2015, 13:43</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                            @endforeach
                    </div>
                @endauth
            </div>
            <div class="company-comment-form mb-4">
                <div class="mobile-company">
                <p>{{ $company->address }}</p>
                <div class="comments-create flex ml-3"><img id="buttonhidden-5" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии @auth{{ $count_id5 }}@endauth</p></div>
                </div>
                @auth
                <form class="form-company comment-adress" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldAddress" name="commentField" value="{{ $fields[4] }}" >
                    <div class="mb-3">
                        <label for="InputCommentAddress" class="form-label">Комментарий</label>
                        <textarea type="text" name="comment" class="form-control" id="InputCommentAddress"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentAddress"></div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="storeCommentsAddress()" name="saveCommentAddress">Сохранить</button>
                </form>

                    <div class="comments_address">
                        @foreach($comments as $comment)
                        @if($comment->id_field == $fields[4])
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">{{ Auth::user()->name }}</div>
                                            <div class="metadata">
                                                <span class="date">16 ноября 2015, 13:43</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                            @endforeach
                    </div>
                @endauth
            </div>
            <div class="company-comment-form mb-4">
                <div class="flex align-items-center">
                <p>{{ $company->telephone }}</p>
                <div class="comments-create flex ml-3"><img id="buttonhidden-6" class="disclosure" src="{{asset('images/disclosure.png')}}" alt=""><p>Комментарии @auth{{ $count_id6 }}@endauth</p></div>
                </div>
                @auth
                <form id="comment-form" class="form-company comment-telephone" action="">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    <input type="hidden" name="id_company" value="{{ $company->id }}">
                    <input type="hidden" id="fieldTelephone" name="commentField" value="{{ $fields[5] }}" >
                    <div class="mb-3">
                        <label for="InputCommentTelephone" class="form-label">Комментарий</label>
                        <textarea type="text" name="comment" class="form-control" id="InputCommentTelephone"></textarea>
                        <div class="alert alert-danger mt-2 d-none" id="CommentTelephone"></div>
                    </div>
                    <button type="button" class="btn btn-primary" name="saveCommentTelephone" onclick="storeCommentsTelephone()">Сохранить</button>
                </form>

                    <div class="comments_telephone">
                        @foreach($comments as $comment)
                        @if($comment->id_field == $fields[5])
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="{{asset('/images/default-photo.png')}}" alt="default-img">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">{{ Auth::user()->name }}</div>
                                            <div class="metadata">
                                                <span class="date">16 ноября 2015, 13:43</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">{{ $comment->comment }}</div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                        @endforeach
                    </div>
                @endauth
            </div>

        </div>
    </div>
    </div>

@endsection

