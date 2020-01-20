@extends("layouts.app")
@section("content")
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route("index")}}">Anasayfa</a></li>
                    <li class="active">Alışverişi Tamamla</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--contact-start-->
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>BİLGİLERİ DOLDURUNUZ</h2>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="breadcrumbs-main">
                        <ol class="breadcrumb">
                            <li class="active">{{session("status")}}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form action="{{route("basket.completeStore")}}" method="post">
                        @csrf
                        <input type="text" placeholder="Name" required="" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error->first("name") }}</strong>
                                    </span>
                        @enderror
                        <input type="text" placeholder="Phone"  required="" name="telefon">
                        @error('telefon')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error->first("telefon") }}</strong>
                                    </span>
                        @enderror
                        <input type="text"  placeholder="Mesaj" required="" name="mesaj">
                        @error('mesaj')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error->first("mesaj") }}</strong>
                                    </span>
                        @enderror
                        <textarea placeholder="Adres" required="" name="adres"></textarea>
                        @error('adres')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error->first("adres") }}</strong>
                                    </span>
                        @enderror
                        <div class="submit-btn">
                            <input type="submit" value="TAMAMLA">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--contact-end-->
    @endsection