# Discord Logs Extension

Send Paymenter application logs to Discord with fully customizable webhook rules.

## Features

- Listens to Laravel `MessageLogged` events.
- Unlimited webhook rules managed in admin (Filament/Livewire).
- Per-rule:
  - minimum level
  - channel filter
  - message keyword include/exclude filters
  - regex message filter
  - mention + mention levels
  - optional top `content` template
  - custom username/avatar
  - custom embed title/description/footer templates
  - author block, thumbnail, image
  - plain-text mode toggle
  - max message length
  - custom JSON embed fields
  - custom color + timeout
  - context/request/trace toggles
- Rich embeds with level colors and metadata.
- Built-in recursion guard to prevent webhook failure loops.

## Admin UI

After enabling extension, open:

- `Admin -> Extensions -> Discord Log Rules`

Use **Create** to add new webhook routes/rules.

You can also:

- choose a **Preset Template** in the form to auto-fill a rule
- click **Install Presets** for ready-made starter rules
  - Critical Alerts
  - Payment Failures
  - Security Watch
  - Debug Stream
- click **Test** on list rows or **Send Test Webhook** on edit page to validate each rule instantly

## Template variables

For title/description templates:

- `{app}`
- `{level}`
- `{channel}`
- `{env}`
- `{message}`
- `{time}`

Also supported in `content_template`.

## Install / Upgrade

1. Upload extension folder/archive in Paymenter Admin.
2. Enable extension.
3. Create rules in `Discord Log Rules`.
4. If upgrading from old version, run:
   - `php artisan app:extension:upgrade other Logs`
