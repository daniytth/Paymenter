<?php

namespace App\Classes;

class InvoiceStyle
{
    /**
     * Classic "ink navy" fallback used when no accent color is configured.
     */
    private const DEFAULT_ACCENT = 'hsl(215, 45%, 27%)';

    /**
     * Resolve the invoice accent color (settings.invoice_accent_color) into
     * formats usable by both the PDF template and the client area view.
     *
     * @return array{hex: string, hex_soft: string, hex_light: string, rgb: string}
     */
    public static function accent(): array
    {
        [$r, $g, $b] = self::toRgb((string) config('settings.invoice_accent_color'))
            ?? self::toRgb(self::DEFAULT_ACCENT);

        [$h, $s, $l] = self::rgbToHsl($r, $g, $b);

        // Soft tint (accent mixed with white) for subtle backgrounds
        $soften = fn (int $channel): int => (int) round($channel + (255 - $channel) * 0.93);

        // Lightened variant for use on dark backgrounds
        [$lr, $lg, $lb] = self::hslToRgb($h, $s, max($l, 0.70));

        return [
            'hex' => self::rgbToHex($r, $g, $b),
            'hex_soft' => self::rgbToHex($soften($r), $soften($g), $soften($b)),
            'hex_light' => self::rgbToHex($lr, $lg, $lb),
            // Space-less variants for use inside Tailwind arbitrary values
            'rgb' => sprintf('%d,%d,%d', $r, $g, $b),
            'rgb_light' => sprintf('%d,%d,%d', $lr, $lg, $lb),
        ];
    }

    /**
     * Parse a CSS color string (#hex, rgb(a) or hsl(a)) into RGB channels.
     *
     * @return array{int, int, int}|null
     */
    private static function toRgb(string $value): ?array
    {
        $value = strtolower(trim($value));

        if ($value === '') {
            return null;
        }

        if (preg_match('/^#([0-9a-f]{3})$/', $value, $m)) {
            return array_map(fn ($channel) => hexdec(str_repeat($channel, 2)), str_split($m[1]));
        }

        if (preg_match('/^#([0-9a-f]{6})$/', $value, $m)) {
            return array_map('hexdec', str_split($m[1], 2));
        }

        if (preg_match('/^rgba?\(\s*(\d{1,3})[\s,]+(\d{1,3})[\s,]+(\d{1,3})/i', $value, $m)) {
            return [(int) $m[1], (int) $m[2], (int) $m[3]];
        }

        if (preg_match('/^hsla?\(\s*(\d{1,3}(?:\.\d+)?)[\s,]+(\d{1,3}(?:\.\d+)?)%[\s,]+(\d{1,3}(?:\.\d+)?)%/i', $value, $m)) {
            return self::hslToRgb((float) $m[1], (float) $m[2] / 100, (float) $m[3] / 100);
        }

        return null;
    }

    private static function rgbToHex(int $r, int $g, int $b): string
    {
        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    /**
     * @return array{int, int, int}
     */
    private static function hslToRgb(float $h, float $s, float $l): array
    {
        $h = fmod($h, 360) / 360;

        if ($s == 0.0) {
            $r = $g = $b = $l * 255;
        } else {
            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
            $p = 2 * $l - $q;

            $hueToRgb = fn (float $t): float => match (true) {
                $t < 1 / 6 => $p + ($q - $p) * 6 * $t,
                $t < 1 / 2 => $q,
                $t < 2 / 3 => $p + ($q - $p) * (2 / 3 - $t) * 6,
                default => $p,
            };

            $r = $hueToRgb($h + 1 / 3) * 255;
            $g = $hueToRgb($h) * 255;
            $b = $hueToRgb($h - 1 / 3) * 255;
        }

        return [(int) round($r), (int) round($g), (int) round($b)];
    }

    /**
     * @return array{float, float, float} Hue in degrees, saturation and lightness as 0-1 fractions
     */
    private static function rgbToHsl(int $r, int $g, int $b): array
    {
        $r /= 255;
        $g /= 255;
        $b /= 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $l = ($max + $min) / 2;

        if ($max === $min) {
            $h = $s = 0.0;
        } else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

            $h = match ($max) {
                $r => ($g - $b) / $d + ($g < $b ? 6 : 0),
                $g => ($b - $r) / $d + 2,
                default => ($r - $g) / $d + 4,
            };

            $h /= 6;
        }

        return [$h * 360, $s, $l];
    }
}
