<div class="custom-card p-3">
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <div class="p-2 row" >
                                    <div class="rounded-circle col-4 align-items-center justify-content-center d-flex bg-primary" style=" width:70px; height:70px;">
                                        <h1 class= "text-white mdi mdi-account"></h1>
                                    </div>
                                    <div class="col-8">
                                       <h5>
                                        Total Appointments
                                        <br>
                                        <span class="text-muted"><?php echo $appointment_count?></span>
                                       </h5> 
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 border-right">
                                <div class="p-2 row">
                                    <div class="rounded-circle col-4 align-items-center justify-content-center d-flex bg-info" style=" width:70px; height:70px;">
                                        <h1 class=" text-white mdi mdi-account"></h1>
                                    </div>
                                    <div class="col-8">
                                        <h5>
                                        Today's Appointments
                                        <br>
                                        <span class="text-muted"><?php echo $aptoday_count?></span>
                                        </h5> 
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2 row">
                                    <div class="rounded-circle col-4 align-items-center justify-content-center d-flex bg-danger" style=" width:70px; height:70px;">
                                        <h1 class=" text-white mdi mdi-account"></h1>
                                    </div>
                                    <div class="col-8">
                                        <h5>
                                            Cancelled Appointments
                                            <br>
                                            <span class="text-muted"><?php echo $apcanceled_count?></span>
                                           </h5> 
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>