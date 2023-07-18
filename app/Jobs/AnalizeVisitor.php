<?php

namespace App\Jobs;

use App\Models\LinksVisitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AnalizeVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $visitor_id;

    /**
     * Create a new job instance.
     */
    public function __construct($visitor_id)
    {
        $this->visitor_id = $visitor_id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $visitor = LinksVisitor::find($this->visitor_id);
            if ($visitor && $visitor->checked == 0) {
                $data = [
                    'api_key' => config('abstractapi.api_key'),
                    'ip_address' => ($visitor->ip_address == '127.0.0.1') ? '36.81.82.168' : $visitor->ip_address,
                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://ipgeolocation.abstractapi.com/v1?' . http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ]);

                $error = curl_error($ch);
                $response = curl_exec($ch);
                curl_close($ch);

                if ($response === false) {
                    Log::error($error);
                } else {
                    $responseData = json_decode($response, true);
                    $newData = [
                        'checked' => true,
                        'city' => $responseData['city'],
                        'region' => $responseData['region'],
                        'country' => $responseData['country'],
                        'longitude' => $responseData['longitude'],
                        'latitude' => $responseData['latitude'],
                        'is_vpn' => $responseData['security']['is_vpn'],
                        'flag' => $responseData['flag']['svg'],
                        'connection_type' => $responseData['connection']['connection_type'],
                        'isp_name' => $responseData['connection']['isp_name'],
                    ];
                    $visitor->update($newData);
                }
            }
        } catch (\Throwable $exception) {
            if ($this->attempts() > 9) {
                // hard fail after 9 attempts
                throw $exception;
            }

            // requeue this job to be executes
            // in 3 minutes (180 seconds) from now
            $this->release(180);
            return;
        }
    }

    public function retryUntil()
    {
        // will keep retrying, by backoff logic below
        // until 12 hours from first run.
        // After that, if it fails it will go
        // to the failed_jobs table
        return now()->addHours(12);
    }

    /**
     * Calculate the number of seconds to wait before retrying the job.
     *
     * @return array
     */
    public function backoff()
    {
        // first 5 retries, after first failure
        // will be 5 minutes (300 seconds) apart,
        // further attempts will be
        // 3 hours (10,800 seconds) after
        // previous attempt
        return [300, 300, 300, 300, 300, 10800];
    }
}
