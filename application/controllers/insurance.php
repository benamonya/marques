<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language','text'));
        $this->load->model('insurance_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

       public function index()
       {
           $this->data['insurance'] = $this->insurance_model->get_insurance();
           $this->render_page('theme/insurance/company', $this->data);
       }
    public function claims()
    {
        $this->data['claim'] = $this->insurance_model->get_claims();
        $this->render_page('theme/insurance/insurance_claim', $this->data);
    }
    public function create()
    {
        $this->data['title'] ='create An Insurance' ;

        $this->form_validation->set_rules('name', 'Insurance Company', 'required');
       

        if ($this->form_validation->run() == true)
        {
 
            $company_data = array(
                'Name' => $this->input->post('name'),
                'ContactName' => $this->input->post('contactname'),
                'ContactNo' => $this->input->post('contactNo')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->create($company_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->index();
        }
        else
        {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Insurance Name',
                'class' => 'form-control'
            );
            $this->data['contactname'] = array(
                'name'  => 'contactname',
                'id'    => 'contactname',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Contact Name',
                'class' => 'form-control'
            );
            $this->data['contactNo'] = array(
                'name'  => 'contactNo',
                'id'    => 'contactNo',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Contact Number',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/create', $this->data);
        }
    }
    public function edit($id)
    {
        $this->data['title'] = 'Edit insurance';

        $insurance = $this->insurance_model->edit($id)->row();
        $this->data['insurance']=$insurance;
        // validate form input
        $this->form_validation->set_rules('name', 'Insurance Company', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $company_data = array(
                        'Name' => $this->input->post('name'),
                        'ContactName' => $this->input->post('contactname'),
                        'ContactNo' => $this->input->post('contactNo')
                      
                    );
               if($this->insurance_model->update($insurance->Id, $company_data))
                {
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     $this->index();
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('insurance/edit/'.$insurance->Id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->Name),
                'placeholder'=>'Insurance Name',
                'class' => 'form-control'
            );
            $this->data['contactname'] = array(
                'name'  => 'contactname',
                'id'    => 'contactname',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->ContactName),
                'placeholder'=>'Contact Name',
                'class' => 'form-control'
            );
            $this->data['contactNo'] = array(
                'name'  => 'contactNo',
                'id'    => 'contactNo',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->ContactNo),
                'placeholder'=>'Contact Number',
                'class' => 'form-control'
            );
            $this->render_page('theme/insurance/edit', $this->data);
        }

   }

    
    public function delete($value)
   {
     if($this->insurance_model->delete($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      $this->index();
   }

	public function renewal()
       {
           $this->data['renewal'] = $this->insurance_model->get_renewal();
           $this->render_page('theme/insurance/renewal', $this->data);
       }




	
	
	 public function create_renawal()
    {
        $this->data['title'] ='Renewal' ;

        $this->form_validation->set_rules('renewal', 'Renewal', 'required');
       

        if ($this->form_validation->run() == true)
        {
 
            $renewal_data = array(
                'renewal' => $this->input->post('renewal')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->create_renewal($renewal_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->renewal();
        }
        else
        {
            
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Renewal',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/renewal_create', $this->data);
        }
    }

	public function edit_renewal($id)
    {
        $this->data['title'] = 'Edit Renewal';

        $renewal = $this->insurance_model->edit_renewal($id)->row();
        $this->data['renewal_data']=$renewal;

        $this->form_validation->set_rules('renewal', 'Renewal', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $renewal_data = array(
                'renewal' => $this->input->post('renewal')
              
            );
               if($this->insurance_model->update_renewal($renewal->ID, $renewal_data))
                {
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     $this->renewal();
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('insurance/edit_renewal/'.$renewal->ID, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $renewal->Renewal),
                'placeholder'=>'Renewal',
                'class' => 'form-control'
            );
            $this->render_page('theme/insurance/renewal_edit', $this->data);
        }

   }

  public function delete_renewal($id)
  {
     
       if($this->insurance_model->delete_renewal($id)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      redirect('insurance/renewal', $this->data);
     //$this->renewal();
  }
  public function accident()
  {
      $this->data['accident'] = $this->insurance_model->get_accident();
      $this->render_page('theme/insurance/accident', $this->data);
  }
  public function details()
  {
      $id = $this->uri->segment(3);
      $this->data['accident'] = $this->insurance_model->per_id($id);
      $this->render_page('theme/insurance/accident_d', $this->data);
  }
	public function accident_c()
    {
        $this->data['title'] ='Record Accident' ;

        $this->form_validation->set_rules('fleet', 'Fleet', 'required');
        $this->form_validation->set_rules('vehicle', 'Vehicle', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
        $this->form_validation->set_rules('details', 'Details', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == true)
        {

        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
            );
        $this->load->library('upload', $config);
        if($this->insurance->accident_c('userImage'))
            {
            $imageUpload = array('upload_data' => $this->upload->data());
            }
            else
            {
            $imageUpload = array('error' => $this->upload->display_errors());
        }
 
            $accident_data = array(
                'SysDate' => date('Y-m-d H:i:s'),
                'Date' => $this->input->post('date'),
                'Fleet' => $this->input->post('fleet'),
                'Vehicle' => $this->input->post('vehicle'),
                'Type' => $this->input->post('type'),
                'Details' => $this->input->post('details'),
                'Driver' => $this->input->post('driver'),
                'Injured' => $this->input->post('injured'),
                'Images' => $imageUpload,
                'EnteredBy' => $this->input->post('enteredBy'),
                'DamageToVehicle' => $this->input->post('damageto'),
                'ThirdPartyDamages' => $this->input->post('partyDamages'),
                'Time' => $this->input->post('time'),
                'Deaths' => $this->input->post('deaths'),
                'Location' => $this->input->post('location'),
                'StatusInjured'=>$this->input->post('status'),
                'Category'=>$this->input->post('category')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->record_accident($accident_data))
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

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => date('Y-m-d H:i:s'),
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['details'] = array(
                'name'  => 'details',
                'id'    => 'details',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Details of the accident',
                'class' => 'form-control'
            );
            $this->data['injured'] = array(
                'name'  => 'injured',
                'id'    => 'injured',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'How many People are injured?',
                'class' => 'form-control'
            );
            $this->data['images'] = array(
                'name'  => 'userImage',
                'id'    => 'userImage',
                'type'  => 'file',
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
            $this->data['damageto'] = array(
                'name'  => 'damageto',
                'id'    => 'damageto',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Damage To the vehicle',
                'class' => 'form-control'
            );
            $this->data['partyDamages'] = array(
                'name'  => 'partyDamages',
                'id'    => 'partyDamages',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'3rd Party Damages',
                'class' => 'form-control'
            );
            $this->data['time'] = array(
                'name'  => 'time',
                'id'    => 'time',
                'type'  => 'text',
                'value' => date('H:m:s'),
                'placeholder'=>'Time',
                'class' => 'form-control'
            );
            $this->data['deaths'] = array(
                'name'  => 'deaths',
                'id'    => 'deaths',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Number of Deaths',
                'class' => 'form-control'
            );
            $this->data['location'] = array(
                'name'  => 'location',
                'id'    => 'location',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Location Of The Accident',
                'class' => 'form-control'
            );
            $this->data['status'] = array(
                'name'  => 'status',
                'id'    => 'status',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Status of the Injured',
                'class' => 'form-control'
            );
            $this->data['category'] = array(
                'name'  => 'category',
                'id'    => 'category',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'category',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/accident_c', $this->data);
        }
    }
    public function accident_e($id)
    {
        $this->data['title'] ='Edit' ;

        $accidedit = $this->insurance_model->edit_accident($id)->row();
        $this->data['accid_data']=$accidedit;
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

                $accident_data = array(
                        'SysDate' => date('Y-m-d H:i:s'),
                        'Date' => $this->input->post('date1'),
                        'Fleet' => $this->input->post('fleet1'),
                        'Vehicle' => $this->input->post('vehicleNo'),
                        'Type' => $this->input->post('type1'),
                        'Details' => $this->input->post('details1'),
                        'Driver' => $this->input->post('driver1'),
                        'Injured' => $this->input->post('injured'),
                        'EnteredBy' => $this->input->post('enteredBy'),
                        'DamageToVehicle' => $this->input->post('damageto'),
                        'ThirdPartyDamages' => $this->input->post('partyDamages'),
                        'Time' => $this->input->post('time1'),
                        'Deaths' => $this->input->post('deaths'),
                        'Location' => $this->input->post('location1'),
                        'StatusInjured'=>$this->input->post('status1'),
                        'Category'=>$this->input->post('category1')
                      
                    );
                    $this->insurance_model->update_accident($accidedit->Id, $accident_data);
                   //redirect('insurance/accident_e/'.$accidedit->Id, 'refresh');
                    $this->accident();
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['fleet_type'] = $this->insurance_model->get_fleet();
               $this->data['driver'] = $this->insurance_model->get_driver();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();

            $this->data['date'] = array(
                'name'  => 'date1',
                'id'    => 'date1',
                'type'  => 'text',
                'value' => $accidedit->Date,
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['details'] = array(
                'name'  => 'details1',
                'id'    => 'details1',
                'rows'        => '5',
                'cols'        => '1',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type', $accidedit->Details),
                'placeholder'=>'Details of the accident',
                'class' => 'form-control'
            );
            $this->data['injured'] = array(
                'name'  => 'injured',
                'id'    => 'injured',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->Injured),
                'placeholder'=>'How many People are injured?',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->EnteredBy),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
            $this->data['damageto'] = array(
                'name'  => 'damageto',
                'id'    => 'damageto',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->DamageToVehicle),
                'placeholder'=>'Damage To the vehicle',
                'class' => 'form-control'
            );
            $this->data['partyDamages'] = array(
                'name'  => 'partyDamages',
                'id'    => 'partyDamages',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->ThirdPartyDamages),
                'placeholder'=>'3rd Party Damages',
                'class' => 'form-control'
            );
            $this->data['time'] = array(
                'name'  => 'time1',
                'id'    => 'time1',
                'type'  => 'text',
                'value' => $accidedit->Time,
                'placeholder'=>'Time',
                'class' => 'form-control'
            );
            $this->data['deaths'] = array(
                'name'  => 'deaths',
                'id'    => 'deaths',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->Deaths),
                'placeholder'=>'Number of Deaths',
                'class' => 'form-control'
            );
            $this->data['location'] = array(
                'name'  => 'location1',
                'id'    => 'location1',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->Location),
                'placeholder'=>'Location Of The Accident',
                'class' => 'form-control'
            );
            $this->data['status'] = array(
                'name'  => 'status1',
                'id'    => 'status1',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->StatusInjured),
                'placeholder'=>'Status of the Injured',
                'class' => 'form-control'
            );
            $this->data['category'] = array(
                'name'  => 'category1',
                'id'    => 'category1',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $accidedit->StatusInjured),
                'placeholder'=>'category',
                'class' => 'form-control'
            );
           
            $this->render_page('theme/insurance/accident_e', $this->data);
        }

   }
    public function createClaim()
    {

        $this->form_validation->set_rules('fleet', 'Fleet', 'required');
        $this->form_validation->set_rules('cash', 'Claim', 'required');
        $this->form_validation->set_rules('accidentDate', 'Accident Date', 'required');
        $this->form_validation->set_rules('Reciept', 'Reciept Number', 'required');

        if ($this->form_validation->run() == true)
        {
        
            $claim_data = array(
                'SysDate' => date('Y-m-d H:i:s'),
                'Fleet' => $this->input->post('fleet'),
                'Type' => $this->input->post('type'),
                'VehicleNo' => $this->input->post('vehicleNo'),
                'AccidentDate' => $this->input->post('accidentDate'),
                'Claim' => $this->input->post('cash'),
                'EnteredBy' => $this->input->post('enteredBy'),
                'ReceiptNo' => $this->input->post('Reciept'),
                'Remarks' => $this->input->post('remarks'),
                'insurer' => $this->input->post('insurer'),
                'Date' => $this->input->post('dateit')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->record_claim($claim_data))
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
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => date('Y-m-d H:i:s'),
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['accidentDate'] = array(
                'name'  => 'accidentDate',
                'id'    => 'accidentDate',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'When Was the accident?',
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
            $this->data['cash'] = array(
                'name'  => 'cash',
                'id'    => 'cash',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'How much is the insurance Claim?',
                'class' => 'form-control'
            );
            $this->data['Reciept'] = array(
                'name'  => 'Reciept',
                'id'    => 'Reciept',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Reciept',
                'class' => 'form-control'
            );
            $this->data['insurer'] = array(
                'name'  => 'insurer',
                'id'    => 'insurer',
                'type'  => 'text',
                'value' => date('H:m:s'),
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'insurer',
                'class' => 'form-control'
            );
            $this->data['dateit'] = array(
                'name'  => 'dateit',
                'id'    => 'dateit',
                'type'  => 'datetime-local',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Date Of the Accident',
                'class' => 'form-control'
            );
            $this->data['remarks'] = array(
                'name'  => 'remarks',
                'id'    => 'remarks',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Few remarks',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/createClaim', $this->data);
        }
    }
    public function editClaim($id)
    {
        $this->data['title'] = 'Edit Renewal';

        $claim_e = $this->insurance_model->editClaim($id)->row();
        $this->data['claim_e']=$claim_e;

        
        $this->form_validation->set_rules('fleet', 'Fleet', 'required');
        $this->form_validation->set_rules('cash', 'Claim', 'required');
        $this->form_validation->set_rules('accidentDate', 'Accident Date', 'required');
        $this->form_validation->set_rules('Reciept', 'Reciept Number', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $claim_data = array(
                        'SysDate' => date('Y-m-d H:i:s'),
                        'Fleet' => $this->input->post('fleet'),
                        'Type' => $this->input->post('type'),
                        'VehicleNo' => $this->input->post('vehicleNo'),
                        'AccidentDate' => $this->input->post('accidentDate'),
                        'Claim' => $this->input->post('cash'),
                        'EnteredBy' => $this->input->post('enteredBy'),
                        'ReceiptNo' => $this->input->post('Reciept'),
                        'Remarks' => $this->input->post('remarks'),
                        'insurer' => $this->input->post('insurer'),
                        'Date' => $this->input->post('dateit')
                      
                    );
               if($this->insurance_model->update_claim($claim_e->Id, $claim_data))
                {
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     $this->renewal();
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('insurance/editClaim/'.$claim_e->Id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['fleet_type'] = $this->insurance_model->get_fleet();
               $this->data['driver'] = $this->insurance_model->get_driver();
               $this->data['vehicle_No'] = $this->insurance_model->get_vehicleNo();
               $this->data['vehicle_type'] = $this->insurance_model->get_vehicle();

            $this->data['date'] = array(
                'name'  => 'date',
                'id'    => 'date',
                'type'  => 'text',
                'value' => $claim_e->SysDate,
                'placeholder'=>'Date',
                'class' => 'form-control'
            );
            $this->data['accidentDate'] = array(
                'name'  => 'accidentDate',
                'id'    => 'accidentDate',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $claim_e->AccidentDate),
                'placeholder'=>'When Was the accident?',
                'class' => 'form-control'
            );
            $this->data['enteredBy'] = array(
                'name'  => 'enteredBy',
                'id'    => 'enteredBy',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $claim_e->EnteredBy),
                'placeholder'=>'Enter Your Name',
                'class' => 'form-control'
            );
            $this->data['cash'] = array(
                'name'  => 'cash',
                'id'    => 'cash',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $claim_e->Claim),
                'placeholder'=>'How much is the insurance Claim?',
                'class' => 'form-control'
            );
            $this->data['Reciept'] = array(
                'name'  => 'Reciept',
                'id'    => 'Reciept',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $claim_e->ReceiptNo),
                'placeholder'=>'Reciept',
                'class' => 'form-control'
            );
            $this->data['insurer'] = array(
                'name'  => 'insurer',
                'id'    => 'insurer',
                'type'  => 'text',
                'value' => date('H:m:s'),
                'value' => $this->form_validation->set_value('type', $claim_e->insurer),
                'placeholder'=>'insurer',
                'class' => 'form-control'
            );
            $this->data['dateit'] = array(
                'name'  => 'dateit',
                'id'    => 'dateit',
                'type'  => 'datetime-local',
                'value' => $this->form_validation->set_value('type', $claim_e->Date),
                'placeholder'=>'Date Of the Accident',
                'class' => 'form-control'
            );
            $this->data['remarks'] = array(
                'name'  => 'remarks',
                'id'    => 'remarks',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:50%',
                'value' => $this->form_validation->set_value('type', $claim_e->Remarks),
                'placeholder'=>'Few remarks',
                'class' => 'form-control'
            );
            $this->render_page('theme/insurance/editClaim', $this->data);
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
