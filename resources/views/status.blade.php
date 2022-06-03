@extends('layouts.admin')

@section('content')
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo a la fecha</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ number_format(Auth::user()->consolidateds->sum('value'), '0', ',', '.') }}
                                            <span class="text-success text-sm font-weight-bolder">COP</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Bienvenido,
                                            {{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <form id="reportTransfer" name="reportTransfer" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Selecciona una cuenta
                                            </p>
                                            <div class="form-group">
                                                <select class="form-control" id="account_report" name="account_report"
                                                    placeholder="Seleccione la cuenta" onchange="reports();" required>
                                                    <option value="0">Seleccione la cuenta de Origen</option>
                                                    @foreach (Auth::user()->accounts->where('status', 'Activa') as $account)
                                                        <option value="{{ $account->id }}"> {{ $account->number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p class="text-sm mb-0">
                                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">{{Auth::user()->accounts->where('status','Activa')->count()}} cuentas</span> Activas
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4" id="reportTable" style="display: none">
                <div class="col-lg-10 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Registro de Transferencias</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="transactions">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha Transaccion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                cuenta de origen</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Cuenta destino</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Valor</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Propio o Tercero</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </main>
    <main>
        <div class="container-fluid">
            <div class="row">
                @include('footers.admin')
            </div>
        </div>
    </main>
@endsection
