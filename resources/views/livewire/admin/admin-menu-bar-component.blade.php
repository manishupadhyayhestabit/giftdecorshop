  <div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">
      <ul class="menu accordion-menu">
        <li class=" active"> <a href="{{ route('admin.dashboard') }}"><span class="menu-icon icon-speedometer"></span>
          <p>Dashboard</p>
          </a> </li>
          <li class=""> <a href="javascript:;"><span class="menu-icon icon-settings"></span>
          <p>Catalog</p>
          </a>
          <ul class="sub-menu">
            <li class=""><a href="{{ route('admin.attributegroups') }}">
              <p>Attribute Groups</p>
              </a></li>
            <li class=""><a href="{{ route('admin.attributes') }}">
              <p>Attributes</p>
              </a></li>
            <li class=""><a href="{{ route('admin.optiongroups') }}">
              <p>Option Groups</p>
              </a></li>
            <li class=""><a href="{{ route('admin.options') }}">
              <p>Options</p>
              </a></li>
            <li class=""><a href="{{ route('admin.producttype') }}">
            <p>Product Type</p>
            </a></li>
            <li class=""><a href="{{ route('admin.pincodegroups') }}">
            <p>Pincode Groups</p>
            </a></li>
            <li class=""><a href="{{ route('admin.groupbypincodes') }}">
            <p>Group By Pincodes</p>
            </a></li>
            <li class=""><a href="{{ route('admin.optionalproductgroups') }}">
            <p>Optional Product Groups</p>
            </a></li>
            <li class=""><a href="{{ route('admin.optionalproducts') }}">
            <p>Optional Product</p>
            </a></li>
          </ul>
        </li>
        <li class=""> <a href="{{ route('admin.categories') }}"><span class="menu-icon icon-grid"></span>
          <p>Categories</p>
          </a> </li>
          <li class=""> <a href="{{ route('admin.products') }}"><span class="menu-icon icon-grid"></span>
          <p>Products</p>
          </a> </li>
        <li class=""> <a href="{{ route('admin.menus') }}"><span class="menu-icon icon-grid"></span>
          <p>Menu</p>
          </a> </li>
        <li class=""> <a href="javascript:;"><span class="menu-icon icon-grid"></span>
          <p>CMS</p>
          </a>
          <ul class="sub-menu">
            <li class=""><a href="{{ route('admin.layouts') }}">
              <p>Layout</p>
              </a></li>
            <li class=""><a href="{{ route('admin.posts') }}">
              <p>Posts</p>
              </a></li> 
            <li class=""><a href="{{ route('admin.pages') }}">
              <p>Pages</p>
              </a></li>
            {{-- <li class=""><a href="{{ route('admin.comments') }}">
              <p>Comments</p>
              </a></li> --}}
          </ul>
        </li>
        {{-- <li class=""> <a href="javascript:;"><span class="icon-user"></span>
          <p>Users</p>
          </a>
          <ul class="sub-menu">
            <li class=""><a href="{{ route('admin.customers') }}">
              <p>Customers</p>
              </a></li>
            <li class=""><a href="{{ route('admin.retailers') }}">
              <p>Retailers</p>
              </a></li>
          </ul>
        </li>
         --}}
         <li class=""> <a href="javascript:;"><span class="menu-icon icon-settings"></span>
          <p>System</p>
          </a>
          <ul class="sub-menu">
            <li class=""><a href="{{ route('admin.globalsettings') }}">
              <p>Global Settings</p>
              </a></li>
            
           </ul>
        </li>
      </ul>
    </div>
  </div>