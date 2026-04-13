-- LYDRA Care Database Tables
-- Run this SQL in phpMyAdmin to create the tables

-- Caregivers table (users)
CREATE TABLE IF NOT EXISTS lydra_caregivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    relationship VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Seniors table (people being monitored)
CREATE TABLE IF NOT EXISTS lydra_seniors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    age INT,
    gender VARCHAR(10),
    location VARCHAR(255),
    primary_caregiver_id INT,
    language VARCHAR(50) DEFAULT 'English',
    check_in_time_am TIME DEFAULT '08:00:00',
    voice_speed DECIMAL(3,2) DEFAULT 0.85,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (primary_caregiver_id) REFERENCES lydra_caregivers(id)
);

-- Caregiver-Senior relationships
CREATE TABLE IF NOT EXISTS lydra_caregiver_seniors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    caregiver_id INT NOT NULL,
    senior_id INT NOT NULL,
    relationship VARCHAR(100),
    access_level ENUM('owner', 'caregiver', 'view_only', 'physician') DEFAULT 'caregiver',
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (caregiver_id) REFERENCES lydra_caregivers(id) ON DELETE CASCADE,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE,
    UNIQUE KEY unique_relationship (caregiver_id, senior_id)
);

-- Medications
CREATE TABLE IF NOT EXISTS lydra_medications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    medication_name VARCHAR(255) NOT NULL,
    dosage VARCHAR(100),
    timing VARCHAR(50),
    reason VARCHAR(255),
    adherence_rate INT DEFAULT 100,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Daily medication logs
CREATE TABLE IF NOT EXISTS lydra_medication_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medication_id INT NOT NULL,
    senior_id INT NOT NULL,
    log_date DATE NOT NULL,
    status ENUM('taken', 'missed', 'pending') DEFAULT 'pending',
    time_logged DATETIME,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (medication_id) REFERENCES lydra_medications(id) ON DELETE CASCADE,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Check-in sessions
CREATE TABLE IF NOT EXISTS lydra_checkins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    session_type ENUM('morning', 'evening', 'companion', 'exercise', 'story') DEFAULT 'morning',
    mood_score INT,
    session_duration_seconds INT,
    notes TEXT,
    checkin_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Alerts
CREATE TABLE IF NOT EXISTS lydra_alerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    alert_type ENUM('critical', 'warning', 'info') DEFAULT 'info',
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Activity log
CREATE TABLE IF NOT EXISTS lydra_activity_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    activity_type VARCHAR(100),
    title VARCHAR(255) NOT NULL,
    description TEXT,
    icon VARCHAR(50),
    activity_time DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Voice messages
CREATE TABLE IF NOT EXISTS lydra_voice_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    from_user_id INT,
    message_text TEXT,
    duration_seconds INT,
    file_path VARCHAR(255),
    message_type ENUM('from_senior', 'to_senior') DEFAULT 'to_senior',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE,
    FOREIGN KEY (from_user_id) REFERENCES lydra_caregivers(id)
);

-- Health insights
CREATE TABLE IF NOT EXISTS lydra_health_metrics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senior_id INT NOT NULL,
    metric_type VARCHAR(100),
    metric_name VARCHAR(255),
    metric_value DECIMAL(5,2),
    metric_unit VARCHAR(50),
    recorded_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (senior_id) REFERENCES lydra_seniors(id) ON DELETE CASCADE
);

-- Settings per caregiver-senior relationship
CREATE TABLE IF NOT EXISTS lydra_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    caregiver_senior_id INT NOT NULL,
    setting_key VARCHAR(255) NOT NULL,
    setting_value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (caregiver_senior_id) REFERENCES lydra_caregiver_seniors(id) ON DELETE CASCADE,
    UNIQUE KEY unique_setting (caregiver_senior_id, setting_key)
);

-- Sample data for testing
INSERT INTO lydra_caregivers (email, password_hash, full_name, phone, relationship) VALUES
('tariq@example.com', '$2y$10$NZtL1L9Zb/rqLJB3ZJZq2eZQ8fZZZ8ZZZ8ZZZ8ZZZ8ZZZ8ZZZ8ZZZ', 'Tariq Khan', '+1-403-555-0100', 'Son');

INSERT INTO lydra_seniors (full_name, age, gender, location, primary_caregiver_id, language, check_in_time_am) VALUES
('Muhammad Khan', 78, 'M', 'Calgary', 1, 'English', '08:00:00');

INSERT INTO lydra_caregiver_seniors (caregiver_id, senior_id, relationship, access_level) VALUES
(1, 1, 'Son · Primary caregiver', 'owner');

INSERT INTO lydra_medications (senior_id, medication_name, dosage, timing, reason, adherence_rate) VALUES
(1, 'Metformin', '500mg', 'Breakfast', 'Diabetes management', 94),
(1, 'Lisinopril', '10mg', 'Lunch', 'Blood pressure', 82),
(1, 'Aspirin', '81mg', 'Dinner', 'Cardiac protection', 98),
(1, 'Atorvastatin', '20mg', 'Bedtime', 'Cholesterol management', 96);
