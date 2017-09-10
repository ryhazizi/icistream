<?php

	class iCiStream {
		private $Mysqli, $sql, $page, $key, $value, $film, $data;

		public function __construct()
        {
           $this->Mysqli = Database::getConnection();
        }

        public function maxPost()
        {
        	return 16;
        }

        public function page()
        {
 		    return isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        }

        public function startPost()
        {
        	return ($this->page()>1) ? ($this->page() * $this->maxPost()) - $this->maxPost() : 0;
        }

        public function getPostCount()
        {
        	$this->sql = "SELECT * FROM data";
            return $this->Mysqli->query($this->sql)->num_rows;
        }

        public function page2()
        {
        	return ceil($this->getPostCount()/$this->maxPost());

        }

        public function Post()
        {
        	return $this->Mysqli->query("SELECT * FROM data ORDER BY Waktu DESC LIMIT ".$this->startPost().",".$this->maxPost()."");
        }

        public function getPost()
        {
        	foreach ($this->Post() as $Post)
            {
              ?>
              <div class="col-md-2">
                 <div class="filmbox">
                    <center>
                       <img src="assets/upload/<?php echo $Post['SlugFilm'];?>/<?php echo $Post['NamaFileCoverFilm'];?>" width="100%" height="100%">
                       <br/>
                      <br/>
                     <a href="film.php?nama=<?php echo $Post['SlugFilm'];?>"> <?php echo $Post['JudulFilm'];?></a>
                   </center>
                 </div>
               </div>
              <?php
            }
        }

        public function emptyPost()
        {
        	?>
        		<br/>
                   <center>Tidak ada film yang dapat ditampilkan.</center>
        	<?php
        }

        public function countPost()
        {
        	return $this->Post()->num_rows;
        }

        public function Paging()
        {
        	return $this->page2();
        }

        public function getPaging()
        {
           for ($this->page=1;$this->page<=$this->Paging();$this->page++)
           {
             ?>
               <li><a href="?halaman=<?php echo $this->page; ?>"><?php echo $this->page; ?></a></li> 
             <?php 
           }      
        }

        public function categorylist()
        {
        	return $this->data = array
        	      (
        	     	"Action"     => "category.php?jenis=action",
        	     	"Adventure"  => "category.php?jenis=adventure",
        	     	"Animation"  => "category.php?jenis=animation",
        	      	"Biography"  => "category.php?jenis=biography",
        	      	"Comedy"     => "category.php?jenis=comedy",
        	      	"Crime"      => "category.php?jenis=crime",
        	      	"Drama"      => "category.php?jenis=drama",
        	      	"Family"     => "category.php?jenis=family",
        	      	"Fantasy"    => "category.php?jenis=fantasy",
        	      	"History"    => "category.php?jenis=history",
        	      	"Lainnya"    => "category.php?jenis=lainnya"
        	      );
        }

        public function getCategory()
        {
        	foreach ($this->categorylist() as $this->key => $this->value) 
        	{
        	   ?>
        	   	 <tr>
        	   	   <td><a href="<?php echo $this->value;?>"><?php echo $this->key;?></a></td>
        	   	 </tr>
        	   <?php 
        	}
        }

        public function getPostDetailData($param)
        {
            return $this->Mysqli->query("SELECT * FROM data WHERE SlugFilm='$param'");
        }

        public function CheckPostDetail($param)
        {   
           if (!$param)
           {

            return FALSE;
           }     
           else
           {
              if ($this->Mysqli->query("SELECT * FROM data WHERE SlugFilm='$param'"))
              { 
                $this->data = $this->getPostDetailData($param)->fetch_assoc();
                
                if ($this->data['SlugFilm'] == $param) 
                {
                    return TRUE;
                }
              
              }
              else
              {
                return FALSE;
              }
           }
        }

        public function getPostDetail($param)
        {
            $this->film = $this->getPostDetailData($param)->fetch_assoc(); 
              ?>
                <h1><?php echo $this->film['JudulFilm'];?></h1>
                   <video width="100%" height="300"  id="video" poster="assets/upload/<?php echo $this->film['SlugFilm'];?>/<?php echo $this->film['NamaFileCoverFilm'];?>" controls>
                      <source src="assets/upload/<?php echo $this->film['SlugFilm'];?>/<?php echo $this->film['NamaFileFilm'];?>" type="video/mp4"">
                      <track src="assets/upload/<?php echo $this->film['SlugFilm'];?>/<?php echo $this->film['NamaFileSubtitleFilm'];?>" kind="subtitles" label="<?php echo $this->film['BahasaSubtitleFilm'];?>">
                   </video>
                 <div class="post-attribute">
                    <button type="button" class="btn btn-default" ><i class="fa fa-film"></i> <?php echo $this->film['KualitasFilm'];?></button>
                    <button type="button" class="btn btn-primary" <i class="fa fa-star"></i> IMDB Rating : <?php echo $this->film['RatingIMDB'];?></button> 
                    <button type="button" class="btn btn-success" ><i class="fa fa-hashtag"></i> <?php echo $this->film['KategoriFilm'];?></button>
                    <button type="button" class="btn btn-info" ><i class="fa fa-language"></i> <?php echo $this->film['BahasaSubtitleFilm'];?></button> 
                 </div>
                 <div class="post-description" align="left">
                   <?php echo $this->film['DeskripsiFilm'];?> 
                 </div>
            <?php
           
        }
	}


?>