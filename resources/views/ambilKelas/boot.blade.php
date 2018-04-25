<!DOCTYPE html>
<html>
   <title>Boot Ambil Kelas</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
   <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>
   <body class="w3-container ">
      <header class="w3-container w3-text-indigo w3-margin-top-64">
      </header>
      <table id="grid-basic" class="w3-table-all w3-card-4">
         <thead>
            <tr class="w3-cyan">
               <th data-column-id="id" data-type="numeric" data-order="asc">#</th>
               <th data-column-id="nrp" >Nrp</th>
               <th data-column-id="namamhs" >Nama Mahasiswa</th>               
               <th data-column-id="namamatkul" >Nama Mata Kuliah</th>               
               <th data-column-id="kodekelas" >Kode Kelas</th>               
               <th data-column-id="uts" >Nilai UTS</th>               
               <th data-column-id="uas" >Nilai UAS</th>               
               <th data-column-id="actions" data-formatter="actions" data-sortable="false">Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach($data as $details)
            <tr>
               <td>{{$details->id}}</td>
               <td>{{$details->nrp}}</td>
               <td>{{$details->namamhs}}</td>
               <td>{{$details->namamatkul}}</td>
               <td>{{$details->kodekelas}}</td>
               <td>{{$details->uts}}</td>
               <td>{{$details->uas}}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   <div id="edit" class="w3-modal">
         <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
               <span onclick="document.getElementById('edit').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
            </div>
            <header class="w3-container w3-text-indigo w3-margin-top-64">
               <h1>Edit Details</h1>
            </header>
            <form class="w3-container" action="/savak" method = "POST">
              {{ csrf_field() }}
              <input type="hidden" id="edit_id" name="edit_id">
               <div class="w3-section">
                  <div class="w3-row">
                     <div class="w3-col s4">
                        <label><b>Nilai UTS</b></label>
                     </div>
                     <div class="w3-col s8"><input class="w3-input w3-border w3-margin-bottom" id="uts" type="text" placeholder="Enter Nilai UTS" name="uts" required></div>
                  </div>
                  <div class="w3-row">
                     <div class="w3-col s4">
                        <label><b>Nilai UAS</b></label>
                     </div>
                     <div class="w3-col s8"><input class="w3-input w3-border w3-margin-bottom" id="uas" type="text" placeholder="Enter Nilai UAS" name="uas" required></div>
                  </div>
                  <button class="w3-btn-block w3-indigo w3-section w3-padding" type="submit">Save</button>
               </div>
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
               <button onclick="document.getElementById('edit').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
            </div>
         </div>
      </div>
      <div id="delete" class="w3-modal">
         <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
               <span onclick="document.getElementById('delete').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
            </div>
            <header class="w3-container w3-text-indigo w3-margin-top-64">
               <h1>Delete</h1>
            </header>
            <form class="w3-container" action="/delak" method="POST">
              {{ csrf_field() }}
              <input type="hidden" id="del_id" name="del_id">
                <div class="w3-section">
                  <p>Are you sure, you want to delete <span id ="delete_name"></span> ?</p>
                  <div class="w3-center"><button type="submit" class="w3-btn w3-indigo"> Delete </button></div>
               </div>
            </form>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
               <button onclick="document.getElementById('delete').style.display='none'" type="button" class="w3-btn w3-red">Cancel</button>
            </div>
         </div>
      </div>
      <script>
         $( document ).ready(function(){
           $("#grid-basic").bootgrid({
             formatters: {
               "actions": function(column, row)
               {
                 return "<button onclick=\"document.getElementById('edit').style.display='block'\" data-id=\"" + row.id + "\" data-uts=\"" + row.uts + "\" data-uas=\"" + row.uas + "\" class=\"w3-btn w3-blue w3-small edit\"><span class=\"fa fa-pencil\"></span></button> " +
                 "<button onclick=\"document.getElementById('delete').style.display='block'\" data-id=\"" + row.id + "\" data-namamhs=\"" + row.namamhs +"\" data-kodekelas=\"" + row.kodekelas+ "\" data-uts=\"" + row.uts + "\" data-uas=\"" + row.uas + "\" class=\"w3-btn w3-blue w3-small delete\"><span class=\"fa fa-remove\"></span></button>";
               }
             }}).on("loaded.rs.jquery.bootgrid", function (){
               /* Executes after data is loaded and rendered */
               $(this).find(".edit").click(function (e) {
                 $('#edit_id').val($(this).data("id"));
                 $('#uts').val($(this).data("uts"));
                 $('#uas').val($(this).data("uas"));
               });
               $(this).find(".delete").click(function (e) {
                 $('#del_id').val($(this).data("id"));
                 $('#delete_name').html("#"+$(this).data("id")+" "+ $(this).data("namamhs")+" "+ $(this).data("kodekelas"));
               });
             });
           });
      </script>
   </body>
</html>