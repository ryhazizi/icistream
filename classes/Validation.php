<?php
	
	class Validation {

		public function empty($param)
	    {
	    	if (!$param)
	    	{
	    		return TRUE;
	    	}
	    	else
	    	{
	    		return FALSE;
	    	}
	    }

	    public function regex_email($param)
		{
			if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $param))
			{
				return "TRUE";
			}
		}

		public function regex_password($param)
		{
			if (!preg_match("/^[a-zA-Z-0-9]*$/", $param))
		    {
		       return "TRUE";
		    }
		}

		public function amount_movie_title_character($param)
		{
			if (strlen($param) < 5)
			{
				return TRUE;
			}
			else if (strlen($param) > 500)
			{
				return TRUE;
			}
		}

		public function amount_movie_desc_character($param)
		{
			if (strlen($param) < 100)
			{
				return TRUE;
			}
			else if (strlen($param) > 1000)
			{
				return TRUE;
			}
		}
	}