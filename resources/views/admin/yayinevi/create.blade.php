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
                            <h4 class="card-title">YAYIN EVİ EKLE</h4>
                            <p class="card-category">Yayın Evi Oluşturunuz</p>
                        </div>
                        <div class="card-body">
                            <form action ="{{route('admin.yayinevi.create.post')}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Yayın Evi Adı</label>
                                            <input class="form-control" type="text" name="name">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Yayın Evi Ekle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection