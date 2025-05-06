<?php

namespace App\Providers;

use App\Models\Ironing;
use App\Models\Laundry;
use Carbon\Carbon;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
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
                ->map(fn() => $characters[rand(0, strlen($characters) - 1)])
                ->implode('');

            $uniquePart = substr(uniqid(), -5);
            $combined = str_shuffle($randomPart . $uniquePart);
            return $type . ' #' . strtoupper(substr($combined, 0, $randomLength));
        });

        /**
         * Macro to format an order name from a slug.
         *
         * This macro takes a slug string, splits it into parts using a hyphen ('-') as the delimiter,
         * and formats it into a readable order name. The first part of the slug is capitalized,
         * and the last part is converted to uppercase and prefixed with a hash (#).
         *
         * Examples:
         * Input: "laundry-bfg464y4"
         * Output: "Laundry #BFG464Y4"
         *
         * Input: "ironing-6cpc6l"
         * Output: "Ironing #6CPC6L"
         *
         * @param string $slug The slug string to be formatted.
         * @return string The formatted order name.
         */
        Str::macro('formatServiceNameFromSlug', function (string $slug): string {
            $parts = explode('-', $slug);
            $prefix = ucfirst($parts[0]);
            $suffix = strtoupper(end($parts));
            return $prefix . ' #' . $suffix;
        });

        /**
         * Macro to convert a snake_case string into a human-readable label.
         * 
         * This macro takes a string formatted in snake_case, replaces underscores with spaces,
         * and capitalizes the first letter of each word to create a readable label.
         * 
         * Example:
         * Input: "take_away"
         * Output: "Take Away"
         * 
         * @param string $value The snake_case string to be formatted.
         * @return string The formatted label.
         */
        Str::macro('formatSnakeCaseToLabel', function (string $value): string {
            return ucwords(str_replace('_', ' ', $value));
        });

        /**
         * Macro to format a number into Indonesian Rupiah format.
         *
         * Examples:
         * Input: 120000.00
         * Output: Rp 120.000,00
         *
         * @param string|float $value The number to be formatted.
         * @return string The formatted string.
         */
        Str::macro('formatCurrency', function (string|float $value): string {
            return 'Rp ' . number_format($value, 2, ',', '.');
        });
    }
}
