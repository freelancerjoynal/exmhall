<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	
	
	/*------------------------	
		FRONTEND VALIDATION
	----------------------------*/
	
	public $user_login = [
		 'user_id' => [
					'label'  => 'Username',
					'rules'  => 'required',
			],
		 'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
			],
	];
	
	public $receive_coin = [
		'donate_amount' => [
				 'label'  => 'Donate Amount',
				 'rules'  => 'required',
		 ],
		 'receive_coin' => [
				 'label'  => 'Received Click Coin(s)',
				 'rules'  => 'required',
		 ]
 ];
 
 public $email_verify = [
	'email' => [
		'label'  => 'Email',
		'rules'  => 'required|valid_email|max_length[40]',
	 ],
	//  'recovery_email' => [
	// 	 'label'  => 'Recovery email',
	// 	 'rules'  => 'valid_email|max_length[40]',
	// 	],
	'otp' => [
		'label'  => 'One time password',
		'rules'  => 'required|min_length[5]|max_length[5]',
	 ],
	'password' => [
		'label'  => 'Password',
		'rules'  => 'required|min_length[6]|max_length[10]',
	 ],
	 'confirm_password' => [
		 'label'  => 'Confirm password',
		 'rules'  => 'required|min_length[6]|max_length[10]|matches[password]',
		]
];
	
  public $email_verify_password = [
	'email' => [
		'label'  => 'Email',
		'rules'  => 'required|valid_email|max_length[40]',
	 ],
	//  'recovery_email' => [
	// 	 'label'  => 'Recovery email',
	// 	 'rules'  => 'valid_email|max_length[40]',
	// 	],
	'otp' => [
		'label'  => 'One time password',
		'rules'  => 'required|min_length[5]|max_length[5]',
	 ],
	'password' => [
		'label'  => 'Password',
		'rules'  => 'required|min_length[6]|max_length[10]',
	 ],
	 'confirm_password' => [
		 'label'  => 'Confirm password',
		 'rules'  => 'required|min_length[6]|max_length[10]|matches[password]',
		]
]; 
  
	public $password_change = [
		'current_password' => [
				 'label'  => 'Current Password',
				 'rules'  => 'required',
		 ],
		 'new_password' => [
				 'label'  => 'New Password',
				 'rules'  => 'required',
		 ],
		 'confirm_password' => [
				 'label'  => 'Re-type',
				 'rules'  => 'required|matches[new_password]',
		 ]
	];
	
	public $update_profile_info = [
		'contact_name' => [
				 'label'  => 'Name',
				 'rules'  => 'required',
		 ]
	];
	
	public $user_registration = [
		'contact_name' => [
			'label'  => 'Name',
			'rules'  => 'required',
		],
		'contact_mail' => [
			'label'  => 'Email',
			'rules'  => 'required|valid_email',
		],
		/*'contact_recovery_mail' => [
				'label'  => 'Recovery Email',
				'rules'  => 'valid_email',
		],*/
		'password' => [
			'label'  => 'Password',
			'rules'  => 'required',
		],
		'confirm_password' => [
			'label'  => 'Confirm Password',
			'rules'  => 'required|matches[password]',
		],
	];
	
	public $forgot_password = [
		'user_id' => [
			'label'  => 'Email ID',
			'rules'  => 'required|valid_email',
		],
	];
	
	
	
	
	/*------------------------	
		BACKEND VALIDATION
	----------------------------*/
	
	
	public $admin_change_password = [
		'new_password' => [
				 'label'  => 'New Password',
				 'rules'  => 'required',
		 ],
		 'confirm_password' => [
				 'label'  => 'Confirm Password',
				 'rules'  => 'required|matches[new_password]',
		 ]
	];
	
	public $stock_balance = [
		 'opening_coins' => [
					'label'  => 'Opening Coins',
					'rules'  => 'required|numeric',
					/*'errors' => [
							'required' => 'Please enter Opening Coins'
					]*/
			],
	];
	
	public $site_setting = [
		 'app_short_name' => [
					'label'  => 'Short Name',
					'rules'  => 'required',
			],
			'app_full_name' => [
					'label'  => 'Full Name',
					'rules'  => 'required',
			],
			'app_base_url' => [
					'label'  => 'Base URL',
					'rules'  => 'required',
			],
			'app_contact_number' => [
					'label'  => 'Contact Number',
					'rules'  => 'required|numeric',
			],
			'app_mail_id' => [
					'label'  => 'Email ID',
					'rules'  => 'required',
			],
			'app_asset_url' => [
					'label'  => 'Assets URL',
					'rules'  => 'required',
			],
			/*'app_cdn_url' => [
					'label'  => 'CDN URL',
					'rules'  => 'required',
			],*/
			'app_mail_from_name' => [
					'label'  => 'Mail From Name',
					'rules'  => 'required',
			],
			'app_mail_user_name' => [
					'label'  => 'Mail User Name',
					'rules'  => 'required',
			],
			'app_logo' => [
					'label'  => 'Logo URL',
					'rules'  => 'required',
			],
			'app_short_logo' => [
					'label'  => 'Short Logo URL',
					'rules'  => 'required',
			],
			'app_default_currency' => [
					'label'  => 'Default Currency',
					'rules'  => 'required',
			],
			'app_default_language' => [
					'label'  => 'Default Language',
					'rules'  => 'required',
			],
			'app_donate_home_dropdown' => [
					'label'  => 'Donate Dropdown',
					'rules'  => 'required',
			],
	];
	
	public $user_add = [
		 'contact_name' => [
					'label'  => 'Name',
					'rules'  => 'required',
			],
			'contact_mail' => [
					'label'  => 'Email',
					'rules'  => 'required|valid_email',
			],
			/*'contact_recovery_mail' => [
					'label'  => 'Recovery Email',
					'rules'  => 'valid_email',
			],*/
			'password' => [
					'label'  => 'Password',
					'rules'  => 'required|min_length[6]',
			],
			/*'click_coin_balance' => [
					'label'  => 'Click Coin Balance',
					'rules'  => 'required|numeric',
			],*/
	];
	
	public $user_edit = [
		 'contact_name' => [
					'label'  => 'Name',
					'rules'  => 'required',
			],
			'contact_mail' => [
					'label'  => 'Email',
					'rules'  => 'required|valid_email',
			],
			/*'contact_recovery_mail' => [
					'label'  => 'Recovery Email',
					'rules'  => 'valid_email',
			],*/
			/*'click_coin_balance' => [
					'label'  => 'Click Coin Balance',
					'rules'  => 'required|numeric',
			],*/
	];
	
	public $donate_manage = [
		 'click_amount' => [
					'label'  => 'Amount (Per Click Coin)',
					'rules'  => 'required|numeric',
			],
			'click_currency' => [
					'label'  => 'Currency',
					'rules'  => 'required',
			],
	];
	
	public $add_coins = [
		 'coins' => [
					'label'  => 'Coins',
					'rules'  => 'required|numeric',
			],
	];
	
	public $faq_form = [
	 'language' => [
				'label'  => 'Language',
				'rules'  => 'required|numeric',
		],
	 'question' => [
				'label'  => 'Question',
				'rules'  => 'required',
		],
		'answer' => [
				'label'  => 'Answer',
				'rules'  => 'required',
		],
	];
	
	
	
	
	
	
	//  New 
	public $admin_login = [
		 'user_id' => [
					'label'  => 'Username',
					'rules'  => 'required',
					/*'errors' => [
							'required' => 'Please enter Opening Coins'
					]*/
			],
		 'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				/*'errors' => [
						'required' => 'Please enter Opening Coins'
				]*/
			],
	];
	
	public $registration = [
		 'username' => [
					'label'  => 'Username',
					'rules'  => 'required',
			],
		 'mobile' => [
				'label'  => 'Mobile',
				'rules'  => 'required',
			],
			'email' => [
				'label'  => 'Email',
				'rules'  => 'required|valid_email',
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required|min_length[6]|max_length[10]',
			],
			'confirm_password' => [
				'label'  => 'Confirm Password',
				'rules'  => 'required|min_length[6]|max_length[10]|matches[password]',
			],
	];
	
}
