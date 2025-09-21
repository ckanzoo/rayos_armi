<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mindoro State University - Update User</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-900 via-green-700 to-green-600 font-sans min-h-screen relative overflow-x-hidden">

<!-- Background Patterns -->
<div class="absolute inset-0">
  <!-- Academic Grid Pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="grid grid-cols-12 gap-4 h-full w-full p-4">
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
      <div class="border border-green-300 h-full"></div>
    </div>
  </div>

  <!-- Floating Academic Elements -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-20 left-10 w-20 h-20 border-2 border-green-300 rounded-full animate-spin-slow"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-green-400 rotate-45 animate-pulse"></div>
    <div class="absolute bottom-32 left-16 w-24 h-24 border-2 border-green-200 rotate-12 animate-bounce-slow"></div>
    <div class="absolute bottom-20 right-32 w-18 h-18 bg-green-300 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
  </div>

  <!-- Subtle Dot Matrix -->
  <div class="absolute inset-0 opacity-8">
    <div class="grid grid-cols-20 gap-6 h-full w-full p-8">
      <div class="w-1 h-1 bg-green-200 rounded-full"></div>
      <div class="w-1 h-1 bg-green-300 rounded-full"></div>
      <div class="w-1 h-1 bg-green-200 rounded-full"></div>
    </div>
  </div>
</div>

<!-- Glass Container -->
<div class="max-w-4xl mx-auto bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 p-8 mt-12 mx-4 relative z-10 overflow-hidden">

  <!-- Header -->
  <div class="relative z-10 text-center border-b border-green-200/50 pb-8 mb-10">
    <div class="flex flex-col items-center space-y-4">
      <!-- Logo -->
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-600 rounded-full blur-lg opacity-30 animate-pulse"></div>
        <div class="relative bg-white p-2 rounded-full shadow-2xl border-4 border-green-100">
          <img src="/public/logo.png" alt="Mindoro State University" class="w-24 h-24 object-contain rounded-full">
        </div>
      </div>
      <!-- Typography -->
      <div class="text-center space-y-2">
        <h1 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-800 via-green-700 to-green-600 tracking-tight">
          Update User
        </h1>
        <div class="text-xl font-semibold text-green-700">Edit user details below</div>
        <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-green-600 mx-auto rounded-full"></div>
      </div>
    </div>
  </div>

  <!-- Error Message -->
  <?php if(isset($error)): ?>
  <div class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-600 text-red-700 p-4 rounded-xl mb-6 shadow-md">
    <div class="flex items-center">
      <span class="text-2xl mr-3">⚠️</span>
      <div>
        <h4 class="font-semibold mb-1">Error</h4>
        <p><?=$error;?></p>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- Update User Form -->
  <form action="<?=site_url('user/update/'.$user['id']);?>" method="post" class="space-y-6 bg-gradient-to-r from-slate-50/80 to-green-50/80 backdrop-blur-sm rounded-2xl border border-green-100/50 p-8 shadow-lg">
    <div class="space-y-4">
      <label class="block text-green-800 font-bold mb-2 flex items-center gap-2">
        <span class="text-lg">👤</span>
        Username
      </label>
      <input type="text" name="username" value="<?=$user['username'];?>" required
             class="w-full border-2 border-green-600 rounded-xl px-6 py-3 focus:outline-none focus:ring-4 focus:ring-green-200 focus:border-green-800 transition-all duration-300 text-gray-700 font-medium shadow-md">
    </div>

    <div class="space-y-4">
      <label class="block text-green-800 font-bold mb-2 flex items-center gap-2">
        <span class="text-lg">📧</span>
        Email
      </label>
      <input type="email" name="email" value="<?=$user['email'];?>" required
             class="w-full border-2 border-green-600 rounded-xl px-6 py-3 focus:outline-none focus:ring-4 focus:ring-green-200 focus:border-green-800 transition-all duration-300 text-gray-700 font-medium shadow-md">
    </div>

    <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
      <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">
        <span class="text-lg">💾</span>
        Update User
      </button>
      <a href="<?=site_url('/');?>"
         class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-8 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">
        <span class="text-lg">↩️</span>
        Cancel
      </a>
    </div>
  </form>

  <!-- Footer -->
  <div class="mt-8 text-center">
    <div class="flex items-center justify-center gap-2 text-gray-500 text-sm">
      <span>🏫</span>
      <span>Mindoro State University</span>
      <span>•</span>
      <span>User Management System</span>
    </div>
  </div>

</div>

<style>
/* Custom animations */
@keyframes spin-slow {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes bounce-slow {
  0%, 100% { transform: translateY(0) rotate(12deg); }
  50% { transform: translateY(-20px) rotate(12deg); }
}

.animate-spin-slow {
  animation: spin-slow 12s linear infinite;
}

.animate-bounce-slow {
  animation: bounce-slow 4s ease-in-out infinite;
}
</style>

</body>
</html>
