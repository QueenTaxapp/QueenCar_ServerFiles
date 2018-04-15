<?php
namespace App\Containers\Report\Webtasks;

use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetailsModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Request\Models\RequestModel;
use Carbon\Carbon;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Company\Webtasks\ReportDownloadTask;



class ReteriveDriversOnAjax
{
    public function run($request)
    {



        $a = DriverModel::select(DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS username'))
            ->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$_POST["driverKeyword"].'%')
            ->get();
        ?>
        <ul id="country-list-driver-name">

            <?php
            $array = array();
            foreach ($a as $values)
            {
                ?>
                <li onClick="selectCountryDriverName('<?php echo $values->username; ?>');"><?php echo $values->username; ?></li>

                <?php
            }
            ?>
        </ul>
        <?php
    }

}

?>

