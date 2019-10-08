@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Total Links Generated') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalLinks}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Total Clicks generated') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalHits}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <span>Dashboard</span>
                        <a href="{{ route('createShortUrl') }}" class="btn btn-primary float-right">Create</a>
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered table-striped table-hover table-responsive-md">
                           <thead class="table-primary">
                               <tr>
                                   <th >{{ __('Title') }}</th>
                                   <th>{{ __('Full Link') }}</th>
                                   <th>{{ __('Minified Link') }}</th>
                                   <th>{{ __('Hits') }}</th>
                                   <th>{{ __('Actions') }}</th>
                               </tr>
                           </thead>
                           @forelse ($userUrls as $userUrl)
                               <tr class="table-striped">
                                   <td>{{$userUrl->title}}</td>
                                   <td>{{$userUrl->full_url}}</td>
                                   <td><a href="{{ $userUrl->short_url  }}" target="_blank">{{$userUrl->short_url}}</a></td>
                                   <td>{{$userUrl->click_count}}</td>
                                   <td>
                                       <a class="btn btn-outline-info" href="{{ route('editShortUrl', ['id' => $userUrl->id] ) }}">Edit</a> <a class="btn btn-outline-danger" href="{{ route('deleteShortUrl', ['id' => $userUrl->id] ) }}">Delete</a>
                                       <i class="fas fa-trash"></i>
                                   </td>
                               </tr>
                           @empty
                               <td colspan="5"><span>No short links found.</span></td>
                           @endforelse
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection