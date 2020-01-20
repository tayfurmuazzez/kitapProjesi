@extends("layouts.admin")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary col-md-12" style="display: inherit;">
                            <div class="col-md-10">
                                <h4 class="card-title ">YAZARLAR</h4>
                                <p class="card-category"> LİSTE</p>
                            </div>
                            <div class="col-md-2">
                                <a type="button" href="{{route('admin.yazar.create')}}" class="btn btn-success pull-right">Yazar Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            İSİM
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
                                            <td>{{$value['name']}}</td>
                                            <td><a href="{{route("admin.yazar.edit",["id" => $value["id"]])}}">Düzenle</a></td>
                                            <td><a href="{{route("admin.yazar.delete",["id" => $value["id"]])}}">Sil</a></td>
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