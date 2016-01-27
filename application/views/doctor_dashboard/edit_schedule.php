<div class="wrapper">
    <div class="container">
        <table class="table-bordered">
            <th class="grey">Day</th>
            <th>Morning Shift</th>
            <th>Afternoon Shift</th>
            <th>Evening Shift</th>

            <?php $i = 1; ?>
            <?php form_open('schedule/update_schedule'); ?>
            <?php foreach($schedule_array as $schedule): ?>
            <tr>
                <td>
                    <?php echo day_to_string($schedule['day']); ?>
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
            <?php if($i <= 7) $i++;?>
            <?php endforeach; ?>
        </table>
        <div class="form-group">
            <button type="submit" class="btn-green pull-right">Update</button>
        </div>
        <?php form_close(); ?>
    </div>
</div>