<?php namespace Cc\Ccsupport\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Ccsupport\Models\CcSupport;
use Mail;
use System\Models\MailTemplate;

class CcSupportCmp extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $support;

    public function componentDetails()
    {
        return [
            'name'        => 'support',
        ];
    }

    // public function defineProperties()
    // {
    //     return [
    //         'region' => [
    //             'title'       => 'Block ID',
    //             'type'        => 'string'
    //         ],
    //     ];
    // }

    public function onRun()
    {
        //$this->blocks = $this->page['blocks'] = BlocksModel::where('id',$this->property('region'))->first();
    }

    public function onCallMeNow()
    {
        $phone = $_POST['phone'];
        CcSupport::insert(['phone'=>$phone,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
        $this->notifyAdmin($phone);
        return true;
    }

    private function notifyAdmin($phone){
        $vars = ['phone'=>$phone];
        Mail::send('new_phone', $vars, function($message) {

            $message->to('info@crosscountrymovingcompany.net', 'Admin Person');
            $message->subject('You have new phone to call!');

        });
    }
}
