@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Last Month Winner</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">João Figueira</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 178</span>
                <span>Points</span>
                </div>
            </div>
            <div class="col-auto">
                <img class="card-image" src="{{asset('img/boy.png')}}">
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Time until close bets:</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"></i> hours</span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Last Month Winner</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">João Figueira</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 178</span>
                <span>Points</span>
                </div>
            </div>
            <div class="col-auto">
                <img class="card-image" src="{{asset('img/boy.png')}}">
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Time until close bets:</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"></i> hours</span>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <!-- DataTable with Hover -->
    <div class="col-xl-12 col-lg-7 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">STOCKS TO BET ON</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Code</th>
                            <th>Open</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Current</th>
                            <th>Previous Close</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stock_registers as $stock_register)
                        <tr>
                            <td><img style="border-radius: 50%; width:50px" src={{$stock_register->logo_url}}></td>
                            <td>{{$stock_register->stock_code}}</a></td>
                            <td>{{$stock_register->open}}</td>
                            <td>{{$stock_register->high}}</td>
                            <td>{{$stock_register->low}}</td>
                            <td>{{$stock_register->current}}</td>
                            <td>{{$stock_register->previous_close}}</td>
                            <td>
                                <div style="width: 100%; display:flex" class="btn-group-bet">
                                    <form action="bets" method="POST" style="width:50%">
                                        @csrf
                                            <input name="stock_register_id" type="hidden" value={{ $stock_register->id }}>
                                            <input name="bet_value" type="hidden" value="up">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-rocket"></i> Going up</button>
                                    </form>
                                    <form action="bets" method="POST" style="width:50%">
                                        @csrf
                                            <input name="stock_register_id" type="hidden" value={{ $stock_register->id }}>
                                            <input name="bet_value" type="hidden" value="down">
                                            <button type="submit" class="btn btn-danger" > Going down <i
                                                class="fas fa-heart-broken"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">OPEN BETS</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Code</th>
                            <th>Open</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Current</th>
                            <th>Previous Close</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($open_bets as $open_bet)
                        <tr>
                            <td><img style="border-radius: 50%; width:50px" src={{$open_bet->logo_url}}></td>
                            <td>{{$open_bet->stock_code}}</a></td>
                            <td>{{$open_bet->open}}</td>
                            <td>{{$open_bet->high}}</td>
                            <td>{{$open_bet->low}}</td>
                            <td>{{$open_bet->current}}</td>
                            <td>{{$open_bet->previous_close}}</td>
                            <td>
                                <?php if($open_bet->bet_value == "up") : ?>
                                    <button type="submit" class="btn btn-success" disabled><i class="fas fa-rocket"></i></button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-danger" disabled><i class="fas fa-heart-broken"></i></button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!---Container Fluid-->
    </div>
</div>
@endsection
