
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Insurance Renewal</h3>
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
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Renewal
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('insurance/create_renawal'); ?>"><i class="fa fa-plus"></i>Create a renewal</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">

    <?php echo form_open("insurance/edit_renewal");?>
               <div class="form-group">
                  <label for="renewal" class="col-sm-2 control-label">Renewal<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($renewal);?><span><?= form_error('renewal'); ?></span>
                  </div>
               </div>
              
      <?php echo form_hidden($csrf); ?>
       <?php echo form_hidden('id', $renewal_data->ID);?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>


