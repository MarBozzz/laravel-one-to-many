@extends('layouts.app')


@section('title')
    | Admin
@endsection

@section('content')
<div class="container h-100 w-50 d-flex flex-column justify-content-center">
    <h1 class="text-center my-3 color-white">Projects</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif


    <div class="table-wrapper w-100 d-flex flex-column align-items-center">
        <h3 class="mt-3">Total projects: {{$projects->total()}}</h3>

        <div class="row w-50 d-flex justify-content-center">
            <table class="table table-striped table-dark text-center my-5">
                <thead>
                  <tr>
                    <th>
                        <a href="{{ route('admin.projects.orderby',['id',$direction]) }}">ID</a>
                    </th>
                    <th class="w-100">
                        <a href="{{ route('admin.projects.orderby',['name',$direction]) }}">Project Name</a>
                    </th>
                    <th class="">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->name}} <span class="badge text-bg-light">{{ $project->type?->name }}</span></td>
                            <td class="d-flex justify-content-end">
                                <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}" title="show"><i class="fa-solid fa-circle-info"></i></a>
                                <a class="btn btn-success mx-2" href="{{route('admin.projects.edit', $project)}}" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <div class="d-inline">
                                    <!-- @include('admin.partials.delete-form') -->
                                    @include('admin.partials.form-delete')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <h2>NO RESULTS</h2>
                    @endforelse
                </tbody>
              </table>
              <div class="">
                  {{$projects->links()}}
              </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-warning mb-5" href="{{route('admin.projects.create')}}">Create New Project</a>
            </div>
        </div>
    </div>

    {{-- <div class="row d-flex">
        @forelse ($projects as $project)
        <div class="col-6 d-flex justify-content-center py-5">
            <div class="card" style="width: 18rem;">
                <img src="{{$project->cover_image}}" class="card-img-top" alt="{{$project->name}}">
                <div class="card-body">
                    <h3 class="card-title py-3 text-center">{{$project->name}}</h5>
                    <p class="card-text">{{$project->id}}</p>
                    <p class="card-text">{{$project->summary}}</p>
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary " href="{{route('admin.projects.show', $project)}}" title="show">See Details >></a>
                        <a class="btn btn-success my-2" href="{{route('admin.projects.edit', $project)}}" title="edit">Edit Project</a>
                        <div class="w-100">
                            @include('admin.partials.delete-form')
                        </div>

                    </div>

                </div>
            </div>
        </div>

    @empty
       <h2>NO RESULTS</h2>
    @endforelse

    </div> --}}
</div>
@endsection
