@extends("layouts.admin")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary col-md-12" style="display: inherit;">
                            <div class="col-md-10">
                                <h4 class="card-title ">SİPARİŞLER</h4>
                                <p class="card-category"> LİSTE</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr><th>ALICI</th>
                                        <th>ADRES</th>
                                        <th>TELEFON</th>
                                        <th>MESAJ</th>
                                        <th>DÜZENLE</th>
                                        <th>SİL</th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{\App\User::getField($value["user_id"],"name")}}</td>
                                            <td>{{$value["adres"]}}</td>
                                            <td>{{$value["telefon"]}}</td>
                                            <td>{{$value["mesaj"]}}</td>
                                            <td><a href="{{route("admin.order.detail",["id" => $value["id"]])}}">Detay</a></td>
                                            <td><a href="{{route("admin.order.delete",["id" => $value["id"]])}}">Sil</a></td>
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