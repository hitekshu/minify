@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create/Edit Short Link') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveShortUrl') }}">
                            @csrf
                            @if($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors as $error)
                                        <li> {{$error}} </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $objUserUrl->title) }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $objUserUrl->description) }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="full_url" class="col-md-4 col-form-label text-md-right">{{ __('Full Url') }}</label>

                                <div class="col-md-6">
                                    <input id="full_url" type="url" class="form-control @error('full_url') is-invalid @enderror" name="full_url" value="{{ old('full_url', $objUserUrl->full_url) }}" required autocomplete="full_url">

                                    @error('full_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                                    <input type="hidden" name="id" id="id" value="{{ old('short_url', $objUserUrl->id) }}" />
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-light float-md-right">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection