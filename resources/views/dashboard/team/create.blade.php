@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ url( '/dashboard/team') }}" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control"
                           id="inputName" placeholder="Name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('name') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputSurnameName">Surname</label>
                    <input type="text" name="surname" class="form-control"
                           id="inputSurnameName" placeholder="Surname" value="{{ old('surname') }}">
                    @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('surname') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputPosition">Position</label>
                    <input type="text" name="position" class="form-control"
                           id="inputPosition" placeholder="Position" value="{{ old('position') }}">
                    @if ($errors->has('position'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('position') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputFacebook">Facebook ID</label>
                    <input type="text" name="facebook" class="form-control"
                           id="inputFacebook" placeholder="Facebook ID" value="{{ old('facebook') }}">
                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('facebook') }}
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="inputLinked">LinkedIN ID</label>
                    <input type="text" name="linked" class="form-control"
                           id="inputLinked" placeholder="Facebook ID" value="{{ old('linked') }}">
                    @if ($errors->has('linked'))
                        <span class="help-block">
                            <strong class="text-danger">
                                {{ $errors->first('linked') }}
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

                <button type="submit" class="btn btn-info">CREATE a team member</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>

@endsection