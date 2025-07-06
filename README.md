A WordPress plugin that allows logged-in users to view and update their contact information (name, email, phone, address) from Microsoft Dynamics 365 — securely and in real-time.

## 🔧 Features

- OAuth 2.0 authentication with Microsoft Dynamics 365 (via Azure AD)
- Fetch current user’s contact info from Dynamics
- Update contact info and push changes back to Dynamics
- Admin settings page for storing credentials

## 🚀 Installation

## ⚙️ Setup

1. In your WordPress admin, go to **Settings → Dynamics Sync**.
2. Enter the following details from your Azure App registration:
   - Azure Tenant ID
   - Client ID
   - Client Secret
   - Dynamics Resource URL (e.g., `https://yourorg.crm.dynamics.com`)

3. Save the settings.

4. In your WordPress user profile, ensure `dynamics_contact_id` is set in user meta for contact syncing.

## 🧩 Usage

Add the following shortcode to any post or page:

```
[dcs_contact_form]
```

## 🔐 Security

- All API calls use HTTPS and bearer token authentication
- WordPress nonces are used to prevent CSRF
- Input data is sanitized before processing

## 📌 Notes

- You must associate each WordPress user with a Dynamics 365 contact using `dynamics_contact_id` user meta.
- Requires Dynamics 365 Web API v9.2+ and proper API permissions (user_impersonation).

## 📞 Support

For assistance, create an issue or contact the developer.
