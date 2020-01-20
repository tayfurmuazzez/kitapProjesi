@extends("layouts.admin")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session('status'))
                        <div class="alert alert-primary" role = "alert">
                            {{session('status')}}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">SİPARİŞ DETAYI</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>ALICI : <b>{{\App\User::getField($data[0]["user_id"],"name")}}</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>ADRES : <b>{{$data[0]["adres"]}}</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>TELEFON : <b>{{$data[0]["telefon"]}}</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>MESAJ : <b>{{$data[0]["mesaj"]}}</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label>ÜRÜNLER :
                                                    <table class="table table-bordered table-responsive"><thead><tr><th>Kitap</th><th>Kitap Adı</th><th>Kitap Fiyatı</th></tr></thead><tbody>
                                                @foreach(json_decode($data[0]["json"],true) as $key => $value)
                                                    <tr>
                                                        <td><img src="{{asset($value["image"])}}" width="90px;" height="90px;"></td>
                                                        <td>{{$value["name"]}}</td>
                                                        <td>{{$value["fiyat"]}}</td>
                                                    </tr>
                                                    @endforeach
                                                <td></td>
                                                <td style="text-align: right;">TOPLAM SİPARİŞ BEDELİ:</td>
                                                <td>{{collect(json_decode($data[0]["json"],true))->sum("fiyat")}} tl</td>
                                                        </tbody>
                                                    </table>
                                                </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection