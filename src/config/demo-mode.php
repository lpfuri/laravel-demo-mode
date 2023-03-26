<?php

return [

  'folder'               => 'demo-mode',

  'user_model'           => 'App\Models\User',

  'demo_user_id'         => 1,

  'user_updating_event'  => 'eloquent.updating: App\Models\User',

  'user_deleting_event'  => 'eloquent.deleting: App\Models\User',

  'error_code'           => 403,

  'backup_file_name'    => 'demo.sql',

  'restoring_period'    => 'daily'

];