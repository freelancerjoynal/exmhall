<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class SettingsModel extends Model
{
		
		public function get_site_details() {
			$sql = "SELECT * FROM ".TBL_SITE_SETTINGS;
			$db = $this->db->query($sql);
			 $details = $db->getRowArray(); 
			 
			 return $details;
		}
		
		public function site_details_update($data, $site_id) {
			$DB = $this->db->table(TBL_SITE_SETTINGS)
										 ->where('id', $site_id)
										 ->update($data);
			$affectedRows = $this->db->affectedRows();
			
			return $affectedRows;
		}
		
		
		public function data_insert($table_name, $data) {
			
			$insert = $this->db->table($table_name)->insert($data);
			if($insert) 
			{
				$insert_id = $this->db->insertID();
				$this->db->close();
				return $insert_id;
			} 
			else 
			{
				return false;
			}
		}
		
		public function data_batch_insert($table_name, $data) {
			
			$insert = $this->db->table($table_name)->insertBatch($data);
			if($insert) 
			{
				$insert_id = $this->db->insertID();
				$this->db->close();
				return $insert_id;
			} 
			else 
			{
				return false;
			}
		}
		
		public function data_delete($table_name, $conditions = array()) {
			
			if(!empty($conditions)) {
				
				$deleted = $this->db->table($table_name)->delete($conditions);
				
				if($deleted) 
				{
					$affected = $this->db->affectedRows();
					$this->db->close();
					return $affected;
				} 
				else 
				{
					return false;
				}
				
			}
			
		}
		
		public function data_update($table_name, $data, $conditions = array()) {
			
			if(!empty($conditions)) {
				
				$update = $this->db->table($table_name)->where($conditions)->update($data);
				//pre($this->db->getLastQuery());
				if($update) 
				{
					$affected = $this->db->affectedRows();
					$this->db->close();
					return $affected;
				} 
				else 
				{
					return false;
				}
				
			}
		}
		
		public function data_batch_update($table_name, $data, $condition_coloumn_name) {
				
			if($condition_coloumn_name) {
				
				$update = $this->db->table($table_name)->updateBatch($data, $condition_coloumn_name);
				if($update) 
				{
					$affected = $this->db->affectedRows();
					$this->db->close();
					return $affected;
				} 
				else 
				{
					return false;
				}
				
			}
			
		}
	
	
}