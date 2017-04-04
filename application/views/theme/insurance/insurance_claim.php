<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Insurance Claims</h3>
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
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>Date</th>
								<th>Fleet</th>
								<th>Type</th>
                <th>Vehicle</th>
                <th>Accident</th>
                <th>Claim</th>
                <th>Entered By</th>
                <th>Reciept No</th>
                <th>Remarks</th>
                <th>Insurer</th>
                <th>Action</th>
              </th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($claim as $claim):?>
								<tr>
						            <td><?= $claim->SysDate ?></td>
                        <td><?= $claim->Fleet ?></td>
                        <td><?= $claim->Type ?></td>
                        <td><?= $claim->VehicleNo ?></td>
                        <td><?= $claim->AccidentDate ?></td>
                        <td><?= $claim->Claim ?></td>
                        <td><?= $claim->EnteredBy ?></td>
                        <td><?= $claim->ReceiptNo ?></td>
                        <td><?= $claim->Remarks ?></td>
                        <td><?= $claim->insurer ?></td>
                        <td><a href="<?= site_url('insurance/editClaim/'.$claim->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('insurance/deleteClaim/'.$claim->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
                  </td>      
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

        

