<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterSubscriptionRequest;
use App\Mail\NewsletterVerification;
use App\Models\AirQualityRecording;
use App\Models\MonthlyNewsletterRecipient;
use App\Models\WeeklyNewsletterRecipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function storeNewsletterSubscription(StoreNewsletterSubscriptionRequest $request)
    {
        $validated = $request->validated();
        $is_monthly = false;
        $is_weekly = false;
        $validated['token'] = str_random(40);

        if($validated['is_monthly'])
        {
            $is_monthly = $this->storeMonthlySubscription($validated);
        }

        if($validated['is_weekly'])
        {
            $is_weekly = $this->storeWeeklySubscription($validated);
        }

        if($is_monthly || $is_weekly)
        {
            $this->sendNewsletterVerificationEmail($validated);
            return response('Please verify Your email address', 200);
        }

        return response('Wrong request', 200);
    }

    private function storeWeeklySubscription(array $attributes)
    {

        $recipient = new WeeklyNewsletterRecipient();

        if(!is_null($recipient->where('email', $attributes['email'])->first()))
        {
            return false;
        }

        $recipient->fill($attributes);
        $recipient->save();

        return true;
    }

    private function storeMonthlySubscription(array $attributes)
    {
        $recipient = new MonthlyNewsletterRecipient();

        if(!is_null($recipient->where('email', $attributes['email'])->first()))
        {
            return false;
        }

        $recipient->fill($attributes);

        $recipient->save();

        return true;
    }

    private function sendNewsletterVerificationEmail(array $verificationData)
    {
        Mail::to($verificationData['email'])->send(new NewsletterVerification($verificationData));
    }

    public function verifyNewsletterSubscription(string $token)
    {
        $weeklyRecipient = WeeklyNewsletterRecipient::where('token', $token)->first();

        if(!is_null($weeklyRecipient))
        {
            $weeklyRecipient->is_verified = 1;
            $weeklyRecipient->save();
        }

        $monthlyRecipient = MonthlyNewsletterRecipient::where('token', $token)->first();

        if(!is_null($monthlyRecipient))
        {
            $monthlyRecipient->is_verified = 1;
            $monthlyRecipient->save();
        }

        return view('pages.newsletter.thank_you');
    }

    public function index()
    {
        $dailyData = AirQualityRecording::orderBy('taken_at','desc')->take(8)->get()->reverse();

        return view('pages.newsletter.newsletter', compact('dailyData'));
    }
}
