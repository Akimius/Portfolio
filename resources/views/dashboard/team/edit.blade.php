@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName"
                           placeholder="Name" value="{{ $team->name }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('name') }}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputSurname">Surname</label>
                    <input type="text" name="surname" class="form-control" id="inputSurname"
                           placeholder="Surname" value="{{ $team->surname }}">
                    @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('surname') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputPostion">Position</label>
                    <input type="text" name="position" class="form-control" id="inputPosition"
                           placeholder="Position" value="{{ $team->position }}">
                    @if ($errors->has('position'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('position') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputPreview">Preview</label>
                    <input type="file" class="form-control" id="inputPreview" placeholder="Prview" name="preview">
                    @if ($errors->has('preview'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('preview') }}
                            </strong>
                        </span>
                    @endif
                </div>

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="patch">
                <button type="submit" class="btn btn-info">UPDATE</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>

@endsection