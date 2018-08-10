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
                        <table id="transactions" class="table table-responsive table-responsive table-striped table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Joined</th>
                            </tr>
                            </thead>
                            <tbody>
                            @role('admin')
                            @foreach($members as $serial => $member)
                                <tr>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>{{date('d, D M Y G:i A', strtotime($member->created_at))}}</td>
                                </tr>
                            @endforeach
                            @endrole
                            @role('user')
                            <tr>
                                <td colspan="2">
                                    You do not have the permission to see the information on this page
                                </td>
                            </tr>
                            @endrole
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


