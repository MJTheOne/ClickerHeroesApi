<?php
	//namespace Marius\ClickerHeroesApi;

	/**
	 *	Clicker Heroes Complete API
	 *	
	 *	@package 	Clicker Heroes Api
	 *	@author 	Marius Posthumus <mjtheone@gmail.com>
	 **/

	class ClickerHeroesApi {
		/**
		 *	Encrypted save 
		 *	
		 *	@var mixed|string
		 **/
		private $encrypted = null;

		/**
		 *	Decrypted save 
		 *	
		 *	@var mixed|stdClass
		 **/
		private $decrypted = null;

		/**
		 *	Known salts 
		 *	
		 *	@var array
		 **/
		private $knownSalts = null;

		/**
		 *	Working salt variable 
		 *	
		 *	@var string
		 **/
		private $salt = null;

		/**
		 *	Known delimiters 
		 *	
		 *	@var array
		 **/
		private $knownDelimiters = null;

		/**
		 *	Anticheat delimiter and hash check
		 *	
		 *	@var string
		 **/
		private $delimiter = null;

		public function __construct() {
			$this->knownSalts 		= $this->getStaticData('salt');
			$this->knownDelimiters 	= $this->getStaticData('delimiter');
		}

		/**
		 *	Get static data
		 *
		 *	@param 	string $type
		 *	@return $this
		 **/
		public function getStaticData($type) {
			$type = strtolower($type);
			
			switch($type) {
				case 'salt':
					$type = 'salts';
				break;

				case 'delimiter':
					$type = 'delimiters';
				break;
			}

			$static = json_decode(file_get_contents(__DIR__ . '/statics/' . $type . '.json'));

			foreach($static as $data) {
				$tmpArr[] = $data;
			}

			return $tmpArr;
		}

		/**
		 *	Return decrypted save file
		 *
		 *	@param 	string $value
		 *	@return $this
		 **/
		public function decrypt($val) {
			$this->encrypted = $val;
			$this->findDelimiter();//->hackIt();

			return $this->decrypted;
		}

		/**
		 *	Find current delimiter
		 *	If it's new save it for future use
		 *
		 **/
		public function findDelimiter() {
			$this->delimiter = substr($this->encrypted, strlen($this->encrypted) - 48, 16);

			if(!in_array($this->getStaticData('delimiter'))) {
				// save it in json
			} else {
				return $this;
			}
		}
	}