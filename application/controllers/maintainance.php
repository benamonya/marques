<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maintainance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language','text','string'));
        $this->load->model(array('maintainance_model','insurance_model'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

       public function index()
       {
           $this->data['maintainance'] = $this->maintainance_model->get_maintainance();
           $this->render_page('theme/repair/maintainance', $this->data);
       }
    public function maintaincreate()
    {

        $this->form_validation->set_rules('fleet', 'Fleet', 'required');
        $this->form_validation->set_rules('vehicle', 'Vehicle', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
        $this->form_validation->set_rules('details', 'Details', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == true)
        {
 
            $maintain_data = array(
                'SysDate' => date('Y-m-d H:i:s'),
                'Date' => $this->input->post('date'),
                'Fleet' => $this->input->post('fleet'),
                'Vehicle' => $this->input->post('vehicleNo'),
                'Type' => $this->input->post('type'),
                'Supplier'=> $this->input->post('supplier'),
                'Cost' => $this->input->post('cost'),
                'Remarks' => $this->input->post('details'),
                'RefNo' => "Ref:".random_string('alnum',5),
                'EnteredBy' => $this->input->post('enteredBy'),
                'Approval' => $this->input->post('approval'),
                'MeterReading' => $this->input->post('meter'),
                'AccidentRef' => $this->input->post('acciref'),
                'PaymentVoucher' => $this->input->post('voucher'),
                'MaintType' => $this->input->post('Maintype')
            );
        }
        if ($this->form_validation->run() == true && $this->maintainance_model->create($maintain_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->accident();
        }
        else
        {
            
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
               $this->data['fleet_type'] = $this->insurance_model->get_fleet();
               $this->data['driver'] = $this->insurance_model->get_driver();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();
               $this->data['supplier'] = $this->maintainance_model->get_supplier();
               $this->data['maintatype'] = $this->maintainance_model->get_maintype();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => date('Y-m-d H:i:s'),
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['Remarks'] = array(
                'name'  => 'Remarks',
                'id'    => 'Remarks',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Your Remarks',
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Cost',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
            $this->data['approval'] = array(
                'name'  => 'approval',
                'id'    => 'approval',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'class' => 'form-control'
            );
            $this->data['meter'] = array(
                'name'  => 'meter',
                'id'    => 'meter',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'What is the meter reading',
                'class' => 'form-control'
            );
            $this->data['acciref'] = array(
                'name'  => 'acciref',
                'id'    => 'acciref',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Accident Reference',
                'class' => 'form-control'
            );
            $this->data['voucher'] = array(
                'name'  => 'voucher',
                'id'    => 'voucher',
                'type'  => 'voucher',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Payment Voucher',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/repair/create', $this->data);
        }
    }
    public function edit($id)
    {
        $this->data['title'] = 'Edit Maintainace';

        $mainEdit = $this->maintainance_model->edit($id)->row();
        $this->data['mainEdit']=$mainEdit;
        // validate form input
        $this->form_validation->set_rules('fleet', 'Fleet', 'required');
        $this->form_validation->set_rules('vehicle', 'Vehicle', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
        $this->form_validation->set_rules('details', 'Details', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

                $maintain_data = array(
                        'SysDate' => date('Y-m-d H:i:s'),
                        'Date' => $this->input->post('date'),
                        'Fleet' => $this->input->post('fleet'),
                        'Vehicle' => $this->input->post('vehicleNo'),
                        'Type' => $this->input->post('type'),
                        'Supplier'=> $this->input->post('supplier'),
                        'Cost' => $this->input->post('cost'),
                        'Remarks' => $this->input->post('Remarks'),
                        'EnteredBy' => $this->input->post('enteredBy'),
                        'Approval' => $this->input->post('approval'),
                        'MeterReading' => $this->input->post('meter'),
                        'AccidentRef' => $this->input->post('acciref'),
                        'PaymentVoucher' => $this->input->post('voucher'),
                        'MaintType' => $this->input->post('Maintype')
                    );
                    $this->maintainance_model->update($mainEdit->Id, $maintain_data);
                    $this->index();
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['fleet_type'] = $this->insurance_model->get_fleet();
               $this->data['driver'] = $this->insurance_model->get_driver();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();
               $this->data['supplier'] = $this->maintainance_model->get_supplier();
               $this->data['maintatype'] = $this->maintainance_model->get_maintype();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => $mainEdit->Date,
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['Remarks'] = array(
                'name'  => 'Remarks',
                'id'    => 'Remarks',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type',$mainEdit->Remarks),
                'placeholder'=>'Your Remarks',
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $mainEdit->Cost),
                'placeholder'=>'Cost',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $mainEdit->EnteredBy),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
            $this->data['approval'] = array(
                'name'  => 'approval',
                'id'    => 'approval',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $mainEdit->Approval),
                'class' => 'form-control'
            );
            $this->data['meter'] = array(
                'name'  => 'meter',
                'id'    => 'meter',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $mainEdit->MeterReading),
                'placeholder'=>'What is the meter reading',
                'class' => 'form-control'
            );
            $this->data['acciref'] = array(
                'name'  => 'acciref',
                'id'    => 'acciref',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $mainEdit->AccidentRef),
                'placeholder'=>'Accident Reference',
                'class' => 'form-control'
            );
            $this->data['voucher'] = array(
                'name'  => 'voucher',
                'id'    => 'voucher',
                'type'  => 'voucher',
                'value' => $this->form_validation->set_value('type', $mainEdit->PaymentVoucher ),
                'placeholder'=>'Payment Voucher',
                'class' => 'form-control'
            );
            $this->render_page('theme/repair/edit', $this->data);
        }

   }

    
    public function delete($value)
   {
     if($this->maintainance_model->delete($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      $this->index();
   }
   public function repair_delete($value)
   {
     if($this->maintainance_model->repair_delete($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      $this->index();
   }
   public function repair()
       {
           $this->data['repair'] = $this->maintainance_model->get_repair();
           $this->render_page('theme/repair/repair', $this->data);
       }
	public function repaircreate()
    {

        $this->form_validation->set_rules('cost', 'Cost', 'required');
        $this->form_validation->set_rules('vehicleNo', 'Vehicle', 'required');

        if ($this->form_validation->run() == true)
        {
 
            $repair_data = array(
                'Date' => $this->input->post('date'),
                'Vehicle' => $this->input->post('vehicleNo'),
                'part' => $this->input->post('part'),
                'cost'=> $this->input->post('cost'),
                'Details' => $this->input->post('Details'),
                'EnteredBy' => $this->input->post('enteredBy')
            );
        }
        if ($this->form_validation->run() == true && $this->maintainance_model->createRepair($repair_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->repair();
        }
        else
        {
            
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => date('Y-m-d H:i:s'),
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['Details'] = array(
                'name'  => 'Details',
                'id'    => 'Details',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Details of your repair',
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Cost',
                'class' => 'form-control'
            );
            $this->data['part'] = array(
                'name'  => 'part',
                'id'    => 'part',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Name Of the Part being replaced',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/repair/createRepair', $this->data);
        }
    }
    public function repair_edit($id)
    {
        
        $repairEdit = $this->maintainance_model->editREpair($id)->row();
        $this->data['repairEdit']=$repairEdit;
        // validate form input
        $this->form_validation->set_rules('cost', 'Cost', 'required');
        $this->form_validation->set_rules('vehicleNo', 'Vehicle', 'required');

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

                $repair_data = array(
                        'Date' => $this->input->post('date'),
                        'Vehicle' => $this->input->post('vehicleNo'),
                        'part' => $this->input->post('part'),
                        'cost'=> $this->input->post('cost'),
                        'Details' => $this->input->post('details'),
                        'EnteredBy' => $this->input->post('enteredBy')
                    );
                    $this->maintainance_model->updateRepair($repairEdit->Id, $repair_data);
                    $this->repair();
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => $repairEdit->Date,
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['Details'] = array(
                'name'  => 'Details',
                'id'    => 'Details',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type', $repairEdit->Details),
                'placeholder'=>'Details of your repair',
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $repairEdit->cost),
                'placeholder'=>'Cost of the part being repaired',
                'class' => 'form-control'
            );
            $this->data['part'] = array(
                'name'  => 'part',
                'id'    => 'part',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $repairEdit->part),
                'placeholder'=>'Name of the part being repaired',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $repairEdit->enteredBy),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
            $this->render_page('theme/repair/editRepair', $this->data);
        }

   }
    public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

    public function render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

       
        $this->load->view('theme/header');
        $this->load->view('theme/sidebar');
        $this->load->view($view, $this->viewdata, $returnhtml);
        $this->load->view('theme/footer');
    
    } 
}
