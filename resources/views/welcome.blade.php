
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h2 class="h2 text-gray-900 mb-4">{{ __('Let\'s Mini.fy!') }}</h2>
                                <h2 class="h4 text-gray-900 mb-4">{{ __('Unleash The Power Of The Link') }}</h2>
                                <span class="h5 text-center">{{ __('Link Management Platform
Mini.fy is a link management platform and URL shortener with branded URLs that gives you many useful features') }}</span>
                            </div>
                            <div class="text-center">
                                <img height="400" width="400" src="/assets/images/2019-10-06.png" />
                            </div>
                            <form method="POST" class="user" action="{{ route('saveAsGuest') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="full_url" type="url" style="font-size:1.0em;" class="form-control form-control-user @error('full_url') is-invalid @enderror" name="full_url" value="{{ old('full_url') }}" placeholder="Paste your link here..." required autocomplete="full_url" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size:1.0em;">
                                        {{ __('Minify') }}
                                    </button>
                                </div>
                                @if(count($urlInfo) > 0)
                                    <br>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>{{ __('FULL URL') }}</th>
                                            <th>{{ __('MINIFIED URL') }}</th>
                                        </tr>
                                    </thead>
                                    @foreach ($urlInfo as $key => $url)
                                        <tr>
                                            <td class="col-md" >
                                                <div>{{$key}}</div>
                                            </td>
                                            <td>
                                                <a href="{{ $url  }}" target="_blank">{{$url}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

