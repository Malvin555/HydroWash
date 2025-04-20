<?php

namespace App\Providers;

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
        Str::macro('rupiahToFloat', function (string $value) {
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
        Str::macro('generateRandomString', function (): string {
            $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $randomLength = rand(5, 6);

            $randomPart = collect(range(1, $randomLength))
                    ->map(fn () => $characters[rand(0, strlen($characters) - 1)])
                    ->implode('');
            
            $uniquePart = substr(uniqid(), -5);
            $combined = str_shuffle($randomPart . $uniquePart);
            return '#' . strtoupper(substr($combined, 0, $randomLength));
        });
    }
}
