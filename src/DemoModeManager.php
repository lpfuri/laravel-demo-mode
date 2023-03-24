<?php

namespace Lpfuri\LaravelDemoMode;

use Illuminate\Support\Facades\Storage;

class DemoModeManager
{
    protected $isDemoModeOn;

    protected $user;

    public function isDemoModeOn()
    {   
        if($this->isDemoModeOn) return $this->isDemoModeOn;

        return $this->isDemoModeOn =  Storage::exists(config('demo-mode.folder').'/demo-mode');
    }

    public function user()
    {
        if($this->user) return $this->user;

        return $this->user = app(config('demo-mode.user_model'))->find(config('demo-mode.demo_user_id'));
    }
}