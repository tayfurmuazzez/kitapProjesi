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
                            <h4 class="card-title">YAZAR DÜZENLE</h4>
                            <p class="card-category">{{$data[0]["name"]}}</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action ="{{route('admin.yazar.edit.post',["id" => $data[0]["id"]])}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Yazar Adı</label>
                                            <input class="form-control" type="text" name="name" value="{{$data[0]['name']}}" placeholder="{{$data[0]["name"]}}">
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
                                            <label class="bmd-label-floating">Yazar Bio</label>
                                            <textarea class="form-control" rows="2" name="bio" placeholder="{{$data[0]['bio']}}">{{$data[0]['bio']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Yazar Düzenle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection