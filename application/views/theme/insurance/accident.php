<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Accident Records</h2>
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
            <h1>Date: <small><b><?php echo $accident->SysDate; ?></b></small></h1>
            <h3>Vehicle: <small><b><?php echo $accident->Vehicle; ?></b></small></h3>
            <p>Details: <?php echo $accident->Details; ?></p>
            <a href="<?php echo base_url();?>insurance/details/<?php echo $accident->Id;?>">Read More</a><br>
            <a href="<?php echo base_url();?>insurance/accident_e/<?php echo $accident->Id;?>">Edit</a>
          <?php endforeach; ?>
        </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        

