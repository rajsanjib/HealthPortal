<?php $doctor_id = 1; ?>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Username
                </a>
            </li>
            <li>
            </li>
            <li>
                <?php echo anchor('Doctor_Dashboard/appointments','My Appointments'); ?>
            </li>
            <li>
                <?php echo anchor('Doctor_Dashboard/edit_schedule/1','Edit Schedule'); ?>
            </li>
            <li>
                <a href="#">Discussions</a>
            </li>
            <li>
                <a href="#">Articles</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
