<?php

namespace App\Http\Controllers;

use App\Models\HealthRiskGroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function confirmPhoneNumber(Request $request)
    {
        $user = Auth::user();

        if($user->phone_code == $request->get('phone_code'))
        {
            $user->phone_verified = 1;
            $user->save();
        }

        return response('Phone verification was successful.');
    }

    public function assignRiskGroups(Request $request)
    {
        $user = Auth::user();

        $groups = HealthRiskGroupUser::where('user_id', $user->id)->get();

        if(count($groups) === 0){
            if($request->get('is_child'))
            {
                HealthRiskGroupUser::create([
                   'user_id' => $user->id,
                   'health_risk_group_id' => 4
                ]);
            }

            if($request->get('is_old'))
            {
                HealthRiskGroupUser::create([
                    'user_id' => $user->id,
                    'health_risk_group_id' => 1
                ]);
            }

            if($request->get('is_hearth'))
            {
                HealthRiskGroupUser::create([
                    'user_id' => $user->id,
                    'health_risk_group_id' => 3
                ]);
            }

            if($request->get('is_respiratory'))
            {
                HealthRiskGroupUser::create([
                    'user_id' => $user->id,
                    'health_risk_group_id' => 2
                ]);
            }

            if($request->get('is_none'))
            {
                HealthRiskGroupUser::create([
                    'user_id' => $user->id,
                    'health_risk_group_id' => 5
                ]);
            }
        } else {
            if(!$request->get('is_old'))
            {
                foreach ($groups as $group)
                {
                    if($group->healthRiskGroup->name == 'Old')
                    {
                        $userGroup = HealthRiskGroupUser::where('health_risk_group_id', 1)
                            ->where('user_id', $user->id)
                            ->first();
                        HealthRiskGroupUser::destroy($userGroup->id);
                    }
                }
            }
            else
            {
                if(is_null(HealthRiskGroupUser::where(('user_id'), $user->id)->where('health_risk_group_id', 1)->first()))
                {
                    HealthRiskGroupUser::create([
                        'user_id' => $user->id,
                        'health_risk_group_id' => 1
                    ]);
                }
            }

            if(!$request->get('is_child'))
            {
                foreach ($groups as $group)
                {
                    if($group->healthRiskGroup->name == 'Child')
                    {
                        $userGroup = HealthRiskGroupUser::where('health_risk_group_id', 4)
                            ->where('user_id', $user->id)
                            ->first();

                        HealthRiskGroupUser::destroy($userGroup->id);
                    }
                }

            }
            else
            {
                if(is_null(HealthRiskGroupUser::where(('user_id'), $user->id)->where('health_risk_group_id', 4)->first()))
                {
                    HealthRiskGroupUser::create([
                        'user_id' => $user->id,
                        'health_risk_group_id' => 4
                    ]);
                }
            }

            if(!$request->get('is_respiratory'))
            {
                foreach ($groups as $group)
                {
                    if($group->healthRiskGroup->name == 'Respiratory')
                    {
                        $userGroup = HealthRiskGroupUser::where('health_risk_group_id', 2)
                            ->where('user_id', $user->id)
                            ->first();

                        HealthRiskGroupUser::destroy($userGroup->id);
                    }
                }
            }
            else
            {
                if(is_null(HealthRiskGroupUser::where(('user_id'), $user->id)->where('health_risk_group_id', 2)->first()))
                {
                    HealthRiskGroupUser::create([
                        'user_id' => $user->id,
                        'health_risk_group_id' => 2
                    ]);
                }
            }

            if(!$request->get('is_hearth'))
            {
                foreach ($groups as $group)
                {
                    if($group->healthRiskGroup->name == 'Hearth')
                    {
                        $userGroup = HealthRiskGroupUser::where('health_risk_group_id', 3)
                            ->where('user_id', $user->id)
                            ->first();

                        HealthRiskGroupUser::destroy($userGroup->id);
                    }
                }

            }
            else
            {
                if(is_null(HealthRiskGroupUser::where(('user_id'), $user->id)->where('health_risk_group_id', 3)->first()))
                {
                    HealthRiskGroupUser::create([
                        'user_id' => $user->id,
                        'health_risk_group_id' => 3
                    ]);
                }
            }

            if(!$request->get('is_none'))
            {
                foreach ($groups as $group)
                {
                    if($group->healthRiskGroup->name == 'None')
                    {
                        $userGroup = HealthRiskGroupUser::where('health_risk_group_id', 5)
                            ->where('user_id', $user->id)
                            ->first();

                        HealthRiskGroupUser::destroy($userGroup->id);
                    }
                }

            }
            else
            {
                if(is_null(HealthRiskGroupUser::where(('user_id'), $user->id)->where('health_risk_group_id', 5)->first()))
                {
                    HealthRiskGroupUser::create([
                        'user_id' => $user->id,
                        'health_risk_group_id' => 5
                    ]);
                }

            }
        }

        return response('created');
    }
}
