<div class="container">
    <h1>Hello, <?= ucwords($this->session->userdata('name')); ?></h1>

    <!-- Total Pesanan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pesanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <!-- <?php 
                                $totalOrder = $this->order->getOrders(); 
                                echo $totalOrder; 
                            ?>  -->
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Total Pesanan -->

</div>