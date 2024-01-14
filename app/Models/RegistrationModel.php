<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    
    public function demo_class_request_insert($data) {
		$db = $this->db->table(TBL_CONTACT)->insert($data);
		$insertID = $this->db->insertID();
		return $insertID;
	}
	
	public function user_data_insert($data) {
		$db = $this->db->table(TBL_USER_LIST)->insert($data);
		
		//echo $this->db->getLastQuery(); die;
		$insertID = $this->db->insertID();
		return $this->user_data_get($insertID);
	}
	
	public function user_data_get($data, $type = 'id') {
		
		$result = array();
		if($data) {
		$condition = 'WHERE 1=1';
		if($type == 'id') {
			$condition .=" AND account_id =".(int)$data;
		} else if($type == 'email') {
			$condition .=" AND LOWER(email) =".strtolower(trim($data));
		} else if($type == 'mobile') {
			$condition .=" AND mobile =".strtolower(trim($data));
		}
		
		
		$sql = "SELECT * FROM ".TBL_USER_LIST." $condition LIMIT 1";
		$db = $this->db->query($sql);
		$result   = $db->getRowArray();
		}
		
		return $result;
	}
	
	/*public function get_faq_list($filter = array()) {
			$results = array();
			$draw = isset($filter['draw']) ? $filter['draw']: '';
			$offset = isset($filter['start']) ? $filter['start'] : '';
			$limit = isset($filter['length']) ? $filter['length']: ''; // Rows display per page
			$searchValue = isset($filter['search']['value']) ? trim($filter['search']['value']) : ''; // Search value
			if(isset($filter['order']) && !empty($filter['order'])){
				$columnIndex = $filter['order'][0]['column']; // Column index
				$columnName = $filter['columns'][$columnIndex]['data']; // Column name
				$columnSortOrder = $filter['order'][0]['dir']; // asc or desc
			}
			else if(isset($filter['call_from']) && $filter['call_from'] == 'frontend') {
				$columnName = 'F.id'; // Column name
				$columnSortOrder = 'asc'; // asc or desc
			}
			else{
				$columnName = 'F.id'; // Column name
				$columnSortOrder = 'desc'; // asc or desc
			}
			
			$conditions = ' WHERE 1 = "1"';
			$orderBy = "ORDER BY $columnName $columnSortOrder";
			$limitOffset = '';
			if($offset !='' && $limit !='') {
				$limitOffset = "LIMIT $limit OFFSET $offset";
			}
			
			/*if($searchValue !='') {
				$conditions .= " AND (F.questions like '%".(int)$searchValue."%' OR F.answers like '%".$searchValue."%')";
			}*****
			
			if(isset($filter['id']) && $filter['id']) {
				$conditions .= " AND F.id = ".trim($filter['id']);
			}
			
			## Total number of records without conditions
			$allCountSQL = "SELECT F.id FROM ".TBL_FAQ." AS F";
			$count_db = $this->db->query($allCountSQL);
			$allData =  $count_db->getResultArray();
			$results['recordsTotal'] = is_array($allData) ? count($allData) : 0;
			
			## Total number of records with conditions
			$sql = "SELECT F.id FROM ".TBL_FAQ." AS F $conditions";
			$count_db = $this->db->query($sql);
			$allDataWithConditions =  $count_db->getResultArray();
			$results['recordsWithFiltered'] = is_array($allDataWithConditions) ? count($allDataWithConditions) : 0;
			
			## Results
			$sql = "SELECT * FROM ".TBL_FAQ." AS F $conditions $orderBy $limitOffset";
			
			$db = $this->db->query($sql);
			$results['results'] = $db->getResultArray();
			
			return $results;
		}*/
		
		
}