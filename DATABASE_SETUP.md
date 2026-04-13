# LYDRA Care — Database Backend Setup

This is the complete setup guide for connecting the PHP app to your Hostinger database.

---

## Step 1: Get Your Database Credentials

1. Log into **Hostinger Control Panel**
2. Go to **Databases** (or **MySQL databases**)
3. Find or create a database
4. Copy these details:
   - **Database name**: `u200709086_yTzUe` (from your phpMyAdmin)
   - **Database user**: Usually same as database name on Hostinger
   - **Database password**: Check **Databases** section or reset it
   - **Host**: Usually `127.0.0.1` or `localhost` (check Hostinger docs)

---

## Step 2: Update Database Connection

**File**: `config/db.php`

1. Replace the credentials with your Hostinger info:

```php
$db_host = '127.0.0.1';        // Your host from Hostinger
$db_name = 'u200709086_yTzUe'; // Your database name
$db_user = 'u200709086_yTzUe'; // Your database user
$db_pass = 'YOUR_PASSWORD';    // Your database password
```

---

## Step 3: Create Database Tables

1. Open **phpMyAdmin** in Hostinger
2. Select your database: `u200709086_yTzUe`
3. Go to **SQL** tab
4. Copy the entire content from `config/schema.sql`
5. Paste into the SQL editor
6. Click **Execute**

✅ All tables are now created with sample data.

---

## Step 4: Test Login Locally

### If testing on your PC:

1. Open PowerShell in the app folder
2. Run:
   ```powershell
   php -S localhost:8000
   ```
3. Open: `http://localhost:8000/login.php`

**Default test account** (created by schema.sql):
- Email: `tariq@example.com`
- Password: `password123`

4. Click "Sign in"
5. You should see the dashboard with Muhammad Khan's data

---

## Step 5: Upload to Hostinger

1. Connect via **FTP** or use Hostinger's **File Manager**
2. Upload this entire folder to `public_html`
3. Make sure these files are in the site root:
   - `index.php`
   - `login.php`
   - `register.php`
   - `logout.php`
   - `config/` folder
   - `assets/` folder

4. Visit: `https://yourdomain.com/login.php`
5. Test with the default account or create a new one

---

## File Structure

```
public_html/
├── index.php                    (Dashboard)
├── activity.php                 (Activity log)
├── medications.php              (From database)
├── alerts.php
├── family.php
├── messages.php
├── health.php
├── settings.php
├── login.php                    (Login page)
├── register.php                 (Registration page)
├── logout.php                   (Logout handler)
├── header.php                   (Shared header)
├── footer.php                   (Shared footer)
├── config/
│   ├── db.php                   (Database connection)
│   ├── auth.php                 (Auth functions)
│   └── schema.sql               (Database structure)
└── assets/
    ├── style.css
    └── script.js
```

---

## What's Connected to Database

✅ **Login/Register**: Users stored in `lydra_caregivers`
✅ **Medications page**: Pulls from `lydra_medications`
✅ **Senior profile**: Displayed on sidebar
✅ **Dashboard stats**: Will pull real data once you add activity logs

---

## Add More Seniors or Caregivers

### Add a new senior:

In **phpMyAdmin SQL tab**:
```sql
INSERT INTO lydra_seniors (full_name, age, primary_caregiver_id) 
VALUES ('New Senior Name', 75, 1);

-- Link to a caregiver:
INSERT INTO lydra_caregiver_seniors (caregiver_id, senior_id, relationship, access_level)
VALUES (1, 2, 'Family Member', 'caregiver');
```

### Add a new medication:

```sql
INSERT INTO lydra_medications (senior_id, medication_name, dosage, timing, reason, adherence_rate)
VALUES (1, 'Vitamin D', '1000 IU', 'Morning', 'Bone health', 90);
```

---

## Troubleshooting

**"Database connection failed"**
- Check credentials in `config/db.php`
- Ask Hostinger support for correct host/user
- Make sure database password is correct

**"Login page appears blank"**
- Check PHP version is 8.3+
- Check `config/db.php` has correct credentials

**"Medications don't show"**
- Verify medications exist in database (check phpMyAdmin)
- Check `$_SESSION['senior_id']` is set

---

## Next Steps

After setup, you can:
- Add form handling for adding/editing medications
- Connect activity logs to the database
- Add alerts from database
- Create admin panel to manage users

Contact support if you need help with any step!
