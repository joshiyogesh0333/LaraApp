<?php

namespace App\Helpers;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Master;
use App\Models\User;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class Helper
{

    public static function isPermissionExist($permission_name){
        return count(Permission::where('name',$permission_name)->get()) > 0;
     }
     public static function isRoleExist($role_name){
        return count(Role::where('name',$role_name)->get()) > 0;
     }

    public static function assignRole($user_id,$role){
        if(!empty($user_id))
        {
            $user = User::find($user_id);
            if(!$user->hasRole($role))
            {
                if(!Helper::isRoleExist($role)){
                    $user->assignRole($role);
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return true;
            }
        }
        else
        {
            return false;
        }

    }
    public static function removeRole($user_id,$role)
    {

        if(!empty($user_id))
        {
            $user = User::find($user_id);
            if($user->hasRole($role))
            {
                if(!Helper::isRoleExist($role)){
                    $user->removeRole($role);
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return true;
            }
        }
        else
        {
            return false;
        }
    }
    public static function assignPermission($user_id,$permission)
    {

        if(!empty($user_id))
        {
            // if(!$user->hasPermissionTo($permission))
            // {
                // if(Helper::isPermissionExist($permission)){
                    $user = User::find($user_id);
                    $user->givePermissionTo($permission);
                    return $user->can($permission);
                    // return true;
                // }
                // else
                // {
                //     return false;
                // }
            // }
            // else
            // {
            //     return true;
            // }
        }
        else
        {
            // return false;
        }

    }
    public static function removePermission($user_id,$permission)
    {
        if(!empty($user_id))
        {
            $user = User::find($user_id);
                if(Helper::isPermissionExist($permission)){
                    $user->revokePermissionTo($permission);
                    return true;
                }
                else
                {
                    return false;
                }
        }
        else
        {
            return false;
        }
    }

    public static function UserHasPermission($user_id,$permission)
    {
        // return $permission;
        $user = User::find($user_id);
        if(Helper::isPermissionExist($permission))
        {
            if($user->hasPermissionTo($permission))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public static function getAllRoles()
    {
        return Role::all()->toArray();
    }
    public static function pre($data)
    {
        echo "<pre style='display:none'>";
        print_r($data);
        echo "</pre>";
    }

    public static function userEmailExist(Request $request)
    {

       $users = DB::table('users')->where('email', '=', $request->email)->get();
       return response()->json(['data' => $users],200);
    }

    
    public static function getMaster($key)
    {
        $data = DB::select('select * from masters where master_key ="'.$key.'"');
        if(!empty($data) && isset($data[0]))
        {
            return $data[0];
        }
        else
        {
            return false;
        }
    }

    
    public static function getUser()
    {

        $data = DB::select('SELECT * FROM `customer_managements`');
        if(!empty($data) && isset($data[0]))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    public static function updateMaster($key,$value)
    {
       $flight = DB::table('master')->updateOrCreate(['master_value' => $value],['master_key' => $key]);
    }
    public static function applClasses()
    {
        // Demo
        $fullURL = request()->fullurl();

        // dd(App()->environment());

        $data = array();
        //if (App()->environment() === 'production')
        if(true)
        {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $data = config('custom.' . 'demo-' . $i);
                }
            }
        } else {
            $data = config('custom.custom');
        }
        // dd(config('custom.custom'));
        // default data array
        $DefaultData = [
          'mainLayoutType' => 'vertical',
          'theme' => 'light',
          'sidebarCollapsed' => false,
          'navbarColor' => '',
          'horizontalMenuType' => 'floating',
          'verticalMenuNavbarType' => 'floating',
          'footerType' => 'static', //footer
          'layoutWidth' => 'full',
          'showMenu' => true,
          'bodyClass' => '',
          'bodyStyle' => '',
          'pageClass' => '',
          'pageHeader' => true,
          'contentLayout' => 'default',
          'blankPage' => false,
          'defaultLanguage'=>'en',
          'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];
        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        // print_r($DefaultData);
        // dd($data);
        // dd('test');
        $data = array_merge($DefaultData, $data);

        $allOptions = [
            'mainLayoutType' => array('vertical', 'horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full', 'boxed'),
            'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage'=>array('en'=>'en','fr'=>'fr','de'=>'de','pt'=>'pt'),
            'direction' => array('ltr', 'rtl'),
        ];
        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }
        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => 'menu-expanded',
            'bodyClass' => $data['bodyClass'],
            'bodyStyle' => $data['bodyStyle'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage'=>$allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if(!session()->has('locale')){
            app()->setLocale($layoutClasses['defaultLanguage']);
        }
        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = "menu-collapsed";
        }
        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = "blank-page";
        }
        return $layoutClasses;
    }
    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $demo = 'demo-' . $i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                  //  Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }
    public static function send_mail($to,$subject,$message)
    {
        $headers = 'From: joshiyogesh0333@gmail.com' . "\r\n" .
        'Reply-To: joshiyogesh0333@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        return  mail($to, $subject, $message, $headers);
    }
    public static function invite_mail($to,$subject,$message)
    {
        $headers = 'From: joshiyogesh0333@gmail.com' . "\r\n" .
        'Reply-To: joshiyogesh0333@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        return  mail($to, $subject, $message, $headers);
    }
}
