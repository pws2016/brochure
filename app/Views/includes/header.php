<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">
			<div class="navbar-brand-box">
				<a href="index.html" class="logo logo-dark">
					<span class="logo-sm">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="20">
					</span>
				</a>

				<a href="index.html" class="logo logo-light">
					<span class="logo-sm">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="20">
					</span>
				</a>
			</div>

			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
				<i class="fa fa-fw fa-bars"></i>
			</button>
		</div>

		<div class="d-flex">

			<div class="dropdown d-inline-block d-lg-none ms-2">
				<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="uil-search"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
					 aria-labelledby="page-header-search-dropdown">

					<form class="p-3">
						<div class="form-group m-0">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php /*    <div class="dropdown d-inline-block language-switch">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>
*/?>
			<?php if(!empty($list_projects)){?>
			<div class="dropdown d-none d-lg-inline-block ms-1">
				<button type="button" class="btn header-item noti-icon waves-effect"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="uil-apps"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<div class="px-lg-2">
						<div class="row g-0">

							<?php foreach( $list_projects as $one_project){?>
							<div class="col">
								<a class="dropdown-icon-item" href="<?php echo base_url('chooseProject/'.$one_project['id'])?>">
									<img src="https://creazioneimpresa.net/wp-content/uploads/2020/09/ricerca.svg" alt="Github">
									<span><?php echo $one_project['title']?></span>
								</a>
							</div>
							<?php } ?>
						</div>


					</div>
				</div>
			</div>
			<?php } ?>
			<div class="dropdown d-none d-lg-inline-block ms-1">
				<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
					<i class="uil-minus-path"></i>
				</button>
			</div>

			<!--div class="dropdown d-inline-block">
	   <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
		data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="uil-bell"></i>
		<span class="badge bg-danger rounded-pill">3</span>
	   </button>
	   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
		aria-labelledby="page-header-notifications-dropdown">
		<div class="p-3">
		 <div class="row align-items-center">
		  <div class="col">
		   <h5 class="m-0 font-size-16"> Notifications </h5>
		  </div>
		  <div class="col-auto">
		   <a href="#!" class="small"> Mark all as read</a>
		  </div>
		 </div>
		</div>
		<div data-simplebar style="max-height: 230px;">
		 <a href="" class="text-reset notification-item">
		  <div class="d-flex align-items-start">
		   <div class="avatar-xs me-3">
			<span class="avatar-title bg-primary rounded-circle font-size-16">
			 <i class="uil-shopping-basket"></i>
			</span>
		   </div>
		   <div class="flex-1">
			<h6 class="mt-0 mb-1">Your order is placed</h6>
			<div class="font-size-12 text-muted">
			 <p class="mb-1">If several languages coalesce the grammar</p>
			 <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
			</div>
		   </div>
		  </div>
		 </a>
		 <a href="" class="text-reset notification-item">
		  <div class="d-flex align-items-start">
		   <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/users/avatar-3.jpg"
			class="me-3 rounded-circle avatar-xs" alt="user-pic">
		   <div class="flex-1">
			<h6 class="mt-0 mb-1">James Lemire</h6>
			<div class="font-size-12 text-muted">
			 <p class="mb-1">It will seem like simplified English.</p>
			 <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
			</div>
		   </div>
		  </div>
		 </a>
		 <a href="" class="text-reset notification-item">
		  <div class="d-flex align-items-start">
		   <div class="avatar-xs me-3">
			<span class="avatar-title bg-success rounded-circle font-size-16">
			 <i class="uil-truck"></i>
			</span>
		   </div>
		   <div class="flex-1">
			<h6 class="mt-0 mb-1">Your item is shipped</h6>
			<div class="font-size-12 text-muted">
			 <p class="mb-1">If several languages coalesce the grammar</p>
			 <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
			</div>
		   </div>
		  </div>
		 </a>

		 <a href="" class="text-reset notification-item">
		  <div class="d-flex align-items-start">
		   <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/users/avatar-4.jpg"
			class="me-3 rounded-circle avatar-xs" alt="user-pic">
		   <div class="flex-1">
			<h6 class="mt-0 mb-1">Salena Layfield</h6>
			<div class="font-size-12 text-muted">
			 <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
			 <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
			</div>
		   </div>
		  </div>
		 </a>
		</div>
		<div class="p-2 border-top d-grid">
		 <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
		  <i class="uil-arrow-circle-right me-1"></i> View More..
		 </a>
		</div>
	   </div>
	  </div-->

			<div class="dropdown d-inline-block">
				<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img class="rounded-circle header-profile-user" src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/users/avatar-9.jpg"
						 alt="Header Avatar">
					<span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php /*echo $user_data['display_name']*/?></span>
					<i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-end">
					<!-- item-->
					<?php /* if($user_data['role']!='A'){?>
					<a class="dropdown-item" href="<?php echo base_url($prefix_route.'admin/dashboard');//$profile_url?>"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle"><?php echo lang('app.menu_profile')?></span></a>
					<?php } if($user_data['role']=='A'){?>
					<a class="dropdown-item d-block" href="<?php echo base_url('settings')?>"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle"><?php echo lang('app.menu_setting')?></span></a>
					<?php }*/?>
					<?php /*if($user_loginas!==null && $user_loginas['role']=='A'){?>
					<a href="<?php echo base_url('loginas_back/admin')?>" class="dropdown-item notify-item">
						<i class="uil uil-previous font-size-18 align-middle me-1 text-muted"></i>
						<span><?php echo  lang('app.menu_return_admin')?></span>
					</a>
					<?php } */?>
					<a class="dropdown-item" href="<?php echo base_url('logout')?>"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle"><?php echo lang('app.menu_logout')?></span></a>
				</div>
			</div>



		</div>
	</div>
</header>
<div class="vertical-menu">
	<div class="navbar-brand-box">
		<a href="<?php echo base_url($prefix_route.'dashboard')?>" class="logo logo-dark">
			<span class="logo-sm">
				<img src="https://app.creazioneimpresa.it/Minible_v2.0.0/Admin/dist/assets/images/logo-black-150x150-mail.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="https://creazioneimpresa.net/wp-content/uploads/2020/05/creazioneimpresa_logo-bianco.svg" alt="" height="20">
			</span>
		</a>

		<a href="<?php echo base_url($prefix_route.'dashboard')?>" class="logo logo-light">
			<span class="logo-sm">
				<img src="https://app.creazioneimpresa.it/Minible_v2.0.0/Admin/dist/assets/images/logo-black-150x150-mail.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="https://creazioneimpresa.net/wp-content/uploads/2020/05/creazioneimpresa_logo-bianco.svg" alt="" height="20">
			</span>
		</a>
	</div>

	<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
		<i class="fa fa-fw fa-bars"></i>
	</button>
	
	<div data-simplebar class="sidebar-menu-scroll">
		<div id="sidebar-menu">
			<ul class="metismenu list-unstyled" id="side-menu">
				<li>
					<a href="<?php echo base_url($prefix_route.'dashboard')?>">
						<i class="uil-home-alt"></i><span>Dashboard</span>
					</a>
				</li>
				<?php /* if($user_data['role']=='A'){?>
				<li>
					<a href="<?php echo base_url($prefix_route.'customers')?>">
						<i class="uil-users-alt me-2"></i><span>Lista clienti</span>
					</a>
				</li>
				<?php }*/ ?>
				<?php /*<li>
					<a href="<?php echo base_url($prefix_route.'invoices?project='.$selected_project['id'])?>">
						<i class="uil-invoice me-2"></i><span>Fatture</span>
					</a>
				</li>*/?>
				<li>
					<a href="<?php echo base_url($prefix_route.'payments')?>">
						<i class="uil-invoice me-2"></i><span>Pagamenti</span>
					</a>
				</li>
				<?php /*if($user_data['role']=='customer'){?>
				<li>
					<a href="<?php echo base_url($prefix_route.'overview')?>">
						<i class="uil-layers me-2"></i><span>Prezzi</span>
					</a>
				</li>
				<?php }?>
				<li class="menu-title">Nostri Servizi</li>
				<?php //if(!empty($selected_project)){*/
				?>
				<!--li>
	  <a href="<?php //echo base_url($prefix_route.'overview')?>">
	   <i class="uil-layers me-2"></i><span>Prezzi/Acquista pacchetti</span>
	  </a>
	 </li-->
				<?php /*switch($selected_project['id']){
						case 1:*/?>
				<li>
					<a href="<? /*php echo base_url($prefix_route.'requests?plan_type=simple')*/?>">
						<i class="uil-analysis me-2"></i><span><? /*php echo lang('app.menu_requests') */ ?></span>
					</a>
				</li>

				<!-- <li>
					<a href="<?php  /*echo base_url($prefix_route.'requests?plan_type=full') */?>">
						<i class="uil-file-alt me-2"></i><span><? /*php echo lang('app.menu_requests_bp_full') */?></span>
					</a>
				</li>

				<li>
					<a href="<?php echo base_url($prefix_route.'requests?plan_type=business')?>">
						<i class="uil-analytics me-2"></i><span><?php echo lang('app.menu_requests_bp_business')?></span>
					</a>
				</li> -->
					<?php /*break;
						case 2:*/  //break;
					//}
//} ?>

				<?php /* if($user_data['role']=='customer'){?>
				<li class="menu-title">Offerte</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'offers')?>">
						<i class="uil-file-alt me-2"></i><span>Le mie offerte</span>
					</a>
				</li>
				<?php if($user_data['dropbox']!=""){?>
				<li>
					<a href="<?php echo base_url('myAccount/dropbox')?>">
						<i class="uil-dropbox me-2"></i><span>Documenti (Dropbox)</span>
					</a>
				</li>
				<?php } ?>
				<?php }
					   if($user_data['role']=='A'){
						   /*switch($selected_project['id']){
		case 1:*/?>
				<li class="menu-title">Offerte</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'calls')?>">
						<i class="uil-bars me-2"></i><span>Lista offerte</span>
					</a>
				</li>
				<li class="menu-title">Setting</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'package')?>">
						<i class="uil-bars me-2"></i><span>Lista pacchetti</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'user')?>">
						<i class=" uil-bars me-2"></i><span>Lista client</span>
						<!-- uil-bookmark-full -->
					</a>
				</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'user')?>">
						<i class="uil-bars me-2"></i><span>add user</span>
					</a>
				</li>
				<!--li><a href="<?php //echo base_url('settings')?>"><i class="uil uil-cog"></i> <span class="align-middle"><?php echo lang('app.menu_setting')?></span></a>
				</li-->
					<?php
			/*break;
		case 2:*/?>
				
				
				<?php
			/*break;
	}*/
				?>
					
				<hr>
				<li class="menu-title">Profilo</li>
				<?php /* if($user_data['role']!='guest'){?>
				<li>
					<a href="<?php echo base_url($prefix_route.'profile');//$profile_url?>"><i class="uil uil-user-circle"></i> <span class="align-middle">Mio profilo</span></a>
				</li>
				<?php }*/?>
				<li class="menu-title">APP</li>
				<li>
					<a href="https://academy.creazioneimpresa.it" target="_blank">
						<i class="uil-desktop-cloud-alt me-2"></i><span>Academy</span>
					</a>
				</li>
				<li>
					<a href="https://www.creazioneimpresa.net" target="_blank">
						<i class="uil-blogger-alt me-2"></i><span>Blog</span>
					</a>
				</li>
				
				<li class="menu-title">Assistenza</li>
				<li>
					<a class="text-primary" href="mailto:s.benia@creazioneimpresa.it">
						<i class="uil-fast-mail me-2"></i><span>Assistenza Tecnica</span>
					</a>
				</li>
				<hr>
				<li>
					<a href="<?php echo base_url('logout')?>">
					<i class="uil uil-sign-out-alt"></i><span><?php echo lang('app.menu_logout')?></span></a>
				</li>
				<?php 
				/*if($user_loginas!==null && $user_loginas['role']=='A'){?>
				<li>
					<a class="text-primary" href="<?php echo base_url('loginas_back/admin')?>">
						<i class="uil uil-previous"></i>
						<span><?php echo  lang('app.menu_return_admin')?></span>
					</a>
				</li>
				<?php }*/ 
				?>
				</ul>
			</div>
	</div>
</div>