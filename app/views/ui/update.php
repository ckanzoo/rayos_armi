<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student - Mindoro State University</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  * { font-family: 'Inter', sans-serif; }
  
  .glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  
  .form-input {
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }
  
  .form-input:focus {
    box-shadow: 0 4px 20px rgba(5, 150, 105, 0.15);
    transform: translateY(-1px);
  }
  
  .btn-primary {
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
  }
  
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
  }
  
  .btn-secondary {
    background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
  }
  
  .btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(107, 114, 128, 0.4);
  }
  
  .floating-bg {
    position: absolute;
    background: linear-gradient(45deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05));
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
  }
  
  .card-hover {
    transition: all 0.3s ease;
  }
  
  .card-hover:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }
  
  .input-group {
    position: relative;
  }
  
  .input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }
  
  .file-input {
    position: relative;
    overflow: hidden;
    cursor: pointer;
  }
  
  .file-input input[type=file] {
    position: absolute;
    left: -9999px;
  }
  
  .progress-bar {
    height: 2px;
    background: linear-gradient(90deg, #10b981, #059669);
    transition: width 0.3s ease;
  }
  
  .photo-preview-container {
    position: relative;
    display: inline-block;
  }
  
  .photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .photo-preview-container:hover .photo-overlay {
    opacity: 1;
  }
</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50 min-h-screen relative overflow-x-hidden">

<!-- Subtle Background Elements -->
<div class="absolute inset-0 overflow-hidden">
  <div class="floating-bg w-72 h-72 -top-36 -left-36" style="animation-delay: 0s;"></div>
  <div class="floating-bg w-96 h-96 -bottom-48 -right-48" style="animation-delay: 2s;"></div>
  <div class="floating-bg w-48 h-48 top-1/3 -right-24" style="animation-delay: 4s;"></div>
</div>

<div class="relative z-10 py-8 px-4">
  <div class="max-w-2xl mx-auto">
    
    <!-- Header Section -->
    <div class="glass-card rounded-2xl shadow-xl mb-8 p-8 card-hover">
      <div class="text-center">
        <div class="flex justify-center mb-6">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-600 rounded-2xl blur opacity-30"></div>
            <div class="relative bg-white p-3 rounded-2xl shadow-lg border border-green-100">
              <img src="/public/logo.png" alt="MSU Logo" class="w-16 h-16 object-contain">
            </div>
          </div>
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
          Edit Student Profile
        </h1>
        <p class="text-lg text-gray-600 font-medium mb-4">Mindoro State University</p>
        <p class="text-gray-500">Update student information and credentials</p>
        <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full mt-4 mx-auto"></div>
      </div>
    </div>

    <!-- Progress Indicator -->
    <div class="glass-card rounded-2xl shadow-lg mb-8 p-4">
      <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
        <span>Edit Progress</span>
        <span>Updating Profile</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2">
        <div class="progress-bar rounded-full h-2" style="width: 100%"></div>
      </div>
    </div>

    <!-- Student Info Card -->
    <div class="glass-card rounded-2xl shadow-lg mb-8 p-6">
      <div class="flex items-center gap-4 text-sm text-gray-600">
        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-medium">Student ID: <?= htmlspecialchars($user['id']) ?></span>
        <span>•</span>
        <span>Last Updated: <?= date('M d, Y') ?></span>
      </div>
    </div>

    <!-- Main Form -->
    <div class="glass-card rounded-2xl shadow-xl card-hover">
      <div class="p-8">
        <form method="post" action="/students/update/<?= (int) $user['id'] ?>" enctype="multipart/form-data" class="space-y-8">
          
          <!-- Current Photo Section -->
          <?php if (!empty($user['photo'])): ?>
          <div class="text-center mb-8">
            <div class="space-y-4">
              <h3 class="text-lg font-semibold text-gray-900">Current Profile Photo</h3>
              <div class="flex justify-center">
                <div class="photo-preview-container">
                  <img src="<?= $upload_url . htmlspecialchars($user['photo']) ?>" 
                       class="w-24 h-24 rounded-full object-cover border-4 border-green-200 shadow-lg">
                  <div class="photo-overlay">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <!-- Personal Information Section -->
          <div class="space-y-6">
            <div class="border-b border-gray-200 pb-4">
              <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Personal Information
              </h2>
              <p class="text-gray-500 text-sm mt-1">Update the student's basic information</p>
            </div>

            <!-- First Name -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-gray-700">
                First Name <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
                <input type="text" name="first_name" required 
                       value="<?= htmlspecialchars($user['first_name']) ?>"
                       class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
                       placeholder="Enter first name">
              </div>
            </div>

            <!-- Last Name -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-gray-700">
                Last Name <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
                <input type="text" name="last_name" required 
                       value="<?= htmlspecialchars($user['last_name']) ?>"
                       class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
                       placeholder="Enter last name">
              </div>
            </div>

            <!-- Email -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-gray-700">
                Email Address <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                  </svg>
                </div>
                <input type="email" name="email" required 
                       value="<?= htmlspecialchars($user['email']) ?>"
                       class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
                       placeholder="Enter email address">
              </div>
              <p class="text-xs text-gray-500">This email is used for login credentials</p>
            </div>
          </div>

          <!-- Security Section -->
          <div class="space-y-6">
            <div class="border-b border-gray-200 pb-4">
              <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                Update Password
              </h2>
              <p class="text-gray-500 text-sm mt-1">Change login password (optional)</p>
            </div>

            <!-- Password -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-gray-700">
                New Password
              </label>
              <div class="input-group">
                <div class="input-icon">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                  </svg>
                </div>
                <input type="password" name="password"
                       class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white"
                       placeholder="Enter new password (leave blank to keep current)">
              </div>
              <p class="text-xs text-gray-500">Leave blank to keep the current password unchanged</p>
            </div>
          </div>

          <!-- Photo Upload Section -->
          <div class="space-y-6">
            <div class="border-b border-gray-200 pb-4">
              <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Update Profile Photo
              </h2>
              <p class="text-gray-500 text-sm mt-1">Upload a new profile picture (optional)</p>
            </div>

            <div class="space-y-2">
              <label class="block text-sm font-semibold text-gray-700">
                Choose New Photo
              </label>
              <div class="file-input">
                <label class="form-input flex items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-green-500 hover:bg-green-50 transition-colors">
                  <div class="text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-sm text-gray-600 font-medium">Click to upload new photo</p>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                  </div>
                  <input type="file" name="photo" accept="image/*" class="hidden">
                </label>
              </div>
              <p class="text-xs text-gray-500">Leave empty to keep the current photo unchanged</p>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
            <button type="submit" class="btn-primary flex-1 px-6 py-3 text-white rounded-xl font-semibold flex items-center justify-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
              </svg>
              Update Profile
            </button>
            <a href="/students/get-all" class="btn-secondary flex-1 px-6 py-3 text-white rounded-xl font-semibold flex items-center justify-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              Back to List
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer Info -->
    <div class="glass-card rounded-2xl shadow-lg mt-8 p-6">
      <div class="text-center text-gray-600">
        <div class="flex items-center justify-center gap-2 text-sm">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
          </svg>
          <span class="font-medium">Secure Update</span>
          <span>•</span>
          <span>All changes are logged</span>
        </div>
        <p class="text-xs text-gray-500 mt-2">
          Changes will be reflected immediately after saving
        </p>
      </div>
    </div>

  </div>
</div>

<script>
// File upload preview
document.querySelector('input[type="file"]').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const label = document.querySelector('.file-input label');
      label.innerHTML = `
        <div class="flex items-center gap-4">
          <img src="${e.target.result}" class="w-16 h-16 rounded-lg object-cover border-2 border-green-200">
          <div class="text-left">
            <p class="text-sm font-medium text-gray-700">New: ${file.name}</p>
            <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
            <p class="text-xs text-green-600">Will replace current photo</p>
          </div>
        </div>
      `;
    };
    reader.readAsDataURL(file);
  }
});

// Form submission confirmation
document.querySelector('form').addEventListener('submit', function(e) {
  const confirmation = confirm('Are you sure you want to update this student\'s information?');
  if (!confirmation) {
    e.preventDefault();
  }
});
</script>

</body>
</html>
