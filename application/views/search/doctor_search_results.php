    <div class="row lg-col-4 top">
        <form class="form-group">
            <input type="text" value="search" placeholder="search here">
            <input type="submit" value="Search">
        </form>
    </div>

    <?php foreach($search_results->result() as $doctor): ?>
    <div class="row lg-col-10">
        <div class="col-md-10 col-xs-10">
            <div class="well panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <img src="<?php echo base_url() . "images/user_account/". $doctor->profile_pic; ?>" alt="" class="center-block img-circle img-thumbnail img-responsive">
                        </div>
                        <!--/col-->
                        <div class="col-xs-12 col-sm-8">
                            <ul class="list-inline ratings" title="Ratings">
                                <h4> Rating </h4>
                                <?php while($doctor->rating != 0) {
                                    echo '<li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>}';
                                    $doctor->rating --;
                                }?>
                            </ul>
                            <h2><?php echo anchor('doctor/profile($id)', $doctor->name); ?></h2>
                            <p><strong>Expertise: </strong> <?php echo anchor('doctor/specialities', $doctor->specialities); ?> </p>
                            <p><strong>Hospital: </strong> <?php echo $doctor->hospital; ?> </p>
                            <p><strong>Qualification: </strong>
                                <span class="label label-info tags"><?php echo $doctor->qualification ; ?></span>

                            </p>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/panel-body-->
            </div>
            <!--/panel-->
        </div>
        <!--/col-->
    </div>
    <?php endforeach; ?>
    <!--/row-->
<!--/container-->