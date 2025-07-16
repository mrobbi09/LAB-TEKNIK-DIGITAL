// User Profile Management System
// Lab Teknik Digital - Universitas Lampung

/**
 * Toggle password visibility
 */
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('password-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.textContent = '🙈';
        passwordIcon.setAttribute('aria-label', 'Hide password');
    } else {
        passwordInput.type = 'password';
        passwordIcon.textContent = '👁️';
        passwordIcon.setAttribute('aria-label', 'Show password');
    }
}

/**
 * Initialize page when DOM is loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    initializePage();
    setupEventListeners();
});

/**
 * Initialize page with default values
 */
function initializePage() {
    // Set default values for disabled fields
    document.getElementById('kelompok').value = 'Kelompok A';
    document.getElementById('praktikum').value = 'Teknik Digital';
    
    console.log('User Profile Page Loaded');
    console.log('CDM Structure: USER table with fields - ID_USER, NPM, USERNAME, PASSWORD, NAMA_LENGKAP, EMAIL, PERAN, FOTO_PROFIL');
    console.log('Disabled fields: KELOMPOK, PRAKTIKUM (Read-only for users)');
}

/**
 * Setup all event listeners
 */
function setupEventListeners() {
    // Avatar update listener
    const namaLengkapInput = document.getElementById('nama_lengkap');
    namaLengkapInput.addEventListener('input', updateAvatarDisplay);

    // Photo upload listener
    const fotoProfilInput = document.getElementById('foto_profil');
    fotoProfilInput.addEventListener('change', handlePhotoUpload);

    // Form submission listener
    const userForm = document.getElementById('userForm');
    userForm.addEventListener('submit', handleFormSubmission);

    // Add input validation listeners
    setupInputValidation();
}

/**
 * Update avatar display based on name input
 */
function updateAvatarDisplay() {
    const name = document.getElementById('nama_lengkap').value.trim();
    const avatar = document.getElementById('avatarDisplay');
    
    if (name) {
        const initials = name
            .split(' ')
            .map(word => word.charAt(0).toUpperCase())
            .join('')
            .substring(0, 2);
        avatar.textContent = initials;
    } else {
        avatar.textContent = 'U';
    }
}

/**
 * Handle profile picture upload with validation
 */
function handlePhotoUpload(event) {
    const file = event.target.files[0];
    
    if (!file) return;

    // Validate file size (2MB = 2 * 1024 * 1024 bytes)
    const maxSize = 2 * 1024 * 1024;
    if (file.size > maxSize) {
        showAlert('Ukuran file terlalu besar! Maksimal 2MB.', 'error');
        event.target.value = '';
        return;
    }

    // Validate file type
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(file.type)) {
        showAlert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.', 'error');
        event.target.value = '';
        return;
    }

    // Preview image
    previewUploadedImage(file);
}

/**
 * Preview uploaded image in avatar
 */
function previewUploadedImage(file) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        const avatar = document.getElementById('avatarDisplay');
        avatar.style.backgroundImage = `url(${e.target.result})`;
        avatar.style.backgroundSize = 'cover';
        avatar.style.backgroundPosition = 'center';
        avatar.textContent = '';
    };
    
    reader.onerror = function() {
        showAlert('Gagal membaca file gambar.', 'error');
    };
    
    reader.readAsDataURL(file);
}

/**
 * Handle form submission
 */
function handleFormSubmission(event) {
    event.preventDefault();
    
    // Validate form before submission
    if (!validateForm()) {
        return;
    }

    // Collect form data
    const formData = collectFormData();
    
    // Process form data
    processFormSubmission(formData);
}

/**
 * Validate form inputs
 */
function validateForm() {
    const requiredFields = ['npm', 'username', 'password', 'nama_lengkap', 'email'];
    let isValid = true;

    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const value = field.value.trim();

        if (!value) {
            showFieldError(field, `${getFieldLabel(fieldId)} tidak boleh kosong`);
            isValid = false;
        } else {
            clearFieldError(field);
            
            // Additional validations
            if (fieldId === 'email' && !isValidEmail(value)) {
                showFieldError(field, 'Format email tidak valid');
                isValid = false;
            } else if (fieldId === 'npm' && !isValidNPM(value)) {
                showFieldError(field, 'Format NPM tidak valid');
                isValid = false;
            }
        }
    });

    return isValid;
}

/**
 * Setup input validation for real-time feedback
 */
function setupInputValidation() {
    // NPM validation
    const npmInput = document.getElementById('npm');
    npmInput.addEventListener('blur', function() {
        const value = this.value.trim();
        if (value && !isValidNPM(value)) {
            showFieldError(this, 'Format NPM tidak valid');
        } else {
            clearFieldError(this);
        }
    });

    // Email validation
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('blur', function() {
        const value = this.value.trim();
        if (value && !isValidEmail(value)) {
            showFieldError(this, 'Format email tidak valid');
        } else {
            clearFieldError(this);
        }
    });

    // Username validation
    const usernameInput = document.getElementById('username');
    usernameInput.addEventListener('input', function() {
        // Remove special characters except underscore and hyphen
        this.value = this.value.replace(/[^a-zA-Z0-9_-]/g, '');
    });
}

/**
 * Collect all form data
 */
function collectFormData() {
    const formData = new FormData(document.getElementById('userForm'));
    const userData = {};
    
    // Convert FormData to regular object (excluding file)
    for (let [key, value] of formData.entries()) {
        if (key !== 'foto_profil') {
            userData[key] = value.trim();
        }
    }

    // Add disabled fields data
    userData.kelompok = document.getElementById('kelompok').value;
    userData.praktikum = document.getElementById('praktikum').value;

    // Add file info if exists
    const fileInput = document.getElementById('foto_profil');
    if (fileInput.files[0]) {
        userData.foto_profil_info = {
            name: fileInput.files[0].name,
            size: fileInput.files[0].size,
            type: fileInput.files[0].type
        };
    }

    return userData;
}

/**
 * Process form submission
 */
function processFormSubmission(userData) {
    console.log('User Data:', userData);
    
    // Show success message
    const message = `Profil berhasil disimpan!\n\nData yang tersimpan:\n` +
                   `NPM: ${userData.npm}\n` +
                   `Username: ${userData.username}\n` +
                   `Nama: ${userData.nama_lengkap}\n` +
                   `Email: ${userData.email}\n` +
                   `Kelompok: ${userData.kelompok} (Read Only)\n` +
                   `Praktikum: ${userData.praktikum} (Read Only)`;
    
    showAlert(message, 'success');

    // Here you would typically send the data to your server
    // Example: submitToServer(userData);
}

/**
 * Submit data to server (placeholder function)
 */
async function submitToServer(userData) {
    try {
        const formData = new FormData();
        
        // Add all user data to FormData
        Object.keys(userData).forEach(key => {
            if (key !== 'foto_profil_info') {
                formData.append(key, userData[key]);
            }
        });

        // Add file if exists
        const fileInput = document.getElementById('foto_profil');
        if (fileInput.files[0]) {
            formData.append('foto_profil', fileInput.files[0]);
        }

        // Uncomment when you have server endpoint
        /*
        const response = await fetch('/api/users/profile', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Server error');
        }

        const result = await response.json();
        showAlert('Data berhasil disimpan ke server!', 'success');
        */
        
    } catch (error) {
        console.error('Error submitting to server:', error);
        showAlert('Gagal menyimpan data ke server. Silakan coba lagi.', 'error');
    }
}

/**
 * Reset form function
 */
function resetForm() {
    if (!confirm('Apakah Anda yakin ingin mereset semua data?')) {
        return;
    }

    // Reset form
    document.getElementById('userForm').reset();
    
    // Reset avatar
    const avatar = document.getElementById('avatarDisplay');
    avatar.textContent = 'U';
    avatar.style.backgroundImage = '';
    
    // Keep disabled fields as they are
    document.getElementById('kelompok').value = 'Kelompok A';
    document.getElementById('praktikum').value = 'Teknik Digital';

    // Clear any error messages
    clearAllFieldErrors();

    showAlert('Form berhasil direset!', 'info');
}

/**
 * Validation helper functions
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidNPM(npm) {
    // Assuming NPM should be numeric and 8-10 digits
    const npmRegex = /^\d{8,10}$/;
    return npmRegex.test(npm);
}

function getFieldLabel(fieldId) {
    const labels = {
        npm: 'NPM',
        username: 'Username',
        password: 'Password',
        nama_lengkap: 'Nama Lengkap',
        email: 'Email'
    };
    return labels[fieldId] || fieldId;
}

/**
 * UI Helper functions
 */
function showAlert(message, type = 'info') {
    // You can replace this with a more sophisticated notification system
    alert(message);
}

function showFieldError(field, message) {
    // Remove existing error
    clearFieldError(field);
    
    // Add error styling
    field.style.borderColor = '#dc3545';
    field.style.boxShadow = '0 0 0 3px rgba(220, 53, 69, 0.1)';
    
    // Create error message element
    const errorElement = document.createElement('small');
    errorElement.className = 'field-error';
    errorElement.style.color = '#dc3545';
    errorElement.style.fontSize = '0.8rem';
    errorElement.style.marginTop = '0.25rem';
    errorElement.style.display = 'block';
    errorElement.textContent = message;
    
    // Insert error message after the field
    field.parentNode.insertBefore(errorElement, field.nextSibling);
}

function clearFieldError(field) {
    // Reset field styling
    field.style.borderColor = '';
    field.style.boxShadow = '';
    
    // Remove error message
    const errorElement = field.parentNode.querySelector('.field-error');
    if (errorElement) {
        errorElement.remove();
    }
}

function clearAllFieldErrors() {
    const errorElements = document.querySelectorAll('.field-error');
    errorElements.forEach(element => element.remove());
    
    // Reset all field styles
    const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
    inputs.forEach(input => {
        input.style.borderColor = '';
        input.style.boxShadow = '';
    });
}

/**
 * Utility functions
 */
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function generateUserId() {
    // Generate unique user ID (for demonstration)
    return 'USER_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
}

// Export functions for external use (if needed)
window.UserProfileSystem = {
    resetForm,
    updateAvatarDisplay,
    validateForm,
    collectFormData,
    togglePassword
};