<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Accident Records Details</h2>
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
        <div id="kotak">
          <?php foreach ($accident as $accident):?>
            <h2>Date: <small><?php echo $accident->SysDate;?></small></h2>
            <h3>Vehicle: <small><?php echo $accident->Vehicle;?></small></h3>
            <h3>Driver: <small><?php echo $accident->Driver;?></small></h3>
            <p>Type: <?php echo $accident->Type; ?></p>
            <p>Fleet: <?php echo $accident->Fleet; ?></p>
            <p><b>Details: </b> <?php echo $accident->Details; ?><br> Injured: <?php echo $accident->Injured; ?> <br> Damage: <?php echo $accident->DamageToVehicle; ?> Location: <?php echo $accident->Location; ?><br>3rd Party Damages: <?php echo $accident->ThirdPartyDamages; ?> </p>
            <img src="<?php echo base_url();?>uploads/<?php echo $accident->Images;?>" class="img-responsive">
            <p>Status Of The Injured: <?php echo $accident->StatusInjured; ?></p>
          <?php endforeach; ?>
        </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        

