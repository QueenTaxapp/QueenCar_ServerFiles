<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\SettingsModel;
use App\Containers\Sms\Models\SmsModel;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

//migration
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

//migration

/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class TableCheck extends Middleware
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;



    /**
     * WebAuthentication constructor.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    // public function __construct(Guard $auth)
    // {

    //     // $this->auth = $auth;

    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        /*if (!Schema::hasTable('Admin'))
        {
            Schema::create('Admin', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email');
                $table->string('password');
                $table->string('remember_token')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
                $table->integer('is_active')->comment = " if 1 active user or 0 is inactive user";
                $table->integer('role')->comment = " 1 = super admin , 2 = sub admin";
                $table->string('profile_pic')->nullable();

            });
        }

        if(!Schema::hasTable('Admin_details'))
        {
            Schema::create('Admin_details', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('admin_id')->unsigned();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->string('postalcode')->nullable();
                $table->string('last_login_ip_address')->nullable();
                $table->integer('block')->default(1)->nullable()->comment = " 1 = free , 0 = block ";
                $table->integer('login_attempt')->default(0)->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('deleted_at')->nullable();
                //$table->foreign('admin_id')->references('id')->on('911_Admin')->onDelete('cascade');
                 //$table->foreign('photoIDs')->references('userID')->on('housePhotos');

            });

            Schema::table('Admin_details', function (Blueprint $table)
            {
                $table->foreign('admin_id')->references('id')->on('Admin');
            });

            $demo = new AdminModel;
            $demo->firstname ='admin';
            $demo->lastname ='test';
            $demo->email = 'admin@gmail.com';
            $demo->password = '$2y$10$imamWLc8rE.chdi96UJ4du0UMUIiUjJgQjp/QT5aPMAirIZFmwMC2';
            $demo->is_active = '1';
            $demo->role = '1';
            $demo->save();

        }

        if (!Schema::hasTable('Drivers'))
        {
            Schema::create('Drivers', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email');
                $table->string('password');
                $table->string('phone_number');
                $table->integer('is_active')->comment = " if 1 active user or 0 is inactive user";
                $table->integer('is_approve')->comment = " if 1 approved user or 0 is declined user";
                $table->integer('is_available')->comment = " if 1 available user or 0 is busy";
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
                $table->string('token')->nullable();
                $table->dateTime('token_expiry')->nullable();
                $table->string('device_token')->nullable();
                $table->string('social_unique_id')->nullable();
                $table->string('login_method');
                $table->string('login_by');
                $table->integer('type');
                $table->string('profile_pic')->nullable();
                $table->string('car_model')->nullable();
                $table->string('car_number')->nullable();


            });
        }
        if (!Schema::hasTable('Driver_Details'))
        {
            Schema::create('Driver_Details', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('driver_id')->nullable()->unsigned();
                $table->double('latitude',15,8)->nullable();
                $table->double('longitude',15,8)->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();

            });

            Schema::table('Driver_Details', function (Blueprint $table)
            {
                $table->foreign('driver_id')->references('id')->on('Drivers');
            });
        }

        if(!Schema::hasTable('DriverDocument'))
        {
            Schema::create('DriverDocument', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('driver_id')->nullable()->unsigned();
                $table->string('document_name')->nullable();
                $table->string('document')->nullable();
                $table->date('document_ex_date')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
            });

            Schema::table('DriverDocument', function (Blueprint $table)
            {
                $table->foreign('driver_id')->references('id')->on('Drivers');
            });

        }


        if(!Schema::hasTable('Types'))
        {
            Schema::create('Types', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('icon')->nullable();
                $table->double('base_price',15,2)->nullable();
                $table->double('price_per_distance',15,2)->nullable();
                $table->double('price_per_time',15,2)->nullable();
                $table->integer('max_size')->nullable();
                $table->integer('base_distance')->nullable();
                $table->integer('is_active')->comment = " if 1 available Type or 0 is Invisiable Type";
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
            });
        }


        if (!Schema::hasTable('User'))
        {
            Schema::create('User', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email')->unique();
                $table->string('phone_number')->unique();
                $table->string('password');
                $table->string('country')->nullable();
                $table->integer('is_active')->default(0)->comment = " if 1 active user or 0 is inactive user";
                $table->string('profile_pic')->nullable();
                $table->string('token')->nullable();
                $table->dateTime('token_expiry')->nullable();  
                $table->string('device_token')->nullable();   
                $table->string('login_by')->nullable();
                $table->string('login_method')->nullable();
                $table->string('social_unique_id')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();

            });

            Schema::create('User_detail', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->double('latitude',15,8);
                $table->double('longitude',15,8);
                $table->integer('referred_by')->default(0);
                $table->integer('promo_count')->default(0);
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
            });

            Schema::table('User_detail', function (Blueprint $table)
            {
                $table->foreign('user_id')->references('id')->on('User');
            });

        }

        if (!Schema::hasTable('refferal'))
        {
            Schema::create('refferal', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('code');
                $table->double('amount_earned',15,2)->nullable();
                $table->double('amount_spent',15,2)->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
            });
            Schema::table('refferal', function (Blueprint $table)
            {
                $table->foreign('user_id')->references('id')->on('User');
            });
        }

    if (!Schema::hasTable('Email'))
        {
            Schema::create('Email', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('title');
                $table->string('message');  
                $table->string('hint');   
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();       
            });    
        }

        if(!Schema::hasTable('Settings'))
        {
            Schema::create('Settings', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('message_id');
                $table->string('title');
                $table->string('value')->nullable();
                $table->string('type');
                $table->string('method_field');
                $table->mediumText('value_default')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
            });
            $settings = new SettingsModel();
            $settings->message_id="sms_notification_description";
            $settings->title="sms_notification_title";
            $settings->type="notification-type";
            $settings->method_field="text";
            $settings->value_default="";
            $settings->save();
        }

      /*  if (!Schema::hasTable('911_Request'))
        {
            Schema::create('911_Request', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('conformed_hero_id');
                $table->double('lat');  
                $table->double('long'); 
                $table->string('type');   
                $table->dateTime('created_at');
                $table->dateTime('updated_at');       
            });    
        }


        if (!Schema::hasTable('911_Request_Meta'))
        {
            Schema::create('911_Request_Meta', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('request_id')->unsigned();
                $table->integer('hero_id')->unsigned();
                $table->string('status')->nullable()->comment = " 1 = Waiting for hero , 0 = Pending";;
                $table->dateTime('created_at');
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('deleted_at')->nullable();
            });*/

    /*    if (!Schema::hasTable('Sms'))
        {
            Schema::create('Sms', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('title');
                $table->string('message');
                $table->longText('hint')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
                
            });

            $demo = new SmsModel;
            $demo->title ='sms_otp';
            $demo->message ='your otp is ';
            $demo->hint = 'a:4:{s:8:"%number%";a:2:{s:4:"name";s:3:"otp";s:8:"required";s:4:"true";}s:12:"%first_name%";a:2:{s:4:"name";s:10:"first_name";s:8:"required";s:4:"true";}s:11:"%last_name%";a:2:{s:4:"name";s:9:"last_name";s:8:"required";s:5:"false";}s:11:"%user_name%";a:2:{s:4:"name";s:9:"user_name";s:8:"required";s:4:"true";}}';
            $demo->save();



        }

        if (!Schema::hasTable('tempOtp'))
        {
            Schema::create('tempOtp', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('phone_number')->nullable();
                $table->string('token');
                $table->string('otp')->nullable();
                $table->dateTime('otp_time')->nullable();
                $table->integer('status')->default(0)->comment = " if 1 otp verified or 0 is unverified";
                $table->string('verified_numbers')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();

            });
        }

        if (!Schema::hasTable('country'))
        {
            Schema::create('country', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('code');
                $table->string('name');
                $table->string('d_code');
                $table->dateTime('created_at')->nullable();
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('deleted_at')->nullable();
            });

            $countries = [];
            $countries[] = array("code" => "AF", "name" => "Afghanistan", "d_code" => "+93");
            $countries[] = array("code" => "AL", "name" => "Albania", "d_code" => "+355");
            $countries[] = array("code" => "DZ", "name" => "Algeria", "d_code" => "+213");
            $countries[] = array("code" => "AS", "name" => "American Samoa", "d_code" => "+1");
            $countries[] = array("code" => "AD", "name" => "Andorra", "d_code" => "+376");
            $countries[] = array("code" => "AO", "name" => "Angola", "d_code" => "+244");
            $countries[] = array("code" => "AI", "name" => "Anguilla", "d_code" => "+1");
            $countries[] = array("code" => "AG", "name" => "Antigua", "d_code" => "+1");
            $countries[] = array("code" => "AR", "name" => "Argentina", "d_code" => "+54");
            $countries[] = array("code" => "AM", "name" => "Armenia", "d_code" => "+374");
            $countries[] = array("code" => "AW", "name" => "Aruba", "d_code" => "+297");
            $countries[] = array("code" => "AU", "name" => "Australia", "d_code" => "+61");
            $countries[] = array("code" => "AT", "name" => "Austria", "d_code" => "+43");
            $countries[] = array("code" => "AZ", "name" => "Azerbaijan", "d_code" => "+994");
            $countries[] = array("code" => "BH", "name" => "Bahrain", "d_code" => "+973");
            $countries[] = array("code" => "BD", "name" => "Bangladesh", "d_code" => "+880");
            $countries[] = array("code" => "BB", "name" => "Barbados", "d_code" => "+1");
            $countries[] = array("code" => "BY", "name" => "Belarus", "d_code" => "+375");
            $countries[] = array("code" => "BE", "name" => "Belgium", "d_code" => "+32");
            $countries[] = array("code" => "BZ", "name" => "Belize", "d_code" => "+501");
            $countries[] = array("code" => "BJ", "name" => "Benin", "d_code" => "+229");
            $countries[] = array("code" => "BM", "name" => "Bermuda", "d_code" => "+1");
            $countries[] = array("code" => "BT", "name" => "Bhutan", "d_code" => "+975");
            $countries[] = array("code" => "BO", "name" => "Bolivia", "d_code" => "+591");
            $countries[] = array("code" => "BA", "name" => "Bosnia and Herzegovina", "d_code" => "+387");
            $countries[] = array("code" => "BW", "name" => "Botswana", "d_code" => "+267");
            $countries[] = array("code" => "BR", "name" => "Brazil", "d_code" => "+55");
            $countries[] = array("code" => "IO", "name" => "British Indian Ocean Territory", "d_code" => "+246");
            $countries[] = array("code" => "VG", "name" => "British Virgin Islands", "d_code" => "+1");
            $countries[] = array("code" => "BN", "name" => "Brunei", "d_code" => "+673");
            $countries[] = array("code" => "BG", "name" => "Bulgaria", "d_code" => "+359");
            $countries[] = array("code" => "BF", "name" => "Burkina Faso", "d_code" => "+226");
            $countries[] = array("code" => "MM", "name" => "Burma Myanmar", "d_code" => "+95");
            $countries[] = array("code" => "BI", "name" => "Burundi", "d_code" => "+257");
            $countries[] = array("code" => "KH", "name" => "Cambodia", "d_code" => "+855");
            $countries[] = array("code" => "CM", "name" => "Cameroon", "d_code" => "+237");
            $countries[] = array("code" => "CA", "name" => "Canada", "d_code" => "+1");
            $countries[] = array("code" => "CV", "name" => "Cape Verde", "d_code" => "+238");
            $countries[] = array("code" => "KY", "name" => "Cayman Islands", "d_code" => "+1");
            $countries[] = array("code" => "CF", "name" => "Central African Republic", "d_code" => "+236");
            $countries[] = array("code" => "TD", "name" => "Chad", "d_code" => "+235");
            $countries[] = array("code" => "CL", "name" => "Chile", "d_code" => "+56");
            $countries[] = array("code" => "CN", "name" => "China", "d_code" => "+86");
            $countries[] = array("code" => "CO", "name" => "Colombia", "d_code" => "+57");
            $countries[] = array("code" => "KM", "name" => "Comoros", "d_code" => "+269");
            $countries[] = array("code" => "CK", "name" => "Cook Islands", "d_code" => "+682");
            $countries[] = array("code" => "CR", "name" => "Costa Rica", "d_code" => "+506");
            $countries[] = array("code" => "CI", "name" => "Côte d'Ivoire", "d_code" => "+225");
            $countries[] = array("code" => "HR", "name" => "Croatia", "d_code" => "+385");
            $countries[] = array("code" => "CU", "name" => "Cuba", "d_code" => "+53");
            $countries[] = array("code" => "CY", "name" => "Cyprus", "d_code" => "+357");
            $countries[] = array("code" => "CZ", "name" => "Czech Republic", "d_code" => "+420");
            $countries[] = array("code" => "CD", "name" => "Democratic Republic of Congo", "d_code" => "+243");
            $countries[] = array("code" => "DK", "name" => "Denmark", "d_code" => "+45");
            $countries[] = array("code" => "DJ", "name" => "Djibouti", "d_code" => "+253");
            $countries[] = array("code" => "DM", "name" => "Dominica", "d_code" => "+1");
            $countries[] = array("code" => "DO", "name" => "Dominican Republic", "d_code" => "+1");
            $countries[] = array("code" => "EC", "name" => "Ecuador", "d_code" => "+593");
            $countries[] = array("code" => "EG", "name" => "Egypt", "d_code" => "+20");
            $countries[] = array("code" => "SV", "name" => "El Salvador", "d_code" => "+503");
            $countries[] = array("code" => "GQ", "name" => "Equatorial Guinea", "d_code" => "+240");
            $countries[] = array("code" => "ER", "name" => "Eritrea", "d_code" => "+291");
            $countries[] = array("code" => "EE", "name" => "Estonia", "d_code" => "+372");
            $countries[] = array("code" => "ET", "name" => "Ethiopia", "d_code" => "+251");
            $countries[] = array("code" => "FK", "name" => "Falkland Islands", "d_code" => "+500");
            $countries[] = array("code" => "FO", "name" => "Faroe Islands", "d_code" => "+298");
            $countries[] = array("code" => "FM", "name" => "Federated States of Micronesia", "d_code" => "+691");
            $countries[] = array("code" => "FJ", "name" => "Fiji", "d_code" => "+679");
            $countries[] = array("code" => "FI", "name" => "Finland", "d_code" => "+358");
            $countries[] = array("code" => "FR", "name" => "France", "d_code" => "+33");
            $countries[] = array("code" => "GF", "name" => "French Guiana", "d_code" => "+594");
            $countries[] = array("code" => "PF", "name" => "French Polynesia", "d_code" => "+689");
            $countries[] = array("code" => "GA", "name" => "Gabon", "d_code" => "+241");
            $countries[] = array("code" => "GE", "name" => "Georgia", "d_code" => "+995");
            $countries[] = array("code" => "DE", "name" => "Germany", "d_code" => "+49");
            $countries[] = array("code" => "GH", "name" => "Ghana", "d_code" => "+233");
            $countries[] = array("code" => "GI", "name" => "Gibraltar", "d_code" => "+350");
            $countries[] = array("code" => "GR", "name" => "Greece", "d_code" => "+30");
            $countries[] = array("code" => "GL", "name" => "Greenland", "d_code" => "+299");
            $countries[] = array("code" => "GD", "name" => "Grenada", "d_code" => "+1");
            $countries[] = array("code" => "GP", "name" => "Guadeloupe", "d_code" => "+590");
            $countries[] = array("code" => "GU", "name" => "Guam", "d_code" => "+1");
            $countries[] = array("code" => "GT", "name" => "Guatemala", "d_code" => "+502");
            $countries[] = array("code" => "GN", "name" => "Guinea", "d_code" => "+224");
            $countries[] = array("code" => "GW", "name" => "Guinea-Bissau", "d_code" => "+245");
            $countries[] = array("code" => "GY", "name" => "Guyana", "d_code" => "+592");
            $countries[] = array("code" => "HT", "name" => "Haiti", "d_code" => "+509");
            $countries[] = array("code" => "HN", "name" => "Honduras", "d_code" => "+504");
            $countries[] = array("code" => "HK", "name" => "Hong Kong", "d_code" => "+852");
            $countries[] = array("code" => "HU", "name" => "Hungary", "d_code" => "+36");
            $countries[] = array("code" => "IS", "name" => "Iceland", "d_code" => "+354");
            $countries[] = array("code" => "IN", "name" => "India", "d_code" => "+91");
            $countries[] = array("code" => "ID", "name" => "Indonesia", "d_code" => "+62");
            $countries[] = array("code" => "IR", "name" => "Iran", "d_code" => "+98");
            $countries[] = array("code" => "IQ", "name" => "Iraq", "d_code" => "+964");
            $countries[] = array("code" => "IE", "name" => "Ireland", "d_code" => "+353");
            $countries[] = array("code" => "IL", "name" => "Israel", "d_code" => "+972");
            $countries[] = array("code" => "IT", "name" => "Italy", "d_code" => "+39");
            $countries[] = array("code" => "JM", "name" => "Jamaica", "d_code" => "+1");
            $countries[] = array("code" => "JP", "name" => "Japan", "d_code" => "+81");
            $countries[] = array("code" => "JO", "name" => "Jordan", "d_code" => "+962");
            $countries[] = array("code" => "KZ", "name" => "Kazakhstan", "d_code" => "+7");
            $countries[] = array("code" => "KE", "name" => "Kenya", "d_code" => "+254");
            $countries[] = array("code" => "KI", "name" => "Kiribati", "d_code" => "+686");
            $countries[] = array("code" => "XK", "name" => "Kosovo", "d_code" => "+381");
            $countries[] = array("code" => "KW", "name" => "Kuwait", "d_code" => "+965");
            $countries[] = array("code" => "KG", "name" => "Kyrgyzstan", "d_code" => "+996");
            $countries[] = array("code" => "LA", "name" => "Laos", "d_code" => "+856");
            $countries[] = array("code" => "LV", "name" => "Latvia", "d_code" => "+371");
            $countries[] = array("code" => "LB", "name" => "Lebanon", "d_code" => "+961");
            $countries[] = array("code" => "LS", "name" => "Lesotho", "d_code" => "+266");
            $countries[] = array("code" => "LR", "name" => "Liberia", "d_code" => "+231");
            $countries[] = array("code" => "LY", "name" => "Libya", "d_code" => "+218");
            $countries[] = array("code" => "LI", "name" => "Liechtenstein", "d_code" => "+423");
            $countries[] = array("code" => "LT", "name" => "Lithuania", "d_code" => "+370");
            $countries[] = array("code" => "LU", "name" => "Luxembourg", "d_code" => "+352");
            $countries[] = array("code" => "MO", "name" => "Macau", "d_code" => "+853");
            $countries[] = array("code" => "MK", "name" => "Macedonia", "d_code" => "+389");
            $countries[] = array("code" => "MG", "name" => "Madagascar", "d_code" => "+261");
            $countries[] = array("code" => "MW", "name" => "Malawi", "d_code" => "+265");
            $countries[] = array("code" => "MY", "name" => "Malaysia", "d_code" => "+60");
            $countries[] = array("code" => "MV", "name" => "Maldives", "d_code" => "+960");
            $countries[] = array("code" => "ML", "name" => "Mali", "d_code" => "+223");
            $countries[] = array("code" => "MT", "name" => "Malta", "d_code" => "+356");
            $countries[] = array("code" => "MH", "name" => "Marshall Islands", "d_code" => "+692");
            $countries[] = array("code" => "MQ", "name" => "Martinique", "d_code" => "+596");
            $countries[] = array("code" => "MR", "name" => "Mauritania", "d_code" => "+222");
            $countries[] = array("code" => "MU", "name" => "Mauritius", "d_code" => "+230");
            $countries[] = array("code" => "YT", "name" => "Mayotte", "d_code" => "+262");
            $countries[] = array("code" => "MX", "name" => "Mexico", "d_code" => "+52");
            $countries[] = array("code" => "MD", "name" => "Moldova", "d_code" => "+373");
            $countries[] = array("code" => "MC", "name" => "Monaco", "d_code" => "+377");
            $countries[] = array("code" => "MN", "name" => "Mongolia", "d_code" => "+976");
            $countries[] = array("code" => "ME", "name" => "Montenegro", "d_code" => "+382");
            $countries[] = array("code" => "MS", "name" => "Montserrat", "d_code" => "+1");
            $countries[] = array("code" => "MA", "name" => "Morocco", "d_code" => "+212");
            $countries[] = array("code" => "MZ", "name" => "Mozambique", "d_code" => "+258");
            $countries[] = array("code" => "NA", "name" => "Namibia", "d_code" => "+264");
            $countries[] = array("code" => "NR", "name" => "Nauru", "d_code" => "+674");
            $countries[] = array("code" => "NP", "name" => "Nepal", "d_code" => "+977");
            $countries[] = array("code" => "NL", "name" => "Netherlands", "d_code" => "+31");
            $countries[] = array("code" => "AN", "name" => "Netherlands Antilles", "d_code" => "+599");
            $countries[] = array("code" => "NC", "name" => "New Caledonia", "d_code" => "+687");
            $countries[] = array("code" => "NZ", "name" => "New Zealand", "d_code" => "+64");
            $countries[] = array("code" => "NI", "name" => "Nicaragua", "d_code" => "+505");
            $countries[] = array("code" => "NE", "name" => "Niger", "d_code" => "+227");
            $countries[] = array("code" => "NG", "name" => "Nigeria", "d_code" => "+234");
            $countries[] = array("code" => "NU", "name" => "Niue", "d_code" => "+683");
            $countries[] = array("code" => "NF", "name" => "Norfolk Island", "d_code" => "+672");
            $countries[] = array("code" => "KP", "name" => "North Korea", "d_code" => "+850");
            $countries[] = array("code" => "MP", "name" => "Northern Mariana Islands", "d_code" => "+1");
            $countries[] = array("code" => "NO", "name" => "Norway", "d_code" => "+47");
            $countries[] = array("code" => "OM", "name" => "Oman", "d_code" => "+968");
            $countries[] = array("code" => "PK", "name" => "Pakistan", "d_code" => "+92");
            $countries[] = array("code" => "PW", "name" => "Palau", "d_code" => "+680");
            $countries[] = array("code" => "PS", "name" => "Palestine", "d_code" => "+970");
            $countries[] = array("code" => "PA", "name" => "Panama", "d_code" => "+507");
            $countries[] = array("code" => "PG", "name" => "Papua New Guinea", "d_code" => "+675");
            $countries[] = array("code" => "PY", "name" => "Paraguay", "d_code" => "+595");
            $countries[] = array("code" => "PE", "name" => "Peru", "d_code" => "+51");
            $countries[] = array("code" => "PH", "name" => "Philippines", "d_code" => "+63");
            $countries[] = array("code" => "PL", "name" => "Poland", "d_code" => "+48");
            $countries[] = array("code" => "PT", "name" => "Portugal", "d_code" => "+351");
            $countries[] = array("code" => "PR", "name" => "Puerto Rico", "d_code" => "+1");
            $countries[] = array("code" => "QA", "name" => "Qatar", "d_code" => "+974");
            $countries[] = array("code" => "CG", "name" => "Republic of the Congo", "d_code" => "+242");
            $countries[] = array("code" => "RE", "name" => "Réunion", "d_code" => "+262");
            $countries[] = array("code" => "RO", "name" => "Romania", "d_code" => "+40");
            $countries[] = array("code" => "RU", "name" => "Russia", "d_code" => "+7");
            $countries[] = array("code" => "RW", "name" => "Rwanda", "d_code" => "+250");
            $countries[] = array("code" => "BL", "name" => "Saint Barthélemy", "d_code" => "+590");
            $countries[] = array("code" => "SH", "name" => "Saint Helena", "d_code" => "+290");
            $countries[] = array("code" => "KN", "name" => "Saint Kitts and Nevis", "d_code" => "+1");
            $countries[] = array("code" => "MF", "name" => "Saint Martin", "d_code" => "+590");
            $countries[] = array("code" => "PM", "name" => "Saint Pierre and Miquelon", "d_code" => "+508");
            $countries[] = array("code" => "VC", "name" => "Saint Vincent and the Grenadines", "d_code" => "+1");
            $countries[] = array("code" => "WS", "name" => "Samoa", "d_code" => "+685");
            $countries[] = array("code" => "SM", "name" => "San Marino", "d_code" => "+378");
            $countries[] = array("code" => "ST", "name" => "São Tomé and Príncipe", "d_code" => "+239");
            $countries[] = array("code" => "SA", "name" => "Saudi Arabia", "d_code" => "+966");
            $countries[] = array("code" => "SN", "name" => "Senegal", "d_code" => "+221");
            $countries[] = array("code" => "RS", "name" => "Serbia", "d_code" => "+381");
            $countries[] = array("code" => "SC", "name" => "Seychelles", "d_code" => "+248");
            $countries[] = array("code" => "SL", "name" => "Sierra Leone", "d_code" => "+232");
            $countries[] = array("code" => "SG", "name" => "Singapore", "d_code" => "+65");
            $countries[] = array("code" => "SK", "name" => "Slovakia", "d_code" => "+421");
            $countries[] = array("code" => "SI", "name" => "Slovenia", "d_code" => "+386");
            $countries[] = array("code" => "SB", "name" => "Solomon Islands", "d_code" => "+677");
            $countries[] = array("code" => "SO", "name" => "Somalia", "d_code" => "+252");
            $countries[] = array("code" => "ZA", "name" => "South Africa", "d_code" => "+27");
            $countries[] = array("code" => "KR", "name" => "South Korea", "d_code" => "+82");
            $countries[] = array("code" => "ES", "name" => "Spain", "d_code" => "+34");
            $countries[] = array("code" => "LK", "name" => "Sri Lanka", "d_code" => "+94");
            $countries[] = array("code" => "LC", "name" => "St. Lucia", "d_code" => "+1");
            $countries[] = array("code" => "SD", "name" => "Sudan", "d_code" => "+249");
            $countries[] = array("code" => "SR", "name" => "Suriname", "d_code" => "+597");
            $countries[] = array("code" => "SZ", "name" => "Swaziland", "d_code" => "+268");
            $countries[] = array("code" => "SE", "name" => "Sweden", "d_code" => "+46");
            $countries[] = array("code" => "CH", "name" => "Switzerland", "d_code" => "+41");
            $countries[] = array("code" => "SY", "name" => "Syria", "d_code" => "+963");
            $countries[] = array("code" => "TW", "name" => "Taiwan", "d_code" => "+886");
            $countries[] = array("code" => "TJ", "name" => "Tajikistan", "d_code" => "+992");
            $countries[] = array("code" => "TZ", "name" => "Tanzania", "d_code" => "+255");
            $countries[] = array("code" => "TH", "name" => "Thailand", "d_code" => "+66");
            $countries[] = array("code" => "BS", "name" => "The Bahamas", "d_code" => "+1");
            $countries[] = array("code" => "GM", "name" => "The Gambia", "d_code" => "+220");
            $countries[] = array("code" => "TL", "name" => "Timor-Leste", "d_code" => "+670");
            $countries[] = array("code" => "TG", "name" => "Togo", "d_code" => "+228");
            $countries[] = array("code" => "TK", "name" => "Tokelau", "d_code" => "+690");
            $countries[] = array("code" => "TO", "name" => "Tonga", "d_code" => "+676");
            $countries[] = array("code" => "TT", "name" => "Trinidad and Tobago", "d_code" => "+1");
            $countries[] = array("code" => "TN", "name" => "Tunisia", "d_code" => "+216");
            $countries[] = array("code" => "TR", "name" => "Turkey", "d_code" => "+90");
            $countries[] = array("code" => "TM", "name" => "Turkmenistan", "d_code" => "+993");
            $countries[] = array("code" => "TC", "name" => "Turks and Caicos Islands", "d_code" => "+1");
            $countries[] = array("code" => "TV", "name" => "Tuvalu", "d_code" => "+688");
            $countries[] = array("code" => "UG", "name" => "Uganda", "d_code" => "+256");
            $countries[] = array("code" => "UA", "name" => "Ukraine", "d_code" => "+380");
            $countries[] = array("code" => "AE", "name" => "United Arab Emirates", "d_code" => "+971");
            $countries[] = array("code" => "GB", "name" => "United Kingdom", "d_code" => "+44");
            $countries[] = array("code" => "US", "name" => "United States", "d_code" => "+1");
            $countries[] = array("code" => "UY", "name" => "Uruguay", "d_code" => "+598");
            $countries[] = array("code" => "VI", "name" => "US Virgin Islands", "d_code" => "+1");
            $countries[] = array("code" => "UZ", "name" => "Uzbekistan", "d_code" => "+998");
            $countries[] = array("code" => "VU", "name" => "Vanuatu", "d_code" => "+678");
            $countries[] = array("code" => "VA", "name" => "Vatican City", "d_code" => "+39");
            $countries[] = array("code" => "VE", "name" => "Venezuela", "d_code" => "+58");
            $countries[] = array("code" => "VN", "name" => "Vietnam", "d_code" => "+84");
            $countries[] = array("code" => "WF", "name" => "Wallis and Futuna", "d_code" => "+681");
            $countries[] = array("code" => "YE", "name" => "Yemen", "d_code" => "+967");
            $countries[] = array("code" => "ZM", "name" => "Zambia", "d_code" => "+260");
            $countries[] = array("code" => "ZW", "name" => "Zimbabwe", "d_code" => "+263");
            DB::table('country')->insert($countries);
        }
        
        if (!Schema::hasTable('Company'))
        {
            Schema::create('Company', function (Blueprint $table)
            {

                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('company_name');
                $table->string('company_url');
                $table->string('email');
                $table->string('password');
                $table->integer('status')->default(0)->comment = " if 1 inactive or 0 active";
                $table->string('address');
                $table->string('phone_number');
                $table->string('state');
                $table->string('country');
                $table->string('zipcode');
                //  $table->string('remember_token')->nullable();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->dateTime('deleted_at')->nullable();
            });
        }*/

       /* if (!Schema::hasTable('911_Path_Details'))
        {
            Schema::create('911_Path_Details', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('hero_id');
                $table->string('lat');
                $table->string('long');
                $table->string('old_lat');
                $table->string('old_long');
                $table->dateTime('created_at');
                $table->dateTime('updated_at');

            });
        }*/



           /* Schema::table('911_Request_Meta', function (Blueprint $table)
            {
                $table->foreign('request_id')->references('id')->on('911_Request');
            });
        }*/
        return $next($request);


    }
}
