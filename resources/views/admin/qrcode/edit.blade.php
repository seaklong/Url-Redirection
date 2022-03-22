@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-link" href="/qrcodes">Qrcodes</a>/ Edit</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('qrcode.update', $qrcode->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input name="id" id="id" value={{ $qrcode->id }} type="hidden" />
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($qrcode->name) ? $qrcode->name : '' }}" required autocomplete="name" autofocus>
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
                                <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ isset($qrcode->grade) ? $qrcode->grade : '' }}" required autocomplete="grade" autofocus>
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
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ isset($qrcode->link) ? $qrcode->link : '' }}" required autocomplete="link" autofocus>
                                {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codeksc" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                            <div class="col-md-6">
                                <input id="codeksc" type="text" class="form-control @error('codeksc') is-invalid @enderror" name="codeksc" value="{{ isset($qrcode->codeksc) ? $qrcode->codeksc : '' }}" required autocomplete="codeksc" autofocus>
                                {!!$errors->first("codeksc", "<span class='text-danger'>:message</span>")!!}
                                @error('codeksc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="embedLink" class="col-md-4 col-form-label text-md-right">{{ __('Embed Link') }}</label>
                            <div class="col-md-6">
                                <input id="embedLink" type="text" class="form-control @error('embedLink') is-invalid @enderror" name="embedLink" value="{{ isset($qrcode->embedLink) ? $qrcode->embedLink : '' }}" required autocomplete="embedLink" autofocus>
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
                                <input id="youtubeLink" type="text" class="form-control @error('youtubeLink') is-invalid @enderror" name="youtubeLink" value="{{ isset($qrcode->youtubeLink) ? $qrcode->youtubeLink : '' }}" required autocomplete="youtubeLink" autofocus>
                                {!!$errors->first("youtubeLink", "<span class='text-danger'>:message</span>")!!}
                                @error('youtubeLink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select class="dropdown" name="status" id="status" >
                                    <option value=""> Select Status </option>
                                    <option value="1" {{ $qrcode->status == 1 ? 'selected' : '' }}>Published</option>
                                    <option value="0" {{ $qrcode->status == 0 ? 'selected' : '' }}>Un Published</option>
                                </select>
                                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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









