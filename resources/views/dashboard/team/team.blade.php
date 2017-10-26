@extends('layouts.dashboard')

@section('content')
    <h1 class="page-header">Team</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/dashboard/team/create') }}" class="btn btn-primary">ADD a team member</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Position</th>
                        <th>Facebook id</th>
                        <th>LinkedIn ID</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->surname }}</td>
                            <td>{{ $team->position }}</td>
                            <td>{{ $team->facebook }}</td>
                            <td>{{ $team->linked }}</td>
                            <td>
                                <a href="/dashboard/team/{{ $team->id }}/edit">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" onclick="event.preventDefault();
                                            this.children[0].submit();">

                                    <form action="{{ route('team.destroy', $team->id) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection