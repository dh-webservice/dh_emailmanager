<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dh_emailmanager_model extends Base_model
{
    // Author tables
    protected $_author_table = 'module_dh_emailmanager_newsletter';
    #protected $_author_lang_table = 'module_demo_author_lang';
 
    // Link table between authors and parents (page, article)
    #protected $_link_table = 'module_demo_links';
 
    /**
     * Model Constructor
     *
     * @access  public
     */
    public function __construct()
    {
        $this->set_table($this->_author_table);
        #$this->set_lang_table($this->_author_lang_table);
        $this->set_pk_name('id');
 
        parent::__construct();
    }
	
    public function save($inputs)
    {
        // Arrays of data which will be saved
        $data = $data_lang = array();
 
        // Fields of the author table
        $fields = $this->list_fields();
 
        // Set the data to the posted value.
        foreach ($fields as $field)
            $data[$field] = $inputs[$field];
 		 
        return parent::save($data, $data_lang);
    }	
	


    /**
     * Deletes one Author
     * and the corresponding lang data
     *
     * @param int   $id
     *
     * @return int  Number of delete items in main table
     *
     */
    public function delete($id)
    {
        $nb_rows = parent::delete($id, $this->_author_table);
     
        #if ($nb_rows > 0)
        #parent::delete($id, $this->_author_lang_table);
     
        return $nb_rows;
    }	
	
	public function csv_from_array($array, $delim = "\t", $newline = "\n", $enclosure = '"')
	{
		$out = '';
		
		if ( ! empty($array))
		{
			// First generate the headings from the table column names
			$column_names = $array[0];
			foreach (array_keys($column_names) as $name)
			{
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $name).$enclosure.$delim;
			}
			
			$out = rtrim($out);
			$out .= $newline;
			
			// Next blast through the result array and build out the rows
			foreach ($array as $row)
			{
				foreach ($row as $item)
				{
					$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $item).$enclosure.$delim;			
				}
				$out = rtrim($out);
				$out .= $newline;
			}
		}
		return $out;
	}
	
	
	
	
	
}