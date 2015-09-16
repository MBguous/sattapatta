<?php

class PusherNotificationController extends BaseController
{
    public function getIndex()
    {
        return View::make('notification');
    }

    public function postNotify()
    {
        $notifyText = e(Input::get('notify_text'));

        Pusherer::trigger('notification', 'new-notification', ['text'=>$notifyText]);

        // TODO: Get Pusher instance from service container

        // TODO: The notification event data should have a property named 'text'

        // TODO: On the 'notifications' channel trigger a 'new-notification' event
    }
}
