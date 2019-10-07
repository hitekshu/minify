@extends('layouts.app')

@section('content')
    <div class="">
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
                                   <th >Title</th>
                                   <th>Full Link</th>
                                   <th>Minified Link</th>
                                   <th>Click Count</th>
                                   <th>Actions</th>
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