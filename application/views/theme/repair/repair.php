<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Repairs</h3>
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
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>Id</th>
								<th>vehicle</th>
                <th>part</th>
                <th>Cost</th>
                <th>Date</th>
                <th>Entered By</th>
                <th>Details</th>
                <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($repair as $r):?>
								<tr>
                        <td><?= $r->id ?></td>
                        <td><?= $r->vehicle ?></td>
                        <td><?= $r->part ?></td>
                        <td><?= $r->cost ?></td>
                        <td><?= $r->Date ?></td>
                        <td><?= $r->enteredBy ?></td>
                        <td><?= $r->Details ?></td>
                        <td><a href="<?= site_url('maintainance/repair_edit/'.$r->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('maintainance/repair_delete/'.$r->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        

