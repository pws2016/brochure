<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_dashboard')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
        <style>
			h3.post__title.expand:before {width: 100px;}
			h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
		</style>
    </head>

    <!--body data-layout="horizontal" data-topbar="colored"-->
	<body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.package')?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_dashboard')?></li> -->
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    
                        <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
      
          <hr style="background-color: black; color: black; height: 1px;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <!-- Add Records Modal -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
            Add Package
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
           
                  <h5 class="modal-title" id="exampleModalLabel"> Add Package</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Add Records Form -->
                  <form action="" method="post" id="form">
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <input type="text" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Sorting</label>
                      <input type="text" id="sorting" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">nomber des brochures</label>
                      <input type="text" id="nb_brochure" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">validity_months</label>
                      <input type="text" id="validity" class="form-control">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="add">Add Package</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="table-responsive">
            <table class="table" id="records">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Sorting</th>
                  <th>Description</th>
                  <th>brochures</th>
                  <th>validity_months</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
					
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Record Modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Edit Record Form -->
            <form action="" method="post" id="edit_form">
              <input type="hidden" id="edit_record_id" name="edit_record_id" value="">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="edit_name" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="edit_email" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update">Update</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <!-- Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Add package -->
    <script>
      $(document).on("click", "#add", function(e){
        e.preventDefault();
        
        var title = $("#title").val();
        var price = $("#price").val();
        var sorting = $("#sorting").val();
      
        var validity = $("#validity").val();
        var description = $("#description").val();
        var nb_brochure = $("#nb_brochure").val();


        if (title == "" || price  == "" || sorting  == "" || validity  == "" || description  == "" || nb_brochure == "") {
          alert("All field is required");
        }else{
          $.ajax({
            url: "<?php echo base_url(); ?>insert",
            type: "post",
            dataType: "json",
            data: {
                title:  title,
                price: price,
                sorting: sorting,
                validity: validity,
                description: description,
                nb_brochure: nb_brochure,

            },
            success: function(data){
              if (data.responce == "success") {
                $('#records').DataTable().destroy();
                fetch();
                $('#exampleModal').modal('hide');
                toastr["success"](data.message);
              }else{
                toastr["error"](data.message);
              }

            }
          });

          $("#form")[0].reset();

        }

      });

      // Fetch package

      function fetch(){
        $.ajax({
          url: "<?php echo base_url(); ?>fetch",
          type: "post",
          dataType: "json",
          success: function(data){
            if (data.responce == "success") {

                var i = "1";
                  $('#records').DataTable( {
                      "data": data.posts,
                      "responsive": true,
                      dom: 
                          "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                          "<'row'<'col-sm-12'tr>>" +
                          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      buttons: [
                          'copy', 'excel', 'pdf'
                      ],
                      "columns": [
                          { "render": function(){
                            return a = i++;
                          } },
                          
                          { "data":  "title"},
                          { "data": "price"},
                          { "data": "sorting"},
                          { "data": "validity"},
                          { "data": "description"},
                          { "data": " nb_brochure"},

                          { "render": function ( data, type, row, meta ) {
                            var a = `
                                    <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                            `;
                            return a;
                          } }
                      ]
                  } );                
              }else{
                toastr["error"](data.message);
              }

          }
        });

      }

      fetch();

      // Delete package

      $(document).on("click", "#del", function(e){
        e.preventDefault();

        var del_id = $(this).attr("value");

        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {

              $.ajax({
                url: "<?php echo base_url(); ?>delete",
                type: "post",
                dataType: "json",
                data: {
                  del_id: del_id
                },
                success: function(data){
                  if (data.responce == "success") {
                      $('#records').DataTable().destroy();
                      fetch();
                      swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      );
                  }else{
                      swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                      );
                  }

                }
              });


            
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        });

      });

      // Edit package

      $(document).on("click", "#edit", function(e){
        e.preventDefault();

        var edit_id = $(this).attr("value");

        $.ajax({
          url: "<?php echo base_url(); ?>edit",
          type: "post",
          dataType: "json",
          data: {
            edit_id: edit_id
          },
          success: function(data){
            if (data.responce == "success") {
                $('#edit_modal').modal('show');
                $("#edit_id").val(data.post.id);
                $("#edit_title").val(data.post.title);
                $("#edit_price").val(data.post.price);
                $("#edit_sorting").val(data.post.sorting);
                $("#edit_validity").val(data.post.validity);
                $("#edit_description").val(data.post.description);
                $("#edit_brochure").val(data.post.brochure);


              }else{
                toastr["error"](data.message);
              }
          }
        });

      });

      // Update Record

      $(document).on("click", "#update", function(e){
        e.preventDefault();

        var edit_record_id = $("#edit_id").val();
        var title = $("#title").val();
        var price = $("#price").val();
        var sorting = $("#sorting").val();
      
        var  validity = $("#validity").val();
        var description = $("#description").val();
        var nb_brochure = $("#nb_brochure").val();
        

        if  (edit_title == "" || edit_price  == "" || edit_sorting  == "" || edit_validity  == "" || edit_description  == "" || edit_brochure == "") {
          alert("ALL field is required");
        }else{
          $.ajax({
            url: "<?php echo base_url(); ?>update",
            type: "post",
            dataType: "json",
            data: {
              edit_id: edit_id,
              edit_title: edit_title,
              edit_price: edit_price,
              edit_sorting: edit_sorting,
              edit_validity: edit_validity,
              edit_description: edit_description,
              edit_brochure: edit_brochure,

            },
            success: function(data){
              if (data.responce == "success") {
                $('#records').DataTable().destroy();
                fetch();
                $('#edit_modal').modal('hide');
                toastr["success"](data.message);
              }else{
                toastr["error"](data.message);
              }
            }
          });

        }

      });

 
function get_client_profile(id){ 
	$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_client_profile",
				  method:"POST",
				  data:{id:id}
				  
			}).done(function(data){
			
				$("#div_client_profile").html(data);
			});
}
	</script>
    </body>
</html>
