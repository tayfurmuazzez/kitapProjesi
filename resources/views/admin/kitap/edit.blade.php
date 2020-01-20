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
                            <h4 class="card-title">KİTAP DÜZENLE</h4>
                            <p class="card-category">{{$data[0]["name"]}}</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action ="{{route('admin.kitap.edit.post',["id" => $data[0]["id"]])}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kitap Adı</label>
                                            <input class="form-control" type="text" name="name" value="{{$data[0]["name"]}}" placeholder="{{$data[0]["name"]}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kitap Yazarı</label><br>
                                            <select name="yazar_id" class="form-control">
                                                @foreach($yazarlar as $key => $value)
                                                    <option value="{{$value["id"]}}" @if($data[0]["yazar_id"] == $value["id"]) selected @endif>{{$value["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kitap Yayınevi</label><br>
                                            <select name="yayinevi_id" class="form-control">
                                                @foreach($yayinevleri as $key => $value)
                                                    <option value="{{$value["id"]}}" @if($data[0]["yayinevi_id"] == $value["id"]) selected @endif>{{$value["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kategori</label><br>
                                            <select name="kategori_id" class="form-control">
                                                @foreach($kategoriler as $key => $value)
                                                    <option value="{{$value["id"]}}" @if($data[0]["kategori_id"] == $value["id"]) selected @endif>{{$value["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            @if($data[0]['image'] != "")
                                                <img src="{{asset($data[0]["image"])}}" height="90px;" width="90px;" />
                                            @endif
                                            <input style="opacity: 1; position: initial;" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kitap Fiyatı</label>
                                            <input class="form-control" type="text" name="fiyat" value="{{$data[0]["fiyat"]}}" placeholder="{{$data[0]["fiyat"]}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Açıklama</label>

                                            <textarea class="form-control" rows="2" name="aciklama">{{$data[0]["aciklama"]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Kitap Düzenle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection