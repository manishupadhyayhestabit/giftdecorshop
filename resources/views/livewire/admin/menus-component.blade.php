<div>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3> {{ __('Menus') }}</h3>
       {{ Breadcrumbs::render('menus') }}
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper" class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-body">
            {!! Menu::render() !!}
            {!! Menu::scripts() !!}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
