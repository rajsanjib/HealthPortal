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
                    <td><a class="popup"> <?php echo $saturday['morning_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $saturday['afternoon_shift']; ?> </a></td>
                    <td><a class="popup"> <?php echo $saturday['evening_shift']; ?> </a></td>
                </tr>


            </table>
        </div>

    </div>

    <div id="popup" class="modal-box">
        <header> <a href="#" class="js-modal-close close">×</a>
            <h3>Pop Up </h3>
        </header>
        <div class="modal-body">
            <form method="get" action="<?php echo base_url('appointment/make_appointment');?> "
            <div class="form-group">
                <label for="Name">Patient's name</label>
                <input type="text" name="patient_name" placeholder="Patient's Name" />
            </div>
            <div class="form-group">
                <label for="description">Disease Discription</label>
                <textarea name="description" placeholder="Enter your diseases description here..." />
            </div>

        </div>
        <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>
    </div>

    <script>
        $(function(){

            var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

            $('a[data-modal-id]').click(function(e) {
                e.preventDefault();
                $("body").append(appendthis);
                $(".modal-overlay").fadeTo(500, 0.7);
                //$(".js-modalbox").fadeIn(500);
                var modalBox = $(this).attr('data-modal-id');
                $('#'+modalBox).fadeIn($(this).data());
            });


            $(".js-modal-close, .modal-overlay").click(function() {
                $(".modal-box, .modal-overlay").fadeOut(500, function() {
                    $(".modal-overlay").remove();
                });

            });

            $(window).resize(function() {
                $(".modal-box").css({
                    top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
                    left: ($(window).width() - $(".modal-box").outerWidth()) / 2
                });
            });

            $(window).resize();

        });
    </script>



</div>