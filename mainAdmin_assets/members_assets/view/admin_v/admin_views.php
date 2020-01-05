                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Quick stats boxes -->
                        <div class="row">
                            <div class="col-lg-4">

                                <!-- Members online -->
                                <div class="card bg-teal-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <?php
                                        $query = mysqli_query($vSky , "SELECT * FROM `employees` WHERE is_pending='0' AND on_leave='0' AND sacked='0'");
                                        $total = mysqli_num_rows($query);
                                        ?>
                                            <h3 class="font-weight-semibold mb-0">
                                                <?= $total; ?>
                                            </h3>
                                        </div>
                                        <div>
                                            Number Of Employees
                                        </div>
                                  </div>

                                    <div class="container-fluid">
                                        <div id="members-online"></div>
                                    </div>
                                </div>
                                <!-- /members online -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Current server load -->
                                <div class="card bg-pink-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0" id="data_val"></h3>
                                        </div>

                                        <div>
                                            Current server load
                                        </div>
                                    </div>

                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Today's revenue -->
                                <div class="card bg-blue-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                           <?php
                                            
                                            $query_2 = mysqli_query($vSky, "SELECT * FROM `users`");
                                            $c = mysqli_num_rows($query_2);
                                            
                                            ?>
                                            <h3 class="font-weight-semibold mb-0"><?= $c; ?></h3>
                                            <div class="list-icons ml-auto">
                                            </div>
                                        </div>

                                        <div>
                                            Total Number Of Users
                                        </div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">

                        <!-- Progress counters -->
                        <div class="row">
                            <!-- Task timer -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-transparent header-elements-inline">
                                        <span class="text-uppercase font-size-sm font-weight-semibold">Count Down For Automatic System Backups</span>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex justify-content-center mb-4">
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="mon">Mon</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="tue">Tue</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="wed">Wed</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="thu">Thu</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="fri">Fri</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="sat">Sat</a>
                                            <a href="javascript:;" class="badge bg-grey-300 mx-1" id="sun">Sun</a>
                                        </div>

                                        <div class="d-flex justify-content-center text-center mb-2" id="dashboardTimer">
                                            <div class="timer-number font-weight-light" id="days">
                                            </div><span class="d-block font-size-base mt-2"> Day(s)</span>
                                            <div class="timer-dots mx-1"> : </div>
                                            <div class="timer-number font-weight-light" id="hours">
                                            </div><span class="d-block font-size-base mt-2"> Hour(s)</span>
                                            <div class="timer-dots mx-1"> : </div>
                                            <div class="timer-number font-weight-light" id="minutes">
                                            </div><span class="d-block font-size-base mt-2"> Minute(s)</span>
                                            <div class="timer-dots mx-1"> : </div>
                                            <div class="timer-number font-weight-light" id="seconds">
                                            </div><span class="d-block font-size-base mt-2"> Second(s)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /task timer -->
                        </div>
                        <!-- /progress counters -->
                    </div>
                </div>

                <div class="row">
                    <!-- /dashboard content -->
                    <div class="col-md-3" style="margin-top:-30px; margin-left:5px; padding-left:0px;">
                        <!-- Calendar widget -->
                        <div class="card">
                            <div class="form-control-datepicker border-0"></div>
                        </div>
                        <!-- /calendar widget -->
                    </div>
                    <div class="col-xl-5" style="margin-top:-30px">

                        <!-- Nightingale roses (hidden labels) -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Department Wise Headcount Distribution</h5>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="chart has-fixed-height" id="pie_rose"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /nightingale roses (hidden labels) -->

                    </div>
                </div>