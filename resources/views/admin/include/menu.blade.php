<!-- sidebar area -->
<aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
             	 <ul class="metismenu" id="menu1">
             	 	<li class="single-nav-wrapper">
	                    <a href="index.html" class="menu-item">
	                        <span class="left-icon"><i class="fas fa-home"></i></span>
	                        <span class="menu-text">Home</span>
	                    </a>
	                  </li>
	                <li class="single-nav-wrapper">
	                      <a class="menu-item" href="fomrs_editor_ch.html" aria-expanded="false">
	                        <span class="left-icon"><i class="far fa-edit"></i></span>
	                          <span class="menu-text">Forms</span>
	                      </a>
	                  </li>
	                  <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">Category</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="{{route('admin.category.all')}}">All Category</a></li>
	                          <li><a href="{{route('admin.subcategory.all')}}">All SubCategory</a></li>
	                          
	                        </ul>
					  </li>
					   <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">News</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="{{route('admin.news.all')}}">All News</a></li>
	                          <li><a href="{{route('admin.news.create')}}">Add News</a></li>
	                          
	                        </ul>
					  </li>
					   <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">Poll</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="{{route('admin.poll.all')}}">All Poll</a></li>
	                          <li><a href="{{route('admin.poll.result')}}">Poll Details</a></li>
	                          
	                        </ul>
					  </li>
	                  <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">Setting</span>
	                      </a>
	                        <ul class="dashboard-menu">
	                          <li><a href="{{route('admin.menu.setting')}}">Menu Setting</a></li>
	                          
	                        </ul>
					  </li>
					  
					  <li class="single-nav-wrapper">
	                      <a class="has-arrow menu-item" href="#" aria-expanded="false">
	                        <span class="left-icon"><i class="fas fa-table"></i></span>
	                          <span class="menu-text">Pages</span>
	                      </a>
	                        <ul class="dashboard-menu">
							<li><a href="{{route('admin.page.list')}}">Page List</a></li>
							<li><a href="{{route('admin.page.create')}}">Add Page</a></li>
	                        </ul>
	                  </li>
	                
	                </ul>
              </nav>
            </aside><!-- /sidebar Area-->