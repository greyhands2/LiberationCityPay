@extends('layouts.app')

@section('title') Transaction logs @endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
@endsection

@section('content')
    <div class="container" style="margin-top:30px; ">
        <div class="row">
            @role('admin')
            <div class="col-md-3">
                <div class="card bg-secondary text-white text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Successful</h3>
                        <p>&#x20a6; {{number_format(($allSuccessfulTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Tithe</h3>
                        <p>&#x20a6; {{number_format(($allSuccessfulTitheTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Offering</h3>
                        <p>&#x20a6; {{number_format(($allSuccessfulOfferingTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left  p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Partners </h3>
                        <p>&#x20a6; {{number_format(($allSuccessfulPartnersTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            @endrole

            @role('user')
            <div class="col-md-3">
                <div class="card bg-secondary text-white text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Successful</h3>
                        <p>&#x20a6; {{number_format(($allUserSuccessfulTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Tithe</h3>
                        <p>&#x20a6; {{number_format(($allUserSuccessfulTitheTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Offering</h3>
                        <p>&#x20a6; {{number_format(($allUserSuccessfulOfferingTransactionsAmount / 100),2)}}</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-left p-3">
                    <blockquote class="blockquote mb-0">
                        <h3 class="card-title"> Partners</h3>
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
                        <table id="transactions" class="table table-responsive table-striped table-bordered">
                            <thead class="bg-secondary">
                            <tr>
                                <th>#</th>
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
                                    <td>{{$serial+1}}</td>
                                    <td>{{$transaction->user->name}}</td>
                                    <td>{{$paymentTypes[($transaction->payment_type_id - 1)]->name}}</td>
                                    <td>{{number_format(($transaction->amount/100),2)}}</td>
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
                                            <button class="btn btn-secondary btn-sm requery" id="button_{{$transaction->id}}" type="button"
                                                    value="{{$transaction->id}}"> Requery
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @endrole
                            @role('user')
                            @foreach($allUserTransactions as $serial => $transaction)
                                <tr>
                                    <td>{{$serial+1}}</td>
                                    <td>--</td>
                                    <td>{{$paymentTypes[($transaction->payment_type_id - 1)]->name}}</td>
                                    <td>{{number_format(($transaction->amount/100),2)}}</td>
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
                                            <button class="btn btn-secondary btn-sm requery" id="button_{{$transaction->id}}" type="button"
                                                    value="{{$transaction->id}}"> Requery
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.requery').on('click', function () {
                var id = $(this).val();
                $("#button_"+id).prop('disabled',true);
                toastr.info('Getting transaction information, please hold on...');
                axios.get('/requery/'+id)
                    .then(function (response) {
                        var code = response.data.data.response_code;
                            var description = response.data.data.response_description;
                        toastr.success('Information retrieved');
                        $('#response_code_'+id).html(code);
                        $('#response_description_'+id).html(description);
                        if(code == "00" || code == "10" || code == "11"){
                            toastr.success(description);
                            $("#button_"+id).addClass('hidden');
                            $("#status_"+id).html('<span class="badge badge-success">Success</span>');
                        }else{
                            $("#button_"+id).prop('disabled',false);
                            toastr.info(description);
                        }
                        console.log(response.data)
                    })
                    .catch(function (error) {
                        toastr.error('Unable to retrieve information');
                        $("#button_"+id).prop('disabled',false);
                        console.log(error.response.data)
                    })
            })
        })
    </script>
@endsection
