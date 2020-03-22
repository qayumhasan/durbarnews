<?php
$currentUrl = url()->current();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="{{asset('public/vendor/harimayco-menu/style.css')}}" rel="stylesheet">

<div id="hwpwrap">
	<div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
		<div id="wpwrap">
			<div id="wpcontent">
				<div id="wpbody">
					<div id="wpbody-content">

						<div class="wrap">

							<div class="manage-menus">
								<form method="get" action="{{ $currentUrl }}">
									<label for="menu" class="selected-menu">Select the menu you want to edit:</label>

									{!! Menu::select('menu', $menulist) !!}

									<span class="submit-btn">
										<input type="submit" class="button-secondary" value="Choose">
									</span>
								</form>
							</div>




							@if(request()->has('menu') && !empty(request()->input("menu")))
							<div id="nav-menus-frame">


								<div id="menu-settings-column" class="metabox-holder">

									<div class="clear"></div>

									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">
												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0"> Custom Link <span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">



																<p id="menu-item-url-wrap">
																	<div class="form-group">
																		<label for="exampleFormControlSelect1">Select Menu Category </label>
																		<select class="form-control" id="menu_cat">
																			<option disabled selected>Select Menu Category</option>
																			<option value="1">Category</option>
																			<option value="2">SubCategory</option>
																		</select>
																	</div>
																</p>


																<p id="menu-item-url-wrap">
																	<div class="form-group">
																		<label for="exampleFormControlSelect1">Select Menu</label>
																		<select class="form-control" id="sitemenus">
																			<option disabled selected>Select Menu Category</option>
																			@foreach(App\Menu::get() as $menu)
																			<option value="{{$menu->url}}">{{$menu->name}}</option>
																			@endforeach

																		</select>
																	</div>
																</p>

																<p id="menu-item-url-wrap hidden">

																	<input id="custom-menu-item-url" name="url" type="hidden" class="menu-item-textbox " placeholder="url">
																	</label>
																</p>

																<p id="menu-item-name-wrap hidden">

																	<input id="custom-menu-item-name" name="label" type="hidden" class="regular-text menu-item-textbox input-with-default-title" title="Label menu">
																	</label>
																</p>




																@if(!empty($roles))
																<p id="menu-item-role_id-wrap">
																	<label class="howto" for="custom-menu-item-name"> <span>Role</span>&nbsp;
																		<select id="custom-menu-item-role" name="role">
																			<option value="0">Select Role</option>
																			@foreach($roles as $role)
																			<option value="{{ $role->$role_pk }}">{{ ucfirst($role->$role_title_field) }}</option>
																			@endforeach
																		</select>
																	</label>
																</p>
																@endif

																<p class="button-controls">

																	<a href="#" onclick="addcustommenu()" class="button-secondary submit-add-to-menu right">Add menu item</a>
																	<span class="spinner" id="spincustomu"></span>
																</p>

															</div>
														</div>
													</div>
												</li>

											</ul>
										</div>
									</form>

								</div>












								<div id="menu-management-liquid">
									<div id="menu-management">
										<form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
											<div class="menu-edit ">
												<div id="nav-menu-header">
													<div class="major-publishing-actions">
														<label class="menu-name-label howto open-label" for="menu-name"> <b><span>Edit <u>@if(isset($indmenu)){{$indmenu->name}}@endif</u> Section Menu:</span></b>
															<input name="menu-name" id="menu-name" type="hidden" class="menu-name regular-text menu-item-textbox" title="Enter menu name" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
															<input type="hidden" id="idmenu" value="@if(isset($indmenu)){{$indmenu->id}}@endif" />
														</label>

													</div>
												</div>
												<div id="post-body">
													<div id="post-body-content">

														@if(request()->has("menu"))

														<div class="drag-instructions post-body-plain">
															<p>
																Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
															</p>
														</div>
														@endif

														<ul class="menu ui-sortable" id="menu-to-edit">
															@if(isset($menus))
															@foreach($menus as $m)
															<li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
																<dl class="menu-item-bar">
																	<dt class="menu-item-handle">
																		<span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>
																		<span class="item-controls"> <span class="item-type">Link</span> <span class="item-order hide-if-js"> <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>
																	</dt>
																</dl>

																<div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">









																	<div class="menu-item-actions description-wide submitbox">

																		<a class="item-delete submitdelete deletion" id="delete-{{$m->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>

																		<a class="item-cancel submitcancel hide-if-no-js button-secondary" id="cancel-{{$m->id}}" href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>



																	</div>

																</div>
																<ul class="menu-item-transport"></ul>
															</li>
															@endforeach
															@endif
														</ul>
														<div class="menu-settings">

														</div>
													</div>
												</div>
												<div id="nav-menu-footer">
													<div class="major-publishing-actions">

														@if(request()->has('action'))
														<div class="publishing-action">
															<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@elseif(request()->has("menu"))
														<a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save my-4">Save menu</a>
														<div class="publishing-action">


															<span class="spinner" id="spincustomu2"></span>
														</div>

														@else
														<div class="publishing-action">
															<a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@endif
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>






							</div>
							@else

							@php

							$public_menu = Harimayco\Menu\Facades\Menu::getByName('Main Menu');



							@endphp




							<!-- front page area start -->


							



							<div class="manage-menus">
								<div class="row">

									@if($public_menu)
									<div class="col-lg-6">
										<h6><u>Your Menu's</u></h6>
										<ul class="menu ui-sortable" id="menu-to-edit">

											@foreach($public_menu as $menu)
											<li id="menu-item" class="menu-item menu-item-depth menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
												<dl class="menu-item-bar">
													<dt class="menu-item-handle" style="width: 100%">
														<span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_vfdssd">{{ $menu['label'] }}</span> <span style="color: transparent;"></span> </span> <span class="is-submenu">Main Menu</span> </span>
														<span class="item-controls"> </span> <a class="item-edit" id="edit" title=" " href=""> </a> </span>
													</dt>
												</dl>

												@if( $menu['child'] )
												<dl class="menu-item-bar">
													@foreach( $menu['child'] as $child )
													<dt class="menu-item-handle" style="margin-left: 50px;width:80%;margin-top:5px">
														<span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_vfdssd">{{ $child['label'] }}</span> <span style="color: transparent;"></span> </span> <span class="is-submenu">Sub Menu</span> </span>
														<span class="item-controls"> </span> <a class="item-edit" id="edit" title=" " href=""> </a> </span>
													</dt>
													@endforeach
												</dl>
												@endif
												<ul class="menu-item-transport"></ul>
											</li>
											@endforeach

										</ul>
									</div>
									@endif

									
								

								</div>
							</div>

							@endif



						</div>

						<div class="clear"></div>
					</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear"></div>
		</div>
	</div>
</div>