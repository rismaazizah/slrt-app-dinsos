 <?php
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_konsultasi'])) {
    header("Location: konsultasi.php");
  } else {
    $id_konsultasi = $_GET['id_konsultasi'];
    // get data from database
    $query = "SELECT * FROM tb_konsultasi
    JOIN tb_masyarakat ON tb_konsultasi.masyarakat_id = tb_masyarakat.id_masyarakat
    WHERE tb_konsultasi.id_konsultasi = '$id_konsultasi'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    $queryHistory = "SELECT * FROM tb_histori_konsultasi
    WHERE konsultasi_id = '{$row['id_konsultasi']}'";
    $resultHistory = mysqli_query($koneksi, $queryHistory);
  }

  ?>

 <style>
   /* Style for the chat container */
   .chat-container {
     width: 100%;
     /* Set a maximum width for better readability */
     margin: 0 auto;
     /* Center the chat container horizontally */
   }

   /* Common style for chat messages */
   .chat-message {
     border-radius: 20px;
     /* Rounded corners for chat bubbles */
     padding: 10px;
     margin-bottom: 2rem;
     position: relative;
     /* Position the chat bubble container as a reference for timestamps */
   }

   /* Style for the sender's chat (chat-from) */
   .chat-from {
     width: 60%;
     background-color: #EDE4FF;
     /* Light green color for the sender's messages */
     color: #000;
     /* Black text color for better contrast */
     float: right;
     /* Push the sender's messages to the right */
   }

   /* Style for the receiver's chat (chat-to) */
   .chat-to {
     width: 60%;
     background-color: #f0f0f0;
     /* Light gray color for the receiver's messages */
     color: #000;
     /* Black text color for better contrast */
     float: left;
     /* Push the receiver's messages to the left */
   }

   /* Timestamp style */
   .timestamp {
     font-size: 12px;
     color: #777;
     /* Gray color for the timestamps */
     position: absolute;
     bottom: -1.2rem;
     /* Adjust the distance of the timestamp from the chat bubble */
   }

   /* Position the timestamp inside the chat bubble */
   .chat-from .timestamp {
     right: 10px;
   }

   .chat-to .timestamp {
     left: 10px;
   }

   /* Clear floating elements to prevent layout issues */
   .clear {
     clear: both;
   }
 </style>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Konsultasi</h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12">
         <?php
          if (isset($_SESSION['result'])) {
            if ($_SESSION['result'] == 'success') {
          ?>
             <!-- Success -->
             <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong><?= $_SESSION['message'] ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <!-- Success -->
           <?php
            } else {
            ?>
             <!-- danger -->
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong><?= $_SESSION['message'] ?></strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <!-- danger -->
         <?php
            }
            unset($_SESSION['result']);
            unset($_SESSION['message']);
          }
          ?>

       </div>
       <div class="col-12">


         <div class="row">
           <div class="col-6">
             <table>
               <tr>
                 <th style="width: 250px;">Nama masyarakat</th>
                 <th style="width: 80px;">:</th>
                 <th><?= $row['nama'] ?></th>
               </tr>
               <tr>
                 <th style="width: 250px;">Perihal</th>
                 <th style="width: 80px;">:</th>
                 <th><?= $row['perihal'] ?></th>
               </tr>
             </table>
           </div>
         </div>

         <div class="row" style="margin-top: 4rem;">
           <div class="col-6">
             <div class="chat-container" style="max-height: 500px;overflow-y: scroll;">
               <?php
                while ($chat = mysqli_fetch_assoc($resultHistory)) {
                ?>

                 <?php
                  if ($chat['role'] == 'masyarakat') {
                  ?>
                   <div class="chat-to chat-message">
                     <p>
                       <?= $chat['pesan'] ?>
                     </p>
                     <span class="timestamp"><?= date("j-m-Y - g:i A", strtotime($chat['timestamp'])) ?></span>
                   </div>
                 <?php
                  } elseif ($chat['role'] == 'admin') {
                  ?>
                   <div class="chat-from chat-message">
                     <p>
                       <?= $chat['pesan'] ?>
                       <span class="timestamp"><?= date("j-m-Y - g:i A", strtotime($chat['timestamp'])) ?></span>
                     </p>
                   </div>
                 <?php
                  }
                  ?>
               <?php
                }
                ?>
             </div>
           </div>
         </div>

         <div class="row">
           <div class="col-6">
             <form action="konsultasi.php?page=proses" method="post" style="margin-top: 20px;">
               <input type="hidden" name="id_konsultasi" value="<?= $id_konsultasi ?>">
               <input type="hidden" name="role" value="admin">

               <div class="form-group">
                 <label class="form-label">Pesan</label>
                 <textarea name="pesan" rows="2" class="form-control" required></textarea>
               </div>

               <button name="update" value="update" class="btn btn-primary float-end">Kirim</button>
             </form>
           </div>
         </div>

       </div>
     </div>
   </div>

 </div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script>
   tinymce.init({
     selector: '.textarea',
   });
 </script>
 <!-- /.container-fluid -->