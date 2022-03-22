@extends('layouts.front')

@section('title', 'Page Title')

@section('content')
<div class="container-fluid col-10" >
    
    <form> 
        {{-- {{ csrf_field() }}
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="Name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone1" class="col-sm-2 col-form-label">Phone1</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="phone1" name="phone1" placeholder="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone2" class="col-sm-2 col-form-label">Phone2</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="phone2" name="phone2" placeholder="phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="province" class="col-sm-2 col-form-label">Province</label>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="provinceSelect" name="province">
                    <option selected>Choose province</option>
                @foreach ($province as $p)
                    <option value="{{ $p->id }}">{{ $p->nameKH }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="district" class="col-sm-2 col-form-label">District</label>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="districtSelect" name="district">
                    <option value="" selected>Choose District</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" placeholder="Your Email">
            </div>
        </div> --}}
        <div class="container row">
            {{-- <div class="col-6 alert alert-primary">
                <ul class="list-group">
                    <li class="list-group-item">កញ្ចប់ <b>អ</b>​ (៦ក្បាល) តំលៃ ១៨០០០៛</li>
                    <li class="list-group-item">កញ្ចប់ <b>គ</b>​ (៤ក្បាល) តំលៃ ១២០០០៛</li>
                    <li class="list-group-item">កញ្ចប់ <b>ន</b>​ (៤ក្បាល) តំលៃ ១២០០០៛</li>
                    <li class="list-group-item">កញ្ចប់ <b>ស</b>​ (៦ក្បាល) តំលៃ ១៥០០០៛</li>
                    <li class="list-group-item">កញ្ចប់ <b>ល</b>​ (២ក្បាល) តំលៃ ៥០០០៛</li>
                    <li class="list-group-item">កញ្ចប់ <b>ខ</b> (៤ក្បាល) តំលៃ ១០០០០៛</li>
                </ul>
            </div> --}}
            <div class="col-6">

                <div class="form-group row">
                    <div class="col-sm-12 col-form-label alert alert-danger text-center"​ style="margin:0 10px 0 10px;" id="errmsg" role="alert">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="A" class="col-sm-6 col-form-label">កញ្ចប់ <b>អ</b>​ (៦ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="A" name="A" placeholder="ចំនួនកញ្ចប់">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ko" class="col-sm-6 col-form-label">កញ្ចប់ <b>គ</b>​ (៤ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="Ko" name="Ko" placeholder="ចំនួនកញ្ចប់">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="No" class="col-sm-6 col-form-label">កញ្ចាប់ <b>ន</b>​ (៤ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="No" name="No" placeholder="ចំនួនកញ្ចប់">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="S" class="col-sm-6 col-form-label">កញ្ចប់ <b>ស</b> (៦ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="S" name="S" placeholder="ចំនួនកញ្ចាប់">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="KH" class="col-sm-6 col-form-label">កញ្ចប់ <b>ល</b>​ (២ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="KH" name="KH" placeholder="ចំនួនកញ្ចប់">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Lo" class="col-sm-6 col-form-label">កញ្ចប់ <b>ខ</b> (៤ក្បាល)៖</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="Lo" name="Lo" placeholder="ចំនួនកញ្ចប់">
                    </div>
                </div>
            </div>
        </div>
        <div class="container row">
            {{-- <div class="col-6 alert alert-primary text-center">
                ប្រសិនបើតំលៃសរុប >= 6លាន នឹងមានការបញ្ចុះតំលៃចំនួន 30% តែបើសិន < 6លាន នឹងមានការបញ្ចុះតំលៃចំនួន 25%
            </div> --}}
            <div class="col-6">
                <div class="form-group row">
                    <label for="A" class="col-sm-5 col-form-label font-weight-bold">Sub Total:</label>
                    <div class="col-sm-7">
                        <input type="text" id="subtotal" class="form-control" name="subtotal" placeholder="តំលៃសរុបមិនទាន់ Discount" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="A" class="col-sm-5 col-form-label font-weight-bold">Discount</label>
                    <div class="col-sm-2">
                        <input type="text" id="discount" class="form-control-plaintext font-weight-bold text-danger" name="discount" readonly>
                    </div>
                    <div class="col-sm-1 font-weight-bold text-danger">
                        %
                    </div>
                </div>
                <div class="form-group row">
                    <label for="A" class="col-sm-5 col-form-label font-weight-bold">Total:</label>
                    <div class="col-sm-7">
                        <input type="text" id="total" class="form-control" name="total" placeholder="តំលៃសរុបបន្ទាប់ពី Discount" readonly>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="row">
            <div class="col-3">
                <label for="sendby">Send by</label>
                <select class="custom-select mr-sm-2" id="sendby" name="sendby">
                    <option selected value="">Choose...</option>
                    <option value="capitol">Capitol</option>
                    <option value="virakBuntham">Virak Buntham</option>
                    <option value="taxi">Taxi</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col" id="businfo">
                <label for="businfo">To</label>
                <input type="text" class="form-control" name="businfo" placeholder="ផ្ញើរទៅ">
            </div>
            <div class="col" id="sendtoPhone">
                <label for="sendtoPhone">Send To Phone:</label>
                <input type="text" class="form-control" name="sendtoPhone" placeholder="ផ្ញើរទៅលេខ">
            </div>            
            <div class="col-3" id="taxiphone">
                <label for="taxiphone">Phone:</label>
                <input type="text" class="form-control" name="taxiphone" placeholder="Taxi phone">
            </div>
            <div class="col-9" id="otherinfo">
                <label for="otherinfo">Explain:</label>
                <input type="text" class="form-control" name="otherinfo" placeholder="Explain">
            </div>
        </div><br /> --}}
        <div class="row">
            <div class="col text-center">
                  <button type="submit" class="btn btn-primary col-md-4">Order Now</button>
            </div>
        </div> 
        
    </form>
</div>
@endsection
<style>
    #businfo,#taxiphone,#sendtoPhone,#otherinfo,#errmsg{
        display:none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#provinceSelect').change(function(){
            var sid = $(this).val();

            if(sid){
                $.ajax({
                    type:"get",
                    url:"/getDistrict/"+sid,
                    dataType: 'json',

                    success:function(data)
                    { 
                        if(data){
                            var layout = '<option value="" selected>Choose District</option>';
                            $.each(data,function(key,value){
                            layout += '<option value='+value.id+'>'+value.nameKH+'</option>';
                            });
                            $('#districtSelect').html(layout);
                        
                        }
                    }

                });
            }
        }); 

        $('#Ko, #A, #No, #S, #KH, #Lo').keyup(function(){
            var Ko = parseFloat($('#Ko').val()) || 0;
            var A = parseFloat($('#A').val()) || 0;
            var No = parseFloat($('#No').val()) || 0;
            var S = parseFloat($('#S').val()) || 0;
            var KH = parseFloat($('#KH').val()) || 0;
            var Lo = parseFloat($('#Lo').val()) || 0;

            var val1 = Ko*12000;
            var val2 = A*18000;
            var val3 = No*12000;
            var val4 = S*16000;
            var val5 = KH*10000;
            var val6 = Lo*6000;

            var subtotal = $('#subtotal').val(val1 + val2 + val3 + val4 + val5 + val6);

            var discount = 0;
            var subtotalPrice = subtotal.val();
            var totalPrice = 0;

            if(subtotalPrice < 6000000)
            {
                var discount = 25;   
            }else{
                var discount = 30;
            }

            var totalPrice = ( subtotalPrice * discount) / 100;
            var priceAfterDiscount = subtotalPrice - totalPrice;

            $('#discount').val(discount);
            $('#total').val(priceAfterDiscount);
            
        });

        $("#sendby").change(function(){
            var sendby = $("#sendby").val(); //$(this).val(); 
                
            if(sendby === 'capitol' || sendby === 'virakBuntham')
            {
                $("#businfo").show();
                $("#sendtoPhone").show();
                $("#taxiphone").hide();
                $("#taxiphone").val('');
                $("#otherinfo").hide();
                $("#otherinfo").val('');
            }
            if(sendby === 'taxi')
            {
                $("#taxiphone").show();
                $("#businfo").hide();
                $("#sendtoPhone").hide();
                $("#businfo").val('');
                $("#sendtoPhone").val('');
                $("#otherinfo").hide();
                $("#otherinfo").val('');
            }
            if(sendby === '')
            {
                $("#businfo").hide();
                $("#sendtoPhone").hide();
                $("#taxiphone").hide();
                $("#taxiphone").val('');
                $("#businfo").val('');
                $("#sendtoPhone").val('');
                $("#otherinfo").hide();
                $("#otherinfo").val('');
            }
            if(sendby === 'other')
            {
                $("#otherinfo").show();
                $("#businfo").hide();
                $("#sendtoPhone").hide();
                $("#taxiphone").hide();
                $("#businfo").val('');
                $("#sendtoPhone").val('');
                $("#taxiphone").val('');
            }
        });

          $(".number").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("សូមបញ្ចូលចំនួនជាលេខ").show();
                        return false;
                }
            });

    });
</script>