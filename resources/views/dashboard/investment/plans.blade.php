@extends('dashboard.layout.app')
@section('content')

    <div style="margin-top: 50px;" class="main-container container-fluid">
        <div class="inner-body">
            <div id="mobileshow" class="see"></div>
            <div class="sees hide-mobile"></div>
            <!--Row-->

            <div class="row row-sm">
                <div class="col-md-12 col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">	<div>
                                <h6 class="main-content-label mb-1"> Investment Package</h6><br>
                                <h6 class="text-success">Note</h6>
                                <p> Tap on any of the Plans below to purchase a plan.</p>
                                <p> Your investment will start growing automatically after purchase .</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="alert alert-info fade show" role="alert">
                <center style="color:green;">Bal:	{{ auth()->user()->currency }}@money(auth()->user()->balance)</center>

            </div>

            <div class="row row-sm">

                @foreach($plans as $item)
                    <div class="col-xxl-4 col-lg-4 col-sm-12 col-md-12">
                        <div class="card card-pricing custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mb-0">
                                        <h5 class="fs-16 tx-medium text-uppercase">{{ $item->name }}</h5>
                                        <h2 class="mt-2 mb-0 text-primary">{{ auth()->user()->currency }}@money($item->min_deposit) <span class="text-info fs-18">/ {{ auth()->user()->currency }}@money($item->max_deposit)</span></h2>
                                        <p class="text-dark mt-3 mb-0 fs-14">High ROI After Trading Session</p>
                                    </div>
                                    <div class="text-end ms-auto">
                                        <span class="badge bg-primary-light">Try It Now</span>
                                    </div>
                                </div>
                                <hr class="message-inner-separator">
                                <div class="pricingContent1">
                                    <ul>
                                        <li class="pt-1"><i class="fa fa-check-circle me-2 text-success bg-success-transparent font-weight-bold p-1 tx-12 rounded-circle"></i><span class="tx-semibold">{{ $item->term_days }} Days</span> Duration</li>


                                        <li><i class="fa fa-check-circle me-2 text-success bg-success-transparent font-weight-bold p-1 tx-12 rounded-circle"></i><span class="tx-semibold">{{ $item->daily_interest }}% </span>Daily Return </li>


                                        <li><i class="fa fa-check-circle me-2 text-success bg-success-transparent font-weight-bold p-1 tx-12 rounded-circle"></i><span class="tx-semibold">Trading</span> Alert</li>
                                        <li><i class="fa fa-check-circle me-2 text-success bg-success-transparent font-weight-bold p-1 tx-12 rounded-circle"></i><span class="tx-semibold">24/7</span> Support</li>
                                    </ul>

                                    <form  action="{{ route('user.invest') }}" method="post">
                                        @csrf
                                        @if(session()->has('declined'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('declined') }}
                                            </div>
                                        @endif
                                        @if(session()->has('insufficient'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('insufficient') }}
                                            </div>
                                        @endif

                                        <input type="hidden" name="package_id" value="{{ $item->id }}">
                                        <div class="form-group text-start">
                                            <label class="tx-medium">Amount</label>
                                            <input class="form-control" name="amount" placeholder="1000" type="text" required="">
                                        </div>

                                        <button type="submit"  class="btn ripple btn-primary-transparent btn-block mb-2"> Invest to Plan <i class="fa fa-arrow-right ms-1"></i>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </div>

@endsection`
