<div class="container-fluid">
    <div class="row">

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="product"></span>
                                </h5>
                                <p class="mb-0 text-sm">Product </p>
                                <h6>( {{ count($products) }})</h6>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape  float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/cosmetics (2).png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="category"></span>
                                </h5>
                                <p class="mb-0 text-sm">Category</p>
                                <h6>( {{ count($categories) }})</h6>
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape  float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/sell.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="customer"></span>
                                </h5>
                                <p class="mb-0 text-sm">Customer</p>
                            </div>
                            <h6>( {{ count($customers) }})</h6>
                        </div>

                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape   border-radius-md">
                                <img class="w-100 " src="{{ asset('images/makeover.png') }}" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100  bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="invoice"></span>
                                </h5>
                                <p class="mb-0 text-sm">Invoice</p>
                                {{-- <h6>( {{ count($invoice) }})</h6> --}}
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/invoice.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    $ <span id="total"></span>
                                </h5>
                                <p class="mb-0 text-sm">Total Sale</p>
                                {{-- <h6>( {{ count($totalSels) }})</h6> --}}
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/sale.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100  bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    $ <span id="vat"></span>
                                </h5>
                                <p class="mb-0 text-sm">Vat Collection</p>
                                {{-- <h6>( {{ count($vats) }})</h6> --}}
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/budget.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100  bg-white">
                <div class="p-6">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    $ <span id="payable"></span>
                                </h5>
                                <p class="mb-0 text-sm">Total Collection</p>
                                {{-- <h6>( {{ count($collections) }})</h6> --}}
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape  float-end border-radius-md">
                                <img class="w-100 " src="{{ asset('images/voucher.png') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
