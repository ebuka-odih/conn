@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        All Deposits
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="block block-rounded">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Full Table</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option">
                                                    <i class="si si-settings"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            @if(session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-vcenter">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center" >
                                                            <i class="far fa-user"></i>
                                                        </th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th class="text-center" style="width: 200px;">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($deposits as $item)

                                                    <tr>
                                                        <td class="text-center">
                                                            {{ optional($item->user)->fullname() }}<br>
                                                        </td>
                                                        <td class="fw-semibold">
                                                            {{ date('d-M-y', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>$@money($item->amount)</td>
                                                        <td>
                                                            {!! $item->adminStatus() !!}
                                                        </td>

                                                        <td >
                                                            @if($item->status == 0)
                                                                <a href="{{ route('admin.view_deposit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="View Deposit" data-bs-original-title="View">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="modal" data-bs-target="#modal-block-popin">
                                                                    <i class="fa fa-check"></i>
                                                                </a>


                                                            @else
                                                            @endif
                                                            <form method="POST" action="{!! route('admin.deleteDeposit', $item->id) !!}" accept-charset="UTF-8">
                                                                <input name="_method" value="DELETE" type="hidden">
                                                                {{ csrf_field() }}

                                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                                    <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Deposit?&quot;)">
                                                                        <span class="fa fa-times" aria-hidden="true"></span>
                                                                    </button>


                                                                </div>

                                                            </form>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- END Page Content -->
    </main>


    <div class="modal fade" id="modal-block-popin" tabindex="-1" aria-labelledby="modal-block-popin"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Fund Account</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.approve_deposit', optional($item->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <select name="wallet" id="" class="form-control" required="">
                                    <option >Choose Wallet</option>
                                    <option value="main">Main Balance</option>
                                    <option value="invest">Investment Balance</option>
                                </select>
                                <button type="submit" class="btn btn-primary col-lg-6 mt-2">Approve Deposit</button>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
