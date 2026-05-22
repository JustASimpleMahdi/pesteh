<?php

namespace App\Models;

use App\Enums\SettingsKeyEnum;
use Cache;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('key', 'name', 'value', 'type')]
class Settings extends Model
{
    public static function get(SettingsKeyEnum $key)
    {
        // ابتدا در کش چک کن
        return Cache::rememberForever('setting_' . $key->value, function () use ($key) {
            $setting = self::where('key', $key)->first();

            if ($setting->type === 'integer') {
                return (int)$setting->value;
            } elseif ($setting->type === 'json' && $setting->value) {
                return json_decode($setting->value, true); // true برای آرایه associative
            }

            return $setting->value;
        });
    }

    public static function set(SettingsKeyEnum $key, $value, ?string $type = null): void
    {
        $setting = self::updateOrCreate(
            ['key' => $key->value],
            ['value' => $value, 'type' => $type ?? gettype($value)] // نوع را اگر مشخص نشده، خودکار تعیین کن
        );
        // کش را پاک کن تا در درخواست بعدی مقدار جدید خوانده شود
        Cache::forget('setting_' . $key->value);
    }

    // تابع کمکی برای آپدیت یا ایجاد یک تنظیم

    protected function casts(): array
    {
        return [
            'key' => SettingsKeyEnum::class,
        ];
    }
}
