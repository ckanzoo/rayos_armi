<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Mindoro State University</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  * { font-family: 'Inter', sans-serif; }
  .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); }
  .btn-primary { background: linear-gradient(135deg, #059669 0%, #065f46 100%); transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3); }
  .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4); }
  .input-field { transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); }
  .input-field:focus { box-shadow: 0 4px 20px rgba(5, 150, 105, 0.2); }
  .floating-bg { position: absolute; background: linear-gradient(45deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.05)); border-radius: 50%; animation: float 6s ease-in-out infinite; }
  @keyframes float { 0%,100%{ transform: translateY(0px) rotate(0deg);} 50%{ transform: translateY(-20px) rotate(180deg);} }
  .card-hover { transition: all 0.3s ease; }
  .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); }
</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-green-50 to-emerald-50 min-h-screen relative overflow-x-hidden flex items-center justify-center">

<!-- Background Elements -->
<div class="absolute inset-0 overflow-hidden">
  <div class="floating-bg w-72 h-72 -top-36 -left-36"></div>
  <div class="floating-bg w-96 h-96 -bottom-48 -right-48" style="animation-delay: 2s;"></div>
  <div class="floating-bg w-48 h-48 top-1/3 -right-24" style="animation-delay: 4s;"></div>
</div>

<div class="relative z-10 w-full max-w-md mx-4">

  <div class="glass-card rounded-2xl shadow-xl p-8 card-hover">
    <!-- Logo + Header -->
    <div class="text-center mb-8">
      <div class="flex justify-center mb-6">
        <div class="relative">
          <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-600 rounded-2xl blur opacity-30"></div>
          <div class="relative bg-white p-3 rounded-2xl shadow-lg border border-green-100">
            <img src="/public/logo.png" alt="MSU Logo" class="w-16 h-16 object-contain">
          </div>
        </div>
      </div>
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
      <p class="text-lg text-gray-600 font-medium">Mindoro State University</p>
      <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full mt-3 mx-auto"></div>
    </div>

    <!-- Error Alert -->
    <?php if (!empty($error)): ?>
      <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <p class="text-red-700 font-medium"><?= htmlspecialchars($error) ?></p>
        </div>
      </div>
    <?php endif; ?>

    <!-- Login Form -->
    <form method="post" action="/auth/login" class="space-y-6">
      <!-- Email -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
          </svg>
          <input type="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" 
            placeholder="Enter your email" required
            class="input-field w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl 
            focus:outline-none focus:ring-2 focus:ring-green-500 bg-white text-gray-900">
        </div>
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
        <div class="relative">
          <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" 
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
          </svg>
          <input id="password" type="password" name="password" placeholder="Enter your password" required
            class="input-field w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl 
            focus:outline-none focus:ring-2 focus:ring-green-500 bg-white text-gray-900">
          <button type="button" onclick="togglePassword()" 
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
            👁️
          </button>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-primary w-full px-6 py-3 text-white rounded-xl font-semibold flex items-center justify-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
        </svg>
        Login to Dashboard
      </button>
    </form>

    <!-- Register -->
    <div class="mt-6 pt-6 border-t border-gray-200">
      <p class="text-center text-gray-600">
        Don't have an account? 
        <a href="/auth/register" class="font-semibold text-green-600 hover:text-green-700 transition ml-1">
          Register here
        </a>
      </p>
    </div>
  </div>

  <p class="text-center text-gray-600 mt-6 text-sm">
    © 2024 Mindoro State University. All rights reserved.
  </p>
</div>

<script>
function togglePassword() {
  const pass = document.getElementById("password");
  pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>

