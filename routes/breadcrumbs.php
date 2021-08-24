<?php

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Diglactic\Breadcrumbs\Breadcrumbs;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Category;
use App\Models\GlobalSetting;
use App\Models\GroupByPincode;
use App\Models\Layout;
use App\Models\Option;
use App\Models\OptionalProduct;
use App\Models\OptionalProductGroup;
use App\Models\OptionGroup;
use App\Models\PincodeGroup;
use App\Models\Post;
use App\Models\Product;
use App\Models\Type;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
// home > Login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('Login', route('login'));
});
// home > Register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('Register', route('register'));
});
// home > contact us
Breadcrumbs::for('contactUs', function ($trail, $pages) {
    $trail->parent('home');
    $trail->push($pages->post_title, route('pages', $pages));
});
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Page Not Found');
});
// home > Verify Email
Breadcrumbs::for('verifyEmail', function ($trail) {
    $trail->parent('register');
    $trail->push('Verify Email', route('verification.notice'));
});
// home > Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('admin.dashboard'));
});
// Home > Dashboard > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('admin.categories'));
});
// Home > Dashboard > Categories > Add 
Breadcrumbs::for('addCategory', function ($trail) {
    $trail->parent('categories');
    $trail->push('Add Category', route('admin.addcategory'));
});
// Home > Dashboard > Categories > Edit 
Breadcrumbs::for('editCategory', function ($trail, $category_id) {
    $category = Category::find($category_id);
    $trail->parent('categories');
    $trail->push('Edit Category', route('admin.editcategory', $category));
});
// Home > Dashboard > layouts
Breadcrumbs::for('layouts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Layouts', route('admin.layouts'));
});
// Home > Dashboard > layouts > Add 
Breadcrumbs::for('addLayout', function ($trail) {
    $trail->parent('layouts');
    $trail->push('Add Layout', route('admin.addlayout'));
});
// Home > Dashboard > layouts > Edit 
Breadcrumbs::for('editLayout', function ($trail, $layout_slug) {
    $layout = Layout::where('slug', $layout_slug)->first();
    $trail->parent('layouts');
    $trail->push('Edit Layout', route('admin.editlayout', $layout));
});
// Home > Dashboard > attribute groups
Breadcrumbs::for('attributeGroups', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Attribute Groups', route('admin.attributegroups'));
});
// Home > Dashboard > attribute group > Add 
Breadcrumbs::for('addAttributeGroup', function ($trail) {
    $trail->parent('attributeGroups');
    $trail->push('Add Attribute Group', route('admin.addattributegroup'));
});
// Home > Dashboard > attribute group > Edit 
Breadcrumbs::for('editAttributeGroup', function ($trail, $id) {
    $AttributeGroup = AttributeGroup::where('id', $id)->first();
    $trail->parent('attributeGroups');
    $trail->push('Edit Attribute Group', route('admin.editattributegroup', $AttributeGroup));
});
// Home > Dashboard > attributes
Breadcrumbs::for('attributes', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Attributes', route('admin.attributes'));
});
// Home > Dashboard > attribute > Add 
Breadcrumbs::for('addAttribute', function ($trail) {
    $trail->parent('attributes');
    $trail->push('Add Attribute', route('admin.addattribute'));
});
// Home > Dashboard > attribute > Edit 
Breadcrumbs::for('editAttribute', function ($trail, $id) {
    $Attribute = Attribute::where('id', $id)->first();
    $trail->parent('attributes');
    $trail->push('Edit Attribute', route('admin.editattribute', $Attribute));
});
// Home > Dashboard > option groups
Breadcrumbs::for('optionGroups', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Option Groups', route('admin.optiongroups'));
});
// Home > Dashboard > option group > Add 
Breadcrumbs::for('addOptionGroup', function ($trail) {
    $trail->parent('optionGroups');
    $trail->push('Add Option Group', route('admin.addoptiongroup'));
});
// Home > Dashboard > option group > Edit 
Breadcrumbs::for('editOptionGroup', function ($trail, $id) {
    $optionGroup = OptionGroup::where('id', $id)->first();
    $trail->parent('optionGroups');
    $trail->push('Edit Option Group', route('admin.editoptiongroup', $optionGroup));
});
// Home > Dashboard > options
Breadcrumbs::for('options', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Options', route('admin.options'));
});
// Home > Dashboard > option > Add 
Breadcrumbs::for('addOption', function ($trail) {
    $trail->parent('options');
    $trail->push('Add Option', route('admin.addoption'));
});
// Home > Dashboard > option > Edit 
Breadcrumbs::for('editOption', function ($trail, $id) {
    $option = Option::where('id', $id)->first();
    $trail->parent('options');
    $trail->push('Edit Option', route('admin.editoption', $option));
});
// Home > Dashboard > product type
Breadcrumbs::for('productType', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Product Type', route('admin.producttype'));
});
// Home > Dashboard > product type > Add 
Breadcrumbs::for('addProductType', function ($trail) {
    $trail->parent('productType');
    $trail->push('Add Product Type', route('admin.addproducttype'));
});
// Home > Dashboard > product type > Edit 
Breadcrumbs::for('editProductType', function ($trail, $id) {
    $productType = Type::where('id', $id)->first();
    $trail->parent('productType');
    $trail->push('Edit Product Type', route('admin.editproducttype', $productType));
});
// Home > Dashboard > posts
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('admin.posts'));
});
// Home > Dashboard > posts > Add 
Breadcrumbs::for('addPost', function ($trail) {
    $trail->parent('posts');
    $trail->push('Add Post', route('admin.addpost'));
});
// Home > Dashboard > post > Edit 
Breadcrumbs::for('editPost', function ($trail, $id) {
    $post = Post::where('id', $id)->first();
    $trail->parent('posts');
    $trail->push('Edit Post', route('admin.editpost', $post));
});
// Home > Dashboard > pages
Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Pages', route('admin.pages'));
});
// Home > Dashboard > posts > Add 
Breadcrumbs::for('addPage', function ($trail) {
    $trail->parent('pages');
    $trail->push('Add Page', route('admin.addpage'));
});
// Home > Dashboard > page > Edit 
Breadcrumbs::for('editPage', function ($trail, $id) {
    $page = Post::where('id', $id)->first();
    $trail->parent('pages');
    $trail->push('Edit Page', route('admin.editpage', $page));
});
// Home > Dashboard > menus
Breadcrumbs::for('menus', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Menus', route('admin.menus'));
});
//Home >Dashboard > pincode groups
Breadcrumbs::for('pincodeGroups', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Pincode Groups', route('admin.pincodegroups'));
});
//Home >Dashboard > pincode group > Add
Breadcrumbs::for('addPincodeGroup', function ($trait) {
    $trait->parent('pincodeGroups');
    $trait->push('Add Pincode Group', route('admin.addpincodegroup'));
});
//Home >Dashboard > pincode group > Edit
Breadcrumbs::for('editPincodeGroup', function ($trait, $id) {
    $pincodeGroup = PincodeGroup::find($id);
    $trait->parent('pincodeGroups');
    $trait->push('Edit Pincode Group', route('admin.editpincodegroup', $pincodeGroup));
});

//Home >Dashboard > optional product groups
Breadcrumbs::for('optionalProductGroups', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Optional Product Groups', route('admin.optionalproductgroups'));
});
//Home >Dashboard > optional product group > Add
Breadcrumbs::for('addOptionalProductGroup', function ($trait) {
    $trait->parent('optionalProductGroups');
    $trait->push('Add Optional Product Group', route('admin.addoptionalproductgroup'));
});
//Home >Dashboard > optional product group > Edit
Breadcrumbs::for('editOptionalProductGroup', function ($trait, $id) {
    $optionalProductGroup = OptionalProductGroup::find($id);
    $trait->parent('optionalProductGroups');
    $trait->push('Edit Optional Product Group', route('admin.editoptionalproductgroup', $optionalProductGroup));
});

//Home >Dashboard > optional products
Breadcrumbs::for('optionalProducts', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Optional Product', route('admin.optionalproducts'));
});
//Home >Dashboard > optional product > Add
Breadcrumbs::for('addOptionalProduct', function ($trait) {
    $trait->parent('optionalProducts');
    $trait->push('Add Optional Product', route('admin.addoptionalproduct'));
});
//Home >Dashboard > optional product > Edit
Breadcrumbs::for('editOptionalProduct', function ($trait, $id) {
    $optionalProducts = OptionalProduct::find($id);
    $trait->parent('optionalProducts');
    $trait->push('Edit Optional Product', route('admin.editoptionalproduct', $optionalProducts));
});

//Home >Dashboard > Group By Pincodes
Breadcrumbs::for('groupByPincodes', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Group By Pincodes', route('admin.groupbypincodes'));
});
//Home >Dashboard > Group By Pincode > Add
Breadcrumbs::for('addGroupByPincodes', function ($trait) {
    $trait->parent('groupByPincodes');
    $trait->push('Add Group By Pincode', route('admin.addgroupbypincode'));
});
//Home >Dashboard > Group By Pincode > Edit
Breadcrumbs::for('editGroupByPincodes', function ($trait, $id) {
    $groupByPincode = GroupByPincode::find($id);
    $trait->parent('groupByPincodes');
    $trait->push('Edit Group By Pincode', route('admin.editgroupbypincode', $groupByPincode));
});

//Home >Dashboard > Products
Breadcrumbs::for('products', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Products', route('admin.products'));
});
//Home >Dashboard > Product > Add
Breadcrumbs::for('addProduct', function ($trait) {
    $trait->parent('products');
    $trait->push('Add Product', route('admin.addproduct'));
});
//Home >Dashboard > Product > Edit
Breadcrumbs::for('editProduct', function ($trait, $id) {
    $product = Product::find($id);
    $trait->parent('products');
    $trait->push('Edit Product', route('admin.editproduct', $product));
});

//Home >Dashboard > Global Settings
Breadcrumbs::for('globalSettings', function ($trait) {
    $trait->parent('dashboard');
    $trait->push('Global Settings', route('admin.globalsettings'));
});
//Home >Dashboard > Global Setting > Add
Breadcrumbs::for('addGlobalSetting', function ($trait) {
    $trait->parent('globalSettings');
    $trait->push('Add Global Setting', route('admin.addglobalsetting'));
});
//Home >Dashboard > Global Setting > Edit
Breadcrumbs::for('editGlobalSetting', function ($trait, $id) {
    $globalSetting = GlobalSetting::find($id);
    $trait->parent('globalSettings');
    $trait->push('Edit Global Setting', route('admin.editglobalsetting', $globalSetting));
});
