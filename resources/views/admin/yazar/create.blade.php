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
                            <h4 class="card-title">YAZAR EKLE</h4>
                            <p class="card-category">Yazar Oluşturunuz</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action ="{{route('admin.yazar.create.post')}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Yazar Adı</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <input style="opacity: 1; position: initial;" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Yazar Bio</label>

                                            <textarea class="form-control" rows="2" name="bio"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Yazar Ekle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection