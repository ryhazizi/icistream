<?php

	class Category {
		private $Mysqli, $sql, $arr, $data, $key, $value, $page;

		public function __construct()
        {
           $this->Mysqli = Database::getConnection();
        }

        public function Check($param)
        {
        	$this->arr = array("action", "adventure", "animation", "biography", "comedy", "crime", "drama", "family", "fantasy", "history", "lainnya");

        	foreach ($this->arr as $this->key => $this->value) 
        	{
        		if ($this->value == $param)
        		{
        			return TRUE;
        		}
        	}
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

        public function getPostCount($param)
        {
        	$this->sql = "SELECT * FROM data WHERE KategoriFilm='$param'";
            return $this->Mysqli->query($this->sql)->num_rows;
        }

        public function page2($param)
        {
        	return ceil($this->getPostCount($param)/$this->maxPost());

        }


        public function Post($param)
        {
        	return $this->Mysqli->query("SELECT * FROM data WHERE KategoriFilm='$param' ORDER BY Waktu DESC LIMIT ".$this->startPost().",".$this->maxPost()."");
        }

        public function getPost($param)
        {
        	foreach ($this->Post($param) as $Post)
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

        public function emptyPost($param)
        {
        	?>
        		<br/>
                   <center>Tidak ada film yang dapat ditampilkan.</center>
        	<?php
        }

        public function countPost($param)
        {
        	return $this->Post($param)->num_rows;
        }

        public function Paging($param)
        {
        	return $this->page2($param);
        }

        public function getPaging($param)
        {
           for ($this->page=1;$this->page<=$this->Paging($param);$this->page++)
           {
             ?>
               <li><a href="http://localhost/icistream/category.php?jenis=<?php echo $param;?>&&halaman=<?php echo $this->page; ?>"><?php echo $this->page; ?></a></li> 
             <?php 
           }      
        }

	}

?>