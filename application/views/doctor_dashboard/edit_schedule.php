<div class="wrapper">
    <div class="container">
        <table class="table-bordered">
            <thead class="grey">Day</thead>
            <thead>Morning Shift</thead>
            <thead>Afternoon Shift</thead>
            <thead>Evening Shift</thead>

            <?php $i = 0; ?>
            <?php form_open('schedule/update_schedule'); ?>
            <?php foreach($schedule_array as $schedule): ?>
            <tr>
                <td>
                    <?php echo $schedule['day']; ?>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="<?php echo "morning_shift_start_".$i;?>" value="<?php echo $schedule['morning_shift_start']; ?>"> to <input type="text" name="<?php echo "morning_shift_end_".$i;?>" value="<?php echo $schedule['morning_shift_end']; ?>">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="<?php echo "afternoon_shift_start_".$i;?>" value="<?php echo $schedule['afternoon_shift_start']; ?>"> to <input type="text" name="<?php echo "afternoon_shift_end_".$i;?>" value="<?php echo $schedule['afternoon_shift_end']; ?>">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="<?php echo "evening_shift_start_".$i;?>" value="<?php echo $schedule['evening_shift_start']; ?>"> to <input type="text" name="<?php echo "evening_shift_end_".$i;?>" value="<?php echo $schedule['evening_shift_end']; ?>">
                    </div>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach; ?>
        </table>
    </div>
</div>