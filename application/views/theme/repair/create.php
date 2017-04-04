<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Record  Accident</h2>
<div class="box-tools pull-right">
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Maintaince
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('maintainance/maintaincreate'); ?>"><i class="fa fa-plus"></i>Record Maintainace</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart("maintainance/maintaincreate");?>

                <div class="form-group">
                  <label for="date" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <?php echo form_input($date);?><span><?= form_error('date'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="fleet" class="col-sm-2 control-label">Fleet</label>

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
                  <label for="vehicleNo" class="col-sm-2 control-label">Vehicle<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="vehicleNo">
                     <option>--select Vehicle Number--</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>"><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
              <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Type</label>

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
                  <label for="Remarks" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($Remarks);?><span><?= form_error('Remarks'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Supplier" class="col-sm-2 control-label">Supplier<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="supplier">
                    <option value="">--Select supplier--</option>
                     <?php foreach ($supplier as $s) :?>
                       <option value="<?= $s->SupplierName?>"><?= $s->SupplierName?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="cost" class="col-sm-2 control-label">Cost<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($cost);?><span><?= form_error('cost'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="enteredBy" class="col-sm-2 control-label">Entered By<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($enteredBy);?><span><?= form_error('enteredBy'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="approval" class="col-sm-2 control-label">Approval<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($approval);?><span><?= form_error('approval'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="meter" class="col-sm-2 control-label">MeterReading</label>

                  <div class="col-sm-10">
                    <?php echo form_input($meter);?><span><?= form_error('meter'); ?></span>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="Acciref" class="col-sm-2 control-label">Accident Ref</label>

                  <div class="col-sm-10">
                    <?php echo form_input($acciref);?><span><?= form_error('acciref'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="voucher" class="col-sm-2 control-label">Payment Voucher<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($voucher);?><span><?= form_error('voucher'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Maintype" class="col-sm-2 control-label">Maintainance Type<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="Maintype">
                    <option value="">--Select Maintainance type--</option>
                     <?php foreach ($maintatype as $ty) :?>
                       <option value="<?= $ty->Type?>"><?= $ty->Type?></option>
                     <?php endforeach ?>
                     </select>
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


