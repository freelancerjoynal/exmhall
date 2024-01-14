<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class ClassesModel extends Model
{
		public function get_classes_list($filter = array()) {
			
			$sql = "SELECT * FROM ".TBL_CLASSES;
			
			$db = $this->db->query($sql);
			$result = $db->getResultArray();   //  For multiple row return
			//$result = $db->getRowArray(); //  For single row return
			$this->db->close();
			return $result;
		}
		
		public function get_class_details($class_id) {
			
			$sql = "SELECT * FROM ".TBL_CLASSES. " WHERE id = " . $class_id;
			
			$db = $this->db->query($sql);
			$result = $db->getRowArray();
			$this->db->close();
			return $result;
		}
		
}