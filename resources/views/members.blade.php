@extends('layouts.app')

@section('title') Members @endsection

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
    <div class="container" style="margin-top:30px; ">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Members</h5>
                        <table id="transactions" class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @role('admin')
                            @foreach($members as $serial => $member)
                                <tr>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->name}}</td>
                                </tr>
                            @endforeach
                            @endrole
                            @role('user')
                            <tr>
                                <td colspan="2">
                                    You do not have the permission to see the information on this page
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $("#transactions").datatable({
                bSort: false
            });
            $('table #transactions').on('click', '.requery', function () {
                var id = $(this).val();
                axios.post('/requery', {
                    id: id
                })
                    .then(function (response) {
                        console.log(response.data)
                    })
                    .catch(function (error) {
                        console.log(error.response.data)
                    })
                _
            })
        })
    </script>
@endsection
