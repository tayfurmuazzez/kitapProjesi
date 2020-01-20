@extends("layouts.admin")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary col-md-12" style="display: inherit;">
                            <div class="col-md-10">
                                <h4 class="card-title ">SLİDER RESİMLERİ</h4>
                                <p class="card-category"> LİSTE</p>
                            </div>
                            <div class="col-md-2">
                                <a type="button" href="{{route('admin.slider.create')}}" class="btn btn-success pull-right">Slider Resim Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            Image
                                        </th>
                                        <th>
                                            DÜZENLE
                                        </th>
                                        <th>
                                            SİL
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td><img src="{{asset($value["image"])}}" height="100px" width="100px"></td>
                                            <td><a href="{{route("admin.slider.edit",["id" => $value["id"]])}}">Düzenle</a></td>
                                            <td><a href="{{route("admin.slider.delete",["id" => $value["id"]])}}">Sil</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection