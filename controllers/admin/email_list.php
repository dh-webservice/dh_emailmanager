<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Email_list extends Module_Admin
{
    /**
     * Constructor
     *
     * @access  public
     * @return  void
     */
    public function construct()
    {
        // Loads the model as 'author_model'
        $this->load->model('dh_emailmanager_model', 'author_model', true);
        $this->load->model('page_model', '', TRUE);		
    }
 
    /**
     * Outputs the authors list
     *
     */
    public function get_list()
    {
        $conds = array(
            'order_by' => 'time DESC'
        );
 
        $this->template['emails'] = $this->author_model->get_list($conds);			
 
        $this->output('admin/email_list');
    }
	
    public function dh_get_list()
    {
        $this->template['csv'] = $this->author_model->csv_from_array($this->author_model->get_list($conds));		
		#echo  $this->template['csv'];
		$this->output('admin/email_list');
		
		/*
        $this->template['csv'] = $this->author_model->get_list($conds);
        $this->output('admin/email_list');
		*/
			
    }	
	
 
    /**
     * Outputs the detail of one author
     * @param int ID of the author
     *
     */
    public function get($id)
    {
        $where = array(
            'id' => $id
        );
        $this->template = $this->author_model->get($where);
 
        $this->author_model->feed_lang_template($id, $this->template);
 
        $this->output('admin/email_detail');
    }
 
    /**
     * Saves one author
     *
     */
    public function save()
    {
		/*
		//Check first, if the email address already exists. If it already exists, an error msg is displayed.
        $where = array(
            'email' => $this->input->post('email')
        );
        if($this->author_model->get($where)){
				$this->error(lang('module_dh_emailmanager_email_already_exists'));
		}
		*/
		//If the email address does not exist, the data will be saved
		#else{
			// The name must be set
			if ($this->input->post('email') != '')
			{
				$id = $this->author_model->save($this->input->post());
	 
				// Update the authors list
				$this->update[] = array(
					'element' => 'moduleDemoAuthorsList',
					'url' => admin_url() . 'module/dh_emailmanager/email_list/get_list'
				);
	 
				// Send the user a message
				$this->success(lang('ionize_message_operation_ok'));
			}
			else
			{
				// Send the user a message
				$this->error(lang('ionize_message_operation_nok'));
			}
		#}
    }
	

    /**
     * Displays the author form
     *
     */
    function create()
    {
        $this->author_model->feed_blank_template($this->template);
        $this->author_model->feed_blank_lang_template($this->template);
 
        $this->output('admin/email_detail');
    }	
	
	
	/**
	 * Delete one author
	 *
	 */
	public function delete($id)
	{
		if ($this->author_model->delete($id) > 0)
		{
			// Update the authors list
			$this->update[] = array(
				'element' => 'moduleDemoAuthorsList',
				'url' => admin_url() . 'module/dh_emailmanager/email_list/get_list'
			);
	 
			// Send the user a message
			$this->success(lang('ionize_message_operation_ok'));
		}
		else
		{
			// Send the user a message
			$this->error(lang('ionize_message_operation_nok'));
		}
	}	
	
}