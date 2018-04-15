<?php


namespace App\Containers\Core\CoreController;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Core\CoreComponent\CustomTransform;
use App\Containers\Core\CoreComponent\CustomValidator;
use App\Containers\Test_module\UI\API\Controllers\TestController;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Controllers\ApiController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use ZipArchive;


/**
 *
 * Make Core Json
 * Class CoreMakeClass
 * @package App\Containers\Core\CoreController
 */
class CoreMakeClass extends CoreClass
{

    public function Make_file()
    {
        $object=new \stdClass();
        $object->module="";
        $object->Custom_module="";
        $path = app_path('Containers');
        $dirs=scandir($path,1);
        foreach($dirs as $single)
        {
            if(is_dir($path.'/'.$single) && $single != '.' && $single != '..')
            {
                if(file_exists($path.'/'.$single.'/module/core.json'))
                {
                    $content = json_decode(file_get_contents($path.'/'.$single.'/module/core.json'));
                    $object->module=$content->module;

                }
                if(file_exists($path.'/'.$single.'/module/custom.json'))
                {
                    $content = json_decode(file_get_contents($path.'/'.$single.'/module/custom.json'));
                    $object->Custom_module=$content->module;
                }
            }

        }
        file_put_contents(app_path('Containers/Core/CoreJson/Core.json'),json_encode($object));
    }


    public function webinstall($request)
    {
        
    }






    /**
     *
     */
    public function zip_extractor($request)
    {

        $zip = new ZipArchive;
        $path=public_path('module/'.$request->filename);
        $install=true;

        if($zip->open($path) == true)
        {
            $contentFile=null;
            for ( $i=0; $i < $zip->numFiles; $i++ )
            {
                $filename[$i]=$zip->getNameIndex($i);
                if(!$contentFile && strpos($filename[$i], 'json'))
                {
                    $contentFile=$filename[$i];
                }
            }



            if($contentFile)
            {

                $content  = json_decode($zip->getFromName($contentFile));


                foreach($content->module as $key => $module)
                {
                    $array[]=$key;
                    foreach ($content->module->$key as $key1 => $module)
                    {
                        $array[]=$key1;
                    }
                }


                $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));
                $module_type=$content->module->{$array[0]}->{$array[1]}->module_type=='core'?'module':"Custom_module";
                if($this->checkKey($object->{$module_type},$array[0]) && $this->checkKey($object->{$module_type}->{$array[0]},$array[1]))
                {
                    throw (new CommonException())->setValue('711',trans('localization::errors.711'));
                }

                if($content->files)
                {

                    foreach ($filename as $file)
                    {
                        if($path1=$this->checkKey($content->files,$file))
                        {

                            $partofpath=explode('/',$path1);
                            $setpath='';
                            foreach($partofpath as $paths)
                            {
                                if($paths != '')
                                {
                                    $setpath .='/'.$paths;

                                if(!is_dir(app_path('Containers'.$setpath)))
                                {
                                    mkdir(app_path('Containers'.$setpath),0775,true);
                                    chmod(app_path('Containers'.$setpath), 0777);
                                }
                                }

                            }

                            if(!file_exists(app_path('Containers/'.$path.$file)))
                            {
                                copy("zip://".$path."#".$file, app_path('Containers/'.$path1.$file));
                               // chown(app_path('Containers/'.$path1.$file),'daemon');
                            }

                        }
                    }
                }


                //after file copy to location
                if($this->checkKey($content,'install'))
                {
                    foreach ($content->install as $key =>$setup)
                    {
                       $method=$key;
                        foreach ($setup as $step)
                        {
                            if($method == 'artisan_command')
                            {
                                Artisan::call($step);
                            }
                        }
                    }

                    if(!exec('composer dump-autoload'))
                    {
                        //print_r(exec('composer dump-autoload'));
                        //die('failed to run composer dump-autoload command please run it mannually');
                    }

                }



                    if($this->checkKey($object->{$module_type},$array[0]))
                    {
                        $object->{$module_type}->{$array[0]}->{$array[1]}=$content->module->{$array[0]}->{$array[1]};
                    }
                    else{
                        $object->{$module_type} = $content->module;
                    }



                file_put_contents(app_path('Containers/Core/CoreJson/Core.json'),json_encode($object));


            }

            else{
                throw (new CommonException())->setValue('711',trans('localization::errors.711'));
            }



          /*  if($zip->getFromName('custom.json'))
            {

                $content  = json_decode($zip->getFromName('*.json'));
                foreach($content->module as $key => $module)
                {
                    $array[]=$key;
                    foreach ($content->module->$key as $key1 => $module)
                    {
                        $array[]=$key1;
                    }
                }

                $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));

                if($this->checkKey($object->Custom_module,$array[0]) && $this->checkKey($object->Custom_module->{$array[0]},$array[1]))
                {
                    throw (new CommonException())->setValue('710',trans('localization::errors.710'));
                }
                else{

                    for ( $i=0; $i < $zip->numFiles; $i++ )
                    {
                        $file1=$zip->getNameIndex($i);
                        $check = substr( $file1, -1 );
                        $dir = substr($file1,0,-1);
                        if ( $check == '/' )
                        {
                            if(!is_dir(app_path('Containers/Test_module/'.$dir)))
                            {
                                mkdir(app_path('Containers/Test_module/' . $dir), 0777);
                            }
                            continue;
                        }
                        else{
                            $file[]=end(explode('/',$file1));
                            if(!file_exists(app_path('Containers/Test_module/'.$file1)))
                            {
                                copy("zip://".$path."#".$file1, app_path('Containers/Test_module/'.$file1));
                            }

                        }
                    }


                }







            }
            else if($zip->getFromName('core.json'))
            {

            }*/

        }
        else{
            die('fail');
        }
    }


    public function unistaller($request)
    {
        $main_module=$request->main_module;
        $sub_module=$request->sub_module;
        $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));
        if(file_exists(app_path('Containers/'.$object->module->{$main_module}->{$sub_module}->config_file)))
        {
            $content=json_decode(file_get_contents(app_path('Containers/'.$object->module->{$main_module}->{$sub_module}->config_file)));


            if($this->checkKey($content,'uninstall'))
            {
                foreach ($content->uninstall as $key =>$step)
                {
                    $method=$key;




                        if($method == 'artisan_command')
                        {
                            if($step->command == 'migrate:rollback')
                            {
                                $total=DB::table('migrations')->get();
                                $array=[];
                                foreach ($total as $tot)
                                {
                                    $array[]=$tot->migration;
                                }
                                $move = array_search($key, $array);
                                Artisan::call($step->command,[$step->option => $move+1]);
                            }

                        }

                }

                if(!exec('composer dump-autoload'))
                {
                    //print_r(exec('composer dump-autoload'));
                    //die('failed to run composer dump-autoload command please run it mannually');
                }

            }


            foreach ($content->files as $filename => $filepath)
            {
                if(file_exists(app_path('Containers/'.$filepath.$filename)))
                {
                    unlink(app_path('Containers/'.$filepath.$filename));
                }
            }






        }
        else
        {
            throw (new CommonException())->setValue('712',trans('localization::errors.712'));
        }
    }


    public function make_module($request)
    {

        $main_module=$request->main_module;
        $sub_module=$request->sub_module;
        $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));
        if(file_exists(app_path('Containers/'.$object->module->{$main_module}->{$sub_module}->config_file)))
        {
            $content=json_decode(file_get_contents(app_path('Containers/'.$object->module->{$main_module}->{$sub_module}->config_file)));
            $zip = new ZipArchive();

            $res = $zip->open(public_path("referral_get.zip"), ZipArchive::CREATE);
            if($res === true)
            {
                foreach ($content->files as $filename => $filepath)
                {
                    if(file_exists(app_path('Containers/'.$filepath.$filename)))
                    {
                        $zip->addFile(app_path('Containers/'.$filepath.$filename),$filename);
                    }
                }
                $zip->close();
            }
        }
        else
        {
            throw (new CommonException())->setValue('712',trans('localization::errors.712'));
        }
    }

    public function active_module($request)
    {
        $main_module=$request->main_module;
        $sub_module=$request->sub_module;
        $is_active=$request->is_active;
        $object = json_decode(file_get_contents(app_path('Containers/Core/CoreJson/Core.json')));
        if(file_exists(app_path('Containers/'.$object->Custom_module->{$main_module}->{$sub_module}->config_file)))
        {
            $content=json_decode(file_get_contents(app_path('Containers/'.$object->Custom_module->{$main_module}->{$sub_module}->config_file)));
            $content->module->{$main_module}->{$sub_module}->is_active=$is_active==1?true:false;
            $object->Custom_module->{$main_module}->{$sub_module}->is_active=$is_active==1?true:false;
            file_put_contents(app_path('Containers/Core/CoreJson/Core.json'),json_encode($object));
            file_put_contents(app_path('Containers/'.$object->Custom_module->{$main_module}->{$sub_module}->config_file),json_encode($object));


        }
        else{
            throw (new CommonException())->setValue('712',trans('localization::errors.712'));
        }
    }
}