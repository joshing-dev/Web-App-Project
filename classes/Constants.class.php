<?php
	class Constants {

		
	function __construct($clientURL)
        {
                $this->HOSTNAME=$clientURL;
        }

		public $HOSTNAME = "eldridjo.ddns.net";
		public $KEY = '97e19a9d-9cc4-4780-bf9f-77a2326e486b';
		public $SECRET = '1T6zINnjduKsJsOe6nlNtHSI6DUL5VwX';

		public $AUTH_PATH = '/learn/api/public/v1/oauth2/token';
		public $DSK_PATH = '/learn/api/public/v1/dataSources';
		public $TERM_PATH = '/learn/api/public/v1/terms';
		public $COURSE_PATH = '/learn/api/public/v1/courses';
		public $USER_PATH = '/learn/api/public/v1/users';

		public $ssl_verify_peer = FALSE;
		public $ssl_verify_host =  FALSE;
	}
?>
