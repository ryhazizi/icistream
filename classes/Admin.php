<?php

	class Admin {
		
		private $Mysqli, $list, $movieid, $replace, $extension, $MovieCoverExlist, $key, $value, $rmvextension, $rtrn;

		public function __construct()
        {
           $this->Mysqli = Database::getConnection();
        }

        public function start($param)
	    {
	      if (isset($_POST[$param]))
	      {
	        return TRUE;
	      } 
	    }

		public function getMovieID()
        {
          $this->list    = "AaBbCcDdEeFfGgHhIiJjKkLlMnOoPpQqRrSsTtUuVvWwXxYyZz0123456789";
          $this->movieid = substr(str_shuffle($this->list),0,5); 
          return $this->movieid;
        }

	    public function getInput($param)
	    {
	      return $_POST[$param];
	    }

	    public function getSlug($param)
        {      
           $this->replace = '-';         
           $param         = strtolower($param);     
           $param         = preg_replace("/[\/\.]/", " ", $param);     
           $param         = preg_replace("/[^a-z0-9_\s-]/", "", $param);     
           $param         = preg_replace("/[\s-]+/", " ", $param);     
           $param         = preg_replace("/[\s_]/", $this->replace, $param);     
           $param         = substr($param, 0, 100);        
           return $param; 
        }

	    public function check_email($param)
	    {
	      if ($param != "admin@icistream.com")
	      {
	      	 return TRUE;
	      }
	    }

	    public function check_password($param)
	    {
	      if ($param != "12345")
	      {
	      	 return TRUE;
	      } 
	    }

	    public function getName($param)
	    {
	       return $_FILES[$param]['name'];
	    }

	    public function getSize($param)
	    {
	       return $_FILES[$param]['size'];	
	    }

	    public function getExtension($param)
	    {
	       $this->extension = explode('.', $param);
	       return strtolower(end($this->extension));
	    }

	    public function getTemporary($param)
	    {
	       return $_FILES[$param]['tmp_name'];
	    }

	    public function AllowedMovieCoverExtension()
	      {
	      	$this->MovieCoverExlist = array 
	      	                         (  "png",
	      		                        "jpg"
	      		                     );
	      	return $this->MovieCoverExlist;
	      }

	      public function checkMovieCoverExtension($param)
	      {
	      	 foreach ($this->AllowedMovieCoverExtension() as $this->key => $this->value) {
	      	 	if ($this->value == $param) {
	      	 		return TRUE;
	      	 	}
	      	 }
	      }

	      public function checkMovieCoverSize($param)
	      {
	      	 if ($param > 1048576)
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function checkMovieExtension($param)
	      {
	      	 if ("mp4" == $param) 
	      	 {
	      	    return TRUE;
	      	 }
	      }

	      public function checkMovieSize($param)
	      {
	      	 if ($param > 5368709120)
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function checkMovieSubtitleExtension($param)
	      {
	      	 if ("vtt" == $param) 
	      	 {
	      	    return TRUE;
	      	 }
	      }

	      public function checkMovieSubtitleSize($param)
	      {
	      	 if ($param > 512000)
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function RemoveExtension($param)
	      {
	      	 $this->rmvextension = explode('.', $param);
             $this->rtrn         = array_pop($this->rmvextension); 
             return implode('.', $this->rmvextension);
	      }

	      public function createFolder($param)
	      {
	      	return mkdir($param);
	      }

	      public function UploadMovieCover($param, $param2)
	      {
	      	 if (move_uploaded_file($param, $param2))
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function UploadMovie($param, $param2)
	      {
	      	 if (move_uploaded_file($param, $param2))
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function UploadMovieSubtitle($param, $param2)
	      {
	      	 if (move_uploaded_file($param, $param2))
	      	 {
	      	 	return TRUE;
	      	 }
	      }

	      public function saveMovieData($MovieID, $MovieTitle, $MovieSlug, $MovieDesc, $MovieCategory, $MovieQuality, $MovieSubtitleLanguage, $MovieIMBDRating, $MovieCoverFileName, $MovieFileName, $MovieSubtitleLanguageFileName, $date)
	      {
	      	 return $this->Mysqli->query("INSERT INTO data (IDFilm, JudulFilm, SlugFilm, DeskripsiFilm, KategoriFilm, KualitasFilm, BahasaSubtitleFilm, RatingIMDB, NamaFileCoverFilm, NamaFileFilm, NamaFileSubtitleFilm, Waktu) VALUES ('$MovieID','$MovieTitle','$MovieSlug','$MovieDesc','$MovieCategory','$MovieQuality','$MovieSubtitleLanguage','$MovieIMBDRating','$MovieCoverFileName','$MovieFileName','$MovieSubtitleLanguageFileName','$date')");
	      }
     }
?>