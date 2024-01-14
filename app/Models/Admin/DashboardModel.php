<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class DashboardModel extends Model
{
		
		public function get_dashboard_reports() {
			$sql = "SELECT COUNT(*) AS total_users_count,
							(SELECT SB.remaining_coins FROM ".TBL_STOCK_BALANCE." AS SB LIMIT 1) AS total_remaining_coins,
							(SELECT CONCAT(TRC.symbol_left, '', DV.click_amount, '', TRC.symbol_right) AS click_amount FROM ".TBL_DONATE_VALUE." AS DV LEFT JOIN ".TBL_REF_CURRENCIES." AS TRC ON TRC.id = DV.click_currency WHERE DV.status = '1' LIMIT 1) AS current_conversion_rate,
							(SELECT SUM(PH.payment_gross) FROM ".TBL_PAYMENT_HISTORY." AS PH INNER JOIN ".TBL_USERS_CART." AS UC ON PH.cart_order_id = UC.order_id WHERE PH.payment_status = '1' OR PH.payment_status = 1) AS total_success_transaction_amount
							FROM ".TBL_USER_LIST." AS UL WHERE UL.status = '1' ";
							
			$db = $this->db->query($sql);
			return $db->getRowArray(); 
		}
}