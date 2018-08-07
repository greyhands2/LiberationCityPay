@extends('layouts.app')

@section('title') Transaction logs @endsection

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
@endsection

@section('content')
<div class="container" style="margin-top:30px; ">
    <div class="row">
        @role('admin')
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Successful Payments </h3>
                    <p>&#x20a6; {{number_format(($allSuccessfulTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Tithe Payments </h3>
                    <p>&#x20a6; {{number_format(($allSuccessfulTitheTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Offering Payments </h3>
                    <p>&#x20a6; {{number_format(($allSuccessfulOfferingTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left  p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Partners Payments </h3>
                    <p>&#x20a6;  {{number_format(($allSuccessfulPartnersTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        @endrole

        @role('user')
        <div class="col-md-3">
            <div class="card bg-secondary text-white text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Successful Payments </h3>
                    <p>&#x20a6; {{number_format(($allUserSuccessfulTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Tithe Payments </h3>
                    <p>&#x20a6; {{number_format(($allUserSuccessfulTitheTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Offering Payments </h3>
                    <p>&#x20a6; {{number_format(($allUserSuccessfulOfferingTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-left p-3">
                <blockquote class="blockquote mb-0">
                    <h3 class="card-title"> Partners Payments </h3>
                    <p>&#x20a6; {{number_format(($allUserSuccessfulPartnersTransactionsAmount / 100),2)}}</p>
                </blockquote>
            </div>
        </div>
        @endrole
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transactions Log</h5>
                    <table id="transactions" class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount (&#x20a6;)</th>
                            <th>Status</th>
                            <th>Response Code</th>
                            <th>Response Description</th>
                            <th>Date/Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @role('admin')
                        @foreach($allTransactions as $serial => $transaction)
                            <tr>
                                <td>{{$transaction->user->name}}</td>
                                <td>{{$paymentTypes[$transaction->payment_type_id]->name}}</td>
                                <td>{{number_format($transaction->amount,2)}}</td>
                                <td id="status_{{$transaction->id}}">
                                    @if($transaction->response_code == "00")
                                        <span class="badge badge-success"> Success </span>
                                    @else
                                        <span class="badge badge-secondary"> Pending</span>
                                    @endif
                                </td>
                                <td id="response_code_{{$transaction->id}}">
                                    {{$transaction->response_code}}
                                </td>
                                <td id="response_description_{{$transaction->response_description}}">
                                    {{$transaction->response_description}}
                                </td>
                                <td>
                                    {{date('d, D M Y G:i A',strtotime($transaction->created_at))}}
                                </td>
                                <td>
                                    @if($transaction->response_code != "00")
                                        <button class="btn btn-primary requery" value="{{$transaction->id}}"> Requery
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endrole
                        @role('user')
                        @foreach($allUserTransactions as $serial => $transaction)
                            <tr>
                                <td>{{$transaction->user->name}}</td>
                                <td>{{$paymentTypes[$transaction->payment_type_id]->name}}</td>
                                <td>{{number_format($transaction->amount,2)}}</td>
                                <td id="status_{{$transaction->id}}">
                                    @if($transaction->response_code == "00")
                                        <span class="badge badge-success"> Success </span>
                                    @else
                                        <span class="badge badge-secondary"> Pending</span>
                                    @endif
                                </td>
                                <td id="response_code_{{$transaction->id}}">
                                    {{$transaction->response_code}}
                                </td>
                                <td id="response_description_{{$transaction->response_description}}">
                                    {{$transaction->response_description}}
                                </td>
                                <td>
                                    {{date('d, D M Y G:i A',strtotime($transaction->created_at))}}
                                </td>
                                <td>
                                    @if($transaction->response_code != "00")
                                        <button class="btn btn-primary requery" value="{{$transaction->id}}"> Requery
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endrole
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
