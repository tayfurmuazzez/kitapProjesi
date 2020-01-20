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
                            <h4 class="card-title">KATEGORİ DÜZENLE</h4>
                            <p class="card-category">{{$data[0]["name"]}}</p>
                        </div>
                        <div class="card-body">
                            <form action ="{{route('admin.kategori.edit.post',["id" => $data[0]["id"]])}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Kategori Adı</label>
                                            <input class="form-control" type="text" name="name" value="{{$data[0]["name"]}}" placeholder="{{$data[0]["name"]}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Kategori Düzenle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection