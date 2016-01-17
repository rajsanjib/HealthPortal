    <div class="row lg-col-4 top">
        <form class="form-group">
            <input type="text" value="search" placeholder="search here">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="row lg-col-10">
        <div class="col-md-10 col-xs-10">
            <div class="well panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <img src="" alt="" class="center-block img-circle img-thumbnail img-responsive">
                            <ul class="list-inline ratings text-center" title="Ratings">
                                <?php while($rating != 0) {
                                    echo '<li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>}';
                                    $rating --;
                                }?>
                            </ul>
                        </div>
                        <!--/col-->
                        <div class="col-xs-12 col-sm-8">
                            <h2><?php echo anchor('doctor/profile($id)', $name); ?>/h2>
                            <p><strong>Expertise: </strong> <?php echo anchor('doctor/specialist($specialist)', $specialist); ?> </p>
                            <p><strong>Hospital: </strong> <?php echo $hospital; ?> </p>
                            <p><strong>Qualification: </strong>
                                <span class="label label-info tags">html5</span>
                                <span class="label label-info tags">css3</span>
                                <span class="label label-info tags">jquery</span>
                                <span class="label label-info tags">bootstrap3</span>
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
    <!--/row-->
<!--/container-->