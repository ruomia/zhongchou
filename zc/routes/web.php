<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/    
// Route::get('/', function () {
//     return view('index.index');
// });
Route::middleware('login')->group(function(){
// 修改密码
Route::get('/editPwd','PwdController@edit')->name('editPwd');
Route::post('/editPwd','PwdController@doEdit')->name('doEditPwd');
//显示设置头像表单
Route::get('/face','FaceController@index')->name('face');
//图片处理
Route::post("/face",'FaceController@face')->name('setface');
// 个人信息修改
Route::get('/editMes','MessageController@edit')->name('editMes');
Route::post('/editMes','MessageController@doEdit')->name('doEditMes');
// 关注
Route::get('/ajaxGetData','MessageController@getData')->name('getData');
Route::get('/follow','FollowController@list')->name('follow');
Route::get('/delFollow/{id}','FollowController@del')->name('delFollow');
// 评论
Route::post('/comment','CommentController@doAdd')->name('comment');
Route::get('/comment/{crowd_id}','CommentController@list')->name('commentList');
// 众筹的添加
Route::get('/crowds/add','CrowfdController@add')->name('crowds.add');
Route::post('/crowds/add','CrowfdController@doadd')->name('crowds.doadd');
// 众筹的订单购买
Route::get('/crowds/buy/{id}','CrowfdController@buy')->name('crowds.buy');
Route::post('/crowds/dobuy','CrowfdController@dobuy')->name('crowds.dobuy');
//我的发起
Route::get("/myfaqi",'CrowfdController@myfaqi')->name('myfaqi');
//我的订单
Route::get('/myorder','CrowfdController@myorder')->name('myorder');
Route::get('zan/{crowd_id}','ZanController@zan')->name('zan');
Route::get('/sc/{crowd_id}','FollowController@sc')->name('sc');
Route::get('/cancel/{crowd_id}',"FollowController@cancel")->name('cancel');
//删除
Route::get("/myfaqi/{id}",'CrowfdController@faqidelete')->name('faqidelete');
});    
// 主页显示
Route::get('/','IndexController@index')->name('index');
// 注册
Route::get("/regist","RegistController@regist")->name("regist");
Route::post("/regist","RegistController@doregist")->name("doregist");
// 登陆
Route::get("/login","LoginController@login")->name("login");
Route::post("/login","LoginController@dologin")->name("dologin");
// 内容页
Route::get('/crowd/{id}','IndexController@show')->name('crowd');
// 众筹的列表搜索
Route::get('/crowds/list','CrowfdController@list')->name('crowds.list'); 
// 退出
Route::get("/exit",'LoginController@exit')->name('exit');
// ----------------------------------------------------------------------------------------------------------------------




// 后台
Route::get('/admin1','AdminController@index')->name('admin');
Route::post('/doAdmin','AdminController@doLogin')->name('doAdmin');
Route::get('/captcha','CaptchaController@make')->name('captcha');
// Route::get('/main','AdminController@main')->name('main');

Route::middleware(['admin'])->group(function(){
    Route::get('/admin/glUser','UserController@list')->name('glUser');
    Route::get('/admin/addUser','UserController@add')->name('tjUser');
    Route::post('/admin/addUser','UserController@doAdd')->name('addUser');
    Route::get('/admin/delUser/{id}','UserController@del')->name('delUser');
    Route::get('/admin/glType','TypeController@list')->name('glType');
    Route::get('/admin/tjType','TypeController@add')->name('tjType');
    Route::post('/admin/tjType','TypeController@doAdd')->name('addType');
    Route::get('/admin/delType/{id}','TypeController@del')->name('delType');
    Route::get('/admin/editType/{id}','TypeController@edit')->name('editType');
    Route::post('/admin/editType','TypeController@doEdit')->name('editType1');
    Route::get('/admin/loginout/','AdminController@out')->name('out');
    // 后台 - 2 

    //众筹管理
    Route::get('/admin/crowd/','admin\CrowdController@Crowd')->name('admin.crowd');
    //删除众筹
    Route::get('/admin/crowd/delete/{id}','admin\CrowdController@delete')->name('crowd.delete');
    //众筹置顶
    Route::get('/admin/top/{aid}-{art_id}','admin\CrowdController@top')->name('crowd.top');

    //审核管理
    Route::get('/admin/shenhe','admin\CrowdController@shenhe')->name('crowd.shenhe');
    //众筹审核
    Route::get('/admin/shenhe/{aid}-{art_id}','admin\CrowdController@adopt')->name('shenhe.adopt');

    //删除众筹
    Route::get('/admin/shenhe/delete/{id}','admin\CrowdController@deleteadopt')->name('shenhe.delete');

    //显示已通过审核
    Route::get('/admin/tgshenhe','admin\CrowdController@tgshenhe')->name('crowd.tgshenhe');
    //删除众筹
    Route::get('/admin/tgshenhe/delete/{id}','admin\CrowdController@deletetg')->name('tgshenhe.delete');
    });












