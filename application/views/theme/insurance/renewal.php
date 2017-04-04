<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Insurance Renewal</h3>
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
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>Id</th>
								<th>Renawal</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($renewal as $renewal):?>
								<tr>
						            <td><?= $renewal->ID ?></td>
                        <td><?= $renewal->Renewal ?></td>
						            <td><a href="<?= site_url('insurance/edit_renewal/'.$renewal->ID); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('insurance/delete_renewal/'.$renewal->ID); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
									</td>
								</tr>
							<?php endforeach;?>
							</tbody>
          </table>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        

