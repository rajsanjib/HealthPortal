<div class="container" style="position: relative;margin-top: 50px; padding: 20px;">
    <div class="service-wrapper">
        <div class="row">
            <div class="col-lg-12">
                    <label for="search">What do you want to search for?</label>
                    <div class="form-group">
                        <select name=”search”>
                            <option value=”doctors”>Doctors</option>
                            <option value=”hospitals”>Hospitals</option>
                        </select>
                    </div>
					
					
					<!-- Hide/Show left to implement-->
					<!-- Div for doctors-->
					

                    <?php echo form_open('Search/search_doctors',array('class' => 'horizontal', 'name' => 'doctor_search')); ?>
					<div id="doctor_search">
						<div class="ui-widget">
							<label>Name</label>
							<input type="text" name="doctor_name" placeholder="Name">
						<div class="form-group">
								<label>Expertise: </label>
							    <select id="combobox">
                                    <option value="">Select one...</option>
                                    <option value="ActionScript">ActionScript</option>
                                    <option value="AppleScript">AppleScript</option>
                                    <option value="Asp">Asp</option>
                                    <option value="BASIC">BASIC</option>
                                    <option value="C">C</option>
                                    <option value="C++">C++</option>
                                    <option value="Clojure">Clojure</option>
                                    <option value="COBOL">COBOL</option>
                                    <option value="ColdFusion">ColdFusion</option>
                                    <option value="Erlang">Erlang</option>
                                    <option value="Fortran">Fortran</option>
                                    <option value="Groovy">Groovy</option>
                                    <option value="Haskell">Haskell</option>
                                    <option value="Java">Java</option>
                                    <option value="JavaScript">JavaScript</option>
                                    <option value="Lisp">Lisp</option>
                                    <option value="Perl">Perl</option>
                                    <option value="PHP">PHP</option>
                                    <option value="Python">Python</option>
                                    <option value="Ruby">Ruby</option>
                                    <option value="Scala">Scala</option>
                                    <option value="Scheme">Scheme</option>
                                    <option value="Neurology">Neurology</option>
                                </select>
                            </div>
							&nbsp;

                            <div class="form-group">
                                <label for="search">Hospital:&nbsp;</label>
                                <select name="hospital">
                                    <option>KU Hospital</option>
                                    <option>Om Hospital &amp; Research Centre</option>
                                    <option>Teaching Hospital</option>
                                    <option>Medicare Hospital</option>
                                    <option>Bir Hospital</option>
                                    <option>DI Skin Hospital</option>
                                </select>
                            </div>
							&nbsp;
                            <div class="form-group">
                                <label for="search">Location:&nbsp;</label>
                                <select name="location">
                                    <option>Select an Option</option>
                                    <option>Kathmandu</option>
                                    <option>Bhaktapur</option>
                                    <option>Lalitpur</option>
                                    <option>Dhulikhel</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Rating </label>
                                <select name="rating">
                                    <?php for($i = 0; $i<5; $i++) echo "<option>" . $i ."</optoin>"; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Search" id="doctor_search">
                            </div>
						</div>
					</div>

                    <?php echo form_close(); ?>


                <?php echo form_open('Search/hospital_search',array('name' => 'hospital_search')); ?>
					<!-- Div for hospitals-->
					<div class="form-group" id="hospitals_search">
						<label for="search">Name:&nbsp;</label>
						<input type="text" name="expertise">
						</input>
						<label for="search">Location:&nbsp;</label>
						<select name="hospital">
							<option></option>
						</select>
						<label for="search">Specialty:&nbsp;</label>
						<select name="speciality">
							<option></option>
						</select>
					</div>

                    <input type="button" value="Search" class="" id="submit">

                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('packages/jquery/dropdown.js'); ?>" > </script>

