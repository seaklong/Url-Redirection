@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-link" href="/qrcodes">qrcodes</a>/create</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action={{url('qrcode/store')}} accept-charset="UTF-8"> 
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="your name..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>
                            <div class="col-md-6">
                                <input id="grade" type="input" placeholder="your grade..." class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') }}" required autocomplete="grade">
                                {!!$errors->first("grade", "<span class='text-danger'>:message</span>")!!}
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Local Link') }}</label>
                            <div class="col-md-6">
                                <input id="link" type="input" placeholder="your website link..." class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link">
                                {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                            <div class="col-md-6">
                                <input id="code" type="input" placeholder="your code..." class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">
                                {!!$errors->first("code", "<span class='text-danger'>:message</span>")!!}
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="embedLink" class="col-md-4 col-form-label text-md-right">{{ __('Embed Link') }}</label>
                            <div class="col-md-6">
                                <input id="embedLink" type="input" placeholder="your embed link ..." class="form-control @error('embedLink') is-invalid @enderror" name="embedLink" value="{{ old('embedLink') }}" required autocomplete="embedLink">
                                {!!$errors->first("embedLink", "<span class='text-danger'>:message</span>")!!}
                                @error('embedLink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="youtubeLink" class="col-md-4 col-form-label text-md-right">{{ __('Target Link') }}</label>
                            <div class="col-md-6">
                                <input id="youtubeLink" type="input" placeholder="your youtube link..." class="form-control @error('youtubeLink') is-invalid @enderror" name="youtubeLink" value="{{ old('youtubeLink') }}" required autocomplete="youtubeLink">
                                {!!$errors->first("youtubeLink", "<span class='text-danger'>:message</span>")!!}
                                @error('youtubeLink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6 input-group mb-3"  aria-labelledby="dropdownMenu2">
                                <select class="custom-select" name="status" id="inputGroupSelect02">
                                    <option value="1">Published</option>
                                    <option value="0">Un Published</option>
                                </select>
                           
                                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                                <a class="btn btn-success" href="/qrcodes">
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
