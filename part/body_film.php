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
  <div id="post-content">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
         <div class="post"> 
           <div class="row">
             <div class="col-md-2"></div>
               <div class="col-md-8" align="center">
                  <?php

                        if ($icistream->CheckPostDetail($_GET['nama'])) 
                        {
                           $icistream->getPostDetail($_GET['nama']);
                        }
                        else
                        {
                           header("location: ".$baseurl->get()."404.html");
                        }
                  ?>
               </div>
              </div>
               <div class="col-md-1"></div>
            </div>  
          </div> 
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