<?php

	class Search {
		private $Mysqli, $sql, $post;

		public function __construct()
        {
           $this->Mysqli = Database::getConnection();
        }

        public function Check()
        {
        	if (!$_POST)
        	{
        		return TRUE;
        	}
        }

        public function getPostCount($param)
        {
        	$this->sql = "SELECT * FROM data WHERE JudulFilm LIKE '%".$param."%'";
            return $this->Mysqli->query($this->sql)->num_rows;
        }

        public function getPost($param)
        {
        	$this->post = $this->Mysqli->query("SELECT * FROM data WHERE JudulFilm LIKE '%".$param."%'");

        	foreach ($this->post as $Post)
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
                   <center>Tidak ada film yang didapatkan dari hasil pencarian <?php echo $param; ?></center>
        	<?php
        }
	}