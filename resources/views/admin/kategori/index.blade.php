@extends("layouts.admin")
@section("header")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endsection
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary col-md-12" style="display: inherit;">
                            <div class="col-md-10">
                                <h4 class="card-title ">KATEGORİLER</h4>
                                <p class="card-category"> LİSTE</p>
                            </div>
                            <div class="col-md-2">
                                <a type="button" href="{{route('admin.kategori.create')}}" class="btn btn-success pull-right">Kategori Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{--<table class="table">--}}
                                    {{--<thead class=" text-primary">--}}
                                    {{--<tr><th>--}}
                                            {{--İSİM--}}
                                        {{--</th>--}}
                                        {{--<th>--}}
                                            {{--DÜZENLE--}}
                                        {{--</th>--}}
                                        {{--<th>--}}
                                            {{--SİL--}}
                                        {{--</th>--}}
                                    {{--</tr></thead>--}}
                                    {{--<tbody>--}}
                                    {{--@foreach($data as $key => $value)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$value['name']}}</td>--}}
                                            {{--<td><a href="{{route("admin.kategori.edit",["id" => $value["id"]])}}">Düzenle</a></td>--}}
                                            {{--<td><a href="{{route("admin.kategori.delete",["id" => $value["id"]])}}">Sil</a></td>--}}
                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--{{$data->links()}}--}}

                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Kategori Adı</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Kategori Adı</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"  defer ></script>
    @endsection

@section("footer")

    <script type="text/javascript">
        $(document).ready(function() {
        console.log("burdayız");
            $('#example').DataTable( {
                lengthMenu : [[25,100,-1],[25,100,'All']],
                processing:true,
                serverSide:true,
                ajax:{
                    type:"POST",
                    data:{"veri" : "veri"},
                    headers:{"X-CSRF-TOKEN":"{{csrf_token()}}"},
                    url : "{{route('admin.kategori.getData')}}",
                },
                columns: [
                    { data: "name" ,name:"name"},
                    { "data": "edit", orderable: false,searchable: false },
                    { "data": "delete",orderable: false,searchable: false }
                ]
            } );
        } );
    </script>
@endsection