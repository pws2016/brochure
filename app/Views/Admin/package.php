<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <title><?php echo lang('app.title_page_dashboard') ?> | <?php echo $settings['meta_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Creazioneimpresa" name="author" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" />
    <style>
        h3.post__title.expand:before {
            width: 100px;
        }

        h3.post__title:before {
            content: "";
            width: 0;
            height: 10px;
            background-color: #FF7700;
            position: absolute;
            top: 0;
            transition: width 0.5s;
        }
    </style>
</head>

<!--body data-layout="horizontal" data-topbar="colored"-->

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php echo view('includes/header.php') ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo lang('app.package') ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm') ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_dashboard') ?></li> -->
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
                                <form action="<?= base_url('admin/package/insert') ?>" method="post" id="form">
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
                                                    <!-- Add package Form -->

                                                    <div class="form-group">
                                                        <label for="">Title</label>
                                                        <input type="text" id="title" name="title" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="text" id="price" name="price" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <input type="text" id="description" name="description" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sorting</label>
                                                        <input type="text" id="sorting" name="sorting" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">nomber des brochures</label>
                                                        <input type="text" id="nb_brochure" name="nb_brochure" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">validity_months</label>
                                                        <input type="text" id="validity" name="validity_months" class="form-control" required>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="add">Add Package</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                            <?php
                                            if (!empty($list_pack)) {
                                                foreach ($list_pack as $row) {
                                            ?><tr id="tr_<?php echo $row['id']; ?>">
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php echo $row['sorting']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><?php echo $row['nb_brochure']; ?></td>
                                                        <td><?php echo $row['validity_months']; ?></td>
                                                        <td><a onclick="get_data('<?php echo $row['id']; ?>')" class="btn bi bi-pencil" data-toggle="modal" data-target="#edit_modal"></a></td>


                                                        <td><a onclick="del_pack('<?php echo $row['id']; ?>')"  class="btn bi bi-trash"></a></td>
                                                    </tr>
                                            <?php }
                                            }
                                            ?>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('admin/package/update') ?>" method="post" id="form">
                        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="edit_pack">
                                        <!-- Add package Form -->

                                    </div>

                                    <!-- body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="update">Update</button>
                                    </div>

                                </div>
                    </form>
                    <form action="<?= base_url('admin/package/delete') ?>" method="get" id="form">
                        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="delete_pack">
                                        <!-- Add package Form -->

                                    </div>

                                    <!-- body -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>





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
                function get_data(id) {
                    $.ajax({
                        url: "<?php echo base_url("admin/package/get_data"); ?>",
                        type: "POST",
                        cache: false,
                        data: {

                            id: id


                        },
                        success: function(dataResult) {
                            $("#edit_pack").html(dataResult);

                        }

                    });
                }





                function del_pack(id) {
      if(confirm("are you sure !")){
                    $.ajax({
                        url: "<?php echo base_url("admin/package/delete"); ?>",
                        type: "GET",
                        cache: false,
                        data: {

                            id: id


                        },
                        success: function(datadelete) {

                            $("#tr_"+id).remove();

                        }

                    });
                }
            }
            </script>
</body>

</html>