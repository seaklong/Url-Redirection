@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-right">                        
                        <a class="btn btn-success btn-sm" href="/users/create">
                            Add  
                        </a>
                    </div>
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                            @foreach ($users as $u)
                                <tr>
                                    <td scope="row" width="3%">{{ $i++ }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td class="text-right">{{ $u->email }}</td>
                                    <td class="text-right">
                                    @if ($u->is_admin == 1)
                                        Supper Admin
                                    @elseif($u->is_admin == 2)
                                        Finance
                                    @elseif($u->is_admin == 3)
                                        Sell
                                    @elseif($u->is_admin == 4)
                                        Users
                                    @endif
                                    </td>
                                    <td class="text-right">{{ date('d-m-Y', strtotime($u->created_at))}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/users/{{$u->id}}/edit">
                                            Edit 
                                        </a>       
                                        <a class="btn btn-success btn-sm" href="/changePwd/{{$u->id}}" >
                                            Change Password  
                                        </a> 
                                        @if(auth()->user()->email != $u->email )
                                            @if($u->status == 1)
                                                <input type="button" class="disable btn btn-warning btn-sm" data-status="{{ $u->status}}" data-id="{{$u->id}}" value="Disable" />                       
                                            @elseif($u->status == 0)
                                                <input type="button" class="disable btn btn-danger btn-sm" data-status="{{ $u->status}}" data-id="{{$u->id}}" value="Enable" />                       
                                            @endif
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="storage/jquery-3.3.1.js"></script>
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
            var sms = "Are you sure for "+text+" this user?"
            var checkstr =  confirm(sms);
            if(checkstr == true){
               // alert(id);
                $.ajax({
                    url: 'disableUser/' + id,
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

    });

</script>      
