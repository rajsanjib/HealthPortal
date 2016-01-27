
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <h3>My Appointments</h3>

                    <?php if($message != NULL);?>
                    <section class="glyphicon-alert alert-info">
                        <?php echo $message;?>
                    </section>
                    <h5>Appointment Requests</h5>
                    <section>
                        <?php foreach($appointment_requests->result() as $data) : ?>
            <ul>
                            <li>
                                <P><?php echo "On ". $data->appointment_date ." "." at ".$data->time_start." to ".$data->time_end.
            " by ".$data->requested_by; ?></P>
                <p>
                <?php echo $data->description; ?>
                </p>
                                <p> <?php echo anchor('Doctor_Dashboard/approve_appointment/'.$data->id.'/'.$data->user_id , 'Approve'). " " .
                    anchor('Doctor_Dashboard/decline_appointment/'.$data->id, 'Decline'); ?></p>
                            </li>
                        </ul>
    <?php endforeach; ?>

                    </section>
                </div>

            </div>
        </div>
    </div>


</div>
