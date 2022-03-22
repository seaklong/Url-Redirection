@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <div class="font-weight-bold"> Total <span class="text-danger">{{$allLinks}}</span> Links</div>
                    Add Redirectioin  
                   
                    <a class="btn btn-primary btn-sm" href="/qrcode/create">
                        <i class="fas fa-plus"></i>
                    </a>                    <br />
                  
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <nav class="navbar">
                        <form method="GET" action={{url('qrcodes')}} role="search" accept-charset="UTF-8" class="form-inline"> 
                            <input class="form-control col-sm-4" type="text" name="code" value="{{ request()->input('code') }}" placeholder="Code" aria-label="code">&nbsp;
                            <input class="form-control col-sm-4" type="text" name="youtubeLink" value="{{ request()->input('youtubeLink') }}" placeholder="Target Link" aria-label="youtubeLink"> &nbsp;
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>

                        <form action="{{ route('importQrcode') }}" method="POST" class="form-inline" enctype="multipart/form-data" id="importForm">
                            @csrf
                            <div class="form-group ">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="form-control mr-sm-2 @error('file') is-invalid @enderror" required id="file">
                                    {!!$errors->first("file", "<span class='text-danger'>:message</span>")!!}
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="custom-file-label" for="file">Choose excel file</label>
                                </div>
                            </div> &nbsp; 
                            <div class="form-group">
                                <select class="custom-select mr-sm-2 @error('invoiceStatus') is-invalid @enderror" required id="invoiceStatus" name="invoiceStatus">
                                    <option value="2">Import & Replace</option>
                                    <option value="1">Import New Codes</option>
                                    <option value="0">Delete</option>
                                </select>
                                {!!$errors->first("invoiceStatus", "<span class='text-danger'>:message</span>")!!}
                                @error('invoiceStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            &nbsp; <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Submit" name="btnImport"> 
                            </div>
                            {{-- <div class="form-group">
                            &nbsp; <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Import" name="btnImport"> 
                            </div>
                            <div class="form-group">
                            &nbsp; <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Delete" name="btnImport"> 
                            </div> --}}
                        </form>
        
                    </nav>
                    <table class="table table-bordered table-hover table-sm col-12">
                        <thead class="thead-light">
                            <tr>
                                {{-- <th scope="col" width="3%">N<sup>o</sup></th> --}}
                                <th scope="col" width="9%">Code</th>
                                <th scope="col">Local Link</th>
                                <th scope="col">Target Link</th>
                                <th scope="col">Embed Link</th>
                                {{-- <th scope="col" width="6%">Grade</th>                              --}}
                                <th scope="col">Description</th>
                                <th scope="col" width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = ($qrcode->currentpage()-1)* $qrcode->perpage() + 1;?>
                            @foreach ($qrcode as $q)
                                <tr>
                                    {{-- <td scope="row">{{ $i++ }}</td> --}}
                                    <td class="text-center">{{ $q->codeksc }}</td>
                                    <td class="text-center">{{ $q->link }}</td>
                                    <td class="text-center">{{ $q->youtubeLink }}</td>
                                    <td class="text-center">{{ $q->embedLink }}</td>
                                    {{-- <td class="text-center">{{ $q->grade }}</td> --}}
                                    <td class="text-center">
                                        <div class="container">
                                            <textarea class="text-area">
                                                {{ $q->name }}
                                            </textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn-sm" href="/qrcode/{{$q->id}}/edit">
                                            <i class="fas fa-edit"></i>
                                        </a>                                           
                                        @if($q->status == 1)
                                            <input type="button" class="disable btn btn-success btn-sm" data-status="{{ $q->status}}" data-id="{{$q->id}}" value="Disable" />                       
                                        @elseif($q->status == 0)
                                            <input type="button" class="disable btn btn-danger btn-sm" data-status="{{ $q->status}}" data-id="{{$q->id}}" value="Enable" />                       
                                        @endif
                                        {{-- <input type="button" class="delete btn btn-warning btn-sm" data-id="{{$q->id}}" value="Delete" /> --}}
                                        <button type="button" class="delete btn btn-sm text-danger" data-id="{{$q->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $qrcode->links('pagination::bootstrap-4') }}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;
    table-layout: fixed;
}
.text-area {
    width: 100%;
    margin: 5px;
}

</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script language = "javascript" type = "text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

     $('body').on('click', '.disable', function (event) {
            var id = $(this).data('id');
            var status = $(this).data('status');
            if(status==1)
            {
                var checkstatus = 0;
                var text = 'Disable';
            }else{
                var checkstatus = 1;
                var text = 'Enable';
            }
            var sms = "Are you sure for "+text+" this qrcode?"
            var checkstr =  confirm(sms);
            if(checkstr == true){
                $.ajax({
                    url: 'disableQrcode/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        status: checkstatus,
                    },
                    dataType: 'json',
                    success: function (data) {
                        
                        location.reload();  
                    }
                });
            }else{
                return false;
            }
        });

        $('body').on('click', '.delete', function (event) {
            var id = $(this).data('id');
        
            var sms = "Are you sure for delete this redirectioin?"
            var checkstr =  confirm(sms);
            if(checkstr == true){
                $.ajax({
                    url: 'deleteQrcode/' + id,
                    type: "POST",
                    data: {
                        id: id                    },
                    dataType: 'json',
                    success: function (data) {
                        
                        location.reload();  
                    }
                });
            }else{
                return false;
            }
        });

    });

</script>      
