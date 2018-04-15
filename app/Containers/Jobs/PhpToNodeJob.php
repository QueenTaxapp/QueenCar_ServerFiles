<?php

namespace App\Containers\Jobs;


use App\Ship\Parents\Jobs\Job;
use Mail;
use DB;
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version2X;


/**
 * Class PhpToNodeJob
 * @package App\Containers\Jobs
 */
class PhpToNodeJob extends Job
{


    /**
     * PhpToNodeJob constructor.
     * @param $variableName
     * @param $values
     * @param int $portNumber
     */
    public function __construct($variableName, $values, $portNumber= 3002)
    {

        $this->variableName  = $variableName;
        $this->values        = $values;
        $this->portNumber    = $portNumber;

    }


    /**
     * @return string
     */
    public function handle()
    {
        $path2 = base_path('/vendor/autoload.php');
        include("$path2");

        $client = new Client(new Version2X('http://localhost:3001'));
        $client->initialize();
        $client->of('/php/user');
        $client->emit($this->variableName, $this->values);
        $client->close();


    }
}