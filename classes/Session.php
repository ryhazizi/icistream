<?php

	class Session {

		public function start() 
		{
		   return session_start();
		}

		public function give($sessionName, $sessionValue)
        {
           return $_SESSION['$sessionName'] = $sessionValue;
        }

        public function check($sessionName)
        {
        	if (isset($_SESSION['$sessionName']))
            {
            	return "TRUE";
            }
            else
            {
            	return "FALSE";
            }
        }

        public function delete()
        {
           return session_destroy();
        }
	}