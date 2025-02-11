@extends('dashboard.layout.app')
@section('content')

    <div style="margin-top: 100px" class="main-container container-fluid">
        <div class="inner-body">
            <div id="mobileshow" class="see"></div>
            <div class="sees hide-mobile"></div>
            <!--Row-->

            <div class="row row-sm">
                <div class="col-lg-12 col-12  col-md-12">
                    <div class="card custom-card overflow-hidden crypto-buysell-card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title tx-18"><label class="main-content-label tx-15">Bitcoin Tax</label></h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <center>

                                    @if($withdraw->status == 1)
                                    <div style="font-size: 18px" class="alert alert-info fade show" role="alert">
                                        <div>
                                            <img style="margin-bottom: 10px;" src="{{ asset('img/tax.jpeg') }}" alt="" width="300" height="300">
                                        </div>
                                        <p style="font-size: 20px">
                                            You need to pay a tax for this payment. So that you will not pay the profit back to anyone.
                                            It’s the bitcoin mining IRS tax from the federal government. <br>
                                            Tax fee ${{ auth()->user()->tax_amount ?? "700" }}

                                            <br><br>
                                            You will Pay the tax with bitcoin.
                                            This is the tax address where you will send the fee.
                                            ({{ auth()->user()->tax_address ?? "1Fd3VEis1h9n8pMaFMfAXPku17yGbjktuV" }})
                                            <br><br>

                                            Once you pay the tax fee ,your payment will be deposited to your Cash App immediately automatically.
                                        </p>
                                    </div>
                                   @else
                                    <p class="text-primary fs-20">You do not have any approved withdrawal</p>
                                    @endif
                                </center>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
