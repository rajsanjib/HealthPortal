<div class="container">
    <div class="row">
        <div class="col-lg-3 clearfix">
            <img src="<?php echo base_url('images/left_arrow.png'); ?>" />
            <p><?php echo date(); ?></p>
            <img src="<?php echo base_url('images/right_arrow.png'); ?>" />
        </div>
        <div class="col-lg-8">
            <table class="tab-content">
                <thead>Day</thead>
                <thead>Morning Shift</thead>
                <thead>Afternoon Shift</thead>
                <thead>Evening Shift</thead>
                <tr>
                    <td>Sunday</td>
                    <td><a class="popup"> <?php echo $sunday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $sunday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $sunday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td><a class="popup"> <?php echo $monday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $monday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $monday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td><a class="popup"> <?php echo $tuesday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $tuesday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $tuesday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td><a class="popup"> <?php echo $wednesday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $wednesday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $wednesday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td><a class="popup"> <?php echo $thursday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $thursday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $thursday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td><a class="popup"> <?php echo $friday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $friday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $friday['evening_shift']; ?> </a></td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td><a class="popup"> <?php echo $satday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $satday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $satday['evening_shift']; ?> </a></td>
                </tr>


            </table>
        </div>

    </div>

</div>