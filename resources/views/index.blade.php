@extends('app')

@section('content')
    <div class="container">
        <div class="card-orientation row jumbotron flex mb-4 justify-content-start">
            @foreach($companies as $company)
                <div class="col-md-3 col-md-offset-1 card card-company">
                    <a class="company-info" href="/company/{{ $company->id }}">
                        <div class="justify-content-between">
                            <h5 class="mb2">{{ $company->title }}</h5>
                        </div>
                        <p class="description-company-card-text mb-1">{{ $company->info_description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="form-company-size flex justify-content-center flex-column">
                <button id="buttonhidden" class="btn-enabled-company btn btn-primary mb-4" type="submit" name="button">Добавить компанию</button>
                <form class="form-company" action="/company" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="InputTitle" class="form-label">Компания</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="InputTitle" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputInn" class="form-label">ИНН</label>
                        <input type="text" name="inn" class="form-control @error('inn') is-invalid @enderror" id="InputInn" value="{{ old('inn') }}">
                        @error('inn')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 flex flex-column">
                        <label for="InputInfoDescription" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="InputInfoDescription" cols="50" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputGeneralManager" class="form-label">Генеральный директор</label>
                        <input type="text" name="manager" class="form-control @error('manager') is-invalid @enderror" id="InputGeneralManager" value="{{ old('manager') }}">
                        @error('manager')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputAddress" class="form-label">Адрес</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="InputAddress" value="{{ old('address') }}">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputTelephone" class="form-label">Телефон</label>
                        <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="InputTelephone" value="{{ old('telephone') }}">
                        @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" id="save" name="save" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
        </div>

@endsection
