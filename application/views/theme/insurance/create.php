<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Insurance Company</h3>
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
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open("insurance/create");?>

            <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Insurance Company<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($name);?><span><?= form_error('name'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="contactname" class="col-sm-2 control-label">Contact Name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($contactname);?><span><?= form_error('contactname'); ?></span>
                  </div>
               </div>
      
              <div class="form-group">
                  <label for="phone no" class="col-sm-2 control-label">Contact Number<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($contactNo);?><span><?= form_error('contactNo'); ?></span>
                  </div>
               </div>
      
   
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save Company','class="btn btn-xs btn-success pull-right"');?>
        </div>

<?php echo form_close();?>

            </div><!-- /.box-body -->
           </div><!--box box-success-->
          </div>
          </div>
       </section>


