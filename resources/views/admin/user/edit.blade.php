@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-link" href="/users">Users</a>/ Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ method_field('PUT') }}
    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input name="id" id="id" value={{ $user->id }} type="hidden" />
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user->name) ? $user->name : '' }}" required autocomplete="name" autofocus>
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Rule</label>

                            <div class="col-md-6">
                                <select class="dropdown" name="is_admin" id="is_admin" >
                                    <option value=""> Select Rule </option>
                                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Super Admin</option>
                                    <option value="2" {{ $user->is_admin == 2 ? 'selected' : '' }}>Finance</option>
                                    <option value="3" {{ $user->is_admin == 3 ? 'selected' : '' }}>Sell</option>
                                    <option value="4" {{ $user->is_admin == 4 ? 'selected' : '' }}>User</option>
                                </select>
                                {!!$errors->first("is_admin", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a class="btn btn-success" href="/users">
                                    Cancel 
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
