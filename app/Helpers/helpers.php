<?php

if (!function_exists('storage_asset')) {
    /**
     * Get the correct URL for an uploaded file or asset, working across local and live environments.
     *
     * Automatically handles:
     * - Full URLs (http:// or https://)
     * - Leading slashes
     * - Redundant 'storage/' prefixes
     * - Fallback images if the path is empty
     * - Directly located public assets
     *
     * @param string|null $path
     * @param string|null $default
     * @return string
     */
    function storage_asset(?string $path, ?string $default = null): string
    {
        if (empty($path)) {
            return $default ? asset($default) : '';
        }

        // If it's already an absolute external or full URL
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '//')) {
            return $path;
        }

        // Strip leading slashes
        $cleanPath = ltrim($path, '/\\');

        // Normalize if path already begins with 'storage/'
        if (str_starts_with($cleanPath, 'storage/')) {
            $cleanPath = substr($cleanPath, 8);
        }

        // If file exists directly in public/ (e.g. assets/images/...)
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // Default to storage asset URL
        return asset('storage/' . $cleanPath);
    }
}

if (!function_exists('setting')) {
    /**
     * Retrieve a setting value from the database or cache.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        static $settings = null;

        if ($settings === null) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
                } else {
                    $settings = [];
                }
            } catch (\Throwable $e) {
                $settings = [];
            }
        }

        if (!array_key_exists($key, $settings) || $settings[$key] === null || $settings[$key] === '') {
            return $default;
        }

        return $settings[$key];
    }
}

if (!function_exists('clean_google_map_embed')) {
    /**
     * Convert any user-inputted Google Maps link, iframe tag, or address into a valid embed URL.
     *
     * @param string|null $input
     * @param string|null $fallbackLocation
     * @return string
     */
    function clean_google_map_embed(?string $input, ?string $fallbackLocation = null): string
    {
        $input = trim((string) $input);

        if (empty($input)) {
            if (!empty($fallbackLocation)) {
                return 'https://maps.google.com/maps?q=' . urlencode(strip_tags($fallbackLocation)) . '&t=&z=15&ie=UTF8&iwloc=&output=embed';
            }
            return 'https://maps.google.com/maps?q=Padavla+Rajkot+Gujarat&t=&z=15&ie=UTF8&iwloc=&output=embed';
        }

        if (preg_match('/<iframe\s+[^>]*src=[\'"]([^\'"]+)[\'"]/i', $input, $matches)) {
            return $matches[1];
        }

        if (str_contains($input, 'google.com/maps/embed') || str_contains($input, 'output=embed')) {
            return $input;
        }

        if (preg_match('/[?&]q=([^&]+)/', $input, $matches)) {
            return 'https://maps.google.com/maps?q=' . $matches[1] . '&t=&z=15&ie=UTF8&iwloc=&output=embed';
        }

        return 'https://maps.google.com/maps?q=' . urlencode(strip_tags($input)) . '&t=&z=15&ie=UTF8&iwloc=&output=embed';
    }
}


