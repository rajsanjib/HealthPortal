<div class="container">
    <div class="row">
        <div class="col-lg-3 clearfix">
            <button id="appointment_date" name="<?php echo now(); ?>"><?php echo date(DATE_RFC822,time()); ?></button>
        </div>
        <div class="col-lg-8">
            <table class="table-bordered table-responsive">
                <thead>Appointment</thead>
                <th>Day</th>
                <th>Morning</th>
                <th>Afternoon</th>
                <th>Evening</th>

z
                <tr id="sunday">
                    <td class="day">Sunday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $sunday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $sunday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $sunday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $sunday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $sunday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $sunday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>

                <tr id="monday">
                    <td class="day">Monday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $monday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $monday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $monday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $monday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $monday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $monday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>
                <tr id="tuesday">
                    <td class="day">Tuesday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $tuesday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $tuesday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $tuesday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $tuesday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $tuesday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $tuesday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>
                <tr id="wednesday">
                    <td class="day">Wednesday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $wednesday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $wednesday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $wednesday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $wednesday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $wednesday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $wednesday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>
                <tr id="thursday">
                    <td class="day">Thursday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $thursday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $thursday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $thursday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $thursday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $thursday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $thursday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>
                <tr id="friday">
                    <td class="day">Friday</td>
                    <td class="time"><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $friday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $friday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $friday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $friday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td><a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $friday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $friday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>
                <tr id="saturday">
                    <td class="day">Saturday</td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"> <?php echo $saturday['morning_shift_start']; ?></p> -
                            <p class="shift_end"> <?php echo $saturday['morning_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $saturday['afternoon_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $saturday['afternoon_shift_end']; ?></p>
                        </a></td>
                    <td class="time"> <a href="#" class="btn" data-model-id="popup">
                            <p class="shift_start"><?php echo $saturday['evening_shift_start']; ?></p> -
                            <p class="shift_end"><?php echo $saturday['evening_shift_end']; ?></p>
                        </a></td>
                </tr>

            </table>
        </div>

    </div>

    <div class="popup" class="modal-box" data-popup="popup">
        <section class="popup-inner">
            <header>
                <h3>Take Appointment </h3>
            </header>
                <?php echo form_open('appointment/Appointment/make_appointment'); ?>
                    <div class="form-group">
                        <label for="time">Date</label>
                        <input type="text"  value="" id="appointment_date" name="appointment_date">
                    </div>
                    <div class="form-group">
                        <label for="time">On</label>
                        <input type="text"  value="" name="day" class="day">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text"  value="" name="time_start"> to <input type="text" value="" name="time_end">
                    </div>
                    <div class="form-group">
                    <label for="Name">Patient's name</label>
                    <input type="text" name="patient_name" placeholder="Patient's Name" />
                </div>
                <div class="form-group">
                    <label for="description">Disease Description</label>
                    <textarea name="description" placeholder="Enter your diseases description here..." ></textarea>
                </div>
                    <div class="form-group">
                        <button type="submit" class="bth btn-blue" id="submit">Submit</button>
                    </div>
            <?php form_close(); ?>
                <footer> <a href="#" class="btn" data-popup-close="popup">Close</a>
                    </footer>
                <a href="#" class="popup-close" data-popup-close="popup">x</a>
        </section>
    </div>

    <script>

        $(function() {
            //----- OPEN
            $('[data-model-id]').on('click', function(e)  {

                var time_start = $(this).children('p.shift_start').text();
                var time_end = $(this).children('p.shift_end').text();

                var day = $(this).parents('.time').siblings('.day').text();
                var date = $('#appointment_date').text();

                $("input.day").attr('value',day);
                $("input#appointment_date").attr('value',date);
                $("input[name='time_start']").attr('value',time_start);
                $("input[name='time_end']").attr('value',time_end);

                var targeted_popup_class = jQuery(this).attr('data-model-id');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                e.preventDefault();
            });

            //----- CLOSE
            $('[data-popup-close]').on('click', function(e)  {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                e.preventDefault();
            });

        });
    </script>

</div>