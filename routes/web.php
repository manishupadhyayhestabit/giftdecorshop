<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\CommanController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\AddAttributeComponent;
use App\Http\Livewire\Admin\AddAttributeGroupComponent;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddGlobalSettingComponent;
use App\Http\Livewire\Admin\AddGroupByPincodeComponent;
use App\Http\Livewire\Admin\AddLayoutComponent;
use App\Http\Livewire\Admin\AddOptionalProductComponent;
use App\Http\Livewire\Admin\AddOptionalProductGroupComponent;
use App\Http\Livewire\Admin\AddOptionComponent;
use App\Http\Livewire\Admin\AddOptionGroupComponent;
use App\Http\Livewire\Admin\AddPincodeGroupComponent;
use App\Http\Livewire\Admin\AddProductTypeComponent;
use App\Http\Livewire\Admin\AttributeGroupsComponent;
use App\Http\Livewire\Admin\AttributesComponent;
use App\Http\Livewire\Admin\CategoriesComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\EditAttributeComponent;
use App\Http\Livewire\Admin\EditAttributeGroupComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\EditGlobalSettingComponent;
use App\Http\Livewire\Admin\EditGroupByPincodeComponent;
use App\Http\Livewire\Admin\EditLayoutComponent;
use App\Http\Livewire\Admin\EditOptionalProductComponent;
use App\Http\Livewire\Admin\EditOptionalProductGroupComponent;
use App\Http\Livewire\Admin\EditOptionComponent;
use App\Http\Livewire\Admin\EditOptionGroupComponent;
use App\Http\Livewire\Admin\EditPincodeGroupComponent;
use App\Http\Livewire\Admin\EditProductTypeComponent;
use App\Http\Livewire\Admin\GlobalSettingsComponent;
use App\Http\Livewire\Admin\GroupByPincodesComponent;
use App\Http\Livewire\Admin\LayoutsComponent;
use App\Http\Livewire\Admin\MenusComponent;
use App\Http\Livewire\Admin\OptionalProductGroupsComponent;
use App\Http\Livewire\Admin\OptionalProductsComponent;
use App\Http\Livewire\Admin\OptionGroupsComponent;
use App\Http\Livewire\Admin\OptionsComponent;
use App\Http\Livewire\Admin\PagesComponent;
use App\Http\Livewire\Admin\PincodeGroupsComponent;
use App\Http\Livewire\Admin\PostsComponent;
use App\Http\Livewire\Admin\ProductsComponent;
use App\Http\Livewire\Admin\ProductTypeComponent;
use App\Http\Livewire\App\Category\Single;
use App\Http\Livewire\App\HomeComponent;
use App\Http\Livewire\App\Mobile\ForgetPasswordComponent;
use App\Http\Livewire\App\Product\Cakes;
use App\Http\Livewire\App\SearchComponent;
use App\Http\Livewire\App\ShopComponent;
use App\Http\Livewire\Retailer\RetailerDashboardComponent;
use App\Http\Livewire\User\DashboardComponent as UserDashboardComponent;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Http\Controllers\FrontendController;


//App and mobile

Route::get('/', HomeComponent::class)->name('home');
Route::get('/search', SearchComponent::class)->name('search');
Route::get('/category/{slug}', Single::class)->name('category.single');
Route::get('/product/{slug}', Cakes::class)->name('product.cakes');
Route::get('/pincode-autocomplete-search', [FrontendController::class, 'pincodeAutocompleteSearch'])->name('pincode-autocomplete-search');



Route::get('/forgot-password', function () {
    $agent = new Agent();
    if ($agent->isDesktop()) {
        return view('auth.forgot-password');
    }
    return view('livewire.app.mobile.forgot-password-component');
})->middleware(['guest'])->name('password.request');
Route::get('/email/verify', function () {
    $agent = new Agent();
    if ($agent->isDesktop()) {
        return view('auth.verify-email');
    }
    return view('livewire.app.mobile.verify-email-component');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    if (Auth::user()->user_type === 'ADM') {
        session(['userType' => 'ADM']);
        return redirect(RouteServiceProvider::ADMIN_HOME);
    } else if (Auth::user()->user_type === 'RTR') {
        session(['userType' => 'RTR']);
        return redirect(RouteServiceProvider::RETAILER_HOME);
    } else {
        session(['userType' => 'USR']);
        return redirect(RouteServiceProvider::HOME);
    }
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//For Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('admin/dashboard', DashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/categories', CategoriesComponent::class)->name('admin.categories');
    Route::get('admin/category/add', AddCategoryComponent::class)->name('admin.addcategory');
    Route::get('admin/category/edit/{category_id}', EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('admin/layouts', LayoutsComponent::class)->name('admin.layouts');
    Route::get('admin/layout/add', AddLayoutComponent::class)->name('admin.addlayout');
    Route::get('admin/layout/edit/{layout_slug}', EditLayoutComponent::class)->name('admin.editlayout');
    Route::get('admin/attribute-groups', AttributeGroupsComponent::class)->name('admin.attributegroups');
    Route::get('admin/attribute-group/add', AddAttributeGroupComponent::class)->name('admin.addattributegroup');
    Route::get('admin/attribute-group/edit/{attri_group_id}', EditAttributeGroupComponent::class)->name('admin.editattributegroup');
    Route::get('admin/attributes', AttributesComponent::class)->name('admin.attributes');
    Route::get('admin/attribute/add', AddAttributeComponent::class)->name('admin.addattribute');
    Route::get('admin/attribute/edit/{attri_id}', EditAttributeComponent::class)->name('admin.editattribute');
    Route::get('admin/option-groups', OptionGroupsComponent::class)->name('admin.optiongroups');
    Route::get('admin/option-group/add', AddOptionGroupComponent::class)->name('admin.addoptiongroup');
    Route::get('admin/option-group/edit/{opti_group_id}', EditOptionGroupComponent::class)->name('admin.editoptiongroup');
    Route::get('admin/options', OptionsComponent::class)->name('admin.options');
    Route::get('admin/option/add', [AttributeController::class, 'addOption'])->name('admin.addoption');
    Route::post('admin/option/add', [AttributeController::class, 'addOptionSubmit'])->name('admin.addoptionsubmit');
    Route::get('admin/option/edit/{opti_id}', [AttributeController::class, 'editOption'])->name('admin.editoption');
    Route::post('admin/option/edit/{opti_id}', [AttributeController::class, 'addOptionUpdate'])->name('admin.editoptionupdate');
    Route::get('admin/product-type', ProductTypeComponent::class)->name('admin.producttype');
    Route::get('admin/product-type/add', AddProductTypeComponent::class)->name('admin.addproducttype');
    Route::get('admin/product-type/edit/{pro_type_id}', EditProductTypeComponent::class)->name('admin.editproducttype');
    Route::get('admin/posts', PostsComponent::class)->name('admin.posts');
    Route::get('admin/post/add', [CmsController::class, 'addPost'])->name('admin.addpost');
    Route::post('admin/post/add', [CmsController::class, 'addPostSubmit'])->name('admin.addpostsubmit');
    Route::get('admin/post/edit/{post_id}', [CmsController::class, 'editPost'])->name('admin.editpost');
    Route::post('admin/post/edit/{post_id}', [CmsController::class, 'editPostUpdate'])->name('admin.editpostupdate');
    Route::post('admin/remove-custom-option', [CommanController::class, 'removeCustomOption'])->name('admin.removecustomoption');
    Route::post('admin/remove-custom-sub-option', [CommanController::class, 'removeCustomSubOption'])->name('admin.removecustomsuboption');
    Route::get('admin/pages', PagesComponent::class)->name('admin.pages');
    Route::get('admin/page/add', [CmsController::class, 'addPage'])->name('admin.addpage');
    Route::post('admin/page/add', [CmsController::class, 'addPageSubmit'])->name('admin.addpagesubmit');
    Route::get('admin/page/edit/{page_id}', [CmsController::class, 'editPage'])->name('admin.editpage');
    Route::post('admin/page/edit/{page_id}', [CmsController::class, 'editPageUpdate'])->name('admin.editpageupdate');
    Route::get('admin/search-categories', [CommanController::class, 'searchCategories'])->name('admin.searchcategories');
    Route::get('admin/menus', MenusComponent::class)->name('admin.menus');
    Route::get('admin/pincode-groups', PincodeGroupsComponent::class)->name('admin.pincodegroups');
    Route::get('admin/pincode-group/add', AddPincodeGroupComponent::class)->name('admin.addpincodegroup');
    Route::get('admin/pincode-group/edit/{pincode_group_id}', EditPincodeGroupComponent::class)->name('admin.editpincodegroup');
    Route::get('admin/optional-product-groups', OptionalProductGroupsComponent::class)->name('admin.optionalproductgroups');
    Route::get('admin/optional-product-group/add', AddOptionalProductGroupComponent::class)->name('admin.addoptionalproductgroup');
    Route::get('admin/optional-product-group/edit/{optional_product_group_id}', EditOptionalProductGroupComponent::class)->name('admin.editoptionalproductgroup');
    Route::get('admin/optional-products', OptionalProductsComponent::class)->name('admin.optionalproducts');
    Route::get('admin/optional-product/add', AddOptionalProductComponent::class)->name('admin.addoptionalproduct');
    Route::get('admin/optional-product/edit/{optional_product_id}', EditOptionalProductComponent::class)->name('admin.editoptionalproduct');
    Route::get('admin/group-by-pincodes', GroupByPincodesComponent::class)->name('admin.groupbypincodes');
    Route::get('admin/group-by-pincode/add', AddGroupByPincodeComponent::class)->name('admin.addgroupbypincode');
    Route::get('admin/group-by-pincode/edit/{group_by_pincode_id}', EditGroupByPincodeComponent::class)->name('admin.editgroupbypincode');
    Route::get('admin/products', ProductsComponent::class)->name('admin.products');
    Route::get('admin/product/add', [ProductController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('admin/product/add', [ProductController::class, 'addProductSubmit'])->name('admin.addproductsubmit');
    Route::get('admin/product/edit/{product_id}', [ProductController::class, 'editProduct'])->name('admin.editproduct');
    Route::post('admin/product/edit/{product_id}', [ProductController::class, 'editProductUpdate'])->name('admin.editproductupdate');
    Route::get('admin/search-optional-product-groups', [CommanController::class, 'searchOptionalProductGroups'])->name('admin.searchoptionalproductgroups');
    Route::get('admin/search-related-products', [CommanController::class, 'searchRelatedProducts'])->name('admin.searchrelatedproducts');
    Route::get('admin/search-attributes', [CommanController::class, 'searchAttributes'])->name('admin.searchattributes');
    Route::get('admin/search-options', [CommanController::class, 'searchOptions'])->name('admin.searchoptions');
    Route::get('admin/global-settings', GlobalSettingsComponent::class)->name('admin.globalsettings');
    Route::get('admin/global-setting/add', AddGlobalSettingComponent::class)->name('admin.addglobalsetting');
    Route::get('admin/global-setting/edit/{global_setting_id}', EditGlobalSettingComponent::class)->name('admin.editglobalsetting');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('admin/import', [AdminController::class, 'importPincodeCityDistrictStateCountry']);
});

//Retailer
Route::middleware(['auth:sanctum', 'verified', 'authretailer'])->group(function () {
    Route::get('retailer/dashboard', RetailerDashboardComponent::class)->name('retailer.dashboard');
});

//User Or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
