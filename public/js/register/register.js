document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');
    const registerButton = document.querySelector('.register-button');
    
    // Auto-calculate age from date of birth
    const dateOfBirthInput = document.querySelector('input[name="date_of_birth"]');
    const ageInput = document.querySelector('input[name="age"]');
    
    if (dateOfBirthInput && ageInput) {
        dateOfBirthInput.addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            if (age >= 0 && age <= 150) {
                ageInput.value = age;
            }
        });
    }
    
    // Password confirmation validation
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
    
    function validatePasswordMatch() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity('Passwords do not match');
        } else {
            confirmPasswordInput.setCustomValidity('');
        }
    }
    
    if (passwordInput && confirmPasswordInput) {
        passwordInput.addEventListener('input', validatePasswordMatch);
        confirmPasswordInput.addEventListener('input', validatePasswordMatch);
    }
    
    // File upload validation
    const profileImageInput = document.querySelector('input[name="profile_image"]');
    const studentIdImageInput = document.querySelector('input[name="student_id_image"]');
    
    function validateFileSize(input, maxSizeMB = 2) {
        if (input.files && input.files[0]) {
            const fileSize = input.files[0].size / 1024 / 1024; // Convert to MB
            if (fileSize > maxSizeMB) {
                input.setCustomValidity(`File size must be less than ${maxSizeMB}MB`);
                return false;
            } else {
                input.setCustomValidity('');
                return true;
            }
        }
        return true;
    }
    
    if (profileImageInput) {
        profileImageInput.addEventListener('change', function() {
            validateFileSize(this);
        });
    }
    
    if (studentIdImageInput) {
        studentIdImageInput.addEventListener('change', function() {
            validateFileSize(this);
        });
    }
    
    // Form submission with loading state
    if (form) {
        form.addEventListener('submit', function(e) {
            // Validate all file uploads
            let allFilesValid = true;
            if (profileImageInput && !validateFileSize(profileImageInput)) {
                allFilesValid = false;
            }
            if (studentIdImageInput && !validateFileSize(studentIdImageInput)) {
                allFilesValid = false;
            }
            
            if (!allFilesValid) {
                e.preventDefault();
                return false;
            }
            
            // Show loading state
            if (registerButton) {
                registerButton.disabled = true;
                registerButton.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Registering...';
            }
        });
    }
    
    // Real-time validation feedback
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.checkValidity()) {
                this.classList.add('border-red-500');
            } else {
                this.classList.remove('border-red-500');
            }
        });
        
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('border-red-500');
            }
        });
    });
    
    // Student ID format validation (optional - customize based on your requirements)
    const studentIdInput = document.querySelector('input[name="student_id"]');
    if (studentIdInput) {
        studentIdInput.addEventListener('input', function() {
            // Remove any non-alphanumeric characters except hyphens
            this.value = this.value.replace(/[^a-zA-Z0-9-]/g, '');
        });
    }
    
    // Email format validation
    const emailInput = document.querySelector('input[name="email"]');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.setCustomValidity('Please enter a valid email address');
                this.classList.add('border-red-500');
            } else {
                this.setCustomValidity('');
                this.classList.remove('border-red-500');
            }
        });
    }
});
