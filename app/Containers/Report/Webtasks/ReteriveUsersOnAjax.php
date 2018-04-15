<?php
namespace App\Containers\Report\Webtasks;

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



class ReteriveUsersOnAjax
{
    public function run($request)
    {




        $a = UserTableModel::select(DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS username'))
                            ->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$_POST["keyword"].'%')
                            ->get();
?>
 <ul id="country-list" >

<?php
        $array = array();
        foreach ($a as $values)
        {
?>
<li onClick="selectCountry('<?php echo $values->username; ?>');"><?php echo $values->username; ?></li>

 <?php
        }
?>
 </ul>
<?php
    }

}

//class LedgerReportDownloadTask
//{
//
//    public static function test()
//    {
//        die();
//        $Users = UserTableModel::select('*')->get();
//
//        echo "<pre>";
//        print_r($Users);
//        $obj = new LedgerReportDownloadTask;
//
//    }
//
//
//    public function run($request)
//    {
//        $Users = UserTableModel::select('*')->get();
//
//        echo "<pre>";
//        print_r($Users);
//    }
//}

?>

