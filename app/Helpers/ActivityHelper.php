<?php
use App\Models\Activity;
use Illuminate\Support\Facades\Request;


if (!function_exists('Activitylogger')) {
    function activityLogger($activityType, $message, $user_id, $executedId = 1, $status = 1)
    {
        $activity = new Activity();
        $activity->activity_type = $activityType;
        $activity->user_id = $user_id;
        $activity->executed_id = $executedId;
        $activity->message = $message;
        $activity->ip_address = Request::ip();
        $activity->status = $status;
        $activity->save();
    }
}
