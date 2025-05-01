<?php

namespace App\Providers;

use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Define a macro 'rupiahToFloat' to convert Rupiah currency strings to float values.
         * 
         * This macro converts a Rupiah currency string into a float value.
         * 
         * @param string $value The Rupiah currency string to be converted.
         * 
         * @return float The converted float value.
         */
        Str::macro('rupiahToFloat', function (string $value): float {
            $value = str_replace("\u{A0}", ' ', $value);
            // Remove the 'Rp' prefix and any spaces or dots following it.
            $cleanedValue = preg_replace('/^Rp[\s\.]?/', '', $value);

            // Remove all dots from the string to handle thousands separators.
            $cleanedValue = str_replace('.', '', $cleanedValue);

            // Replace the comma with a dot to standardize the decimal separator.
            $cleanedValue = str_replace(',', '.', $cleanedValue);
            return (float) $cleanedValue; 
        });

        /**
         * Define a macro 'generateRandomString' to create a unique random string.
         * 
         * Generates a random alphanumeric string with a length of 5 or 6 characters,
         * combines it with a unique identifier, and returns the result prefixed with '#'.
         * 
         * @return string The generated random string.
         */
        Str::macro('generateRandomString', function (string $type): string {
            $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $randomLength = rand(6, 8);

            $randomPart = collect(range(1, $randomLength))
                    ->map(fn () => $characters[rand(0, strlen($characters) - 1)])
                    ->implode('');
            
            $uniquePart = substr(uniqid(), -5);
            $combined = str_shuffle($randomPart . $uniquePart);
            return $type . ' #' . strtoupper(substr($combined, 0, $randomLength));
        });

        /**
         * Macro to generate a unique order code based on the service type and current date.
         *
         * The generated order code follows the format: `{PREFIX}-{DATE}-{NUMBER}`.
         * - `{PREFIX}`: The first two uppercase letters of the service type.
         * - `{DATE}`: The current date in `YYYYMMDD` format.
         * - `{NUMBER}`: A zero-padded, incrementing number starting from 001.
         *
         * The macro checks the database for the last order code with the same prefix and date,
         * increments the number, and ensures uniqueness.
         *
         * @param string $serviceType The type of service to generate the order code for.
         * @return string The generated unique order code.
         */
        Str::macro('generateOrderCode', function (string $serviceType): string {
            $prefix = strtoupper(substr($serviceType, 0, 2));
            $date = Carbon::now()->format('Ymd');

            $lastOrder = OrderItems::where('order_code', 'like', "{$prefix}-{$date}-%")
                ->orderByDesc('order_code')
                ->first();
            
            $nextNumber = 1;
            if ($lastOrder) {
                $lastNumber = (int) Str::afterLast($lastOrder->order_code, '-');
                $nextNumber = $lastNumber + 1;
            }

            $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            return "{$prefix}-{$date}-{$formattedNumber}";
        });
    }
}
