@extends("layouts.app")
@section("content")
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="active">Kitap</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    @if(session("status"))
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li class="active">{{session("status")}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    @endif
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-12 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-4 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    {{--<li data-thumb="{{asset(\App\Helper\mHelper::largeImage($data[0]["image"]))}}">--}}
                                        <div class="thumb-image"> <img src="{{asset(\App\Helper\mHelper::largeImage($data[0]["image"]))}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                    {{--</li>--}}
                                </ul>
                            </div>
                            <!-- FlexSlider -->
                            <script src="{{asset('js/imagezoom.js')}}"></script>
                            <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
                            <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

                            <script>
                                // Can also be used with $(document).ready()
                                $(window).load(function() {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-8 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{$data[0]["name"]}}</h2>
                                <h5 class="item_price">{{$data[0]['fiyat']}} lt</h5>
                                <p>{{$data[0]['aciklama']}}</p>
                                <ul class="tag-men">
                                    <li><span>YAZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <span class="women1">: {{\App\Yazarlar::getField($data[0]['yazar_id'],"name")}}</span></li>
                                    <li><span>YAYINEVİ&nbsp;&nbsp;</span>
                                        <span class="women1">: {{\App\YayinEvi::getField($data[0]['yayinevi_id'],"name")}}</span></li>
                                    <li><span>KATEGORİ</span>
                                        <span class="women1">: {{\App\Kategoriler::getField($data[0]['kategori_id'],"name")}}</span></li>
                                </ul>

                                <div class="available">
                                    <ul>
                                        {{--<li>Adet <input class="form-control" name="count" type="number"/></li>--}}
                                        <div class="clearfix"> </div>
                                    </ul>
                                </div>
                                <a href="{{route('basket.add',["id" => $data[0]["id"]])}}" class="add-cart item_add">SEPETE EKLE</a>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="latestproducts">
                        <div class="product-one">
                            {{--@foreach($last_books as $key => $value)--}}
                            {{--<div class="col-md-4 product-left p-left">--}}
                                {{--<div class="product-main simpleCart_shelfItem">--}}
                                    {{--<a href="{{route('kitap.detay',["selflink" => $value->selflink])}}" class="mask"><img class="img-responsive zoom-img" src="{{asset($value->image)}}" alt="" /></a>--}}
                                    {{--<div class="product-bottom">--}}
                                        {{--<h3>{{$value->name}}</h3>--}}
                                        {{--<p>{{\App\Yazarlar::getField($value->yazar_id,"name")}}</p>--}}
                                        {{--<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value->fiyat}} tl</span></h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                            @foreach(\App\Kitaplar::inRandomOrder()->limit(3)->get() as $key => $value)
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{route('kitap.detay',["selflink" => $value->selflink])}}" class="mask"><img class="img-responsive zoom-img" src="{{asset($value->image)}}" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3>{{$value->name}}</h3>
                                        <p>{{\App\Yazarlar::getField($value->yazar_id,"name")}}</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value->fiyat}} tl</span></h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    @endsection