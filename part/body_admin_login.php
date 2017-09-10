<?php 
        if ($admin->start("key+cUNoRRxcWr"))
        {
           $data = array
                   (
                     "Email"        => $admin->getInput("Email"),
                     "Katasandi"    => $admin->getInput("Katasandi")
                   );
           if ($val->empty($data['Email']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Email masih kosong.', 'error');</script>";
           }
           else if ($val->empty($data['Katasandi']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Katasandi masih kosong.', 'error');</script>";
           }
           else if ($val->regex_email($data['Email']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Format email anda salah. Contoh format yang benar : example@email.com .', 'error');</script>";
           } 
           else if ($val->regex_password($data['Katasandi']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Katasandi hanya boleh berisi huruf dan angka.', 'error');</script>";
           }
           else if ($admin->check_email($data['Email']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Email yang anda masukkan salah.', 'warning');</script>";
           }
           else if ($admin->check_password($data['Katasandi']))
           {
              echo "<script>sweetAlert('Kesalahan', 'Katasandi yang anda masukkan salah.', 'warning');</script>";
           }
           else
           {  
              $session->give("Email", $data['Email']);
              header("location: ".$baseurl->get()."dashboard.php");
           }
        }
?>

  <div class="row">
    <div class="col-md-4"></div>
     <div class="col-md-4">
         <div id="adminboxheader" align="center">Admin Login</div>
     <div id="adminbox">
       <div class="adminformlogin">
         <form name="iCiStream-Admin-Login" method="POST">
          <input type="text" placeholder="Email" name="Email">
            <input type="password" placeholder="Katasandi" name="Katasandi">
                 <br/>
                 <br/>
              <center>
                <button type="" class="btn btn-primary" name="key+cUNoRRxcWr">Login</button>
              </center>
          </form>
       </div>
     </div>
   </div>
     <div class="col-md-4"></div>
   </div>