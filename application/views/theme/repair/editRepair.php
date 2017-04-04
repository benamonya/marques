<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Edit Repair</h2>
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
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Repair
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('maintainance/repaircreate'); ?>"><i class="fa fa-plus"></i>Record Repair</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart("maintainance/repair_edit");?>

                <div class="form-group">
                  <label for="date" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <?php echo form_input($date);?><span><?= form_error('date'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="part" class="col-sm-2 control-label">Part</label>

                  <div class="col-sm-10">
                    <?php echo form_input($part);?><span><?= form_error('part'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="vehicleNo" class="col-sm-2 control-label">Vehicle<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="vehicleNo">
                     <option>--select Vehicle Number--</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>" <?php if ($repairEdit->vehicle === $vehicle->RegNo): ?>
                       <?php echo "Selected" ?>
                       <?php endif ?> ><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Details" class="col-sm-2 control-label">Details<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($Details);?><span><?= form_error('Details'); ?></span>
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
   
      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden('id', $repairEdit->id);?>
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


