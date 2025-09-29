<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Mindoro State University</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  * { font-family: 'Inter', sans-serif; }
  
  .glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
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
  
  .input-field {
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }
  
  .input-field:focus {
    box-shadow: 0 4px 20px rgba(5, 150, 105, 0.2);
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
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }
</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50 min-h-screen relative overflow-x-hidden flex items-center justify-center py-8">

<!-- Subtle Background Elements -->
<div class="absolute inset-0 overflow-hidden">
  <div class="floating-bg w-72 h-72 -top-36 -left-36" style="animation-delay: 0s;"></div>
  <div class="floating-bg w-96 h-96 -bottom-48 -right-48" style="animation-delay: 2s;"></div>
  <div class="floating-bg w-48 h-48 top-1/3 -right-24" style="animation-delay: 4s;"></div>
</div>

<div class="relative z-10 w-full max-w-md mx-4">
  
  <!-- Register Card -->
  <div class="glass-card rounded-2xl shadow-xl p-8 card-hover">
    
    <!-- Header Section -->
    <div class="text-center mb-8">
      <div class="flex justify-center mb-6">
        <div class="relative">
          <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-600 rounded-2xl blur opacity-30"></div>
          <div class="relative bg-white p-3 rounded-2xl shadow-lg border border-green-100">
            <img src="/public/logo.png" alt="MSU Logo" class="w-16 h-16 object-contain">
          </div>
        </div>
      </div>
      
      <h1 class="text-3xl font-bold text-gray-900 mb-2">
        Create Account
      </h1>
      <p class="text-lg text-gray-600 font-medium">Mindoro State University</p>
      <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full mt-3 mx-auto"></div>
    </div>

    <!-- Error Message -->
    <?php if (!empty($error)): ?>
      <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <p class="text-red-700 font-medium"><?= htmlspecialchars($error) ?></p>
        </div>
      </div>
    <?php endif; ?>

    <!-- Register Form -->
    <form method="post" action="/auth/register" enctype="multipart/form-data" class="space-y-5">
      
      <!-- First Name Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          First Name
        </label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
          <input type="text" name="first_name" placeholder="Enter your first name" required
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900">
        </div>
      </div>

      <!-- Last Name Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          Last Name
        </label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
          <input type="text" name="last_name" placeholder="Enter your last name" required
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900">
        </div>
      </div>

      <!-- Email Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          Email Address
        </label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
          </svg>
          <input type="email" name="email" placeholder="Enter your email" required
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900">
        </div>
      </div>

      <!-- Password Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          Password
        </label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
          </svg>
          <input type="password" name="password" placeholder="Create a password" required
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900">
        </div>
      </div>

      <!-- Profile Photo Field -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
          Profile Photo <span class="text-gray-500 font-normal">(optional)</span>
        </label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <input type="file" name="photo" accept="image/*"
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 file:cursor-pointer">
        </div>
      </div>

      <!-- Register Button -->
      <button type="submit" class="btn-primary w-full px-6 py-3 text-white rounded-xl font-semibold flex items-center justify-center gap-2 mt-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>
        Create Account
      </button>
    </form>

    <!-- Login Link -->
    <div class="mt-6 pt-6 border-t border-gray-200">
      <p class="text-center text-gray-600">
        Already have an account? 
        <a href="/auth/login" class="font-semibold text-green-600 hover:text-green-700 transition ml-1">
          Login here
        </a>
      </p>
    </div>
  </div>

  <!-- Footer Text -->
  <p class="text-center text-gray-600 mt-6 text-sm">
    © 2024 Mindoro State University. All rights reserved.
  </p>
</div>

</body>
</html>