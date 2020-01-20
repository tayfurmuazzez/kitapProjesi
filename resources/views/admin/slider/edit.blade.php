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
                            <h4 class="card-title">SLİDER DÜZENLE</h4>
                            <p class="card-category">--</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action ="{{route('admin.slider.edit.post',["id" => $data[0]["id"]])}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}
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
                                <button type="submit" class="btn btn-primary pull-right">Slider Düzenle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection