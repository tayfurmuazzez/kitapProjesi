@extends("layouts.app")
@section("content")
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route("index")}}">Anasayfa</a></li>
                    <li class="active">Sepetim</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--start-ckeckout-->
    <div class="ckeckout">
        <div class="container">
            <div class="ckeck-top heading">
                <h2>SEPETİM</h2>
            </div>
            <div class="ckeckout-top">
                <div class="cart-items">
                    <h3>Toplam Ürün ({{\App\Helper\sepetHelper::count()}})</h3>
                    {{--<script>$(document).ready(function(c) {--}}
                            {{--$('.close1').on('click', function(c){--}}
                                {{--$('.cart-header').fadeOut('slow', function(c){--}}
                                    {{--$('.cart-header').remove();--}}
                                {{--});--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                    {{--<script>$(document).ready(function(c) {--}}
                            {{--$('.close2').on('click', function(c){--}}
                                {{--$('.cart-header1').fadeOut('slow', function(c){--}}
                                    {{--$('.cart-header1').remove();--}}
                                {{--});--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}

                    <div class="in-check" >
                        <ul class="unit">
                            <li><span>Kitap</span></li>
                            <li><span>Kitap Adı</span></li>
                            <li><span>Ürünün Fiyatı</span></li>
                            <li> </li>
                            <div class="clearfix"> </div>
                        </ul>
                        @if(\App\Helper\sepetHelper::totalPrice() != 0)
                        @foreach(\App\Helper\sepetHelper::allList() as $key => $value)
                        <ul class="cart-header">
                            <a href="{{route("basket.remove",["id" => $key])}}"><div class="close1"> </div></a>
                            <li class="ring-in"><img src="{{$value["image"]}}" width="90px;" height="90px;" class="img-responsive" alt=""></li>
                            <li><span class="name">{{$value["name"]}}</span></li>
                            <li><span class="cost">{{$value["fiyat"]}} tl</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @endforeach
                            <a href="{{route("basket.complete")}}" class="add-cart item_add">Alışverişi Tamamla</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-ckeckout-->
    @endsection