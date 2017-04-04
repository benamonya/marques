<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Claim Insuarance</h2>
<div class="box-tools pull-right">
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Insurance
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('insurance/create'); ?>"><i class="fa fa-plus"></i>Add An Insurance Company</a></li>
                   
                  </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Claim
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('insurance/createClaim'); ?>"><i class="fa fa-plus"></i>Claim insurance</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart("insurance/createClaim");?>

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
                     <option>--select Fleet type</option>
                     <?php foreach ($fleet_type as $fleet) :?>
                       <option value="<?= $fleet->FleetType?>"><?= $fleet->FleetType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Vehicle Type<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="type">
                     <option>--select Vehicle type</option>
                     <?php foreach ($vehicle_type as $vehicle) :?>
                       <option value="<?= $vehicle->VehicleType?>"><?= $vehicle->VehicleType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="vehicleNo" class="col-sm-2 control-label">Vehicle Number<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="vehicleNo">
                     <option>--select Vehicle Number</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>"><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="accidentDate" class="col-sm-2 control-label">Accident Date<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($accidentDate);?><span><?= form_error('accidentDate'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="cash" class="col-sm-2 control-label">Claim<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($cash);?><span><?= form_error('cash'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="enteredBy" class="col-sm-2 control-label">Entered By<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($enteredBy);?><span><?= form_error('enteredBy'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Reciept" class="col-sm-2 control-label">Reciept Number<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($Reciept);?><span><?= form_error('Reciept'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="remarks" class="col-sm-2 control-label">Remarks<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($remarks);?><span><?= form_error('remarks'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="insurer" class="col-sm-2 control-label">Insurer<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($insurer);?><span><?= form_error('insurer'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="dateit" class="col-sm-2 control-label">Date It Occured<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($dateit);?><span><?= form_error('dateit'); ?></span>
                  </div>
               </div>
      
   
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Claim','class="btn btn-xs btn-success pull-right"');?>
        </div>

<?php echo form_close();?>

            </div><!-- /.box-body -->
           </div><!--box box-success-->
          </div>
          </div>
       </section>


