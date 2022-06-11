<?php

namespace App\Schedules;

use Carbon\Carbon;
use App\Models\Contract;
use App\Models\Screenshot;
use App\Models\Transaction;
use App\Models\UserPendingBalance;

class HourlyBill{
    
    public function __invoke()
    {
        $contracts = Contract::where("contract_status", 2)->where("payment_type", 2)->get();

        $today = now();

        $searchDay = 'Monday';
        $searchDate = new Carbon();

        $searchDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp));

        $dateDiff = $today->diff($searchDate);
        if($dateDiff->d < 7){
            // If last monday is within the same week, find the last last monday!
            $searchDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp));
        }

        $nextSunday = new Carbon($searchDate);
        $nextSunday->add('6D');

        foreach($contracts as $item){

            $total_hour = Screenshot::whereHas('time_tracker', function($q) use($item){
                $q->where('contract_id', $item->id);
            })->whereBetween('created_at', [$searchDate, $nextSunday])->sum('screenshot_duration');

            $total_amount = $total_hour * $item->price;

            UserPendingBalance::create([
                'user_id' => $item->created_by_user,
                'contract_id' => $item->id,
                'status' => 1,
                'amount' => $total_amount
            ]);

            Transaction::create([
                'user_id' => $item->created_by_user,
                'credit_account' => '4', //cash
                'debit_account' => '7', //hourly bill
                'amount' => $total_amount
            ]);
        }
    }
}