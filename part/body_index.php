 <div class="row">
  <div class="col-md-12">
    <div id="header">
   	<div class="title"><a href="index.php">iCiStream</a></div>
     </div>
   </div>
  </div>
  <div class="row" align="center">
    <div class="col-md-12">
     <div id="search">
     <form method="POST" action="result.php">
      <input type="text" placeholder="Cari film . . ." name="getSearchInput">
      <button type="submit" name="key+OzYNpC3fZM">Search</button> 
      </form>
     </div>
    </div>
  </div>
   <div id="content">
     <div class="row" align="center">
      <div class="col-md-12">
        <h1>Film terbaru</h1>
      </div>
    </div>
     <div class="row">
        <?php

            if ($icistream->countPost() > 0)
            {
               $icistream->getPost();
            }
            else
            {
               $icistream->emptyPost();
            }
        ?>
    </div>
    <div class="row">
      <div class="col-md-12" align="center">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php $icistream->getPaging(); ?>
         </ul>
       </nav>
    </div>
 </div>
 <center>
 <div id="category">
   <div class="row">
    <div class="col-md-3"></div>
     <div class="col-md-6">
       <h1>Kategori</h1>
      <div class="table-responsive">
       <table class="table">
         <?php $icistream->getCategory(); ?>
        </table>
      </div>
      </div>
    <div class="col-md-3"></div>
     </div>
   </div>
   </center>
  <div class="row">
    <div class="col-md-12">
       <div id="footer" align="center">
         <div class="footertitle"><a href="index.php">iCiStream</a></div>
       </div>
    </div>
  </div>