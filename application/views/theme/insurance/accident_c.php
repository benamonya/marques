<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Record  Accident</h2>
<div class="box-tools pull-right">
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Accident
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('insurance/accident_c'); ?>"><i class="fa fa-plus"></i>Record An Accident</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart("insurance/accident_c");?>

                <div class="form-group">
                  <label for="date" class="col-sm-2 control-label">Date<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($date);?><span><?= form_error('date'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="fleet" class="col-sm-2 control-label">Fleet<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <select class="form-control" name="fleet">
                     <option>--select Fleet type--</option>
                     <?php foreach ($fleet_type as $fleet) :?>
                       <option value="<?= $fleet->FleetType?>"><?= $fleet->FleetType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="vehicle" class="col-sm-2 control-label">Vehicle<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="vehicle">
                     <option>--select Vehicle Number--</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>"><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
              <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Type<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="type">
                     <option>--select Vehicle type--</option>
                     <?php foreach ($vehicle_type as $vehicle) :?>
                       <option value="<?= $vehicle->VehicleType?>"><?= $vehicle->VehicleType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="details" class="col-sm-2 control-label">Details<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($details);?><span><?= form_error('details'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="driver" class="col-sm-2 control-label">Driver<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="driver">
                    <option value="">--Select Driver--</option>
                     <?php foreach ($driver as $driver) :?>
                       <option value="<?= $driver->name?>"><?= $driver->name?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="injured" class="col-sm-2 control-label">Injured<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($injured);?><span><?= form_error('injured'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="images" class="col-sm-2 control-label">Images<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($images);?><span><?= form_error('images'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="enteredBy" class="col-sm-2 control-label">Entered By<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($enteredBy);?><span><?= form_error('enteredBy'); ?></span>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="damageto" class="col-sm-2 control-label">Damage To Vehicle<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($damageto);?><span><?= form_error('damageto'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="3rdparty" class="col-sm-2 control-label">3rd Party Damages<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($partyDamages);?><span><?= form_error('partyDamages'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="time" class="col-sm-2 control-label">Time<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($time);?><span><?= form_error('time'); ?></span>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="death" class="col-sm-2 control-label">Number Of Deaths<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($deaths);?><span><?= form_error('deaths'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="location" class="col-sm-2 control-label">Location Of accident<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($location);?><span><?= form_error('location'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status Of the Injured<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($status);?><span><?= form_error('status'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="category" class="col-sm-2 control-label">Category<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($category);?><span><?= form_error('category'); ?></span>
                  </div>
               </div>
      
   
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Record','class="btn btn-xs btn-success pull-right"');?>
        </div>

<?php echo form_close();?>

            </div><!-- /.box-body -->
           </div><!--box box-success-->
          </div>
          </div>
       </section>


