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
					<a href="<?php echo base_url('user/dashboarduser')?>">
						<i class="uil-home-alt"></i><span>Dashboard</span>
					</a>
				</li>
				
			
				<li>
					<a href="<?php echo base_url('user/brochures/new')?>">
						<i class="uil-analysis me-2"></i><span>+ Agg. Brochure</span>
					</a>
				</li>

				<li>
					<a href="<?php echo base_url('user/brochures')?>">
						<i class="uil-analysis me-2"></i><span>Elenco Brochure</span>
					</a>
				</li>
				
			
				<li class="menu-title">Configurazione</li>
				<li>
					<a href="<?php echo base_url('user/companyInfo')?>">
						<i class="uil-bars me-2"></i><span>Profilo Società</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/partners')?>">
						<i class=" uil-bars me-2"></i><span>Elenco Partner</span>
						<!-- uil-bookmark-full -->
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/contacts')?>">
						<i class="uil-bars me-2"></i><span>Elenco Contatti</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/products')?>">
						<i class="uil-bars me-2"></i><span>Elenco Prodotti</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/premi')?>">
						<i class="uil-bars me-2"></i><span>Elenco Premi</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/category')?>">
						<i class="uil-bars me-2"></i><span>Elenco Categorie</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('user/operations')?>">
						<i class=" uil-bars me-2"></i><span>Operations</span>
						<!-- uil-bookmark-full -->
					</a>
				</li>
					
				<hr>
				<li class="menu-title">Profilo</li>
				 
				<li>
					<a href="<?php echo base_url('user/profile');//$profile_url?>"><i class="uil uil-user-circle"></i> <span class="align-middle">Mio profilo</span></a>
				</li>
				<li>
					<a href="<?php echo base_url('user/list_mobile');//$profile_url?>"><i class="uil uil-user-circle"></i> <span class="align-middle">List_mobile</span></a>
				</li>
				
				<li>
					<a href="<?php echo base_url('logout')?>">
					<i class="uil uil-sign-out-alt"></i><span><?php echo lang('app.menu_logout')?></span></a>
				</li>
				
				</ul>
			</div>
	</div>
</div>