<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Maintainace Record</h3>
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
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>id</th>
								<th>Supplier</th>
                <th>Date</th>
                <th>Fleet</th>
                <th>Cost</th>
                <th>Vehicle</th>
                <th>Remarks</th>
                <th>Ref No</th>
                <th>Approval</th>
                <th>Meter Reading</th>
                <th>Accident Ref</th>
                <th>Payment voucher</th>
								<th>Maintainance Type</th>
                <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($maintainance as $m):?>
								<tr>
                        <td><?= $m->Id ?></td>
                        <td><?= $m->Supplier ?></td>
                        <td><?= $m->SysDate ?></td>
                        <td><?= $m->Fleet ?></td>
                        <td><?= $m->Cost ?></td>
                        <td><?= $m->Vehicle ?></td>
                        <td><?= $m->Remarks ?></td>
                        <td><?= $m->RefNo ?></td>
                        <td><?= $m->Approval ?></td>
                        <td><?= $m->MeterReading ?></td>
                        <td><?= $m->AccidentRef ?></td>
                        <td><?= $m->PaymentVoucher ?></td>
                        <td><?= $m->MaintType ?></td>
                        <td><a href="<?= site_url('maintainance/edit/'.$m->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('maintainance/delete/'.$m->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        

