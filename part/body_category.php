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
      <button type="submit">Search</button> 
      </form>
     </div>
    </div>
  </div>
   <div id="content">
     <div class="row" align="center">
      <div class="col-md-12">
        <center>Artikel berdasarkan kategori <?php echo $_GET['jenis'];?></center>
      </div>
    </div>
     <div class="row">
       <?php 

            if ($category->countPost($_GET['jenis']) > 0)
            {  
               $category->getPost($_GET['jenis']);
            }
            else
            {
               $category->emptyPost($_GET['jenis']);
            } 
        ?> 
    </div>
    <div class="row">
      <div class="col-md-12" align="center">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php $category->page2($_GET['jenis']); $category->paging($_GET['jenis']); $category->getPaging($_GET['jenis']); ?>
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