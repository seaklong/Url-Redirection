<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ខ្ញុំ​អាច​ជួយ​កូនៗរបស់​អ្នក​ឱ្យ​ចេះសរសេរអក្សរ​ និងធ្វើលំហាត់​គណិតវិទ្យា">
    <meta name="kounsvachhlat" content="ខ្ញុំ​អាច​ជួយ​កូនៗរបស់​អ្នក​ឱ្យ​ចេះសរសេរអក្សរ​ និងធ្វើលំហាត់​គណិតវិទ្យា">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="icon" href="" sizes="192x192" />
    <!-- load bootstrap from a cdn -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container" id="page-order">

    <header class="header">
        <div class="inner-wrap row">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="<?= asset("storage/01_smart_monkey_Main-Logo.png")?>"></img>
            </a>
            <p id="site-description">"ខ្ញុំ​អាច​ជួយ​កូនៗរបស់​អ្នក​ឱ្យ​ចេះសរសេរអក្សរ​ និងធ្វើលំហាត់​គណិតវិទ្យា!"</p>
        </div>

        {{-- <div class="navbar">
            <div class="navbar-inner">
                <a id="logo" href="/">Single Malt</a>
                <ul class="nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div> --}}
        <?php
/*
        $url =  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $linkHttp = str_replace( 'https://', 'http://', $url );
        $getYoutubeLink = \App\Models\Qrcode::select('youtubeLink')->where('link','=',$linkHttp);
            if ($getYoutubeLink->get()->count() > 0) {

                $newLink = $getYoutubeLink->first()->youtubeLink;
                header("Location: $newLink");
                exit;
                
            }
            */
        ?>

    </header>

    <div id="main" class="container-fluid">

        <!-- main content -->
        <div id="content" class="col-md-12">
            @yield('content')
        </div>

    </div>

    <footer class="row footer">
        <div id="copyright text-right">
            <p>
                ផ្ទះលេខ៨ ផ្លូវ ៣៥២ បឹងកេងកង១ ខណ្ឌចម្ការមន រាជធានីភ្នំពេញ<br />
                អ៊ីមែល : kounsvachhlat@open.org.kh<br />
                FB :   កូនស្វាឆ្លាត-kounsvachlat</div>
            </p>
        </div>
    </footer>

</div>
</body>
<style>
    body{
        background-color:#eaeaea;
    }
    #page-order{
        max-width:1200px;
        margin:0 auto;
        background-color:#FFF;
    }
    .inner-wrap{
        
        max-width:1140px;
        margin:0 auto;
        
    }
    #site-description {
        line-height: 24px;
        font-size: 16px;
        color: #666666;
        padding-bottom: 0px;
        font-family: 'Open Sans', serif;
    }
    .header{
        border-bottom:2px solid #CCC;
        padding:20px;
    }
    .footer{
        padding:20px;
        height:100px;
        border-top:2px solid #CCC;
        background-color:#303440;
        color:#FFF;
    }
    #content{
        padding:15px;
    }
    .margin15{
        margin:15px;
    }
</style>
</html>
