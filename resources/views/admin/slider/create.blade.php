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
                            <h4 class="card-title">SLİDER RESİM EKLE</h4>
                            <p class="card-category">Resim Oluşturunuz</p>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action ="{{route('admin.slider.create.post')}}" method="POST">
                                {{--csrf_field yazmazsak post işlemi gerçekleşmez--}}
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <input style="opacity: 1; position: initial;" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Slider Resim Ekle</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection